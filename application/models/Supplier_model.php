<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

  private $_table = "tb_supplier";

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_supplier' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function insert($post)
  {
    return $this->db->insert($this->_table, array(
      'nama_supplier' => $post['name_supplier'],
      'telp_supplier' => $post['telp_supplier'],
      'alamat_supplier' => $post['address_supplier']
    ));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_supplier" => $id));
  }

  public function update($post)
  {
    return $this->db->update(
      $this->_table,
      array(
        'nama_supplier' => $post['name_supplier'],
        'telp_supplier' => $post['telp_supplier'],
        'alamat_supplier' => $post['address_supplier']
      ),
      array('id_supplier' => $post['id_supplier'])
    );
  }
}
