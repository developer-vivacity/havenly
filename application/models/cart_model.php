<?php
class  Cart_model extends CI_Model
{


//---create table
function crate_table()
{

  $this->db->query("CREATE TABLE IF NOT EXISTS  shoppingcart(id int(10) NOT NULL,user_id int(10),room_id int(10),
product_id int(10),design_id int(10),Qty int(10),PRIMARY KEY(id))");	
	
}


// Get user design for login user.
function get_design_login_user($productid=null)
{
	
   $this->db->from('user_room_designs','design_product_mapping');
   $this->db->select('user_room_designs.filename,user_room_designs.design_status,user_room_designs.design_id,user_room_designs.room_id');
   $this->db->join('design_product_mapping','user_room_designs.design_id = design_product_mapping.design_id');
   $this->db->where('user_room_designs.user_id',$this->session->userdata('id'));
   
   if($productid!="")
   $this->db->where('design_product_mapping.product_id',$productid);
   
   $this->db->distinct();	
   $this->db->group_by('user_room_designs.design_id');
   $query=$this->db->get();
   //die($this->db->last_query());
   return $query->result();
	
}
//room type for login user
 function Check_user_rooms()
 { 
 
       $this->db->select('user_rooms.id,user_rooms.room_type');
       $this->db->where('user_id',$this->session->userdata('id'));
       $query=$this->db->get('user_rooms');
       return $query->result();
 }
 //color pic for login user
 function color_pic_login_user()
 {
	$this->db->select('color_pics');
	$this->db->where('user_id',$this->session->userdata('id'));
	$query=$this->db->get('user_preferences');
	return $query->result();
	
 }
 //display room color 
function room_color()
{
	
	$this->db->select('color_code,color_id');
	$query=$this->db->get('color_code');
         return $query->result();
	
}
// update shoppingcart...........
function updateshoppingcart($productid,$roomid,$designid,$type)
{
	
	if($type=="insert")
	{
	$data=array("user_id"=>$this->session->userdata('id'),"room_id"=>$roomid,"design_id"=>$designid,"product_id"=>$productid);	
	$this->db->insert("shoppingcart",$data);
	}
	else
	{
		$this->db->where("user_id",$this->session->userdata('id'));
		$this->db->where("room_id",$roomid);
		$this->db->where("design_id",$designid);
		$this->db->where("product_id",$productid);
		$this->db->delete("shoppingcart");
	}
	
}
// get product id which are on the shopping card.................
function getproductinshoppingcard($designid)
{
	
	$this->db->select('GROUP_CONCAT(product_id) as product_id');
	$this->db->where("user_id",$this->session->userdata('id'));
	
	$this->db->where("design_id",$designid);
	$query=$this->db->get('shoppingcart');
         return $query->result();
	
}
//
function insert_product_for_design($productid,$roomid,$designid)
{
	
	  foreach($productid as $key=>$value)
	  {
                
                  $this->db->where("user_id",$this->session->userdata('id'));
		
		$this->db->where("room_id",$roomid);
		
		$this->db->where("design_id",$designid);
		$this->db->where("product_id",$value);
                  
                  $query=$this->db->get('shoppingcart');
                  $count = $query->num_rows();  
                    
		  
		  if($count==0)
		  {
		   $data=array("user_id"=>$this->session->userdata('id'),"room_id"=>$roomid,"design_id"=>$designid,"product_id"=>$value);	
	            $this->db->insert("shoppingcart",$data);	  
		  }
	  }
}

function update_insert_qty($product_qty=null,$product_id=null,$room_id=null,$design_id=null)
{
	           $this->db->where("user_id",$this->session->userdata("id"));
		  $this->db->where("room_id",$room_id);
		  $this->db->where("design_id",$design_id);
		  $this->db->where("product_id",$product_id);
		  $query=$this->db->get("shoppingcart");
                    $count = $query->num_rows(); 
                    if($count==0)
		  {
		   $data=array("user_id"=>$this->session->userdata("id"),"room_id"=>$room_id,"design_id"=>$design_id,"product_id"=>$product_id,"qty"=>$product_qty);	
	            $this->db->insert("shoppingcart",$data);	  
		  }
		  else
		  {
			  $data=array("qty"=>$product_qty);
			  $this->db->update("shoppingcart",$data);  
		  } 
	
}

}

?>
