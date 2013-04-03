<?php


class Room_model extends CI_Model { 
	function __construct() {
	 parent::__construct();

	 }
	 
	 
	 
function save_room($data){

$insert = array(
'about'=>$data['about'],
'user_id'=>$data['user_id'],
'type'=>$data['type'],
'width'=>$data['room_width'],
'height'=>$data['room_height'],
'room_type'=>$data['room_type'],
'room_photo1'=>$data['room_photo1'],
'room_photo2'=>$data['room_photo2']);


$this->db->insert('user_rooms',$insert);
$query=$this->db->insert_id();
return $query;
		
		}
		}