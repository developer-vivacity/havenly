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
	
 $this->db->query("CREATE TABLE IF NOT EXISTS shopify_product_variant (
  product_id int(11) NOT NULL,
  variant_id int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1");	
	
	
}


// Get user design for login user.
function get_design_login_user($productid=null)
{
	
   $this->db->from('user_room_designs','design_product_mapping','user_design');
   $this->db->select('user_room_designs.user_id,user_room_designs.filename,user_room_designs.design_status,user_room_designs.design_id,user_room_designs.room_id,user_design.status,user_design.design_name,user_design.designer_notes');
   $this->db->select('user_room_designs.filename,user_room_designs.design_status,user_room_designs.design_id,user_room_designs.room_id');
   $this->db->join('design_product_mapping','user_room_designs.design_id = design_product_mapping.design_id', 'left');
   $this->db->join('user_design','user_room_designs.design_id = user_design.design_id', 'left');
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
	
	  //$this->db->select('sum(qty) as total_qty');
	  $this->db->select('sum(qty) as total_qty');
	  $this->db->where('user_id',$this->session->userdata('id'));
	  $this->db->where('design_id',$designid);
	  $query=$this->db->get("shoppingcart");
	  return $query->result(); 
}
// get product id which are on the shopping card.................
function getproductinshoppingcart($designid)
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
	                    
                    $this->db->delete("shoppingcart");
                    
          if($product_qty!=0)
		  {
			  
		   $data=array("user_id"=>$this->session->userdata("id"),"room_id"=>$room_id,"design_id"=>$design_id,"product_id"=>$product_id,"qty"=>$product_qty);	
	            $this->db->insert("shoppingcart",$data);	  
		  }
		  
	
}

function delete_user_assign_design($user_id,$room_id,$design_id)
{
	
	$this->db->where('design_id',$design_id);
	$this->db->where('room_id',$room_id);
	 $data=array('status'=>'close');
	$this->db->update('user_design',$data);
	
	
	
         
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
   $this->db->select('user_design.design_name, filename, time_to_ship, products.product_name,products.price,products.ship_cost,shoppingcart.qty, vendors.shipping_percent, vendors.shipping_flat');
   $this->db->join('user_design','user_design.design_id = shoppingcart.design_id');
   $this->db->join('products','products.product_id = shoppingcart.product_id');
   $this->db->join('vendors','products.vendor_id = vendors.vendor_id');
   $this->db->join('product_image','products.product_id=product_image.product_id');
   $this->db->where('product_image.type','main');
   $this->db->where('shoppingcart.user_id',$this->session->userdata('id'));
  
   $query=$this->db->get();
   
   // die($this->db->last_query());
   return $query->result();
     
	
}
function paint_colors_for_design($design_id)
{
	$this->db->select('*');
	$this->db->where('design_id',$design_id);
	$query=$this->db->get('paint_colors');
	return $query->result();
	
}

//-------------------------------------
function get_design_info_by_id($design_id)
{
	$this->db->where('design_id',$design_id);
	$query=$this->db->get('user_design');
	
	return $query->result_array();
}
function valid_promotion_code($promotioncode,$designtype)
{
	
	$this->db->select('design_fee_id,status,fee');
	
	$this->db->where('promotion_code',$promotioncode);
	
	$this->db->where('design_type',$designtype);
	
	$query=$this->db->get('design_fee');

	return $query->result_array();
}

function get_design_fee($design_type)
{

    $this->db->select('fee');
    $this->db->where('design_type',$design_type);
    $this->db->where('promotion_code is null'); 
    $query=$this->db->get('design_fee');
    return $query->result_array();
} 
  function insert_token($token,$userid, $amount, $description)
  {
  $this->db->insert("token_code",array("user_id"=>$userid,"token"=>$token, "amount"=>$amount, "description"=>$description));
  $query = $this->db->insert_id();
  return $query;
  
  }
  
  function set_order($designid)
  {
  
	$order = array(
	'ordered'=>'yes');
	$this->db->where('design_id',$designid);
	$this->db->update('shoppingcart',$order);
	
	return 1;
	
  }
  
  
  
  function insert_ship_info($data){
  if(isset($data['shipname'])){$shipname = $data['shipname'];} else {$shipname = NULL;}
  if(isset($data['giftmsg'])){$giftmsg=$data['giftmsg'];} else {$giftmsg=NULL;}
  
  
  $insert = array(
  'payment_id'=>$data['id'],
  'shipaddress'=>$data['shipaddress'],
  'shipcity'=>$data['shipcity'],
  'shipstate'=>$data['shipstate'],
  'shipzip'=>$data['shipzip'],
  'shipname'=>$shipname,
  'giftmsg'=>$giftmsg);
  
  $this->db->insert('pay_ship_address',$insert);
  $query=$this->db->insert_id();
  return $query;
  
  }
  /*function get_variant_id($product_id)
  {
	 $this->db->select('variant_id');
	 $this->db->where_in('product_id',$product_id);
          $query=$this->db->get('shopify_product_variant');
          $query->result_array();
  }*/
}


?>
