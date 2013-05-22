<?php
class Preference_model extends CI_Model 
{
function __construct() 
{
	 parent::__construct();

}
 // For User preference information
  function User_preference_information($id)
  {
	  $query=$this->db->query("SELECT style_pics,color_pics FROM user_preferences where user_id=".$id."");
     return $query->result();
  }
}

?>
