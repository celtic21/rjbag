<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}



	// //listing all user
	// public function listing()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tb_header_transaksi');
	// 	$this->db->order_by('id_header_transaksi', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	//listing all user
	public function listing()
	{
		$this->db->select('tb_header_transaksi.*,
							tb_pelanggan.nama_pelanggan,
							SUM(tb_transaksi.jumlah) AS total_item');
		$this->db->from('tb_header_transaksi');
		//join
		$this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 'left');
		//end join
		$this->db->group_by('tb_header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	//listing all header_transaksi dari pelanggan
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('tb_header_transaksi.*,
							SUM(tb_transaksi.jumlah) AS total_item');
		$this->db->from('tb_header_transaksi');
		$this->db->where('tb_header_transaksi.id_pelanggan', $id_pelanggan);
		//join
		$this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
		//end join
		$this->db->group_by('tb_header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	//detail header_transaksi
	public function kode_transaksi($kode_transaksi)
	{
	$this->db->select('tb_header_transaksi.*,
							tb_pelanggan.nama_pelanggan,
							tb_rekening.nama_bank AS bank,
							tb_rekening.nomor_rekening,
							tb_rekening.nama_pemilik,
							SUM(tb_transaksi.jumlah) AS total_item');
		$this->db->from('tb_header_transaksi');
		//join
		$this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_header_transaksi.kode_transaksi', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_header_transaksi.id_pelanggan', 'left');
		$this->db->join('tb_rekening', 'tb_rekening.id_rekening = tb_header_transaksi.id_rekening', 'left');
		//end join
		$this->db->group_by('tb_header_transaksi.id_header_transaksi');
		$this->db->where('tb_transaksi.kode_transaksi',$kode_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//detail header_transaksi
	public function detail($id_header_transaksi)
	{
		$this->db->select('*');
		$this->db->from('tb_header_transaksi');
		$this->db->where('id_header_transaksi',$id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_header_transaksi',$data);
	}



	//edit
	public function edit($data)
	{
	$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
	$this->db->update('tb_header_transaksi',$data);
	}



//delete
	public function delete($data)
	{
	$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
	$this->db->delete('tb_header_transaksi',$data);
	}

}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */