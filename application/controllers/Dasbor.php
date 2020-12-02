<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {


	//load model
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('produk_model');
		//proteksi halaman
		$this->simple_pelanggan->cek_login();
	}



 

	//halaman dasbor
	public function index()
	{
		//ambil data login id_pelanggan dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title'				=>	'Halaman Dasboard Pelanggan',
			'header_transaksi'				=>  $header_transaksi,
			'isi'							=>	'dasbor/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}






	//belanja
	public function belanja()
	{
		//ambil data login id_pelanggan dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	=  $this->header_transaksi_model->pelanggan($id_pelanggan);

		$data = array(	'title'				=>	'Riwayat Belanja',
			'header_transaksi'	=> $header_transaksi,
			'isi'				=>	'dasbor/belanja'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($kode_transaksi)
	{
		//ambil data login id_pelanggan dari session
		$id_pelanggan 		=  $this->session->userdata('id_pelanggan');
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);


		//pastikan pelanggan hanya mengakses data transaksinya
		if($header_transaksi->id_pelanggan != $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda Mencoba mengakses data transaksi orang lain');
			redirect(base_url('masuk'));
		}

		$data = array(	'title'				=>	'Riwayat Belanja',
			'header_transaksi'	=>   $header_transaksi,
			'transaksi'			=>	 $transaksi,
			'isi'				=>	'dasbor/detail'
		);
		$this->load->view('layout/wrapper', $data, FALSE);
	}








	//profil
	public function profil()
	{
		//ambil data login id_pelanggan dari session
		$id_pelanggan 		=  $this->session->userdata('id_pelanggan');
		$pelanggan 			=  $this->pelanggan_model->detail($id_pelanggan);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Lengkap','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('telepon','Telepon','required|min_length[11]|max_length[13]',
			array('required'   => '%s harus diisi',
				  'min_length' => '%s minimal 11 karakter',
				  'max_length' => '%s maksimal 13 karakter'));


		if($valid->run()===FALSE){
		//end validasi

			$data = array(	'title'				=>	'Profil Saya',
				'pelanggan'			=>	 $pelanggan,
				'isi'				=>	'dasbor/profil'
			);
			$this->load->view('layout/wrapper', $data, FALSE);

			//masuk database
		}else{
			$i = $this->input;
		//kalau password lebih dari 6 karakter, maka passwor di ganti
			if(strlen($i->post('password')) >= 6) {
				$data = array ( 'id_pelanggan'	   => $id_pelanggan,
					'nama_pelanggan'   => $i->post('nama_pelanggan'),
					'telepon'   	   => $i->post('telepon'),
					'password'     	   => SHA1($i->post('password')),
					'alamat'   		   => $i->post('alamat')
				);
			}else{
			//kalau passwornya kurang dari 6 ,maka password tidak di ganti
				$data = array ( 'id_pelanggan'	   => $id_pelanggan,
					'nama_pelanggan'   => $i->post('nama_pelanggan'),
					'telepon'   	   => $i->post('telepon'),
					'alamat'   		   => $i->post('alamat')
				);
			}
		//end profil update
			$this->pelanggan_model->edit($data);

			$this->session->set_flashdata('sukses', 'Update Profil berhasil !');
			redirect(base_url('dasbor/profil'),'refresh');
		}
	//end masuk database
	}








	//komfirmasi pembayaran
	public function konfirmasi($kode_transaksi)
	{
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();
		$transaksi 			= $this->transaksi_model->produk_transaksi($kode_transaksi);

			//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama Bank','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('rekening_pembayaran','Nomor Rekening','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('rekening_pelanggan','Nama Pemilik Rekening','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('tgl_bayar','Tanggal Pembayaran','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('jumlah_bayar','Jumlah Pembayaran','required',
			array('required'   => '%s harus diisi'));

		if($valid->run()) {
			// check jika bukti bayar di ganti
			if(!empty($_FILES['bukti_bayar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = '2400'; //dalam kb
			$config['max_width']     = '2024';
			$config['max_height']    = '2024';

			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
		//end validasi

				$data = array(	'title'				=> 'konfirmasi Pembayaran',
					'header_transaksi'	=> $header_transaksi,
					'rekening'			=> $rekening,
					'error'				=> $this->upload->display_errors(),
					'isi'				=> 'dasbor/konfirmasi'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
			}else{
				$upload_gambar = array('upload_data' => $this->upload->data());

		//buat thumbnail
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		// lokasi folder thumbnail
				$config['new_image']		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;//pxl
		$config['height']       	= 250;//pxl
		$config['thumb_marker']		= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//end thumbnail

		$i = $this->input;
		$data = array ( 'id_detail_transaksi'	=> $header_transaksi->id_detail_transaksi,
			'status_bayar'     	 	=> 'Konfirmasi',
			'jumlah_bayar'      	=> $i->post('jumlah_bayar'),
			'rekening_pembayaran'   => $i->post('rekening_pembayaran'),
			'rekening_pelanggan'    => $i->post('rekening_pelanggan'),
			'bukti_bayar'   		=> $upload_gambar['upload_data']['file_name'],
			'id_rekening'   		=> $i->post('id_rekening'),
			'tgl_bayar'   	 	    => $i->post('tgl_bayar'),
			'tgl_konfirmasi'		=> $i->post('tgl_konfirmasi'),
			'nama_bank'    		    => $i->post('nama_bank')
		); 

		$checkout = $this->header_transaksi_model->edit($data);
		// if ($checkout) {
		foreach ($transaksi as $transaksi) {
			
			$id_produk = $transaksi->id_produk;
			$produk	   = $this->produk_model->detail($id_produk);

			$data = array (
				'stok'		=> $produk->stok-$transaksi->jumlah
			);
			$this->produk_model->min_stok($data,$id_produk);
		}
		// }
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil!');
		redirect(base_url('dasbor'),'refresh');
	}}else{
		//edit produk tanpa ganti bukti bayar
		$i = $this->input;
		$data = array ( 
			'id_detail_transaksi'	=> $header_transaksi->id_detail_transaksi,
			'status_bayar'     	 	=> 'Konfirmasi',
			'jumlah_bayar'      	=> $i->post('jumlah_bayar'),
			'rekening_pembayaran'   => $i->post('jumlah_bayar'),
			'rekening_pelanggan'    => $i->post('jumlah_bayar'),
						//'bukti_bayar'   		=> $upload_gambar['upload_data']['file_name'],
			'id_rekening'   		=> $i->post('id_rekening'),
			'tgl_bayar'   	 	    => $i->post('tgl_bayar'),
			'tgl_konfirmasi'		=> $i->post('tgl_konfirmasi'),
			'nama_bank'    		    => $i->post('nama_bank')
		); 

		$checkout = $this->header_transaksi_model->edit($data);
		// if ($checkout) {
		foreach ($transaksi as $transaksi) {
			
			$id_produk = $transaksi->id_produk;
			$produk	   = $this->produk_model->detail($id_produk);

			$data = array (
				'stok'		=> $produk->stok-$transaksi->jumlah
			);
			$this->produk_model->min_stok($data,$id_produk);
		}
		// }
		$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil!');
		redirect(base_url('dasbor'),'refresh');

	}}
	//end masuk database
	$data = array(		
		'title'				=> 'konfirmasi Pembayaran',
		'header_transaksi'	=> $header_transaksi,
		'rekening'			=> $rekening,
		'isi'				=> 'dasbor/konfirmasi'
	);
	$this->load->view('layout/wrapper', $data, FALSE);

}










}

/* End of file Dasbor */
/* Location: ./application/controllers/Dasbor */