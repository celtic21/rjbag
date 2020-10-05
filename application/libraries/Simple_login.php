<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('user_model');
	}

	//fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// echo "<pre>";
		// print_r ($check);
		// exit();
		if($check){
			$id_user	= $check->id_user;
			$nama		= $check->nama;
			$level		= $check->level;
			$jenis_kelamin = $check->jenis_kelamin;
			//create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('level',$level);
			$this->CI->session->set_userdata('jenis_kelamin',$jenis_kelamin);

			redirect(base_url('admin/dasbor'),'refresh');
		}else{
			$this->CI->session->set_flashdata('warning', 'Username atau password salah');
			redirect(base_url('login'),'refresh');
		}
	}

	 public function cek_login()
	{
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	//fungsi logout
	public function logout()
	{
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('jenis_kelamin');

		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
		redirect(base_url('login'),'refresh');
	}

	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
