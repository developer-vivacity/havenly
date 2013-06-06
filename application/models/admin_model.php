<?php
class Admin_model extends CI_Model 
{ 
	 function __construct() 
	 {
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
 $this->db->query("INSERT INTO admin (name, privileges,password,username,designerid) VALUES
('lee','global','12345678','lee',0),
('villi','local','87654321','villi',1)");
 }  
function authorize_user($password,$name)
{
      $query=$this->db->query("SELECT id,name,privileges,designerid FROM admin where password='".$password."' and name='".$name."'");
       if($query->num_rows()!=0)
       {
         foreach($query->result() as $rows)
         {
          $newdata =array('adminid'=>$rows->id,'name'=>  $rows->name,'privileges'=>$rows->privileges,'designerid'=>$rows->designerid);   
         }
        $this->session->set_userdata($newdata);
       }
}
}

?>
