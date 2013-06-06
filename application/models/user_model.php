<?php
class User_model extends CI_Model 
{ 
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
'instagram'=>$data['instagram'],
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

		}
		
		// For inser user informetion---------
   function insert_user_info($data,$email)
   {
	   
	 
	    $this->db->where("email",$email);
	    $query=$this->db->get("users");
       if($query->num_rows()==0)
       {
         
         $this->db->insert('users',$data);
        
	     $id=mysql_insert_id();
         $newdata =array('id'=>$id,'first_name'=>  $data["first_name"],'last_name'=> $data["last_name"],'email'=> $data["email"],'phone'=>$data["phone"],'address'=>$data["address"],'zipcode'=>$data["zipcode"]);   
         
         $this->session->set_userdata($newdata);
         return $id;
        
       }
	   else
	   {
         return -1;   
	   }
		   
   }
//---For user login and create session.......
  public function user_login($email,$password)
   {
   $this->db->where("email",$email);
   $this->db->where("password",$password);
   
   $query=$this->db->get("users");
   
   if($query->num_rows()>0)
   {

    foreach($query->result() as $rows)
    {
      $newdata =array('id'=>$rows->id,'first_name'=> $rows->first_name,'last_name'=> $rows->last_name,'email'=> $rows->email,'phone'=>$rows->phone,'address'=>$rows->address,'zipcode'=>$rows->zipcode);   
    }
    $this->session->set_userdata($newdata);
    
    return $newdata;
   }
   else
   {
     $this->db->where("email",$email);
     $query=$this->db->get("users");
     if($query->num_rows()>0)
     return "haveemail";
     else
     return "";
   }
   
   }
   //----For check user mail id.......
   public function check_mail($email)
   {
	   $this->db->where("email",$email);
	   $query=$this->db->get("users");
      if($query->num_rows()>0)
      {
         $receivername=$query->row_array();
         return $receivername["first_name"]."&nbsp;".$receivername["last_name"];
      }
     else
     {
				return "";
		 }     
   }
   
   // For update user informetion
   public function update_user_info($data,$id)
   {
	   

       $this->db->where("id",$id);
       
       $this->db->update("users", $data); 
	 
   }
   // For update Password
   public function update_password($email,$password)
   {
	   $data = array('password' => $password);

       $this->db->where("email",$email);
       
       $this->db->update("users", $data); 
   }
   // For count total rows
  public function total_rows()
  {
        $query=$this->db->query('SELECT * FROM users');
        return $query->num_rows();
  }
  // For fetch user details which login.
  function user_getall($id)
  {
           $query=$this->db->query("SELECT * FROM users where id=".$id."");
           return $query->result();
  }
  function mail_with_login_id($email,$id)
  {
   $this->db->where("email",$email);
   $this->db->where("id !=",$id);
   $query=$this->db->get("users");
   return $query->num_rows();
  }

function update_userstables()
{
  	$this->db->query("SELECT IF( (SELECT COUNT( * )
FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = 'users'
AND table_schema = 'emotayed_test'
AND column_name = 'facebook' ) >0, 'SELECT 1', 'ALTER TABLE users ADD facebook VARCHAR(200)')");
}
}
