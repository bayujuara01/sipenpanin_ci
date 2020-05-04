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
}
