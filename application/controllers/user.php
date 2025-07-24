<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        // if($this->session->userdata('level')<>'admin'){
        //     redirect('home');
        // }
    }
	public function index(){
        $this->db->from('user');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();	
        // mengganti sesuai halaman(dekat profil)
		$data = array(
			'judul_halaman' => 'Data user' ,
            'user'          => $user
		);
		$this->template->load('template','user_index',$data);
	}
    public function simpan(){
        // Mengecek apakah username sudah ada di database
        $this->db->from('user');  // Mengambil data dari tabel 'user'
        $this->db->where('username', $this->input->post('username'));  // Menambahkan kondisi untuk mencari username yang sesuai dengan inputan
        $cek = $this->db->get()->result_array();  // Mengeksekusi query dan mengambil hasilnya dalam bentuk array
    
        if (!empty($cek)) {  // Jika username sudah ada (cek tidak kosong)
            // Menampilkan pesan bahwa username sudah ada
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Username sudah ada.
                    </div>
                </div>
            ');
        } else {  // Jika username belum ada (cek kosong)
            // Menyiapkan data yang akan dimasukkan ke database
            $data = array(
                'username'            => $this->input->post('username'),
                'nama'                => $this->input->post('nama'),
                'password'            => md5($this->input->post('password')),  // Menyandikan password menggunakan md5
                'alamat'              => $this->input->post('alamat'),
                'no_telp'             => $this->input->post('no_telp'),
                'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
                'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
                'level'               => $this->input->post('level'),
            );
    
            // Menyimpan data ke dalam tabel 'user'
            $this->db->insert('user', $data);
    
            // Menampilkan pesan bahwa user baru berhasil ditambahkan
            $this->session->set_flashdata('alert', '
                <div class="alert alert-info alert-dismissible show fade" style="font-size: 17px;">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        Berhasil menambahkan user.
                    </div>
                </div>
            ');
        }
    
        // Mengarahkan kembali ke halaman user setelah proses selesai
        redirect('user');
    }
    
    public function delete_data($id){
        $where = array(
            'id_user'    => $id
        );
        $this->db->delete('user',$where);
        $this->session->set_flashdata('alert','
         <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                         Berhasil menghapus user.
                      </div>
                    </div>
        ');
        redirect('user');
    }  
    
    public function edit($id_user){
        $this->db->from('user')->where('id_user', $id_user);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Edit Data User',
            'user' => $user
        );
        $this->template->load('template', 'user_edit', $data);
    }
    public function update(){
        $data = array(
            'nama'                => $this->input->post('nama'),
            'username'            => $this->input->post('username'),
            'level'               => $this->input->post('level'),
            'alamat'              => $this->input->post('alamat'),
            'no_telp'             => $this->input->post('no_telp'),
            'tanggal_lahir'       => $this->input->post('tanggal_lahir'),
            'jenis_kelamin'       => $this->input->post('jenis_kelamin'),
        );
        $where = array('id_user'  => $this->input->post('id_user'));
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('alert',' <div class="alert alert-dark alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        Berhasil mengupdate user
                      </div>
                    </div>
        ');
     
        redirect('user');
    }    

    public function reset($id_user){
        $data = array(
            'password'    => md5('1234'),
        );
        $where = array('id_user'  => $id_user );
        $this->db->update('user', $data, $where);
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
        redirect('user');
    }
}