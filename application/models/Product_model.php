<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
  private $_table = 'tb_produk';

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_produk' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function getByCode($code = null)
  {
    return $this->db->get_where($this->_table, array('kode_produk' => $code))->row();
  }

  public function insert($post)
  {
    $data = array(
      'kode_produk' => $post['kode_produk'],
      'nama_produk' => $post['nama_produk'],
      'stok_produk' => 0,
      'hrg_beli' => $post['hrg_beli'],
      'hrg_jual' => $post['hrg_jual'],
    );

    return $this->db->insert($this->_table, $data);
  }

  public function update($post)
  {
    $data = array(
      'kode_produk' => $post['kode_produk'],
      'nama_produk' => $post['nama_produk'],
      'hrg_beli' => $post['hrg_beli'],
      'hrg_jual' => $post['hrg_jual'],
      'id_kategori' => $post['id_kategori']
    );

    return $this->db->update($this->_table, $data, array('id_produk' => $post['id_produk']));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_produk" => $id));
  }

  public function checkStock($arr = null)
  {
    $result = array();
    $index = 0;

    $this->db->trans_start();
    foreach ($arr as $_product) {
      $item = $this->get($_product['id_produk']);
      $result[$index] = array(
        'id_produk' => $item->id_produk,
        'kode_produk' => $item->kode_produk,
        'nama_produk' => $item->nama_produk,
        'stok_produk' => $item->stok_produk
      );
      $index++;
    }
    $this->db->trans_complete();
    $index = 0;
    if ($this->db->trans_status() === FALSE) {
      // generate an error... or use the log_message() function to log your error
    } else {
      // Success
    }
    return $result;
  }
}
