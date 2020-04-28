<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("user_model");
  }

  public function index()
  {
    checkIsLogin();
    $this->load->view('v_login');
  }

  public function login()
  {
    $post = $this->input->post();
    if (isset($post) && $post != null) {
      if ($this->user_model->login()) {
        echo 'success';
      } else {
        echo "null";
      }
    } else {
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata(['id_user', 'user_logged', 'name_user', 'role_id']);
    redirect('auth');
  }
}
