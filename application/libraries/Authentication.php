<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
  protected $ci;


  function __construct()
  {
    $this->ci = &get_instance();
  }

  function userLogin()
  {
    $this->ci->load->model('user_model');
    $user_id = $this->ci->session->userdata('id_user');
    $user_data = $this->ci->user_model->get($user_id);
    return $user_data;
  }

  function checkRole($type)
  {
    switch ($type) {
      case ROLE_ADMIN:
        if ($this->userLogin()->role_id != ROLE_ADMIN) {
          redirect(site_url('dashboard'));
        }
        break;
      case ROLE_SELLER:
        $user = $this->userLogin();
        if ($user->role_id == ROLE_ADMIN || $user->role_id == ROLE_SELLER) {
          // 
        } else {
          redirect(site_url('dashboard'));
        }
        break;
    }
  }
}
