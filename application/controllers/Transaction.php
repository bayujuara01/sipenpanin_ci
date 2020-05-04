<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    // $data['scripts'] = $this->load->view('product/script_product', [], TRUE);
    $this->template->load('templates/template_dashboard', 'transaction/v_transaction');
  }
}
