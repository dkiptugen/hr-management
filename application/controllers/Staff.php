<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	function __construct()
    {
        // Construct the parent class
        parent::__construct();

		date_default_timezone_set('Africa/Nairobi');
		define("URI_3", $this->uri->segment(3));
		define("STAFF_URL", site_url('staff'));
		
	}
	
	public function index()
	{
		if(URI_3 == "add") {
			$data["page_title"] = "Test Title";
			$data["page_title"] = "Manage Staff Members";
			$data["main_body"] = "pages/staffs/add";
		} else {
			$data["page_title"] = "Test Title";
			$data["page_title"] = "Manage Staff Members";
			$data["main_body"] = "pages/staffs/index";
		}
		$this->load->view('includes/template', $data);
	}

    public function departments()
	{
		$data["page_title"] = "Test Title";
		$data["page_title"] = "Manage Departments";
		$data["main_body"] = "pages/departments/index";
		$this->load->view('includes/template', $data);
	}
    
}
?>