<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Account_model extends CI_Model 
{
   function __construct()
   {
   parent::__construct();
   }
   
  // ---For create account table--------
   function creat_table()
   {
	      $query=$this->db->query('CREATE TABLE IF NOT EXISTS account (
            id INT( 50 ) NOT NULL AUTO_INCREMENT ,
            username VARCHAR( 50 ) NOT NULL ,
            email VARCHAR( 100 ) NOT NULL ,
            password VARCHAR( 255 ) NOT NULL ,Phone_number varchar(50) NOT NULL,Zip_code varchar(50) NOT NULL,
            PRIMARY KEY ( id )
           ) ENGINE = InnoDB');
   }
   // For inser user informetion---------
   function insert_user_info($data,$email)
   {
	   
	 
	    $this->db->where("email",$email);
	    $query=$this->db->get("account");
       if($query->num_rows()==0)
       {
         
         $this->db->insert('account',$data);
         foreach($data as $rows)
         {
		 $newdata =array('user_id'=>$rows->id,'user_name'=> $rows->username,'user_email'=> $rows->email,'Phone_number'=>$rows->Phone_number,'Zip_code'=>$rows->Zip_code);   
	     } 
	     $this->session->set_userdata($newdata);
       
        return mysql_insert_id();
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
   $query=$this->db->get("account");
  
  
   if($query->num_rows()>0)
   {
    foreach($query->result() as $rows)
    {
      $newdata=$rows->username;
      $newdata =array('user_id'=>$rows->id,'user_name'=> $rows->username,'user_email'=> $rows->email,'Phone_number'=>$rows->Phone_number,'Zip_code'=>$rows->Zip_code);
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
	    $query=$this->db->get("account");
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
       
       $this->db->update("account", $data); 
	 
   }
   // For update Password
   public function update_password($email,$password)
   {
	   $data = array('password' => $password);

       $this->db->where("email",$email);
       
       $this->db->update("account", $data); 
	 
   }
   // For count total rows
 public function total_rows()
 {

  $query=$this->db->query('SELECT * FROM account');
  return $query->num_rows();
 }
 // For fetch user details which login.
 function user_getall($id)
  {
           $query=$this->db->query("SELECT * FROM account where id=".$id."");
    
          return $query->result();
  }

}
