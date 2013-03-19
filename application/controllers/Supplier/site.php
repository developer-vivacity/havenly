<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
	}
	
	
function index(){
$per_pg=20;
$offset=$this->uri->segment(4);
$this->load->library('pagination');
$config['base_url']=base_url('index.php/Supplier/site');
$config['total_rows']=$this->supplier_model->get_contests_numrows();
$config['per_page']= $per_pg;
$config['full_tag_open'] = '<div id="pagination">';
$config['full_tag_close'] = '</div>';
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
$data['contests']=$this->supplier_model->get_recent_contests($per_pg, $offset);
$this->load->view('Supplier/home1',$data);
}
}