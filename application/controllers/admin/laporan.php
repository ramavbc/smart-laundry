<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Laporan extends CI_Controller{

		var $section	= 'Laporan';
		var $folder		= 'laporan/';

		function __construct(){
			parent::__construct();
			if($this->session->userdata('masuk') !=TRUE){
	            redirect(base_url('')); 
	        };
			cek_user();
		}
		
		public function laporan_customer()
		{
			$data = [
					 'content'	=> $this->folder.('laporan-customer'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->db->get('customer')->result()
                    ];
			$this->load->view('template/template', $data);
		}

		public function laporan_print_customer($id=null)
		{
			$data['customer'] = $this->db->get('customer')->result_array();
			$this->load->view('customer/print', $data);
		}

		public function laporan_pdf_customer()
		{
			
			$data['customer'] = $this->db->get('customer')->result_array();
			$this->load->view('customer/pdf', $data);
	
			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
	
			$this->load->library('pdf');
			$this->pdf->generate($html, "LaporanDataCustomer.pdf", $paper_size, $orientation);
		}

		public function laporan_excel_customer()
		{
			$data = [
					'title' => 'LaporanDataCustomer',
					'customer' => $this->db->get('customer')->result_array()
					];
			$this->load->view('customer/excel', $data);
		}

		public function laporan_transaksi()
		{
			$data = [
					 'content'	=> $this->folder.('laporan-transaksi'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->db->get('transaksi')->result()
                    ];
			$this->load->view('template/template', $data);
		}

		public function laporan_print_transaksi($id=null)
		{
			$data['transaksi'] = $this->db->get('transaksi')->result_array();
			$this->load->view('transaksi/print', $data);
		}

		public function laporan_pdf_transaksi()
		{
			
			$data['transaksi'] = $this->db->get('transaksi')->result_array();
			$this->load->view('transaksi/pdf', $data);
	
			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
	
			$this->load->library('pdf');
			$this->pdf->generate($html, "LaporanDataTransaksi.pdf", $paper_size, $orientation);
		}

		public function laporan_excel_transaksi()
		{
			$data = [
					'title' => 'LaporanDataTransaksi',
					'transaksi' => $this->db->get('transaksi')->result_array()
					];
			$this->load->view('transaksi/excel', $data);
		}

		public function laporan_barang()
		{
			$data = [
					 'content'	=> $this->folder.('laporan-barang'),
					 'section'	=> $this->section,
					 'tampil'	=> $this->db->get('barang')->result()
                    ];
			$this->load->view('template/template', $data);
		}

		public function laporan_print_barang($id=null)
		{
			$data['barang'] = $this->db->get('barang')->result_array();
			$this->load->view('barang/print', $data);
		}

		public function laporan_pdf_barang()
		{
			$data['barang'] = $this->db->get('barang')->result_array();
			$this->load->view('barang/pdf', $data);
	
			$paper_size = 'A4';
			$orientation = 'landscape';
			$html = $this->output->get_output();
	
			$this->load->library('pdf');
			$this->pdf->generate($html, "LaporanDataBarang.pdf", $paper_size, $orientation);
		}

		public function laporan_excel_barang()
		{
			$data = [
					'title' => 'LaporanDataBarang',
					'barang' => $this->db->get('barang')->result_array()
					];
			$this->load->view('barang/excel', $data);
		}

	}
?>