<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model("category_model");
    //$this->load->library('form_validation');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    $data['categories'] = $this->category_model->get();
    $data['scripts'] = $this->load->view('category/script_category', [], TRUE);
    $this->template->load('templates/template_dashboard', 'category/v_category_data', $data);
  }

  // for AJAX
  public function get_category()
  {
    $get = $this->input->get();
    if (isset($get['id_category'])) {
      $result = $this->category_model->get($get['id_category']);
    } else {
      $result = $this->category_model->get();
    }
    echo json_encode($result);
  }
  public function add_category()
  {
    $post = $this->input->post();
    $this->category_model->insert($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function edit_category()
  {
    $post = $this->input->post();
    $this->category_model->update($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete_category()
  {
    $post = $this->input->post();
    $this->category_model->delete($post['id_category']);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete($id = null)
  {
    if (!isset($id)) {
      redirect(site_url('category'));
      // set flash data delete failed
    } else if ($this->category_model->delete($id)) {
      redirect(site_url('category'));
    }
  }

  public function edit($id = null)
  {
    if (!isset($id)) {
      show_404();
    } else if (true) {
    }
  }

  public function test()
  {
    $this->template->load('templates/template_dashboard', 'v_test');
  }
}
