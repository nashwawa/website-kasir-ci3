<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller {
	public function __construct(){
        parent:: __construct();
		if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index()
	{
        date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai kebutuhan Anda
        $tanggal = date('Y-m-d');
        $this->db->select("*");
        $this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.tanggal',$tanggal);
        $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan', 'left');
        
        $user = $this->db->get()->result_array();	
        $this->db->from('pelanggan')->order_by('nama','ASC');
        

        $pelanggan = $this->db->get()->result_array();	
		$data = array(
			'judul_halaman' => ' Penjualan',
            'user'          => $user,
            'pelanggan'     => $pelanggan
		);
		$this->template->load('template', 'penjualan_index', $data);
	}
    public function transaksi($id_pelanggan)
    {
        date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Asia/Jakarta
        $tanggal = date('Y-m'); // Mengambil tahun dan bulan saat ini (contoh: 2025-01)
        
        // Hitung jumlah transaksi berdasarkan bulan dan tahun tertentu
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal); // Tambahkan operator '='
        $jumlah = $this->db->count_all_results(); // Menghitung total transaksi
        
        // Membuat nomor nota unik berdasarkan tanggal dan jumlah transaksi
        $nota = date('Ymd') . str_pad($jumlah + 1, 1, '0', STR_PAD_LEFT); // Tambahkan angka dengan padding 3 digit
        
        // Ambil produk yang memiliki stok lebih dari 0
        $this->db->from('produk')->where('stok >', 0)->order_by('nama', 'ASC');
        $produk = $this->db->get()->result_array();	

        $this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
        $nama_pelanggan = $this->db->get()->row()->nama;	

        $this->db->from('detail_penjualan a');
        $this->db->join('produk b', 'a.id_produk =b.id_produk', 'left');
        $this->db->where('a.kode_penjualan', $nota);
        $detail = $this->db->get()->result_array();

        $this->db->from('keranjang a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk','left');
        $this->db->where('a.id_pelanggan',$id_pelanggan);
        $this->db->where('a.id_user',$this->session->userdata('id_user'));
        $keranjang = $this->db->get()->result_array();
        
        // Data untuk dikirim ke view
        $data = array(
            'judul_halaman' => 'Transaksi Penjualan',
            'nota'          => $nota, // Nomor nota yang unik
            'produk'        => $produk,
            'id_pelanggan'  => $id_pelanggan,
            'nama_pelanggan'  => $nama_pelanggan,
            'detail'          => $detail,
            'keranjang'          => $keranjang,
        );

        // Memuat template dan view dengan data
        $this->template->load('template', 'penjualan_transaksi', $data);
    }

    public function tambahkeranjang() 
    {
        // Cek apakah produk sudah ada dalam keranjang
        $this->db->from('detail_penjualan');
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->where('kode_penjualan', $this->input->post('kode_penjualan'));
        $this->db->where('total_harga', $this->input->post('total'));
        $cek = $this->db->get()->result_array();
    
        if (!empty($cek)) {
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-warning" style="font-size: 17px;">Produk sudah dipilih dalam keranjang!</div>');
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
    
        // Ambil data produk berdasarkan id_produk
        $this->db->select('harga_jual, stok');
        $this->db->from('produk');
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $produk = $this->db->get()->row();
    
        // Cek apakah produk ditemukan
        if (!$produk) {
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger" style="font-size: 17px;">Produk tidak ditemukan!</div>');
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
    
        // Ambil jumlah beli dari form dan pastikan nilainya valid
        $jumlah_beli = (int) $this->input->post('jumlah');
        if ($jumlah_beli <= 0 || $jumlah_beli > $produk->stok) {
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-warning" style="font-size: 17px;">Jumlah produk tidak valid atau stok tidak mencukupi!</div>');
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
    
        // Ambil harga dari database
        $harga_jual = $produk->harga_jual;
        if ($harga_jual === NULL) {
            $this->session->set_flashdata('alert', 
                '<div class="alert alert-danger" style="font-size: 17px;">Harga produk belum diatur!</div>');
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
    
        // Hitung stok baru dan subtotal
        $stok_sekarang = $produk->stok - $jumlah_beli;
        $sub_total = $jumlah_beli * $harga_jual;
    
        // Simpan ke detail_penjualan
        $data = array(
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'id_produk'      => $this->input->post('id_produk'),
            'jumlah'         => $jumlah_beli,
            'harga_jual'     => $harga_jual, 
            'sub_total'      => $sub_total,
        );
       
        // Masukkan produk ke dalam detail_penjualan
        $this->db->insert('detail_penjualan', $data);
    
        // Update stok produk
        $this->db->set('stok', $stok_sekarang);
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('produk');
    
        // Notifikasi sukses
        $this->session->set_flashdata('alert', 
            '<div class="alert alert-success" style="font-size: 17px;">Produk berhasil ditambahkan ke keranjang!</div>');
    
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function keranjang(){
        $this->db->from('keranjang');
        $this->db->where('id_produk',$this->input->post('id_produk'));
        $this->db->where('id_pelanggan',$this->input->post('id_pelanggan'));
        $this->db->where('id_user',$this->session->userdata('id_user'));
        $cek = $this->db->get()->result_array();

        if($cek==NULL){
            $data = array(
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_produk' => $this->input->post('id_produk'),
                'id_user'   =>  $this->session->userdata('id_user'),
                'jumlah'    => $this->input->post('jumlah'),
            );

            $this->db->insert('keranjang',$data);
            $this->session->set_flashdata('alert', 
            '<div class="alert alert-success" style="font-size: 17px;">Produk berhasil ditambahkan ke keranjang!</div>');
        }else{
            $this->session->set_flashdata('alert', 
            '<div class="alert alert-success" style="font-size: 17px;">Produk sudah di keranjang!</div>');

        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete_data($id_keranjang)
    { 
        
        // hapus dari keranjang
        $where3 = array('id_keranjang' => $id_keranjang);
        $this->db->delete('keranjang',$where3);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Berhasil menghapus produk dari keranjang.
                </div>
            </div>
        ');
        
        
        // Redirect kembali ke halaman sebelumnya
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    public function bayar(){
        date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu ke Asia/Jakarta
        $tanggal = date('Y-m');
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal); // Tambahkan operator '='
        $jumlah = $this->db->count_all_results(); 
        $nota = date('Ymd') . str_pad($jumlah + 1, 1, '0', STR_PAD_LEFT); // Tambahkan angka dengan padding 3 digit
        
        
        $this->db->from('keranjang a');
        $this->db->join('produk b','a.id_produk = b.id_produk','left');
        $this->db->where('a.id_user',$this->session->userdata('id_user'));
        $this->db->where('a.id_pelanggan',$this->input->post('id_pelanggan'));
        $keranjang = $this->db->get()->result_array();
        foreach($keranjang as $aa){
            if($aa['stok']<$aa['jumlah']){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Jumlah Melebihi Stok.
                    </div>
                </div>
            ');
            redirect($_SERVER['HTTP_REFERER']);

            }

        $data = array(
            'id_produk' => $aa['id_produk'],
            'jumlah' => $aa['jumlah'],
            'sub_total' => $aa['jumlah']*$aa['harga_jual'],
            'kode_penjualan' => $nota,
        );

        $this->db->insert('detail_penjualan',$data);

        // update stok produk
        $stokbaru = array('stok'=> $aa['stok']-$aa['jumlah']);
        $where = array('id_produk' => $aa['id_produk']);
        $this->db->update('produk',$stokbaru,$where);

        // delete keranjang
        $where3 = array('id_pelanggan' => $this->input->post('id_pelanggan'));
        $this->db->delete('keranjang',$where3);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Berhasil menghapus produk dari keranjang.
                </div>
            </div>
        ');


    }

    $data = array(
        'kode_penjualan' => $this->input->post('kode_penjualan'),
        'id_pelanggan'   => $this->input->post('id_pelanggan'),
        'total_harga'    => $this->input->post('total_harga'),
        'tanggal'        => date('Y-m-d'), // Perbaikan fungsi date
    );

    // Menyimpan data ke dalam tabel 'penjualan'
    $this->db->insert('penjualan', $data);

    // Menampilkan pesan bahwa penjualan berhasil
    $this->session->set_flashdata('alert', '
        <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                Penjualan berhasil.
            </div>
        </div>
    ');

    // Redirect ke halaman invoice setelah transaksi berhasil
    redirect('penjualan/invoice/'.$this->input->post('kode_penjualan'));
    }

    
    public function invoice($kode_penjualan){
        $this->db->select("*");
        $this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.kode_penjualan',$kode_penjualan);
        $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan', 'left');
        $penjualan= $this->db->get()->row();

        $this->db->from('keranjang a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk','left');
        $this->db->where('a.id_user',$this->session->userdata('id_user'));
        $keranjang = $this->db->get()->result_array();
        
        $this->db->from('detail_penjualan a');
        $this->db->join('produk b', 'a.id_produk =b.id_produk', 'left');
        $this->db->where('a.kode_penjualan', $kode_penjualan);
        $detail = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'invoice',
            'nota'          => $kode_penjualan,
            'penjualan'     => $penjualan,
            'detail'        => $detail,
            'keranjang'     => $keranjang,
           
        );
    
        // Masukkan produk ke dalam detail_penjualan
        $this->template->load('template', 'invoice', $data);
    }

    public function print($kode_penjualan){
        $this->db->select("*");
        $this->db->from('penjualan a')->order_by('a.tanggal','DESC')->where('a.kode_penjualan',$kode_penjualan);
        $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan', 'left');
        $penjualan= $this->db->get()->row();

        $this->db->from('keranjang a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk','left');
        $this->db->where('a.id_user',$this->session->userdata('id_user'));
        $keranjang = $this->db->get()->result_array();
        
        $this->db->from('detail_penjualan a');
        $this->db->join('produk b', 'a.id_produk =b.id_produk', 'left');
        $this->db->where('a.kode_penjualan', $kode_penjualan);
        $detail = $this->db->get()->result_array();

        $data = array(
            'judul_halaman' => 'invoice',
            'nota'          => $kode_penjualan,
            'penjualan'     => $penjualan,
            'detail'        => $detail,
            'keranjang'     => $keranjang,
           
        );
    
        // Masukkan produk ke dalam detail_penjualan
        $this->load->view('struk', $data);
    }
    
    public function laporan(){
        $tanggal1 = $this->input->get('tanggal1');
        $tanggal2 = $this->input->get('tanggal2');

        date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai kebutuhan Anda
        $this->db->select("*");
        $this->db->from('penjualan a')->order_by('a.tanggal','DESC');
        $this->db->join('pelanggan b','a.id_pelanggan=b.id_pelanggan', 'left');
        
        $this->db->where('tanggal >=', $tanggal1);
        $this->db->where('tanggal >=', $tanggal2);
        $penjualan = $this->db->get()->result_array();

        $data = array(
            'tanggal1'         => $tanggal1,
            'tanggal2'         => $tanggal2,
            'penjualan'        => $penjualan,
        );

        $this->load->view('print_penjualan', $data);
        
    }
    
    
}