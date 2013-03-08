<?php
Class Response extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
	}

	
	function index(){
	$data['products']=array();
	$query['products']=$this->supplier_model->get_user_products();
	if(!empty($query['products'])){
	foreach ($query['products'] as $product)
	{	$product_id = $product['id'];
		$product_name = $product['name'];
		$product_price = $product['price'];
		
		$data['products'][$product_id]['product_id']= $product['id'];
		$data['products'][$product_id]['product_name']= $product['name'];
		$data['products'][$product_id]['product_price']= $product['price'];
		$data['products'][$product_id]['file_name']=$product['filename'];
	}
	}
	else {$data=0;}
	$userid= $this->session->userdata('userid');	
	$data['images'] = $this->picture_model->get_user_photos($userid);
	
		$this->load->view('Supplier/home',$data);
	}
	
	function show_upload()
	{
	$this->load->view('Supplier/upload_form');
	
	}
	}