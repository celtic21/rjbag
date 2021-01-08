<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
		$this->load->model('produk_model');
		$this->load->model('user_model');
		$this->load->model('transaksi_model');
		$this->load->model('header_transaksi_model');
	}

	public function index()
	{
		$total_produk 	    = $this->produk_model->total_data();
		$total_user 	    = $this->user_model->total_data();
		$total_transaksi	= $this->transaksi_model->total_data();
		$header_transaksi_model = $this->header_transaksi_model->total_data();
		$newheader_transaksi_model = $this->header_transaksi_model->total_datanew();

		$data = array(
			'total_produk' 		=> $total_produk,
			'total_user' 		=> $total_user,
			'total_transaksi' 	=> $total_transaksi,	
			'header_transaksi_model'=> $header_transaksi_model,
			'newheader_transaksi_model' => $newheader_transaksi_model,
			'title' 			=> 'Halaman Administrator',
			'isi' 				=> 'admin/dasbor/list'	
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */