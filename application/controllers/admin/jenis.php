<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Jenis extends CI_Controller{

		var $table		= 'jenis';
		var $section	= 'Jenis';
		var $folder		= 'jenis/';
		
		private $jenis;
		private $harga;

		public function __construct(){
			parent::__construct();
		}

		public function index()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$data = ['content'	=> $this->folder.('view'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->model->get_all($this->table)->result()];
			$this->load->view('template/template', $data);
		}

		public function add()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$data = ['content'	=> $this->folder.('tambah'),
					 'section'	=> $this->section,
					 ];
			$this->load->view('template/template', $data);
		}

		public function save()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$post		= $this->input->post();
			$validasi 	= $this->form_validation->set_rules($this->validation->val_jenis());
			if($validasi->run()==false)
			{
				$data = ['content'	=> $this->folder.('tambah'),
						 'section'	=> $this->section,
						 ];
				$this->load->view('template/template', $data);
			}else{
				$data = [
							'id' 		=> null,
							'jenis'		=> $post['jenis'],
                            'harga'	    => $post['harga']
						];
				$this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di tambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/jenis');
			}
		}

		public function edit($id=null)
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			if(!isset($id)) show_404();
			$id = str_replace(['-','_','~'],['=','+','/'],$id);
			$id = $this->encryption->decrypt($id);
	
			$data = [
						 'content'	=> $this->folder.('edit'),
						 'section'	=> $this->section,
						 'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
	
			$this->load->view('template/template', $data);
		}

		public function update()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$cek 		= $this->model->get_by($this->table, 'jenis', $this->input->post('oldJenis'))->result_array();
			$jum 		= count($this->model->get_by($this->table, 'jenis', $this->input->post('jenis'))->result_array());
			$id 		= $cek[0]['id'];
			$post 		= $this->input->post();
			$jenis 		= $post['jenis'];
			$oldJenis	= $post['oldJenis'];

			$this->form_validation->set_rules('jenis', 'Jenis', 'required|rtrim',['required' => 'Form <b>%s</b> tidak boleh kosong']);
			$this->form_validation->set_rules('harga', 'Harga', 'required|rtrim',['required' =>'Form <b>%s</b> tidak boleh kosong.']);

			if($this->form_validation->run()==true){
				if($jenis==$oldJenis){
					$data = [
							'jenis' => $post['jenis'],
							'harga' => $post['harga']
						];
					$this->model->update($this->table, 'id', $id, $data);
					$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/jenis');
				}else{
					if($jum==0){
						$data = [
                                'jenis' => $post['jenis'],
                                'harga' => $post['harga']
							];
						$this->model->update($this->table, 'id', $id, $data);
						$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('admin/jenis');
					}else{
						$data = [
								'content'	=> $this->folder.('edit'),
								'section'	=> $this->section,
								'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
								];
						$this->session->set_flashdata('flash','<div class="alert alert-danger alert-dismissible fade show" role="alert"><b>Gagal!</b> Nama sudah ada.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						$this->load->view('template/template', $data);
					}
				}
			}else{
				$data = [
						'content'	=> $this->folder.('edit'),
						'section'	=> $this->section,
						'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
						];
				$this->load->view('template/template', $data);
				}
			}

		public function delete($id=null)
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			if(!isset($id)) show_404();
			$id=str_replace(['-','_','~'],['=','+','/'],$id);
			$id=$this->encryption->decrypt($id);
			
			$this->model->delete($this->table,'id',$id);
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/jenis');
		}
	}
?>