<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller{

		var $section = 'Dashboard';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
		}

		public function index()
		{
			$data = [
						'content'		=>	'admin/dashboard',
					 	'section'		=>	$this->section,
						'customer'     	=> 	$this->model->getCustomer(),
						'transaksi' 	=>  $this->model->getTransaksi()
					];

			$this->load->view('template/template', $data);
		}

	}
 ?>