<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model("user_model");
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_ADMIN);

    $data['users'] = $this->user_model->get();
    $this->template->load('templates/template_dashboard', 'user/v_user_data', $data);
  }

  public function add($type = null)
  {
    $this->authentication->checkRole(ROLE_ADMIN);

    if ($type != null) {
      if ($type == TYPE_USER_NEW) {
        $post = $this->input->post();
        if ($post) {
          if ($this->validate(TYPE_USER_NEW)) {
            $this->user_model->add($post);
            if ($this->db->affected_rows() > 0) {
              echo "<script> alert('Data berhasil disimpan'); </script>";
              echo "<script> window.location.replace('" . site_url('user') . "');</script>";
            }
          };
        } else {
          redirect(site_url('user/add'));
        }
      } else {
        redirect(site_url('user/add'));
      }
    } else {
      $this->template->load('templates/template_Dashboard', 'user/v_user_add');
      $this->load->view('js/script_user_add');
    }
  }

  public function update($id = null)
  {
    if ($id != null) {
      $post = $this->input->post();
      if ($post) {
        if ($this->validate()) {
          echo "data sukses update";
        }
        //echo 'ada post';
      } else {
        // echo 'tidak ada post';
      }
    }
  }

  public function delete($id)
  {
    if (!isset($id)) {
      show_404();
    } else  if ($this->user_model->delete($id)) {
      redirect('user');
    }
  }

  public function edit($id)
  {

    // $query = $this->user_model->get($id);
    // $data['user'] = $query;
    // if ($query) {
    //   $this->template->load('templates/template_dashboard', 'user/v_user_edit', $data);
    // } else {
    //   $data = "<script> alert('Pengguna tidak ditemukan'); </script>";
    //   $this->session->set_flashdata('user_not_found', $data);
    //   redirect(site_url('user'));
    // }

    if (!isset($id)) {
      redirect(site_url('user'));
      return;
    }

    $post = $this->input->post();

    $this->form_validation->set_rules('fullname', 'Nama Lengkap', array('required'));
    $this->form_validation->set_rules('username', 'Username', array('required', 'min_length[8]', 'callback_username_check'));

    if ($this->input->post('password')) {
      $this->form_validation->set_rules('password', 'Password', array('required', 'min_length[6]'));
      $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', array('required', 'matches[password]'));
    }

    if ($this->input->post('password_confirm')) {
      $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', array('required', 'matches[password]'));
    }
    $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', array('required'));
    $this->form_validation->set_rules('birth_province', 'Tempat Lahir', array('required'));
    $this->form_validation->set_rules('birth_city', 'Tempat Lahir', array('required'));
    $this->form_validation->set_rules('sex_user', 'Jenis Kelamin', array('required'));
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', array('required'));

    if (!$this->form_validation->run()) {
      $data['user'] = $this->user_model->get($id);
      if ($this->db->affected_rows() > 0) {
        $this->template->load('templates/template_Dashboard', 'user/v_user_edit', $data);
      } else {
        echo "<script> alert('Data tidak ditemukan');";
        echo "window.location='" . site_url('user');
        echo "'</script>";
      }
      // return false;
    } else {
      if ($this->user_model->update($post) > 0) {
        echo "<script> alert('Update Sukses');";
        echo "window.location='" . site_url('user');
        echo "';</script>";
      }

      // return true;
    }
  }

  private function validate()
  {
    $this->form_validation->set_rules('fullname', 'Nama Lengkap', array('required'));
    $this->form_validation->set_rules('username', 'Username', array('required', 'min_length[8]', 'is_unique[tb_pengguna.user_pengguna]'));
    $this->form_validation->set_rules('password', 'Password', array('min_length[6]'));
    $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', array('matches[password]'));
    $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', array('required'));
    $this->form_validation->set_rules('birth_province', 'Tempat Lahir', array('required'));
    $this->form_validation->set_rules('birth_city', 'Tempat Lahir', array('required'));
    $this->form_validation->set_rules('sex_user', 'Jenis Kelamin', array('required'));
    $this->form_validation->set_rules('no_telp', 'Nomor Telepon', array('required'));


    if (!$this->form_validation->run()) {
      $this->template->load('templates/template_Dashboard', 'user/v_user_add');
      return false;
    } else {
      return true;
    }
  }

  public function username_check()
  {
    $post = $this->input->post();
    $query = $this->db->query("SELECT * FROM tb_pengguna WHERE user_pengguna = '$post[username]' AND id_pengguna != '$post[id_user]'");

    if ($query->num_rows() > 0) {
      $this->form_validation->set_message('username_check', "Kolom {field} sudah dipakai, silahkan ganti");
      return false;
    } else {
      return true;
    }
  }
}
