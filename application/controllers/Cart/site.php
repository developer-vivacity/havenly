<?php

Class Site extends CI_Controller
{

    function __construct()
    {
    
    parent::__construct();
    
    $this->load->library('s3');
    $this->load->library('session');
    $this->load->model('cart_model');
    $this->load->model('product_model');
    
    }
    
   //--product display which associate with design.....................
   function products_associate_design($design_id=null)
   {

     	if($this->session->userdata('first_name')!="")
     	{
     	   
     	     if($_POST & isset($_POST["holdproductidfordesign"]) & isset($_POST["holdroomid"]))
     	     {
		 
		  $this->cart_model->insert_product_for_design($_POST["holdproductidfordesign"],$_POST["holdroomid"],$design_id);
	     }
     	   $data["productname"]=$this->product_model->display_design_associated_products($design_id);
	   $data["designimage"]=$this->product_model->design_image_for_rooms(null,$design_id);
	   $data["room_type"]=$this->cart_model->Check_user_rooms();
	   $data["choose_room_color"]=$this->cart_model->color_pic_login_user();
	   $data["colorcode"]=$this->cart_model->room_color();
	   $data["shoppingproduct"]=$this->cart_model->getproductinshoppingcard($design_id);
	   $data["designid"]=$design_id;
	
	   $this->load->view('Cart/shoppingcart', $data);
	 }
         else
         {
	 $data["title"]="Login";
          $this->load->view('Users/login', $data);	
	}
	  
   }
  function add_or_update_cart()
  {
	$this->cart_model->updateshoppingcart($_POST["productid"],$_POST["roomid"],$_POST["designid"],$_POST["type"]);
  }
  function product_details_of_design($productid)
  {
	 $data["productid"]=$productid;
	 $data["productdetails"]=$this->product_model->get_all_product($productid);
          $data["qty"]=$this->cart_model->get_product_qty($productid);
	 $this->load->view('Cart/productdetails', $data);
   }  
  function update_or_insert_qty()
  {
	if($this->session->userdata('first_name')=="")
     	{
	 $data["title"]="Login";
          $this->load->view('Users/login', $data);	
          return;
	}
	if($_POST)  
	{
	$data["details"]=$this->cart_model->get_design_login_user($_POST["holdproductid"]);	  
	$this->cart_model->update_insert_qty($_POST["totalvalueadd"],$_POST["holdproductid"],$data["details"][0]->room_id,$data["details"][0]->design_id);
	$this->products_associate_design($_POST["holdproductid"]);
	redirect('/Cart/site/products_associate_design/'.$data["details"][0]->design_id.'', 'refresh');
	}
  }
  function delete_assign_design($user_id,$room_id,$design_id)
  {
	$this->cart_model->delete_user_assign_design($user_id,$room_id,$design_id);  
	redirect('/Users/site/login', 'refresh');
  }
  
}


?>
