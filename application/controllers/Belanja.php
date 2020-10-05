<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//load helper random string
		$this->load->helper('string');
	}





	//halaman belanja
	public function index()
	{
		$keranjang = $this->cart->contents();

		$data = array( 'title'		=> 'Keranjang Belanja',
			'keranjang' => $keranjang,
			'isi'		=> 'belanja/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

	}






	//sukses belanja
	public function sukses()
	{
		$keranjang = $this->cart->contents();

		$data = array( 'title'		=> 'Belanja Berhasil',
			'keranjang' => $keranjang,
			'isi'		=> 'belanja/sukses'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

	}







	//checkout
	public function checkout()
	{
			//cek pelanggan sudah login atau belum ?
			//jika belum harus registrasi
			//cek dengan session email

			//kondisi sudah login
		if($this->session->userdata('email')){
			$email 			= $this->session->userdata('email');
			$nama_pelanggan = $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang = $this->cart->contents();


						//validasi input 
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
				array('required'   => '%s harus diisi'));

			$valid->set_rules('telepon','No Telepon','required',
				array('required'   => '%s harus diisi'));

			$valid->set_rules('alamat','alamat','required',
				array('required'   => '%s harus diisi'));

			$valid->set_rules('email','Email','required|valid_email',
				array('required'   => '%s harus diisi',
					'valid_email'=> '%s tidak valid'));

			if($valid->run()===FALSE){
			//end validasi

				$data = array(  'title'		=> 'Check Out',
					'keranjang' => $keranjang,
					'pelanggan'	=> $pelanggan,
					'isi'		=> 'belanja/checkout'
				);
				$this->load->view('layout/wrapper', $data, FALSE);
				//masuk database
			}else{
				$i = $this->input;
				$data = array ( 'id_pelanggan'	   => $pelanggan->id_pelanggan,
					'nama_pelanggan'   => $i->post('nama_pelanggan'),
					'email'     	   => $i->post('email'),
					'telepon'   	   => $i->post('telepon'),
					'alamat'   		   => $i->post('alamat'),
					'kode_transaksi'   => $i->post('kode_transaksi'),
					'tgl_transaksi'    => $i->post('tgl_transaksi'),
					'jumlah_transaksi' => $i->post('jumlah_transaksi'),
					'status_bayar'     => 'Belum',
					'tgl_post'         => date('Y-m-d H:i:s')
				);
				//proses masuk ke header transaksi
				$this->header_transaksi_model->tambah($data);
				// proses masuk ke tabel transaksi
				foreach($keranjang as $keranjang) {
					$sub_total = $keranjang['price'] * $keranjang['qty'];
					$data = array( 'id_pelanggan'	=> $pelanggan->id_pelanggan,
						'kode_transaksi' => $i->post('kode_transaksi'),
						'id_produk'		=> $keranjang['id'],
						'harga'			=> $keranjang['price'],
						'jumlah'			=> $keranjang['qty'],
						'total_harga'	=> $sub_total,
						'tgl_transaksi'	=> $i->post('tgl_transaksi')
					);
					$this->transaksi_model->tambah($data);

				}
				//end proses masuk ke tabel transaksi
				//setelah masuk ke tabel transaksi, keranjang dikosongkan lagi
				$this->cart->destroy();
				//end pengosongan
				$this->session->set_flashdata('sukses', 'Checkout berhasil !');
				redirect(base_url('belanja/sukses'),'refresh');
			}
				//end masuk database
		}else{
			//kalau belum harus registrasi
			$this->session->set_flashdata('sukses', 'Silahkan login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'), 'refresh');
		}
	}






	//tambah ke keranjang belanja
	public function add()
	{
		//ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');

		//memasukkan ke kranjang
		$data = array(
			'id'      => $id,
			'qty'     => $qty,
			'price'   => $price,
			'name'    => $name
		);

		$this->cart->insert($data);
//redirect page
		redirect($redirect_page,'refresh');
	}











	//update cart
	public function update_cart($rowid)
	{
		//jika ada data rowid
		if($rowid){
			$data = array(
				'rowid'  => $rowid,
				'qty'    => $this->input->post('qty')
			);

			$this->cart->update($data);
			$this->session->set_flashdata('sukses','Data keranjang telah di update');
			redirect(base_url('belanja'),'refresh');

		}else{
			redirect(base_url('belanja'),'refresh');
		}
	}







	//hapus semua isi keranjang belanja
	public function hapus($rowid='')
	{	
		if($rowid){
		//hapus per item
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses','Data keranjang belanja telah dihapus');
			redirect(base_url('belanja'), 'refresh');
		}else{
		//hapus all
			$this->cart->destroy();
			$this->session->set_flashdata('sukses','Data keranjang belanja telah dihapus');
			redirect(base_url('belanja'), 'refresh');
		}
	}







}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */