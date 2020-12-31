<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

   function list($firstdate, $lastdate)
   {
      $this->db->select('tb_detail_transaksi.kode_transaksi,tb_detail_transaksi.jumlah_transaksi,tb_transaksi.harga,tb_transaksi.jumlah,tb_produk.nama_produk,tb_detail_transaksi.tgl_konfirmasi');

      $this->db->from('tb_detail_transaksi');
      $this->db->join('tb_transaksi', 'tb_transaksi.kode_transaksi = tb_detail_transaksi.kode_transaksi', 'left');
	  $this->db->join('tb_produk', 'tb_produk.id_produk = tb_transaksi.id_produk', 'left');
      $this->db->where('tgl_konfirmasi >=', $firstdate);
      $this->db->where('tgl_konfirmasi <=', $lastdate);

      $this->db->order_by('tb_detail_transaksi.tgl_konfirmasi', 'desc');
      $query = $this->db->get();
      return $query->result();
   }

 
}