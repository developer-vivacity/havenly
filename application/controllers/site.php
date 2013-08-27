<?php

class Site extends CI_Controller 
{

public function __construct() {

	parent::__construct();
	$this->load->library ('session');
	}

function index()
	{
		
		$this->load->view('home');
		
		}
	
function logout()
{
	$this->session->sess_destroy();
		redirect(base_url());
	
}




}
