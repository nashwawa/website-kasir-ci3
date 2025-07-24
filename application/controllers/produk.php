<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends CI_Controller {
	public function __construct(){
        parent:: __construct();
		// if($this->session->produkdata('level')!=='admin'){
        //     redirect('home');
        // }
    }
	public function index(){
        $this->db->select('*')->from('produk');
        $this->db->order_by('nama','ASC');
        $produk = $this->db->get()->result_array();	
        // mengganti sesuai halaman(dekat profil)
		$data = array(
			'judul_halaman' => 'Data produk' ,
            'produk'          => $produk
		);
		$this->template->load('template','produk_index',$data);
	}

    public function simpan(){
        $this->db->from('produk');
        $this->db->where('kode_produk',$this->input->post('kode_produk'));
        $cek = $this->db->get()->result_array();
        if($cek==NULL){
            $data = array(
                'nama'               => $this->input->post('nama'),
                'kode_produk'        => $this->input->post('kode_produk'),
                'stok'               => $this->input->post('stok'),
                'harga_jual'         => $this->input->post('harga_jual'),
                'harga_beli'         => $this->input->post('harga_beli'),
            );
            $this->db->insert('produk', $data);
            $this->session->set_flashdata('alert','
         <div class="alert alert-success alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                          Kode produk sudah ada.
                      </div>
                    </div>
            
            ');
            redirect('produk');
        }
       
        $this->session->set_flashdata('alert','
         <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Berhasil menambahkan produk.
                      </div>
                    </div>
        ');
        redirect('produk');
    }
    public function delete_data($id){
        $where = array(
            'id_produk'    => $id
        );
        $this->db->delete('produk',$where);
        $this->session->set_flashdata('alert','
         <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Berhasil menghapus produk.
                      </div>
                    </div>
        ');
        redirect('produk');
    }  
    
    public function edit($id_produk){
        $this->db->from('produk')->where('id_produk', $id_produk);
        $produk = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Edit Data produk',
            'produk' => $produk
        );
        $this->template->load('template','produk_edit', $data);
    }
    public function update(){
        $data = array(
            'nama'               => $this->input->post('nama'),
            'kode_produk'        => $this->input->post('kode_produk'),
            'stok'               => $this->input->post('stok'),
            'harga_jual'         => $this->input->post('harga_jual'),
            'harga_beli'         => $this->input->post('harga_beli'),

        );
        $where = array('id_produk'  => $this->input->post('id_produk'));
        $this->db->update('produk', $data, $where);
        $this->session->set_flashdata('alert',' <div class="alert alert-dark alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        Berhasil mengupdate produk
                      </div>
                    </div>
        ');
     
        redirect('produk');
    }    

    public function reset($id_produk){
        $data = array(
            'password'    => md5('1234'),
        );
        $where = array('id_produk'  => $id_produk );
        $this->db->update('produk', $data, $where);
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
        redirect('produk');
    }
    public function print(){
      $this->db->select("*")->from("produk");
      $this->db->order_by("nama", "ASC");
      $status = $this->input->get("status");
      
      if($status == "ada"){
          $this->db->where("stok >", 0);
      } else if($status == "habis"){
          $this->db->where("stok", 0);
      }
      $produk = $this->db->get()->result_array();
      $data = array(
        'struk'           => $status ,
        'produk'          => $produk
      );
      $this->load->view("print_produk", $data);
  }
  
    
}