<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('profil_model');
	$this->simple_login->cek_login();
	//proteksi halaman
}

 
	//data profil
	public function index()
	{
		//ambil data login id_pelanggan dari session
		$id_user 		=  $this->session->userdata('id_user');
		$profil 			=  $this->profil_model->detail($id_user);
		$data = array(  'title'     => 'Data Profil',
					    'profil'    => $profil,
						'isi'	    => 'admin/profil/list'
	);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

public function profil()
	{
		//ambil data login id_pelanggan dari session
		$id_user 		=  $this->session->userdata('id_user');
		$profil 		=  $this->profil_model->detail($id_user);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('alamat','Alamat Lengkap','required',
			array('required'   => '%s harus diisi'));

		$valid->set_rules('telepon','Telepon','required|min_length[11]|max_length[13]',
			array('required'   => '%s harus diisi',
				  'min_length' => '%s minimal 11 karakter',
				  'max_length' => '%s maksimal 13 karakter'));

		$valid->set_rules('password','password','required',
			array('required' => '%s harus diisi'));



		if($valid->run()===FALSE){
		//end validasi

			$data = array(	'title'	=>	'Profil Saya',
				'profil'			=>	 $profil,
				'isi'				=>	'admin/profil/list'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			//masuk database
		}else{
			$i = $this->input;
		//kalau password lebih dari 4 karakter, maka passwor di ganti
			if(strlen($i->post('password')) >= 4) {
				$data = array ( 'id_user'	   => $id_user,
					'nama'   => $i->post('nama'),
					'telepon'   	   => $i->post('telepon'),
					'password'     	   => SHA1($i->post('password')),
					'alamat'   		   => $i->post('alamat')
				);
			}else{
			//kalau passwornya kurang dari 6 ,maka password tidak di ganti
				$data = array ( 'id_user'	   => $id_user,
					'nama'   		   => $i->post('nama'),
					'alamat'   		   => $i->post('alamat'),
					'telepon'   	   => $i->post('telepon')
					
				);
			}
		//end profil update
			$this->profil_model->edit($data);
			$this->session->set_flashdata('sukses', 'Update Profil berhasil !');
			redirect(base_url('admin/profil'),'refresh');
		}
	//end masuk database
	}



}

