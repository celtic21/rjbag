<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$query = $this->db->get('tb_konfigurasi');
		return $query->row();
	}

	//edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('tb_konfigurasi', $data);
	}
	//load menu kategori produk
	public function nav_produk()
	{
		$this->db->select('tb_produk.*,
							tb_kategori.nama_kategori,
							tb_kategori.gambar,
							tb_kategori.slug_kategori');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		//end join

		$this->db->group_by('tb_produk.id_kategori');
		$this->db->order_by('tb_kategori.urutan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */