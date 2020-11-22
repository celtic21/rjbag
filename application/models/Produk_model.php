<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function total_data()
{
	    $this->db->select('*');
		$this->db->from('tb_produk');
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
}

//detail produk
	public function listing()
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join

		$this->db->group_by('tb_produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



	//detail produk home
	public function home()
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join
		$this->db->where('tb_produk.status_produk', 'publish');
		$this->db->group_by('tb_produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}


	//read produk
	public function read($slug_produk)
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join
		$this->db->where('tb_produk.status_produk', 'publish');
		$this->db->where('tb_produk.slug_produk', $slug_produk);
		$this->db->group_by('tb_produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//data produk
	public function produk($limit,$start)
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join
		$this->db->where('tb_produk.status_produk', 'publish');
		$this->db->group_by('tb_produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}



	//total produk
	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tb_produk');
		$this->db->where('status_produk', 'publish');
		$query = $this->db->get();
		return $query->row();
	}



	//kategori produk
	public function kategori($id_kategori, $limit, $start)
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join
		$this->db->where('tb_produk.status_produk', 'publish');
		$this->db->where('tb_produk.id_kategori', $id_kategori);
		$this->db->group_by('tb_produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}


	//total kategori
	public function total_kategori($id_kategori)
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('tb_produk');
		$this->db->where('status_produk', 'publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}



	//detail gambar produk
	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('tb_gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}



	//listing kategori
	public function listing_kategori()
	{
		$this->db->select('tb_produk.*,
							tb_user.nama,
							tb_kategori.nama_kategori,
							tb_kategori.slug_kategori,
							COUNT(tb_gambar.id_gambar) AS total_gambar');
		$this->db->from('tb_produk');
		//join
		$this->db->join('tb_user', 'tb_user.id_user = tb_produk.id_user', 'left');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori', 'left');
		$this->db->join('tb_gambar', 'tb_gambar.id_produk = tb_produk.id_produk', 'left');
		//end join

		$this->db->group_by('tb_produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}



	//listing detail produk
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


	//gambar
	public function gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('tb_gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function min_stok($data,$id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->update('tb_produk', $data);
	}
	

	//tambah
	public function tambah($data)
	{
		$this->db->insert('tb_produk',$data);
	}

	//tambah gambar
	public function tambah_gambar($data)
	{
		$this->db->insert('tb_gambar',$data);
	}

	//edit
	public function edit($data)
	{
	$this->db->where('id_produk', $data['id_produk']);
	$this->db->update('tb_produk',$data);
	}

	//delete
	public function delete($data)
	{
	$this->db->where('id_produk', $data['id_produk']);
	$this->db->delete('tb_produk',$data);
	}

	//delete gambar
	public function delete_gambar($data)
	{
	$this->db->where('id_gambar', $data['id_gambar']);
	$this->db->delete('tb_gambar',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */