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
	  $query=$this->db->query("SELECT user_id,room_type,style_pics,color_pics FROM user_preferences where user_id=".$id."");
     return $query->result();
  }
//
function create_table()
{

$query=$this->db->query("CREATE TABLE IF NOT EXISTS user_preferences (
  pref_id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  room_type varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  style_pics varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  color_pics varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  Timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (pref_id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ");


}
function updateuserpreferenceinfowithid($id,$data)
{

$this->db->where('user_id',$id);
$query=$this->db->update('user_preferences', $data);
}
}

?>
