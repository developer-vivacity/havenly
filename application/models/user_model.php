<?php
class User_model extends CI_Model
{
function __construct() {
parent::__construct();

}
 function create_table()
 {
	 
	 $this->db->query("CREATE TABLE IF NOT EXISTS design_fee (
  user_id int(10) NOT NULL,
  design_type varchar(100) NOT NULL,
  promotion_code varchar(50) DEFAULT NULL,
  status varchar(100) NOT NULL,
  fee varchar(200) NOT NULL,
  credit_amount decimal(10,0) NOT NULL,
  PRIMARY KEY (user_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1");
	 

$this->db->query("CREATE TABLE IF NOT EXISTS promotion_code (
  id int(10) NOT NULL AUTO_INCREMENT,
  promotion_code varchar(100) DEFAULT NULL,
  design_fee varchar(500) NOT NULL,
  designtype enum('complete','incomplete') NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3");
	 
	 
  $this->db->query("CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  last_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  phone varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  address varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  zipcode int(10) NOT NULL,
  password varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  facebook text COLLATE utf8_unicode_ci,
  pinterest text COLLATE utf8_unicode_ci,
  instagram text COLLATE utf8_unicode_ci,
  Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY id (id),
  KEY email (email)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=116") ;

  $this->db->query("CREATE TABLE IF NOT EXISTS user_rooms (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  type varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  room_type varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  budget int(50) DEFAULT NULL,
  status varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  about text COLLATE utf8_unicode_ci NOT NULL,
  room_photo1 varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  room_photo2 varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  width float NOT NULL,
  height float NOT NULL,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY room_type (room_type),
  KEY status (status)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=81");


  $this->db->query("CREATE TABLE IF NOT EXISTS signup (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  first_name varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39");

  $this->db->query("CREATE TABLE IF NOT EXISTS invite_requests (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  zipcode int(5) NOT NULL,
  Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45");

}


function save_user($data){
$this->db->where("email",$data['email']);
$query=$this->db->get("users");
 
   if($query->num_rows()==0)
   {
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
    $id=$this->db->insert_id();
    $newdata =array('id'=>$id,'first_name'=> $data['first_name'],'last_name'=> $data['last_name'],'email'=> $data['email'],'phone'=>$data['phone'],'address'=>$data['address'],'zipcode'=>$data['zipcode']);
    $this->session->set_userdata($newdata);
    return $id;
  }

else {
$update=array('first_name'=>$data['first_name'],
'last_name'=>$data['last_name'],
'address'=>$data['address'],
'phone'=>$data['phone'],
'zipcode'=>$data['zipcode'],
'password'=>$data['password'],
'pinterest'=>$data['pinterest'],
'instagram'=>$data['instagram'],
'facebook'=>$data['facebook']);

$this->db->where('email',$data['email']);

$this->db->update('users',$update);

$this->db->where('email', $data['email']);
$this->db->select('id');
$query = $this->db->get('users');

foreach( $query->result_array() as $row)
{return $row['id'];
}
}

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
         $newdata =array('id'=>$id,'first_name'=> $data["first_name"],'last_name'=> $data["last_name"],'email'=> $data["email"],'phone'=>$data["phone"],'address'=>$data["address"],'zipcode'=>$data["zipcode"]);
         
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
  function get_user_id()
 {
   $this->db->select_max('id');
   $query = $this->db->get('users');
   return $query->result_array();
 }
}
?>
