<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
  private $_table = "tb_unit";

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_unit' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function insert($post)
  {
    return $this->db->insert($this->_table, array(
      'nama_unit' => $post['name_unit'],
      'singkat_unit' => $post['short_unit']
    ));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_unit" => $id));
  }

  public function update($post)
  {
    return $this->db->update(
      $this->_table,
      array(
        'nama_unit' => $post['name_unit'],
        'singkat_unit' => $post['short_unit']
      ),
      array('id_unit' => $post['id_unit'])
    );
  }
}
