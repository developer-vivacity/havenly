<?php
class Designer_model extends CI_Model 
{
  function __construct() 
  {
	 parent::__construct();

  }
  
   function create_table()
   {
	   
	     $query=$this->db->query('CREATE TABLE IF NOT EXISTS designer (
			id int(11) NOT NULL AUTO_INCREMENT,
			designer_name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_phone_number varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_picture varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			designer_email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
			PRIMARY KEY (id)
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69') ;
			
			$query=$this->db->query('CREATE TABLE IF NOT EXISTS designer_mapping (
				designer_id int(11) NOT NULL,
				user_id int(11) NOT NULL			
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69') ;
  
   }
  
  
  // For Designer informetion
  function designer_information($id)
  {
	  $query=$this->db->query("SELECT designer.designer_name,designer.designer_email,designer.designer_email,
	  designer.designer_picture,designer.designer_phone_number 
	  FROM designer inner join designer_mapping 
	  on designer.id=designer_mapping.designer_id 
	  and designer_mapping.user_id=".$id."");
      return $query->result();
	  	  
   }
}
?>
