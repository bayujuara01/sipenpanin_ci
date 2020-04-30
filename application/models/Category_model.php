<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
  private $_table = "tb_kategori";

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_kategori' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function insert($post)
  {
    return $this->db->insert($this->_table, array(
      'nama_kategori' => $post['name_category'],
    ));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_kategori" => $id));
  }

  public function update($post)
  {
    return $this->db->update($this->_table, array('nama_kategori' => $post['name_category']), array('id_kategori' => $post['id_category']));
  }
}
