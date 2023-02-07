<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Barang extends CI_Controller{

		var $table		= 'barang';
		var $section	= 'Barang';
		var $folder		= 'barang/';
		
		private $nama;
		private $stok;
        private $tgl_update;
        private $supplier;
        private $harga;

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

			$data = ['content'	    => $this->folder.('tambah'),
                     'section'	    => $this->section,
                     'suppliers'    => $this->model->getSupplier()
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
			$validasi 	= $this->form_validation->set_rules($this->validation->val_barang());
			if($validasi->run()==false)
			{
				$data = ['content'	=> $this->folder.('tambah'),
                         'section'	=> $this->section,
                         'suppliers'    => $this->model->getSupplier()
						 ];
				$this->load->view('template/template', $data);
			}else{
				$data = [
							'id' 		    => null,
							'nama'		    => $post['nama'],
                            'stok'	        => $post['stok'],
                            'tgl_update'	=> date('Y-m-d'),
                            'supplier'		=> $post['supplier'],
                            'harga'	        => $post['harga']
						];
				$this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di tambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/barang');
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
			redirect('admin/barang');
        }
        
        public function tambahStok($id=null)
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
						 'content'	=> $this->folder.('tambah-stok'),
						 'section'	=> $this->section,
						 'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
	
			$this->load->view('template/template', $data);
        }
        
        public function updateStok()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$this->form_validation->set_rules('supplier', 'Supplier', 'required|rtrim',['required' 	=> 'Form <b>%s</b> tidak boleh kosong']);
			$this->form_validation->set_rules('nama', 'Nama', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('harga', 'Harga', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('stok', 'Stok', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);

			if($this->form_validation->run()==false){
				$data = [
					'content'	=> $this->folder.('tambah-stok'),
					'section'	=> $this->section,
					'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
				$this->load->view('template/template', $data);
			}else{
				$data = [
					'id'			=> $this->input->post('id', true),
					'nama' 		    => $this->input->post('nama', true),
					'stok'	        => $this->input->post('stok', true),
					'tgl_update' 	=> date('Y-m-d'),
					'supplier' 		=> $this->input->post('supplier', true),
					'harga' 		=> $this->input->post('harga', true),
				];
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('barang', $data); 
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Stok Berhasil ditambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/barang');
			}
		}

		public function pakai($id=null)
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
						 'content'	=> $this->folder.('pakai'),
						 'section'	=> $this->section,
						 'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
	
			$this->load->view('template/template', $data);
		}
		
		public function pakaiStok()
		{
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			$this->load->model(['model','validation']);
			$this->load->library(['form_validation','encryption']);

			$this->form_validation->set_rules('nama', 'Nama', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('stok', 'Stok', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('sisa_stok', 'Sisa Stok', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);

			if($this->form_validation->run()==false){
				$data = [
					'content'	=> $this->folder.('pakai'),
					'section'	=> $this->section,
					'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
				$this->load->view('template/template', $data);
			}else{
				$data = [
					'id'			=> $this->input->post('id', true),
					'nama' 		    => $this->input->post('nama', true),
					'stok'	        => $this->input->post('sisa_stok', true),
					'tgl_update' 	=> date('Y-m-d')
				];
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('barang', $data); 
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Stok berhasil digunakan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/barang');
			}
		}
	}
?>