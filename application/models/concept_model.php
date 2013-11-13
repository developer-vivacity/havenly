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
	   $data=array("room_id"=>$room_id,"filename"=>$filename,"status"=>1);	
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
   
   
   function save_product_concept($concept_id, $category, $filename, $price)
   {
   
	$insert = array(
		'category'=>$category,
		'concept_id'=>$concept_id,
		'filename'=>$filename,
		'price'=>$price);
		
	$this->db->insert('concept_products',$insert);
	$query = $this->db->insert_id();
	return $query;
   }
   
   function deleteproductconcept($id)
   {
   
	$delete=array('id'=>$id);
	$this->db->delete('concept_products',$delete);
	  }
	  
	  function viewproducts($id)
	  
	  {
	  
		$this->db->order_by('category','asc');
		$this->db->where('concept_id',$id);
		$query = $this->db->get('concept_products');
		return $query->result();
   
   }
   
function have_products()
{
	$query= $this->db->query('select distinct concept_board.concept_id from concept_board join concept_products on concept_board.concept_id=concept_products.concept_id where concept_board.room_id in (select id from user_rooms where user_id='.$this->session->userdata('id').') and concept_board.status=1 group by concept_board.concept_id');
	return $query->result_array();
}


  function dist_categories ($id)
   {
  $query= $this->db->query('select distinct category from concept_products where concept_id = '.$id.' group by category');
  return $query->result();
}

function products_by_category($category, $id)

{$this->db->where ('concept_id',$id);
$this->db->where('category',$category);
$this->db->select('id,filename,price,comments');
$query=$this->db->get('concept_products');
return $query->result();

}

function save_prod_comments($pcid, $comment)
{

$update=array(
'comments'=>$comment);
$this->db->where('id', $pcid);
$this->db->update('concept_products', $update);

}

}
?>
