<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('product_model');
  }

  public function index()
  {
    $this->template->load('templates/template_dashboard', 'v_product');
  }
}
