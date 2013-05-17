<?php

Class Contest_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
	}
	
	
function get_formid($userid){

$insert = array(
'userid' =>$userid,
'status'=>'temp'
);

	$this->db->insert('contests', $insert);
	$id = $this->db->insert_id();
	return $id;
}


function submit_contest($data){
	$formid = $data['form_id'];
	

	$insert = array(
	'userid'=>$data['userid'],
	'contest_name'=>$data['name'],
	'room_type'=>$data['room_type'],
	'renovation'=>$data['renovation'],
	'sqfoot'=>$data['sqfoot'],
	'about'=>$data['about'],
	'likes'=>$data['likes'],
	'not_likes'=>$data['not_likes'],
	'keep'=>$data['keep'],
	'need'=>$data['need'],
	'style'=>$data['style'],
	'budget'=>$data['budget'],
	'store'=>$data['store'],
	'modern'=>$data['modern'],
	'traditional'=>$data['traditional'],
	'eclectic'=>$data['eclectic'],
	'Status'=>'Completed'
	);
	
	$this->db->where('id',$formid);
	$this->db->update('contests',$insert);
	return true;
}
	
function set_map_current($id) {
	$insert = array(
	'picture_id'=>$id['pictureid'],
	'contest_id'=> $id['contestid'],
	'type' => 'current');

	$this->db->insert('picture_map',$insert);

	}
	
	
function set_map_inspiration($id) {
	$insert = array(
	'picture_id'=>$id['pictureid'],
	'contest_id'=> $id['contestid'],
	'type' => 'inspiration');

$this->db->insert('picture_map',$insert);

	}
	
	
	function get_user_contests($userid) {
				
		$data = array();
		$this->db->where('userid', $userid);
		$this->db->where("status IN ('Completed', 'Saved')");
		$this->db->limit(20);
		$this->db->order_by("timestamp", "desc"); 
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}


	
function get_contest($contest_id) {
		$this->db->where('id', $contest_id);
		$query=$this->db->get('contests');
	
		if ($query->num_rows()>0)
			{
				$data=$query->result_array();
			
		return $data;
	}
	else {$data= 0; return $data;}
}

function save_floorplan($data){
	$insert = array(
	'form_id'=>$data['form_id'],
	'filename'=>$data['filename']);

	$this->db->where('form_id',$data['form_id']);
	$query=$this->db->get('floorplans');
	
	if($query->num_rows()>0)
	{$this->db->where('id',$data['form_id']);
	$this->db->update('floorplans',$insert);}
	else{
	$this->db->insert('floorplans', $insert);}}


function get_contest_photos($contest_id) {
	$sql = "SELECT description, filename FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='inspiration'";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
	
function get_contest_photos_current($contest_id) {
	$sql = "SELECT filename, description FROM Pictures p JOIN Picture_map pm ON p.id = pm.picture_id WHERE pm.contest_id = ? and pm.type='current'";
	$query = $this->db->query($sql,$contest_id); 
	return $query->result_array();
	}
	
	
function delete_temp($contest_id)
{
	$this->db->where('id',$contest_id);
	$this->db->where('status','temp');
	$this->db->delete('contests');
}

function get_floorplan($contest_id)
{
$this->db->where('form_id',$contest_id);
$query = $this->db->get('floorplans');
$num_rows=$query->result_array();
return $num_rows;}

function save_options($data)
{
$insert = array(
'contest_type' =>$data['option']);
$this->db->where('id', $data['contestid']);
$this->db->update('contests',$insert);
}
	
	}