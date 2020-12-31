<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function total_data()
{
	    $this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('level','Admin');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
} 

//listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//setai user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//login user
		public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_user',$data);
	}

	//edit
	public function edit($data)
	{
	$this->db->where('id_user', $data['id_user']);
	$this->db->update('tb_user',$data);
	}

//delete
	public function delete($data)
	{
	$this->db->where('id_user', $data['id_user']);
	$this->db->delete('tb_user',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */