<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Register extends CI_Controller{

		var $section 	= 'Register';

		public function index()
		{
			if ($this->session->userdata('username')) {
				redirect('admin/dashboard');
			}
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$data = ['content' 	=> 'admin/register',
					 'section'	=> $this->section,
					];
			$this->load->view('template/register', $data);
		}

	}
 ?>