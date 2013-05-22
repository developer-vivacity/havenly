<?php


class User_model extends CI_Model { 
	function __construct() {
	 parent::__construct();

	 }
	
function save_user($data){

$insert = array(
'first_name'=>$data['first_name'],
'last_name'=>$data['last_name'],
'email'=>$data['email'],
'address'=>$data['address'],
'phone'=>$data['phone'],
'zipcode'=>$data['zipcode'],
'password'=>$data['password'],
'pinterest'=>$data['pinterest'],
'facebook'=>$data['facebook']);

$this->db->insert('users',$insert);
$query=$this->db->insert_id();
return $query;
		
		}
		
		
function save_preferences($data){

$insert = array(
'user_id'=>$data['user_id'],
'style_pics'=>$data['style'],
'color_pics'=>$data['color'],
'room_type'=>$data['room_type']);

$this->db->insert('user_preferences',$insert);
		
		}
		
function get_user_prefs($user_id, $room_type){
$this->db->where('user_id',$user_id);
$this->db->where('room_type',$room_type);
$query = $this->db->get('user_preferences');
return $query->result_array();

}		

function get_user($user_id){
$this->db->where('id',$user_id);
$query = $this->db->get('users');
return $query->result_array();

}

function invite_request($data){
$insert=array(
'email'=>$data['email'],
'zipcode'=>$data['zipcode']);
	
$this->db->insert('invite_requests',$insert);

		}}