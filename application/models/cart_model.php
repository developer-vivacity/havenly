<?php
class  Cart_model extends CI_Model 
{ 
	
	 function __construct() 
	 {
	   parent::__construct();

	 }

//---create table
function create_table()
{

 $this->db->query("CREATE TABLE IF NOT EXISTS shoppingcart (
  id int(10) NOT NULL AUTO_INCREMENT,
  user_id int(10) DEFAULT NULL,
  room_id int(10) DEFAULT NULL,
  product_id int(10) DEFAULT NULL,
  design_id int(10) DEFAULT NULL,
  qty int(10) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167");	
	
}


// Get user design for login user.
function get_design_login_user($productid=null)
{
	
   $this->db->from('user_room_designs','design_product_mapping','user_design');
   $this->db->select('user_room_designs.user_id,user_room_designs.filename,user_room_designs.design_status,user_room_designs.design_id,user_room_designs.room_id,user_design.status,user_design.design_name');
   $this->db->select('user_room_designs.filename,user_room_designs.design_status,user_room_designs.design_id,user_room_designs.room_id');
   $this->db->join('design_product_mapping','user_room_designs.design_id = design_product_mapping.design_id');
   $this->db->join('user_design','user_room_designs.design_id = user_design.design_id');
   $this->db->where('user_room_designs.user_id',$this->session->userdata('id'));
  
   $this->db->where('user_design.status','submitted');
   if($productid!="")
   $this->db->where('design_product_mapping.product_id',$productid);
   
   $this->db->distinct();	
   $this->db->group_by('user_room_designs.design_id');
   $query=$this->db->get();
  
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
function updateshoppingcart($productid=null,$roomid=null,$designid=null,$type=null)
{
	if($type=="insert")
	{
	$data=array("user_id"=>$this->session->userdata('id'),"room_id"=>$roomid,"design_id"=>$designid,"product_id"=>$productid);	
	$this->db->insert("shoppingcart",$data);
	}
	elseif($type=="delete")
	{
		$this->db->where("user_id",$this->session->userdata('id'));
		$this->db->where("room_id",$roomid);
		$this->db->where("design_id",$designid);
		$this->db->where("product_id",$productid);
		$this->db->delete("shoppingcart");
	}
	
	  $this->db->select('sum(qty) as total_qty');
	  $this->db->where("user_id",$this->session->userdata('id'));
	  $this->db->group_by("user_id");
	  $query=$this->db->get("shoppingcart");
	 
	  return $query->result(); 
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
                    $this->db->where("user_id",$this->session->userdata("id"));
		  $this->db->where("room_id",$room_id);
		  $this->db->where("design_id",$design_id);
		  $this->db->where("product_id",$product_id);
		  $data=array("qty"=>$product_qty);
		  $this->db->update("shoppingcart",$data);  
		  } 
	
}

function delete_user_assign_design($user_id,$room_id,$design_id)
{
	$this->db->delete('user_design', array('design_id' =>$design_id,'room_id'=>$room_id));

	$this->db->delete('user_room_designs', array('user_id' => $user_id,'room_id' => $room_id,'design_id'=>$design_id));
	
	$this->db->delete('design_product_mapping', array('design_id' => $design_id)); 

}
// This function get the quantity of shopping card.
function get_product_qty($product_id,$design_id)
{        
	$this->db->select('qty');
	$this->db->where('product_id',$product_id);
	$this->db->where('design_id',$design_id);
	$query=$this->db->get('shoppingcart');	
         return $query->result();
}
function product_details_with_design()
{
   $this->db->from('shoppingcart','user_design','products');
   $this->db->select('user_design.design_name,products.product_name,products.price,products.rent_price,products.ship_cost,shoppingcart.qty');
   $this->db->join('user_design','user_design.design_id = shoppingcart.design_id');
   $this->db->join('products','products.productid = shoppingcart.product_id');
   $this->db->where('shoppingcart.user_id',$this->session->userdata('id'));
   $query=$this->db->get();
  
   return $query->result();
     
	
}


}

?>
