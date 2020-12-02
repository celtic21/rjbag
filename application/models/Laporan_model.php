<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	//Do your magic here
}


public function listing()
{
		$this->db->select('*');
		$this->db->from('tb_');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
}	

public function laporan()
{
	
}


}

/* End of file Laporan_model.php */
/* Location: ./application/models/Laporan_model.php */