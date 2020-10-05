<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	//listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_rekening');
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



	//detail rekening
	public function detail($id_rekening)
	{
		$this->db->select('*');
		$this->db->from('tb_rekening');
		$this->db->where('id_rekening',$id_rekening);
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//detail slug rekening
	public function read($slug_rekening)
	{
		$this->db->select('*');
		$this->db->from('tb_rekening');
		$this->db->where('slug_rekening',$slug_rekening);
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//login rekening
		public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tb_rekening');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_rekening', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_rekening',$data);
	}



	//edit
	public function edit($data)
	{
	$this->db->where('id_rekening', $data['id_rekening']);
	$this->db->update('tb_rekening',$data);
	}



//delete
	public function delete($data)
	{
	$this->db->where('id_rekening', $data['id_rekening']);
	$this->db->delete('tb_rekening',$data);
	}

}

/* End of file Rekening_model.php */
/* Location: ./application/models/Rekening_model.php */