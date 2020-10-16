<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

	public function __construct()
{
	parent::__construct();
	$this->load->database();

}
 
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

		//detail pelanggan
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

//edit
	public function edit($data)
	{
	$this->db->where('id_user', $data['id_user']);
	$this->db->update('tb_user',$data);
	}


}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */