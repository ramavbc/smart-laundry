<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Transaksi extends CI_Controller{

		var $table		= 'transaksi';
		var $section	= 'Transaksi';
		var $folder		= 'transaksi/';

		private $customer;
		private $jenis;
        private $berat;
		private $tgl_transaksi;
		private $tgl_ambil;
        private $status;

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
					 'tampil'	=> $this->model->get_all($this->table)->result()
                    ];
			$this->load->view('template/template', $data);
		}

		public function detail($id=null)
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
						 'content'	=> $this->folder.('detail'),
						 'section'	=> $this->section,
						 'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
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
                     'customers'    => $this->model->getCustomer(),
                     'jeniss'       => $this->model->getJenis()
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

			date_default_timezone_set('Asia/Jakarta');
			$post		= $this->input->post();
			$jenis 		= $this->input->post('jenis');
			$validasi 	= $this->form_validation->set_rules($this->validation->val_transaksi());
			if($validasi->run()==false)
			{
				$data = ['content'	    => $this->folder.('tambah'),
                         'section'  	=> $this->section,
                         'customers'    => $this->model->getCustomer(),
                         'jeniss'       => $this->model->getJenis()
						 ];
				$this->load->view('template/template', $data);
			}else{ 
				$data = [
							'id' 			=> null,
							'jenis'	    	=> $jenis.')',
							'tgl_transaksi'	=> date('Y-m-d'),
							'tgl_ambil'	    => $post['tgl_ambil'],
							'berat'			=> $post['berat'],
							'customer'		=> $post['customer'],
							'total'			=> $post['total'],
							'status'		=> $post['status']
						];
                $this->model->save($this->table, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di tambahkan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/transaksi');
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

			$this->form_validation->set_rules('customer', 'Customer', 'required|rtrim',['required' 	=> 'Form <b>%s</b> tidak boleh kosong']);
			$this->form_validation->set_rules('jenis', 'Jenis', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('berat', 'Berat', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
			$this->form_validation->set_rules('status', 'Status', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);

			if($this->form_validation->run()==false){
				$data = [
					'content'	=> $this->folder.('edit'),
					'section'	=> $this->section,
					'tampil'	=> $this->model->get_by($this->table, 'id', $id)->result()
					];
				$this->load->view('template/template', $data);
			}else{
				$data = [
					'id'			=> $this->input->post('id', true),
					'jenis' 		=> $this->input->post('jenis', true),
					'tgl_transaksi'	=> $this->input->post('tgl_transaksi', true),
					'tgl_ambil' 	=> $this->input->post('tgl_ambil', true),
					'berat' 		=> $this->input->post('berat', true),
					'customer' 		=> $this->input->post('customer', true),
					'total' 		=> $this->input->post('total', true),
					'status' 		=> $this->input->post('status', true)
				];
			$id = $this->input->post('id');
			$this->db->where('id', $id); 
			$this->db->update('transaksi', $data); 
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/transaksi');
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
			redirect('admin/transaksi');
		}

		public function laporan_print_transaksi($id=null)
		{
			$data['transaksi'] = $this->db->get('transaksi')->result_array();
			$this->load->view('transaksi/print', $data);
		}
	}
?>