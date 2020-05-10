<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model('product_model');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    $data['scripts'] = $this->load->view('product/script_product', [], TRUE);
    $this->template->load('templates/template_dashboard', 'product/v_product_data', $data);
  }

  public function get_product()
  {
    $get = $this->input->get();
    if (isset($get['id_product'])) {
      $result = $this->product_model->get($get['id_product']);
    } else if (isset($get['code_product'])) {
      $result = $this->product_model->getByCode($get['code_product']);
    } else {
      $result = $this->product_model->get();
    }
    echo json_encode($result);
  }

  public function add_product()
  {
    $post = $this->input->post();
    $this->product_model->insert($post);

    $result = $this->db->affected_rows();

    return json_encode($result);
  }

  public function edit_product()
  {
    $post = $this->input->post();
    $this->product_model->update($post);
    $result = $this->db->affected_rows();

    // header("HTTP/1.1 200 OK", true, 200);
    echo json_encode($result);
  }

  public function delete_product()
  {
    $post = $this->input->post();
    $this->product_model->delete($post['id_product']);

    $result = $this->db->affected_rows();

    echo json_encode($result);
  }

  public function check_stock()
  {
    $post = $this->input->post();
    $result = $this->product_model->checkStock($post['cart_products']);

    echo json_encode($result);
  }
}
