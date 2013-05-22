<?php
class Designer_model extends CI_Model 
{
  function __construct() 
  {
	 parent::__construct();

  }
  // For Designer informetion
  function designer_information($id)
  {
	  $query=$this->db->query("SELECT designer.designer_name,designer.designer_email,designer.designer_email,
	  designer.designer_picture,designer.designer_phone_number 
	  FROM designer inner join designer_mapping 
	  on designer.designer_id=designer_mapping.designer_id 
	  and designer_mapping.user_id=".$id."");
      return $query->result();
	  	  
   }
}
?>
