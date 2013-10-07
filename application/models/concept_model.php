<?php
class Concept_model extends CI_Model
{

    function __construct()
    {
    parent::__construct();

    }

   function create_table()
   {
      

     $this->db->query("CREATE TABLE IF NOT EXISTS concept_board (
  concept_id int(10) NOT NULL AUTO_INCREMENT,
  room_id int(10) NOT NULL,
  filename varchar(200) NOT NULL,
  status varchar(10) DEFAULT NULL,
  PRIMARY KEY (concept_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49") ;


$this->db->query("CREATE TABLE IF NOT EXISTS concept_board_comments (
  room_id int(10) NOT NULL,
  concept_id int(10) NOT NULL,
  comments varchar(500) NOT NULL,
  status varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1");


   }
   function save_image_info($room_id,$filename)
   {
	   $data=array("room_id"=>$room_id,"filename"=>$filename);	
	   $this->db->insert('concept_board',$data); 
	   return $this->db->insert_id();
   }
   function admin_display($room_id)
   {
	
	   $query= $this->db->query('select concept_board.concept_id,concept_board.room_id,concept_board.filename,concept_board.status,concept_board_comments.comments from concept_board left join concept_board_comments on concept_board.concept_id=concept_board_comments.concept_id where concept_board.room_id='.$room_id.'');
	  return $query->result();
   }
   function update_concept_board_status($room_id,$conceptid,$status)
   {
	     
	   $this->db->where('room_id',$room_id);
	   $this->db->where('concept_id',$conceptid);
	   $data=array("status"=>$status);
	   $this->db->update('concept_board',$data);  
	die($this->db->last_query());
	   
   }
   function initial_concepts_for_user()
   {

     /*$query= $this->db->query('select concept_board.concept_id,concept_board.room_id,concept_board.filename,concept_board.status,concept_board_comments.comments from concept_board left join concept_board_comments on concept_board.concept_id=concept_board_comments.concept_id where concept_board.room_id in (select id from user_rooms where user_id='.$this->session->userdata('id').') and (concept_board.status=1 or concept_board.status is null)');
    */
$query= $this->db->query('select concept_board.concept_id,concept_board.room_id,concept_board.filename,concept_board.status,concept_board_comments.comments from concept_board left join concept_board_comments on concept_board.concept_id=concept_board_comments.concept_id where concept_board.room_id in (select id from user_rooms where user_id='.$this->session->userdata('id').') and (concept_board.status=1)');

     return $query->result();   
   }
   function total_rows_initial_concepts()
   {
	
/*     $query= $this->db->query('select count(*) as total from concept_board left join concept_board_comments on concept_board.concept_id=concept_board_comments.concept_id where concept_board.room_id in (select id from user_rooms where user_id='.$this->session->userdata('id').') and (concept_board.status=1 or concept_board.status is null)');
*/
   $query= $this->db->query('select count(*) as total from concept_board left join concept_board_comments on concept_board.concept_id=concept_board_comments.concept_id where concept_board.room_id in (select id from user_rooms where user_id='.$this->session->userdata('id').') and (concept_board.status=1)');
return $query->result(); 

   }
   function save_comment($comment,$conceptid,$roomid)
   {
	    /*$this->db->where('concept_id',$conceptid);
	   $data=array("status"=>$status);
	   $this->db->update('concept_board',$data); 
	   */
	   /*
	   concept_board_comments
	   room_id
	   concept_id
	   comments
	   status*/
	    	
	    	$this->db->where('concept_id',$conceptid);
	    	$this->db->where('room_id',$roomid);
	    	$this->db->delete('concept_board_comments');
	   
	         $data=array('concept_id'=>$conceptid,'room_id'=>$roomid,'comments'=>$comment);
	         $this->db->insert('concept_board_comments',$data);
	   
   }
}


?>
