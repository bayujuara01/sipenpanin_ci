<?php
defined('BASEPATH') or exit('No direct script access allowed');

function checkIsLogin()
{
  $ci = &get_instance();
  $user_session = $ci->session->userdata('id_user');

  if ($user_session) {
    redirect('dashboard');
  }
}

function checkIsNotLogin()
{
  $ci = &get_instance();
  $user_session = $ci->session->userdata('id_user');

  if (!$user_session) {
    redirect('auth');
  }
}
