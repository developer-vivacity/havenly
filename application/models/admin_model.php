<?php
class Admin_model extends CI_Model
{
function __construct() {
parent::__construct();

}
 function create_table()
 {
  
  $this->db->query("CREATE TABLE IF NOT EXISTS admin (
  id int(10) NOT NULL AUTO_INCREMENT,
  name varchar(100) DEFAULT NULL,
  privileges varchar(20) NOT NULL,
  password varchar(200) NOT NULL,
  username varchar(100) NOT NULL,
  designerid int(10),PRIMARY KEY (id))");
  
   $this->db->query("CREATE TABLE IF NOT EXISTS user_room_details
  (id int(10) NOT NULL AUTO_INCREMENT,room_id int(10) NOT NULL,Style_notes varchar(100) NOT NULL,
  Ceiling_Height int(10) NOT NULL,Hates varchar(100) NOT NULL,Likes varchar(100) NOT NULL,Keep varchar(100) 
  NOT NULL,Buy varchar(100) NOT NULL,PRIMARY KEY (id))");


  $this->db->query("CREATE TABLE IF NOT EXISTS user_last_login (
  id int(10) NOT NULL AUTO_INCREMENT,
  user_last_login_id int(10) NOT NULL,
  admin_last_login_id int(10) NOT NULL,
  PRIMARY KEY (id)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2");


 }  
 function authorize_user($password,$name)
 {

      $query=$this->db->query("SELECT id,name,privileges,designerid FROM admin where password='".$password."' and username='".$name."'");

       if($query->num_rows()!=0)
       {
         foreach($query->result() as $rows)
         {
      
       		$newdata =array('adminid'=>$rows->id,'name'=>  $rows->name,'privileges'=>$rows->privileges,'designerid'=>$rows->designerid);   
         }
        $this->session->set_userdata($newdata);
       }
 }
 function get_additional_details_user_room($room_id=null,$data=null,$querytype=null)
 {

	 if($querytype=="insert")	
	 $this->db->insert('user_room_details',$data);
          elseif($querytype=="update")
	 {
	 $this->db->where('room_id',$room_id);
	 $this->db->update('user_room_details', $data); 
          }
	else
	{
		$this->db->where('room_id',$room_id);
	    $query=$this->db->get('user_room_details');
	    return $query->result(); 
	 }
 }
 function is_valid_user($design_id,$room_id,$current_user_id)
 {
	 
            $this->db->from('user_rooms','user_design');
            $this->db->join('user_design','user_rooms.id=user_design.room_id');
            $this->db->where('user_design.design_id',$design_id);
            $this->db->where('user_rooms.id',$room_id);
            $this->db->where('user_rooms.user_id',$current_user_id);
	        $query = $this->db->get();	
	        return $query->num_rows();
	   
 }
 
 function get_invite_requests()
 {
	
          $query =$this->db->query('SELECT email  FROM `invite_requests` WHERE `id`= (select max(id) from invite_requests)');	 
	      return $query->result();
	       
 }
 
 function get_last_login()
 {
	 
      $this->db->from('users','user_last_login');
      $this->db->select('users.first_name,users.last_name,users.email');	 
	  $this->db->join('user_last_login','users.id=user_last_login.user_last_login_id');
      $query= $this->db->get();
   
      return $query->result(); 
 }
function last_admin_login($id)
  {
	  
	 if($this->db->count_all('user_last_login')==0)
	 {
	  $this->db->insert('user_last_login', array('admin_last_login_id'=>$id));  
	
     }
     else
     {
	  $this->db->update('user_last_login', array('admin_last_login_id'=>$id));  	 
	 }
  }
  
 function has_paid($id){
	 $this->db->where('user_id',$id);
	 $this->db->where('description', 'design_fee');
	 $query = $this->db->get('token_code');
	 return $query->result_array();
	 
 }
 
 
}

?>
