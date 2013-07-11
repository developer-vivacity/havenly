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

$insert = array(
'designer_id'=>1,
'user_id'=>$data['user_id']);

$this->db->insert('designer_mapping',$insert);

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
function change_status($room_id, $status)
{
$update= array(
'status'=>$status);
$this->db->where('id',$room_id);
$query=$this->db->update('user_rooms', $update);
}


// status Open or Called for login user
 function Check_user_rooms($id)
 { 
 $query=$this->db->query("SELECT user_rooms.id,user_rooms.user_id,user_rooms.room_type, user_rooms.budget, user_rooms.width, user_rooms.height, user_rooms.room_photo1,   user_rooms.room_photo2 FROM user_rooms where user_rooms.user_id =".$id."");  
 return $query->result();
 }
//	
function updateroom_loginuser($id)
{
  $query=$this->db->query("SELECT user_rooms.id,user_rooms.room_type, user_rooms.budget, user_rooms.width, user_rooms.height, user_rooms.room_photo1,   user_rooms.room_photo2 FROM user_rooms where user_rooms.id =".$id." and user_rooms.user_id=".$this->session->userdata('id')."");  
 return $query->result();
}				
// 
 function updateroominfowithid($id,$data)
 {

       $this->db->where("id",$id);
       $this->db->update("user_rooms",$data ); 
 }	
			
 	// ---For create color_code table and insert data in this table.		
 function create_table()
 {
	 
	$this->db->query("CREATE TABLE IF NOT EXISTS color_code (
  id int(10) NOT NULL AUTO_INCREMENT,
  color_code varchar(100) DEFAULT NULL,
  color_id int(10) NOT NULL,
  PRIMARY KEY (id))") ;

   $this->db->query("INSERT INTO color_code (id, color_code, color_id) VALUES
(1, 'rgb(188,196,188);', 1),
(2, 'rgb(255,243,196);', 2),
(5, 'rgb(99, 121, 134);', 3),
(6, 'rgb(255, 186, 180);', 4),
(7, 'rgb(204, 199, 185);', 5),
(8, 'rgb(241, 242, 235);', 6),
(9, 'rgb(197, 222, 204);', 7),
(10, 'rgb(190, 210, 213);', 8),
(11, '#FF0055;', 9),
(12, '#006FFF;', 10),
(13, '#00FFF7;', 11),
(14, '#00FF5E;', 12),
(15, '#FFD500;', 13),
(16, '#FF1100;', 14)");
 }
// for display color code.	
function fetch_color_style_number() 
{
   $query=$this->db->query("select color_id,color_code from color_code");
   return $query->result();
}
// for display all data of user_rooms table.	
function display_all_rooms($orderby=null)
{
$query=$this->db->query("SELECT distinct users.email AS username, user_rooms.id AS Order_number, user_rooms.room_type AS Room_type, user_rooms.status AS Order_status, designer.designer_name AS assigned_to
FROM user_rooms
INNER JOIN users ON user_rooms.user_id = users.id
LEFT JOIN designer_mapping ON designer_mapping.user_id = user_rooms.user_id
LEFT JOIN designer ON designer.id = designer_mapping.designer_id ".$orderby."");
return $query->result();
}
//
function displayuserinformationwithroom($room_id)
{

<<<<<<< HEAD
$query=$this->db->query("Select distinct user_rooms.id,user_rooms.user_id,users.first_name,users.last_name,users.email,users.phone,users.address,users.zipcode, users.pinterest, users.facebook, users.instagram, user_rooms.type,user_rooms.width,user_rooms.height,user_rooms.room_photo1,user_rooms.room_photo2,user_rooms.room_type,user_rooms.about,user_preferences.style_pics,user_preferences.color_pics from users inner join user_rooms on users.id=user_rooms.user_id inner join user_preferences on user_rooms.user_id=user_preferences.user_id where user_rooms.id=".$room_id."");	
=======
$query=$this->db->query("Select distinct user_rooms.id,user_rooms.user_id,users.first_name,users.last_name,users.email,users.phone,users.address,user_rooms.type,user_rooms.width,user_rooms.height,user_rooms.room_photo1,user_rooms.room_photo2,user_rooms.status,user_rooms.room_type,user_preferences.style_pics,user_preferences.color_pics from users inner join user_rooms on users.id=user_rooms.user_id inner join user_preferences on user_rooms.user_id=user_preferences.user_id where user_rooms.id=".$room_id."");	

>>>>>>> 888815f33b4d9de6fa61b9a12f90725e1ef8c112
return $query->result();	
}


}
