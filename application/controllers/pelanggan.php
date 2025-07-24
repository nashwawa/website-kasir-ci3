<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        // if($this->session->pelanggandata('level')<>'admin'){
        //     redirect('home');
        // }
    }
	public function index(){
        $this->db->from('pelanggan');
        $this->db->order_by('nama','ASC');
        $pelanggan = $this->db->get()->result_array();	
        // mengganti sesuai halaman(dekat profil)
		$data = array(
			'judul_halaman' => 'Data pelanggan' ,
            'pelanggan'          => $pelanggan
		);
		$this->template->load('template','pelanggan_index',$data);
	}
    public function simpan(){
        // Mengecek apakah username sudah ada di database
        $this->db->from('pelanggan');  // Mengambil data dari tabel 'pelanggan'
        $this->db->where('nama', $this->input->post('nama'));  // Menambahkan kondisi untuk mencari username yang sesuai dengan inputan
        $cek = $this->db->get()->result_array();  // Mengeksekusi query dan mengambil hasilnya dalam bentuk array
    
        if (!empty($cek)) {  // Jika username sudah ada (cek tidak kosong)
            // Menampilkan pesan bahwa username sudah ada
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Pelanggan sudah ada.
                    </div>
                </div>
            ');
        } else {  // Jika username belum ada (cek kosong)
            // Menyiapkan data yang akan dimasukkan ke database
            $data = array(
                'nama'       => $this->input->post('nama'),
                'alamat'   => $this->input->post('alamat'),
                'telp'      => $this->input->post('telp'),
            );
    
            // Menyimpan data ke dalam tabel 'pelanggan'
            $this->db->insert('pelanggan', $data);
    
            // Menampilkan pesan bahwa pelanggan baru berhasil ditambahkan
            $this->session->set_flashdata('alert', '
                <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Berhasil menambahkan pelanggan.
                    </div>
                </div>
            ');
        }
    
        // Mengarahkan kembali ke halaman pelanggan setelah proses selesai
        redirect('pelanggan');
    }
    public function delete_data($id){
        $where = array(
            'id_pelanggan'    => $id
        );
        $this->db->delete('pelanggan',$where);
        $this->session->set_flashdata('alert','
         <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Berhasil menghapus pelanggan.
                      </div>
                    </div>
        ');
        redirect('pelanggan');
    }  
    
    public function edit($id_pelanggan){
        $this->db->from('pelanggan')->where('id_pelanggan', $id_pelanggan);
        $pelanggan = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Edit Data pelanggan',
            'pelanggan' => $pelanggan
        );
        $this->template->load('template', 'pelanggan_edit', $data);
    }
    public function update(){
        $data = array(
            'nama'        => $this->input->post('nama'),
            'telp'       => $this->input->post('telp'),
            'alamat'       => $this->input->post('alamat'),
        );
        $where = array('id_pelanggan'  => $this->input->post('id_pelanggan'));
        $this->db->update('pelanggan', $data, $where);
        $this->session->set_flashdata('alert',' <div class="alert alert-dark alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        Berhasil mengupdate pelanggan
                      </div>
                    </div>
        ');
     
        redirect('pelanggan');
    }    

    public function reset($id_pelanggan){
        $data = array(
            'password'    => md5('1234'),
        );
        $where = array('id_pelanggan'  => $id_pelanggan );
        $this->db->update('pelanggan', $data, $where);
        $this->session->set_flashdata('alert','
         <div class="alert alert-secondary alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Password di reset menjadi 1234
                      </div>
                    </div>
        ');
        redirect('pelanggan');
    }
}