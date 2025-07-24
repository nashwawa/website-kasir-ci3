<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
    public function __construct(){
        parent:: __construct();
    }
	public function index()
	{                        
		$this->load->view('login');
	}
	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		var_dump($username , $password);
		$this->db->from('user');
        $this->db->where('username', $username);
        $cek = $this->db->get()->row();

        if($cek==NULL){
            $this->session->set_flashdata('notifikasi','
         <div class="alert alert-danger alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                          Username tidak ada.
                      </div>
                    </div>
            ');
            redirect('auth');
		}else if($password==$cek->password){
			$data = array(
				'id_user' => $cek->id_user,
				'username' => $cek->username,
				'level' => $cek->level,
				'nama' => $cek->nama,
				
			);
			$this->session->set_userdata($data);
			redirect('home');
		}else{
			$this->session->set_flashdata('notifikasi','
         <div class="alert alert-dark alert-dismissible show fade" style="font-size: 17px;">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                          Password salah.
                      </div>
                    </div>
            ');
            redirect('auth');
		}
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}

