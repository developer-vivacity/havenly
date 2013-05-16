<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Account_model extends CI_Model 
{
   function __construct()
   {
   parent::__construct();
   }
   function creat_table()
   {
	      $query=$this->db->query('CREATE TABLE IF NOT EXISTS account (
            id INT( 50 ) NOT NULL AUTO_INCREMENT ,
            username VARCHAR( 50 ) NOT NULL ,
            email VARCHAR( 100 ) NOT NULL ,
            password VARCHAR( 255 ) NOT NULL ,
            PRIMARY KEY ( id )
           ) ENGINE = InnoDB');
   }
   function insert_user_info($data,$email)
   {
	 
	    $this->db->where("email",$email);
	    $query=$this->db->get("account");
       if($query->num_rows()==0)
       {
        $this->db->insert('account',$data);
        return mysql_insert_id();
       }
	   else
	   {
         return -1;   
	   }
		   
   }

   public function user_login($email,$password)
   {
 
 //echo $email."-----".$password;
   $this->db->where("email",$email);
   $this->db->where("password",$password);
   $query=$this->db->get("account");
   //echo '<br>';
  //echo $query->num_rows();
  //die($query->num_rows());
  
   if($query->num_rows()>0)
   {
    foreach($query->result() as $rows)
    {
      $newdata=$rows->username;
      //$newdata =array('user_id'=>$rows->id,'user_name'=> $rows->username,'user_email'=> $rows->email,'logged_in'=> TRUE,'isAdmin'=>$rows->user_type,'Active_user'=>$rows->Active_account);
    }
    //$this->session->set_userdata($newdata);
    
    return $newdata;
   }
   else
   return "";
  //return "";
 
   }
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
   public function update_password($email,$password)
   {
	   $data = array('password' => $password);

       $this->db->where("email",$email);
       
       $this->db->update("account", $data); 
	 
   }
 public function total_rows()
 {

  $query=$this->db->query('SELECT * FROM account');
  return $query->num_rows();
 }
 function user_getall()
  {
       $this->load->database();    
       $query=$this->db->get('account');//user is a table in the database
       return $query->result();
  }

}
