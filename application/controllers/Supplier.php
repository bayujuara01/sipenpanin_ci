<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model('supplier_model');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    // $data['supplier'] = $this->supplier_model->get();
    $data['scripts'] = $this->load->view('product/supplier/script_supplier', [], TRUE);
    $this->template->load('templates/template_dashboard', 'product/supplier/v_supplier_data', $data);
  }

  // for AJAX
  public function get_supplier()
  {
    $get = $this->input->get();
    if (isset($get['id_supplier'])) {
      $result = $this->supplier_model->get($get['id_supplier']);
    } else {
      $result = $this->supplier_model->get();
    }
    echo json_encode($result);
  }
  public function add_supplier()
  {
    $post = $this->input->post();
    $this->supplier_model->insert($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function edit_supplier()
  {
    $post = $this->input->post();
    $this->supplier_model->update($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete_supplier()
  {
    $post = $this->input->post();
    $this->supplier_model->delete($post['id_supplier']);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  // public function edit($id = null)
  // {
  //   if (!isset($id)) {
  //     show_404();
  //   } else if (true) {
  //   }
  // }
}
