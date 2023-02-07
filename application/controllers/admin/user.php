<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class User extends CI_Controller{

		var $table		= 'user';
		var $section	= 'User';
		var $folder		= 'user/';
		
		private $nama;
		private $username;
		private $password;
		private $level;
		private $alamat;
		private $telp;
		private $foto;

		public function __construct(){
			parent::__construct();
			cek_user();
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
			$validasi 	= $this->form_validation->set_rules($this->validation->val_user());
			if($validasi->run()==false)
			{
				$data = ['content'	=> $this->folder.('tambah'),
						 'section'	=> $this->section,
						 ];
				$this->load->view('template/template', $data);
			}else{
				$data = [
							'id' 		=> null,
							'nama'		=> $post['nama'],
							'username'	=> $post['username'],
							'password'	=> password_hash($post['password1'], PASSWORD_DEFAULT),
							'level'		=> $post['level'],
							'alamat'	=> $post['alamat'],
							'telp'		=> $post['telp'],
							'foto'		=> 'user.png'
						];
				$this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di tambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/user');
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

			$cek 		= $this->model->get_by($this->table, 'nama', $this->input->post('oldNama'))->result_array();
			$jum 		= count($this->model->get_by($this->table, 'nama', $this->input->post('nama'))->result_array());
			$id 		= $cek[0]['id'];
			$post 		= $this->input->post();
			$nama 		= $post['nama'];
			$oldNama	= $post['oldNama'];

			$this->form_validation->set_rules('nama', 'Nama', 'required|rtrim',['required' 	=> 'Form <b>%s</b> tidak boleh kosong']);
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('telp', 'Telp', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);

			if($this->form_validation->run()==true){
				if($nama==$oldNama){
					$data = [
							'nama'		=> $post['nama'],
							'level'		=> $post['level'],
							'alamat'	=> $post['alamat'],
							'telp'		=> $post['telp']
						];
					$this->model->update($this->table, 'id', $id, $data);
					$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/user');
				}else{
					if($jum==0){
						$data = [
								'nama'		=> $post['nama'],
								'level'		=> $post['level'],
								'alamat'	=> $post['alamat'],
								'telp'		=> $post['telp']
							];
						$this->model->update($this->table, 'id', $id, $data);
						$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('admin/user');
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
			redirect('admin/user');
		}
	}
?>