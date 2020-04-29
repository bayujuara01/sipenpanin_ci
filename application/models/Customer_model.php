<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
  private $_table = "tb_customer";

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_customer' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function insert($post)
  {
    return $this->db->insert($post);
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_customer" => $id));
  }

  public function update($post)
  {
    return $this->db->update($this->_table, $post, array('id_customer' => $post['id_customer']));
  }
}
