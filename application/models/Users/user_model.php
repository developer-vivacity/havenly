<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class user_model extends CI_Model 
{
   function __construct()
   {

   parent::__construct();
   }
   
  // ---For create users table--------
   function create_table()
   {
	   
	     $query=$this->db->query('CREATE TABLE IF NOT EXISTS users (
			id int(11) NOT NULL AUTO_INCREMENT,
			first_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			last_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			phone varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			address varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			zipcode int(50) NOT NULL,
			password varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			facebook text NULL utf8_unicode_ci,
			pinterest text NULL utf8_unicode_ci,
			instagram text NULL utf8_unicode_ci,
			PRIMARY KEY (id)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69') ;
  
   }
   
   
   
   
   // To insert user information---------
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
      $newdata=$rows->first_name;
      $newdata =array('id'=>$rows->id,'first_name'=> $rows->first_name,'last_name'=> $rows->last_name,'email'=> $rows->email,'phone'=>$rows->phone,'address'=>$rows->address,'zipcode'=>$rows->zipcode);   
    }
    $this->session->set_userdata($newdata);
    
    return $newdata;
   }
   else
   return "";
   }
   //----For check user mail id.......
   public function check_mail($email)
   {
	   
	    $this->db->where("email",$email);
	    $query=$this->db->get("users");
      if($query->num_rows()>0)
      {
		return 1;
      }
     else
     {
		
		return 0;
		
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

}
