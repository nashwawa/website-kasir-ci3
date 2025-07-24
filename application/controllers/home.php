<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m-d');

        // Hitung total penjualan hari ini
        $this->db->select('IFNULL(SUM(total_harga), 0) as total');
        $this->db->from('penjualan');
        $this->db->where("DATE(tanggal)", $tanggal);
        $hari_ini = $this->db->get()->row()->total;

        // Hitung jumlah transaksi hari ini
        $this->db->from('penjualan');
        $this->db->where("DATE(tanggal)", $tanggal);
        $transaksi = $this->db->count_all_results();

        // Hitung jumlah total produk yang tersedia
        $produk = $this->db->from('produk')->count_all_results();

        // Hitung total penjualan bulan ini
        $tanggal_bulan = date('Y-m');
        $this->db->select('IFNULL(SUM(total_harga), 0) as total');
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal_bulan);
        $bulan_ini = $this->db->get()->row()->total;

        // Hitung total pendapatan (penjualan hari ini)
        $this->db->select('IFNULL(SUM(total_harga), 0) as total_pendapatan');
        $this->db->where('DATE(tanggal)', $tanggal);
        $total_pendapatan = $this->db->get('penjualan')->row()->total_pendapatan;

        // Hitung total modal dari penjualan hari ini 
        $this->db->select('IFNULL(SUM(total_modal), 0) as total_modal');
        $this->db->where('DATE(tanggal)', $tanggal);
        $total_modal = $this->db->get('penjualan')->row()->total_modal;

        // Hitung laba bersih
        $laba_bersih = $total_pendapatan - $total_modal;

        // Pastikan nilai tidak NULL
        if($hari_ini == NULL) { $hari_ini = 0; }
        if($bulan_ini == NULL) { $bulan_ini = 0; }
        if($transaksi == NULL) { $transaksi = 0; }  
        if($total_modal == NULL) { $total_modal = 0; }  
        if($laba_bersih == NULL) { $laba_bersih = 0; }  

        // Kirim data ke view
        $data = array(
            'judul_halaman'   => 'Dashboard',
            'hari_ini'        => $hari_ini,
            'bulan_ini'       => $bulan_ini,
            'transaksi'       => $transaksi,
            'produk'          => $produk,
            'total_pendapatan' => $total_pendapatan,
            'total_modal'     => $total_modal,
            'laba_bersih'     => $laba_bersih
        );

        $this->template->load('template', 'beranda', $data);
    }
}
