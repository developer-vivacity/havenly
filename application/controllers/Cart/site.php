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
     	      $designInfo=$this->cart_model->get_design_info_by_id($design_id);
              
              if(sizeof($designInfo)==0)
              {              
               redirect('/Users/site/login', 'refresh');
              }    	     
             if($_POST & isset($_POST["holdproductidfordesign"]) & isset($_POST["holdroomid"]))
     	     {
		 
				$this->cart_model->insert_product_for_design($_POST["holdproductidfordesign"],$_POST["holdroomid"],$design_id);
			}
	    
     	   $data["productname"]=$this->product_model->display_design_associated_products($design_id,'submitted');
	  
		   $data["designforloginuser"]=$this->cart_model->get_design_login_user();
	   
	   if(sizeof($data["productname"])===0)
	   {
	     
		   
		  
			$designdata=array('designinfo'=>$designInfo[0]['design_name']);
			$this->session->set_userdata($designdata);
			redirect('/Users/site/login?a=designs', 'refresh');
            }
            else
            {
			 $data["designimage"]=$this->product_model->design_image_for_rooms(null,$design_id);
	         $data["room_type"]=$this->cart_model->Check_user_rooms();
	         $data["design_color"]=$this->cart_model->paint_colors_for_design($design_id);
	         $data["shoppingproduct"]=$this->cart_model->getproductinshoppingcart($design_id);
	         $data["designid"]=$design_id;
	           
	           
	     
	         $data["totalitemincart"]=$this->cart_model->updateshoppingcart(null,null,$design_id,null);
	         $data["totalitemincart"]=(sizeof($data["totalitemincart"])==0?0:$data["totalitemincart"][0]->total_qty);
		  
	    }
            
              
	     $this->load->view('Cart/shoppingcart', $data);
	 }
         else
         {
	
             redirect('/Users/site/login', 'refresh');
	}
	  
   }
  function add_or_update_cart()
  {
	$totalnum=$this->cart_model->updateshoppingcart($_POST["productid"],$_POST["roomid"],$_POST["designid"],$_POST["type"]);
	echo (sizeof($totalnum)==0?0:$totalnum[0]->total_qty);
  }
  function product_details_of_design($productid,$designid)
  {
		$data["productid"]=$productid;
		$data["designid"]=$designid;
		$data["productdetails"]=$this->product_model->get_all_product($productid);
		$data["qty"]=$this->cart_model->get_product_qty($productid,$designid);
		$this->load->view('Cart/productdetails', $data);
   }  
  function update_or_insert_qty()
  {
	if($this->session->userdata('first_name')=="")
     	{
	 redirect('/Users/site/login', 'refresh');
	}
	if($_POST)  
	{
          $data["details"]=$this->cart_model->get_design_login_user($_POST["holdproductid"]);	  
          $this->cart_model->update_insert_qty($_POST["totalvalueadd"],$_POST["holdproductid"],$data["details"][0]->room_id,$data["details"][0]->design_id);
	 $this->products_associate_design($_POST["holddesignid"]);
	 redirect('/Cart/site/products_associate_design/'.$data["details"][0]->design_id.'', 'refresh');
	}
  }
  function delete_assign_design($user_id,$room_id,$design_id,$type=null)
  {
	 $this->cart_model->delete_user_assign_design($user_id,$room_id,$design_id);  
	
	 if($type==null)
	 redirect('/Users/site/login', 'refresh');
	 else
	 redirect('/Admin/site/currentroomwithuser/'.$room_id.'', 'refresh');
  }
  function products_in_cart($design_id)
  {
       $data["designid"]=$design_id;
       $data["productincart"]=$this->cart_model->product_details_with_design();	  
       $this->load->view('Cart/productsincart',$data);  
  }
  function  promotion_code()
  {
	
	  $checkpromotioncode=$this->cart_model->valid_promotion_code($_POST['promotioncode'],$_POST['type']);	
	  
	  if(sizeof($checkpromotioncode)>0)
	  { 
		     if($checkpromotioncode[0]['status']==='active')
	             echo "1-@-".$checkpromotioncode[0]['design_fee_id']."-@-".$checkpromotioncode[0]['fee'];
                     else
                     echo "0-@-"."Design status inactive"; 
                      
             }
  
  }
  function get_design_fee()
  {
   $data= $this->cart_model->get_design_fee($_POST['designtype']);
   echo $data[0]['fee'];
  }
 
}


?>
