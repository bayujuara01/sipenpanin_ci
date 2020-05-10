<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model('sale_model');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);
    $this->load->model(['customer_model', 'product_model']);

    $data['customers'] = $this->customer_model->get();
    $data['products'] = $this->product_model->get();

    $data['invoice'] = $this->sale_model->generateInvocie();

    $data['scripts'] = $this->load->view('transaction/sale/script_sale_transaction', [], TRUE);

    $this->template->load('templates/template_dashboard', 'transaction/sale/v_sale_transaction', $data);
  }
}
