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
'room_photo2'=>$data['room_photo2'],
'status'=>'open');


$this->db->insert('user_rooms',$insert);
$query=$this->db->insert_id();
return $query;
		
		}
		
		
function get_open_rooms(){
$this->db->where('status !=','closed');
$this->db->order_by("status", "asc");
$query=$this->db->get('user_rooms');
return $query->result_array();
		
		}

function get_room($room_id){
$this->db->where('id',$room_id);
$query=$this->db->get('user_rooms');
return $query->result_array();
		
		}
		
		
function change_status($room_id, $status){
$update= array(
'status'=>$status);

$this->db->where('id',$room_id);
$query=$this->db->update('user_rooms', $update);
		
		}

				
		}