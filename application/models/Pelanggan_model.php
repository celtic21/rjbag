<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	//listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



	//detail pelanggan
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	



	//login pelanggan
		public function login($email,$password)
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->where(array('email' 	  => $email,
							   'password' => SHA1($password)));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}




	//pelanggan aktif/sudah login
	public function sudah_login($email,$nama_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggan');
		$this->db->where(array('email'		    => $email,
							   'nama_pelanggan' => $nama_pelanggan
							   ));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_pelanggan',$data);
	}



	//edit
	public function edit($data)
	{
	$this->db->where('id_pelanggan', $data['id_pelanggan']);
	$this->db->update('tb_pelanggan',$data);
	}



//delete
	public function delete($data)
	{
	$this->db->where('id_pelanggan', $data['id_pelanggan']);
	$this->db->delete('tb_pelanggan',$data);
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */