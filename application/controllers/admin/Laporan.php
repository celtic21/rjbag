<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
      $this->load->model('laporan_model');
		//Do your magic here
	}

	public function index()
	{
		
		$data = array(    'title'  => 'Laporan',
						      'button' => 'Cetak',
       					   'action' => 'laporan/cetak_aksi',
						      'isi'	   => 'admin/laporan/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}



   public function cetak_aksi()
   {
    
         $range = $this->input->post('range', TRUE); // mendapatkan tgl dari inputan laporan
         $d = str_replace('-', ',', $range); //menghapus tanda -
         $d = str_replace(' ', '', $d); // menghapus spasi
         $array = explode(',', $d); // merubah menjadi array
         $firstdate = date("Y-m-d", strtotime($array[0]));
         $lastdate = date("Y-m-d", strtotime($array[1]));


   
         $transaksi = $this->laporan_model->list($firstdate, $lastdate);
        //          echo "<pre>";
        //  print_r ($transaksi);
        // exit();

         $data = array(
            'transaksi' => $transaksi,
            'title' => 'Laporan Penjualan',
            'isi'   => 'admin/laporan/cetak'
         );
        
         // konfigurasi file pdf
         $this->load->view('admin/laporan/cetak', $data, FALSE);
         // $mpdf = new \Mpdf\Mpdf([
         //    'mode' => 'utf-8',
         //    'format' => [210, 330] //ukuran F4
         // ]);
         // $mpdf->SetTitle('Laporan Penjualan');
         // $mpdf->WriteHTML($html);
         // $nama_file = url_title('Laporan Penjualan', 'dash', 'true') . '-' . tgl_indo($firstdate) . '-' . 'Sampai' . '-' . tgl_indo($lastdate) . '.pdf';
         // $mpdf->Output($nama_file, 'I');
   }



}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */