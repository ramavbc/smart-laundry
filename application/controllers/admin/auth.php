<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	var $table 		= 'user';
	var $section 	= 'Login';

	function __construct()
	{
		parent::__construct();
		$this->load->model('model');
		$this->load->model('validation', 'val');
		$this->load->library('form_validation');
	}

	public function index() {
        //Jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if ($this->session->userdata('username')) {
            redirect('admin/dashboard');
        }
    }

	public function login()
	{
		$post 	= $this->input->post();
		$user 	= $post['username'];
		$pass	= $post['password'];
		$user 	= $this->model->get_by($this->table, 'username' ,$user)->row_array();
		$validasi = $this->form_validation->set_rules($this->val->val_login());
		
		if($validasi->run()==false)
		{
			$data = ['content' 	=> 'admin/login',
					 'section'	=> $this->section,
					];
			$this->load->view('template/login', $data);
		}else{
			if($user['is_active'] == 1){
				if(password_verify($pass, $user['password'])){
					$data = [
							'masuk'		=>true,
							'username'	=>$user['username'],
							'nama'		=>$user['nama'],
							'level'		=>$user['level']
							];
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				}else{
					$data = ['content' 	=> 'admin/login',
							 'section'	=> $this->section,
							];
					$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Password yang anda masukkan salah! </div>' );
					$this->load->view('template/login', $data);
				}
			}else{
				$data = ['content' 	=> 'admin/login',
						 'section'	=> $this->section,
						];
				$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Akun anda belum di aktivasi! </div>' );
				$this->load->view('template/login', $data);
			}
		};
	}

	public function register() 
	{
		$validasi = $this->form_validation->set_rules($this->val->val_register());
        
        if ($validasi->run() == false) {
			$data = ['content' 	=> 'admin/register',
					 'section'	=> $this->section,
					];
			$this->load->view('template/register', $data);
        } else {
			$user = $this->input->post('username', true);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'telp' => htmlspecialchars($this->input->post('telp', true)),
				'foto' => 'user.png',
				'level' => 2,
				'is_active' => 1,
			];
            $this->model->simpanData($data);
            $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Selamat!! akun anda berhasil dibuat.</div>');
            redirect('admin/login');
        }
    }

	public function logout()
	{
		session_destroy();
		redirect('admin/login');
	}

}