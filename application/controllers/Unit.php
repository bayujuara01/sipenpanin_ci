<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    checkIsNotLogin();
    $this->load->model("unit_model");
    //$this->load->library('form_validation');
  }

  public function index()
  {
    $this->authentication->checkRole(ROLE_SELLER);

    // $data['categories'] = $this->unit_model->get();
    $data['scripts'] = $this->load->view('unit/script_unit', [], TRUE);
    $this->template->load('templates/template_dashboard', 'unit/v_unit_data', $data);
  }

  // for AJAX
  public function get_unit()
  {
    $get = $this->input->get();
    if (isset($get['id_unit'])) {
      $result = $this->unit_model->get($get['id_unit']);
    } else {
      $result = $this->unit_model->get();
    }
    echo json_encode($result);
  }
  public function add_unit()
  {
    $post = $this->input->post();
    $this->unit_model->insert($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function edit_unit()
  {
    $post = $this->input->post();
    $this->unit_model->update($post);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete_unit()
  {
    $post = $this->input->post();
    $this->unit_model->delete($post['id_unit']);
    $result = $this->db->affected_rows();
    echo json_encode($result);
  }

  public function delete($id = null)
  {
    if (!isset($id)) {
      redirect(site_url('unit'));
      // set flash data delete failed
    } else if ($this->unit_model->delete($id)) {
      redirect(site_url('unit'));
    }
  }

  public function edit($id = null)
  {
    if (!isset($id)) {
      show_404();
    } else if (true) {
    }
  }
}
