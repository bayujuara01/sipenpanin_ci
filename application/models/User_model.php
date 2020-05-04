<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  private $_table = "tb_pengguna";

  public function login()
  {
    $post = $this->input->post();
    // cari user berdasarkan username
    $this->db->where('user_pengguna', $post['username']);
    $user = $this->db->get($this->_table)->row();

    // jika user terdaftar
    if ($user) {
      // periksa password
      if (password_verify($post["password"], $user->password_pengguna)) {
        switch ($user->role_id) {
          case 1:
            // do something 
            break;
        }

        $this->session->set_userdata([
          'id_user' => $user->id_pengguna,
          'user_logged' => $user->user_pengguna,
          'name_user' => $user->nama_pengguna,
          'role' => $user->role_id
        ]);
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where($this->_table, array('id_pengguna' => $id))->row();
    } else {
      return $this->db->get($this->_table)->result();
    }
  }

  public function add($post = null)
  {
    return $this->db->insert($this->_table, array(
      'no_pengguna' => $post['no_user'],
      'nama_pengguna' => $post['fullname'],
      'user_pengguna' => $post['username'],
      'password_pengguna' => password_hash($post['password'], PASSWORD_DEFAULT),
      'alamat_pengguna' => $post['address_user'],
      'tgl_lahir' => date("Y-m-d", strtotime($post['birth_date'])),
      'jk_pengguna' => $post['sex_user'],
      'tmp_lahir' => $post['birth_city'],
      'no_tlp' => $post['no_telp'],
      'img_pengguna' => $post['profile_user'],
      'role_id' => $post['role_user'],
      'create_at' => date("Y-m-d H:i:s")
    ));
  }

  public function update($post = null)
  {
    $column = array();
    $column['nama_pengguna'] = $post['fullname'];
    $column['user_pengguna'] = $post['username'];

    if (!empty($post['password'])) {
      $column['password_pengguna'] = password_hash($post['password'], PASSWORD_DEFAULT);
    }

    $column['alamat_pengguna'] = $post['address_user'];
    $column['tgl_lahir'] = date("Y-m-d", strtotime($post['birth_date']));
    $column['jk_pengguna'] = $post['sex_user'];
    $column['tmp_lahir'] = $post['birth_city'] . ", " . $post['birth_province'];
    $column['no_tlp'] = $post['no_telp'];
    $column['role_id'] = $post['role_user'];

    return $this->db->update($this->_table, $column, array('id_pengguna' => $post['id_user']));
  }

  public function delete($id)
  {
    return $this->db->delete($this->_table, array("id_pengguna" => $id));
  }
}
