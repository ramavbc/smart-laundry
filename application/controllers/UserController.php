<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	var $folder = 'users/';
	var $layout = 'users/layout';

	function __construct(){
		parent::__construct();
		$this->load->model(['model', 'validation']);
		$this->load->library(['form_validation']);
	}

	public function index()
	{
		$data = ['content'=> $this->folder.('home')];
		$this->load->view($this->layout, $data);
	}

	public function listJenis(){
		$data = [
			'content'	=> $this->folder.('jenis'),
			'data'		=> $this->model->get_all('jenis')->result()
		];
		$this->load->view($this->layout, $data);
	}
	
	public function kontak(){
		$data = ['content'=> $this->folder.('contact')];
		$this->load->view($this->layout, $data);
	}

}

/* End of file UserController.php */
/* Location: ./application/controllers/UserController.php */