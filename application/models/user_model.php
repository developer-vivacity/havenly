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
'password'=>$data['password']);

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
		
		}