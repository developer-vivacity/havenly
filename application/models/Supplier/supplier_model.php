<?php

	Class Supplier_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	
	function initialize_product(){
	$insert = array(
		'price'=>'0',
		'name'=>'initialized');
	
	$this->db->insert('products',$insert);
	$id = $this->db->insert_id();
	return $id;
	}
	
	function store_product($data){
	$productid=$data['productid'];
	$insert = array(
		'store'=>$data['store'],
		'price'=>$data['price'],
		'link'=>$data['link'],
		'name'=>$data['name']);
		
	$this->db->where('id',$productid);
	$this->db->update('products',$insert);
	}
	
	
	function map_product_photo($id){
	
	$insert = array(
	'product_id'=>$id['product_id'],
	'picture_id'=>$id['picture_id']);
	
	$this->db->insert('picture_product_map',$insert);
	}
	
	
	function map_product_user($id){
	$insert = array(
	'product_id'=>$id['productid'],
	'user_id'=>$this->session->userdata('userid'));
	
	$this->db->insert('user_product_map',$insert);
	}
	
	
	function get_user_products(){
	$userid = $this->session->userdata('userid');
	
	$sql = "Select p.filename, pr.name, pr.id, pr.price, pr.store from  pictures p JOIN picture_product_map pm on pm.picture_id = p.id join products pr on pr.id = pm.product_id JOIN user_product_map um on um.product_id = pr.id where user_id = ?";
	$query = $this->db->query($sql,$userid); 
	return $query->result_array();
	}
	
	
	
	
		
	}