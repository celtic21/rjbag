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
	}

	public function index()
	{
		$total_produk 	    = $this->produk_model->total_data();
		$total_user 	    = $this->user_model->total_data();
		$total_transaksi	= $this->transaksi_model->total_data();

		$data = array(
			'total_produk' 		=> $total_produk,
			'total_user' 		=> $total_user,
			'total_transaksi' 	=> $total_transaksi,	
			'title' 			=> 'Halaman Administrator',
			'isi' 				=> 'admin/dasbor/list'	
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */