<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('konfigurasi_model');
	}






	//load data transaksi
	public function index()
	{

		$header_transaksi = $this->header_transaksi_model->listing();
		$data = array(	'title' 			=> 'Data Transaksi',
						'header_transaksi'	=> $header_transaksi,
						'isi'				=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		
	}




	//detail
	public function detail($kode_transaksi)
	{
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array(	'title'				=>	'Riwayat Belanja',
						'header_transaksi'	=>   $header_transaksi,
						'transaksi'			=>	 $transaksi,
						'isi'				=>	'admin/transaksi/detail'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}



	//cetak
	public function cetak($kode_transaksi)
	{
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				=  $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Riwayat Belanja',
						'header_transaksi'	=>   $header_transaksi,
						'transaksi'			=>	 $transaksi,
						'site'				=>	 $site,
					 );
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}





	//pengiriman
	public function kirim($kode_transaksi)
	{
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				=  $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Pengiriman',
						'header_transaksi'	=>   $header_transaksi,
						'transaksi'			=>	 $transaksi,
						'site'				=>	 $site,
						'isi'				=>	'admin/transaksi/kirim'
					 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//pengiriman
	public function cetakkirim($kode_transaksi)
	{
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				=  $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Pengiriman',
						'header_transaksi'	=>   $header_transaksi,
						'transaksi'			=>	 $transaksi,
						'site'				=>	 $site,
					 );
		$this->load->view('admin/transaksi/cetakkirim', $data, FALSE);
	}


	//pengiriman
// 	public function cetakkirim($kode_transaksi)
// 	{
// 		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
// 		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);
// 		$site 				=  $this->konfigurasi_model->listing();

// 		$data = array(	'title'				=>	'Riwayat Belanja',
// 						'header_transaksi'	=>   $header_transaksi,
// 						'transaksi'			=>	 $transaksi,
// 						'site'				=>	 $site,
// 					 );
// 		// $this->load->view('admin/transaksi/kirim', $data, FALSE);

// $html = $this->load->view('admin/transaksi/cetakkirim', $data, true);
// $mpdf = new \Mpdf\Mpdf();
// //setting header dan footer
// $mpdf->SetHTMLHeader('
// <div style="text-align: left; font-weight: bold;">
//     <img src="'.base_url('assets/upload/image/'.$site->logo).'" style="height :50px; width: 50px;">
// </div>');
// // $mpdf->SetHTMLFooter('
// // 	<div style="padding: 10px 20px; background-color: black; color: white; font-size: 12px;">
// // 		Alamat:'.$site->namaweb.'('.$site->alamat.')<br>
// // 		Telepon: '.$site->telepon.'
// // 	</div> ');

// // Write some HTML code:
// $mpdf->WriteHTML($html);

// // Output tampil dengan nama baru
// $nama_file_pdf = url_title($site->namaweb,'dash','true').'_'.$kode_transaksi.'.pdf';
// $mpdf->Output($nama_file_pdf,'I');
// 	}




public function resi($kode_transaksi)
{

	$header_transaksi = $this->header_transaksi_model->detaill($kode_transaksi);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('resi','No. Resi','required',
			array('required'   => '%s harus diisi'));


		if($valid->run()==FALSE){
		//end validasi

		$data = array(  'title' => 'Tambah No.Resi',
						'header_transaksi'	=> $header_transaksi,
						'isi'	=> 'admin/transaksi/resi'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{

		$i = $this->input;
		// echo "<pre>";
		// print_r ($i->post());
		// exit();

		$data = array ( 'kode_transaksi' => $i->post('kode_transaksi'),
						'resi' => $i->post('resi')
		);

		$this->header_transaksi_model->editresi($data);
		$this->session->set_flashdata('sukses', 'Resi telah dimasukkan');
		// redirect(base_url('admin/transaksi/resi/'.$header_transaksi->kode_transaksi),'refresh');
		redirect(base_url('admin/transaksi'),'refresh');
	}
	//end masuk database

}


	//unduh pdf
	public function pdf($kode_transaksi)
	{
		$header_transaksi 	=  $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi  		=  $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				=  $this->konfigurasi_model->listing();

		$data = array(	'title'				=>	'Riwayat Belanja',
						'header_transaksi'	=>   $header_transaksi,
						'transaksi'			=>	 $transaksi,
						'site'				=>	 $site,
					 );
		//$this->load->view('admin/transaksi/cetak', $data, FALSE);

$html = $this->load->view('admin/transaksi/cetak', $data, true);
$mpdf = new \Mpdf\Mpdf();
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
	}



}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */