<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Detail extends CI_Controller{

		var $table		= 'detail';
		var $section	= 'Detail';
		var $folder		= 'transaksi/detail';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);
			cek_user();
		}

		public function index()
		{
			$data = ['content'	=> $this->folder.('view'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->model->get_all($this->table)->result()
                    ];
			$this->load->view('template/template', $data);
		}
	}
?>