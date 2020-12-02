<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function total_data()
{
	    $this->db->select('*');
		$this->db->from('tb_transaksi');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
} 


	//listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}




	//listing berdasarkan header
	public function kode_transaksi($kode_transaksi)
	{
		$this->db->select('tb_transaksi.*,
						 tb_produk.nama_produk,
						 tb_produk.kode_produk');
		$this->db->from('tb_transaksi');
		//join dg produk
		$this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk', 'left');
		//end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}




	//detail transaksi
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//detail slug transaksi
	public function read($slug_transaksi)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where('slug_transaksi',$slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//login transaksi
		public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->where(array('username' => $username,
							   'password' => SHA1($password)));
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_transaksi',$data);
	}



	//edit
	public function edit($data)
	{
	$this->db->where('id_transaksi', $data['id_transaksi']);
	$this->db->update('tb_transaksi',$data);
	}



//delete
	public function delete($data)
	{
	$this->db->where('id_transaksi', $data['id_transaksi']);
	$this->db->delete('tb_transaksi',$data);
	}


	//produk transaksi
	public function produk_transaksi($kode_transaksi)
	{
		$this->db->select('tb_transaksi.*');
		$this->db->from('tb_transaksi');
		$this->db->where('kode_transaksi',$kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */