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
	
	
	function get_contests_numrows(){
	$this->db->where("status IN ('Completed', 'Saved')");
	$query=$this->db->get('contests');
	return $query->num_rows;
	}
	
	function get_recent_contests($per_pg=20, $offset=0){
			
		$data = array();
		$this->db->where("status IN ('Completed', 'Saved')");
		$this->db->order_by("timestamp", "desc"); 
		$query=$this->db->get('contests', $per_pg, $offset);
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
				$contests=array();	
					foreach ($data as $row){
						$contestid=$row['id'];
						$contests[$contestid]['id']=$row['id'];
						$contests[$contestid]['name']=$row['contest_name'];
						$contests[$contestid]['budget']=$row['Budget'];
						$contests[$contestid]['room']=$row['room_type'];
						$date = new DateTime($row['Timestamp']);
						$newTimestamp = $date->add(new DateInterval('P5D'));
						$newTimestamp=$newTimestamp->format('M-d-y');
						$contests[$contestid]['time_close']=$newTimestamp;
						$style ="";
						if($row['modern']=='yes')
						{$style.='modern';}
						if($row['eclectic']=='yes')
						{$style.=' eclectic';}
						if($row['traditional']=='yes')
						{$style.=' traditional';}
						$contests[$contestid]['style']=$style;						
						$contests[$contestid]['contest_type']=$row['contest_type'];
						$contests[$contestid]['about']=substr($row['about'],0,100).'...';
						$current = $this->get_contest_photos_current($row['id']);
						$inspiration = $this->get_contest_photos($row['id']);
						$contests[$contestid]['current']=$current[0]['filename'];
						$contests[$contestid]['inspiration']=$inspiration[0]['filename'];
						}
					
		return $contests;
	}
	else {$data= 0; return $data;}
	
	}
	
	
function get_contest_photos($contest_id) {
	$sql = "SELECT filename FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='inspiration' LIMIT 1";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
	
function get_contest_photos_current($contest_id) {
	$sql = "SELECT filename FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='current' LIMIT 1";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
		
	}