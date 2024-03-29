<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model("customer_model");
    //$this->load->library('form_validation');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    $data['scripts'] = $this->load->view('customer/script_customer', [], TRUE);
    $this->template->load('templates/template_dashboard', 'customer/v_customer_data', $data);
  }

  // for AJAX
  public function get_customer()
  {
    $get = $this->input->get();
    if (isset($get['id_customer'])) {
      $result = $this->customer_model->get($get['id_customer']);
    } else {
      $result = $this->customer_model->get();
    }
    echo json_encode($result);
  }
  public function add_customer()
  {
    $post = $this->input->post();
    $this->customer_model->insert($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function edit_customer()
  {
    $post = $this->input->post();
    $this->customer_model->update($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete_customer()
  {
    $post = $this->input->post();
    $this->customer_model->delete($post['id_customer']);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete($id = null)
  {
    if (!isset($id)) {
      redirect(site_url('customer'));
      // set flash data delete failed
    } else if ($this->customer_model->delete($id)) {
      redirect(site_url('customer'));
    }
  }

  public function test()
  {
    $this->template->load('templates/template_dashboard', 'v_test');
  }
}
