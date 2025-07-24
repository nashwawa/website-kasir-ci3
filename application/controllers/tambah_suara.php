<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah_suara extends CI_Controller {
	public function __construct(){
        parent:: __construct();
		if($this->session->userdata('level')==NULL){
            redirect('auth');
        }
    }
	public function index(){
        $this->db->select('*')->from('tambah_suara');
        $this->db->order_by('nama_tps','ASC');
        $tambah_suara = $this->db->get()->result_array();	
        // mengganti sesuai halaman(dekat profil)
		$data = array(
			'judul_halaman' => 'Data produk' ,
            'tambah_suara'          => $tambah_suara
		);
		$this->template->load('template','tambah_suara_index',$data);
	}

    public function simpan(){
        $this->db->from('tambah_suara');
        $this->db->where('nama_tps',$this->input->post('nama_tps'));
        $cek = $this->db->get()->result_array();
        if($cek==NULL){
            $data = array(
                'nama_tps'          => $this->input->post('nama_tps'),
                'total_suara'       => $this->input->post('total_suara'),
                'sah'               => $this->input->post('sah'),
                'tidak_sah'         => $this->input->post('tidak_sah'),
                'suara_no1'         => $this->input->post('suara_no1'),
                'suara_no2'         => $this->input->post('suara_no2'),
                'suara_no3'         => $this->input->post('suara_no3'),
            );
            $this->db->insert('tambah_suara', $data);

            $this->session->set_flashdata('alert', '
            <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    berhasil menambahkan suara.
                </div>
            </div>
        ');
        
            redirect('tambah_suara');
        }
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
                     <div class="alert-body">
                       <button class="close" data-dismiss="alert">
                         <span>×</span>
                       </button>
                        suara sudah ada.
                     </div>
                   </div>
       ');
       redirect('tambah_suara');
}
    public function delete_data($id){
        $where = array(
            'id_suara'    => $id
        );
        $this->db->delete('tambah_suara',$where);
        $this->session->set_flashdata('alert','
         <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Berhasil menghapus suara.
                      </div>
                    </div>
        ');
        redirect('tambah_suara');
    }  
}