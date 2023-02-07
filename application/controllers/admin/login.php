<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Login extends CI_Controller{

		var $section 	= 'Login';

		public function index()
		{
			if ($this->session->userdata('username')) {
				redirect('admin/dashboard');
			}
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$data = ['content' 	=> 'admin/login',
					 'section'	=> $this->section,
					];
			$this->load->view('template/login', $data);
		}

	}
 ?>