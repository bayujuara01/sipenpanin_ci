<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		checkIsNotLogin();
		$this->template->load('templates/template_dashboard', 'v_dashboard');
	}
}
