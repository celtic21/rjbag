<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('pelanggan_model');
	}

	//fungsi login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		if($check){
			$id_pelanggan		= $check->id_pelanggan;
			$nama_pelanggan		= $check->nama_pelanggan;
			//create session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);
			redirect(base_url('dasbor'),'refresh');
		}else{
			$this->CI->session->set_flashdata('warning', 'Email atau password salah');
			redirect(base_url('masuk'),'refresh');
		}
	}

	 public function cek_login()
	{
		if ($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi logout
	public function logout()
	{	//membuang semua session
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('nama_pelanggan');
		$this->CI->session->unset_userdata('email');
		//redirek
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('masuk'),'refresh');
	}

	

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
