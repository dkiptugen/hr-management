<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        date_default_timezone_set('Africa/Nairobi');
		
	}

	
	public function index()
	{
		redirect('welcome/tables');
	}

	public function tables()
	{
		$data["page_title"] = "Test Title";
		$data["page_title"] = "Manage Payment Modes";
		$data["main_body"] = "test_pages/tables-bootstrap";
		$this->load->view('includes/template', $data);
	}

	public function forms()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/forms-basic-elements";
		$this->load->view('includes/template', $data);
	}

	public function forms_wizard()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/forms-wizard";
		$this->load->view('includes/template', $data);
	}

	public function advanced_forms()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/forms-advanced-elements";
		$this->load->view('includes/template', $data);
	}

	public function editors()
	{
		$data["page_title"] = "Test Title";
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/forms-editors";
		$this->load->view('includes/template', $data);
	}

	public function profile()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/pages-profile";
		$this->load->view('includes/template', $data);
	}

	public function page404()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/pages-404";
		$this->load->view('includes/auth_template', $data);
	}

	public function page500()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/pages-500";
		$this->load->view('includes/auth_template', $data);
	}

	public function charts()
	{
		$data["page_title"] = "Test Title";
		$data["main_body"] = "test_pages/charts-chartjs";
		$this->load->view('includes/template', $data);
	}
	
}
