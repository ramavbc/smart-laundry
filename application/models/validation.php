<?php 
defined('BASEPATH') OR exit ('No script direct access allowed');

	class Validation extends CI_Model{

		public function val_register()
		{
			return [
				[
					'field'	=> 'nama',
					'label'	=> 'Nama Lengkap',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.'],
				],
				[
					'field'	=> 'alamat',
					'label'	=> 'Alamat Lengkap',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.']
				],
				[
					'field'	=> 'telp',
					'label'	=> 'No Telp',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.'],
				],
				[
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required|rtrim|min_length[4]',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.',
								'min_length' => 'Username minimal 4 karakter!'
							],
				],
				[
					'field'	=> 'password1',
					'label'	=> 'Password',
					'rules'	=> 'required|rtrim|min_length[4]|matches[password2]',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.',
								'matches' => 'Password tidak sama!',
								'min_length' => 'Password minimal 4 karakter!'
							]
				],
				[
					'field'	=> 'password2',
					'label'	=> 'Password',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.']
				]
			];
		}

		public function val_login()
		{
			return [
				[
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.'],
				],
				[
					'field'	=> 'password',
					'label'	=> 'Password',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.']
				]
			];
		}

		public function val_user()
		{
			return [
				[
					'field'	=> 'nama',
					'label'	=> 'Nama',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required|rtrim|is_unique[user.username]',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.',
								'is_unique'=>'<b>%s</b> sudah digunakan'
								]
				],
				[
					'field'	=> 'password1',
					'label'	=> 'Password',
					'rules'	=> "required|rtrim|matches[password2]|min_length[4]",
					'errors'=> ['required'	=> 'Form <b>%s</b> harus diisi',
								'matches'	=> '<b>Password</b> tidak cocok',
								'min_length'=> 'Panjang <b>%s<b/> minimal 4 karakter'],
				],
				[
					'field'	=> 'password2',
					'label'	=> 'Password',
					'rules'	=> "required|rtrim|matches[password1]",
					'errors'=> ['required'	=> 'Form <b>%s</b> harus diisi',
								'matches'	=> '<b>Password</b> tidak cocok'],
				],
				[
					'field'	=> 'alamat',
					'label'	=> 'Alamat',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'telp',
					'label'	=> 'Telp',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		public function val_supplier()
		{
			return [
				[
					'field'	=> 'nama',
					'label'	=> 'Nama',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'alamat',
					'label'	=> 'Alamat',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'telp',
					'label'	=> 'Telp',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		public function val_customer()
		{
			return [
				[
					'field'	=> 'nama',
					'label'	=> 'Nama',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'alamat',
					'label'	=> 'Alamat',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'telp',
					'label'	=> 'Telp',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		public function val_transaksi()
		{
			return [
				[
					'field'	=> 'customer',
					'label'	=> 'Customer',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'jenis',
					'label'	=> 'Jenis',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'berat',
					'label'	=> 'Berat',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'tgl_ambil',
					'label'	=> 'Tanggal Ambil',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'status',
					'label'	=> 'Status',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		public function val_jenis()
		{
			return [
				[
					'field'	=> 'jenis',
					'label'	=> 'Jenis',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'harga',
					'label'	=> 'Harga',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		public function val_barang()
		{
			return [
				[
					'field'	=> 'supplier',
					'label'	=> 'Supplier',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'nama',
					'label'	=> 'Nama Barang',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'stok',
					'label'	=> 'Jumlah Barang',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'harga',
					'label'	=> 'Harga Barang',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}
	}
?>