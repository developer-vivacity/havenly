<?php

Class Site extends CI_Controller 
{

         public $insertdata;	
         
         public $_File_Location;

function __construct() 
{
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Users/picture_model');
	$this->load->model('room_model');
	$this->load->model('user_model');
	$this->load->model('admin_model');
	$this->load->model('preference_model');
	$this->load->model('product_model');
		
}
	
	function index() 
	{
	
		
		 $this->load->view('Admin/home');
		
	}
	
function open_contests() 
{
		$password = $this->input->post('password');
		if($password =="stitch"){
		$data['room_data']=$this->room_model->get_open_rooms();
		$this->load->view('Admin/Open_rooms', $data);
		}
		else
		{
			$data['error']= 'Wrong Password';
			$this->load->view('Admin/home', $data);
		}
	
}
function show_contest()
{
		$room_id = $this->uri->segment (4);
		$data['room_data']=$this->room_model->get_room($room_id);
		$room_type = $data['room_data'][0]['room_type'];
		$user_id = $data['room_data'][0]['user_id'];
		$data['user_prefs']=$this->user_model->get_user_prefs($user_id, $room_type);
		$data['user']=$this->user_model->get_user($user_id);
		$this->load->view('Admin/Room_View', $data);
 }

	function change_status()
	{
		$room_id = $this->uri->segment(4);
		$status = $this->input->post('status');
		$this->room_model->change_status($room_id, $status);
		$data['room_data']=$this->room_model->get_open_rooms();
		$this->load->view('Admin/Open_rooms', $data);
   }

function adminlogin()
{
   
     $this->product_model->create_table();
     $this->admin_model->create_table();
   
   if(($this->session->userdata('adminid')!=""))
     {
      $data['privileges']=$this->session->userdata('privileges');
      $this->load->view('Admin/adminview',$data);
      return;
    }

    $this->load->library('form_validation');
   $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[100]|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
   if($this->form_validation->run() == FALSE)
   {
   $this->load->view('Admin/adminlogin');
   }
   else
   {
     $this->admin_model->authorize_user($this->input->post('password'),$this->input->post('username'));
     if(($this->session->userdata('adminid')!=""))
     {
      $data['privileges']=$this->session->userdata('privileges');
      $this->load->view('Admin/adminview',$data);
     }
     else
     {
      $data['error']="User name or password is incorrect!";
      $this->load->view('Admin/adminlogin',$data);
     }
  }
}
function adminlogout()
{
    $newdata = array('adminid' =>'','name' =>'','privileges' => '');
    $this->session->unset_userdata($newdata );
    $this->session->sess_destroy();
    $this->adminlogin();
}
function roomsadministrator($orderby=null,$ordertype=null)
{
      if(($this->session->userdata('adminid')==""))
      {
	  $this->adminlogin();
	  return;
     }
      $condition="";
      if($this->session->userdata('privileges')=="local") 
      {  
       $condition=" where designer.id=".$this->session->userdata('designerid')." and user_rooms.status!='closed'";
      }
     if((!empty($orderby)&!empty($ordertype))&(($orderby=='users.email')|($orderby=='user_rooms.id')|($orderby=='user_rooms.status')|($orderby=='user_rooms.room_type')|($orderby=='designer.designer_name'))&($ordertype=='asc' | $ordertype=='desc')) 
      {  
      $ordertype    = ($ordertype=="asc"?"desc":"asc");
      $orderby=$condition." order by ".$orderby." ". $ordertype;
      $data["adminrooms"]=$this->room_model->display_all_rooms($orderby);
      
      $data["filter"]=$ordertype;
      }      
      else
      {      
      $data["adminrooms"]=$this->room_model->display_all_rooms($condition);   
      $data["filter"]="asc";
      }
      $data['privileges']=$this->session->userdata('privileges');
      $this->load->view('Admin/roomsadministrator',$data);
}
function currentroomwithuser($room_id=null)
{
	$orderby="";
    if(($this->session->userdata('adminid')!=""))
     {
	   
	   $orderby=$this->input->post('ascproductid');
	   $condition=($this->session->userdata('privileges')=="local"?" where designer.id=".$this->session->userdata('designerid')." and user_rooms.status!='closed' and user_rooms.id=".intval($room_id)."":" where  user_rooms.id=".intval($room_id)."") ;
	   $adminrooms=$this->room_model->display_all_rooms($condition);
	   $data["roomid"]=$room_id;
	   $data["roomwithuser"]=$this->room_model->displayusreinformationwithroom(intval($room_id));
	
	   $data["colorstyle"]=$this->room_model->fetch_color_style_number();
	
	   $data["userroomdetails"]=$this->admin_model->get_additional_details_user_room(intval($room_id));
	 
	   $data["selectproduct"]= $this->product_model->save_product_associated_with_room(intval($room_id));
	   $data["designassociaterooms"]=$this->product_model->userdesign(intval($room_id));
	   
	   $data["roompicture"]=$this->room_model->display_user_room_pic($data["roomwithuser"][0]->user_id);
                 
            $data["roomvedio"]=  $this->room_model->display_user_room_video($data["roomwithuser"][0]->user_id);
            
	   
	   if(sizeof($adminrooms)!=0)
            $this->load->view('Admin/currentroomwithuser',$data);
            else
	   $this->adminlogin();
     }
     else
     {
	  $this->load->view('Admin/adminlogin');
     }
}

function productdetails($room_id=null,$user_id=null,$design_id=null)
{
   

     if(($this->session->userdata('adminid')!=""))
     {
	 if($room_id!="")
	 {
		
	   $data["roomid"]=$room_id;
           $data["userid"]=$user_id;
           $data["designid"]=$design_id;
           
           $data["selectproduct"]= $this->product_model->save_product_associated_with_room(intval($room_id),"","","");
         
           $data["producttype"]=$this->product_model->product_type();
	 
	   $data["productcolortype"]=$this->product_model->color_type();
	 
	   $data["productmaterialtype"]=$this->product_model->product_material();
	 
	   $data["productstyle"]=$this->product_model->product_style();
	 
	   $data["userdesign"]=$this->product_model->userdesign(intval($room_id),intval($design_id));
	   

          $data["productwithdesign"]=$this->product_model->productassociatewithdesign(intval($room_id),intval($design_id));

	 if($this->input->post("hidproductsearch")=="search")
	 $data["productdetails"]=$this->product_model->search_product($this->input->post('productsearchbyname'),$this->input->post("searchoptionfortype"),$this->input->post("searchoptionforprice"),$this->input->post("searchoptionforcolor"),$this->input->post("searchoptionforstyle"),$this->input->post("searchoptionformaterial"));
          else if($this->input->post("hidproductsearch")=="sort")
          $data["productdetails"]= $this->product_model->product_sort_by_type($this->input->post("hidproducttypecheck"),$this->input->post("hidproductstylecheck"),$this->input->post("hidproductmaterialtypecheck"),$this->input->post("hidproductcolortypecheck"),$this->input->post("searchoptionforprice"));
	 else
	 $data["productdetails"]=$this->product_model->get_all_product();
	 
	 $data["productshow"]=($this->input->post("hidproductsearch")=="search"?"block":($this->input->post("hidproductsearch")=="sort"?"block":($this->input->post("hidproductsearch")=="SaveSelected"?"block":"none")));
          
          $this->load->view('Admin/displayproducts',$data);
         }
         else
         {
          $this->adminlogin();
         }
   }
   else
   {
	$this->load->view('Admin/adminlogin');
	
    }
}

function update_room_status_by_admin()
{
	$roomdata=array('room_type'=>$this->input->post('update_room_type'),'status'=>$this->input->post('update_room_status'));
	$preferencedata=array('room_type'=>$this->input->post('update_room_type'));
	$this->room_model->updateroominfowithid($this->input->post('userroomid'),$roomdata);
	$this->preference_model->updateuserpreferenceinfowithid($this->input->post('userid'),$preferencedata);
	$this->roomsadministrator();
}
function additional_details_user_room($room_id=null)
{
	if(($this->session->userdata('adminid')==""))
	{
		$this->load->view('Admin/adminlogin');
		return;
		
	}
	$room_id=intval($room_id);
	if($_POST)
	{
		
		$data=array('room_id'=>$this->input->post('roomid'),'Style_notes'=>$this->input->post('stylenotes'),'Ceiling_Height'=>$this->input->post('ceilingheight'),'Hates'=>$this->input->post('hates'),'Likes'=>$this->input->post('likes'),'Keep'=>$this->input->post('keep'),'Buy'=>$this->input->post('itemsbuy'));
		$querytype=$this->input->post('querytype');
		$this->admin_model->get_additional_details_user_room($this->input->post('roomid'),$data,$querytype);
		$this->adminlogin();
	}
	else
	{
		
      if($room_id!="") 
      {  
         $condition= ($this->session->userdata('privileges')=="local"? " where designer.id=".$this->session->userdata('designerid')." and user_rooms.status!='closed' and user_rooms.id=".$room_id."" : " where user_rooms.id=".$room_id."");
         $data["adminrooms"]=$this->room_model->display_all_rooms($condition);
          if(sizeof($data["adminrooms"])>0)
          {
			 
               $data["additionalroomdetails"]=$this->admin_model->get_additional_details_user_room($room_id);
	   
	      $data["roomid"]=$room_id;
	      $this->load->view('Admin/userroomdetailsbyadmin',$data);
	      }
	      else
	      {
			  $this->adminlogin();  
	      }
      }
		else
		{
	       $this->adminlogin();
	       
	    }
    }
}
function upload_design_pic_by_admin($filename=null,$userroomid=null,$userid=null,$designid=null)
{

     $return_data=array();
     $name="uploadfile";
     $message= $this->for_pic_upload($name);
     
     if($this->insertdata==0)
     {
         
         $return_data["success"]="error";       
         $return_data["images"]=$this->_File_Location;
    }
     else
     {
         $this->product_model->upload_design_info_user_room_design($userid,$userroomid,$this->_File_Location,'proposed',$designid);
         $return_data["success"]="success";       
         $return_data["images"]= $this->_File_Location;
     }
     echo json_encode($return_data);
}


function for_pic_upload($filename=null)
{
                                 $this->insertdata=1;
                                 $this->image_path= realpath(APPPATH.'/images');
		               $name=$filename;
                                 $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG");//allowed to be uploaded
		               $extension = end(explode(".", $_FILES[$name]["name"]));
				if ((($_FILES[$name]["type"] == "image/gif")
				|| ($_FILES[$name]["type"] == "image/jpeg")
				|| ($_FILES[$name]["type"] == "image/png")
				|| ($_FILES[$name]["type"] == "image/pjpeg")
				|| ($_FILES[$name]["type"] == "image/jpg"))
				&& ($_FILES[$name]["size"]< 3000000)//less than a certain size
				&& in_array($extension, $allowedExts))
				{
					
                                     if ($_FILES[$name]["error"] > 0)
							{
                                                    $this->insertdata=0;								
                                                    $error ='error loading file';
				                return json_encode ($error);
								
                                                             
                                                           }
					else {
					
						      $file_location = $_FILES[$name]['tmp_name'];
										
						
							$file_name = $this->set_file_name();
							if ($file_name==0) {$file_name = $this->set_file_name();}
							else
							{
						         $file_name = $file_name.'.'.$extension;
							$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
							$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
							if($s3result)
							{
							   $this->_File_Location="https://s3.amazonaws.com/easableimages/".$file_name;
                                                                  $insertdata=1;
							   unlink ($file_location);
							}
							else 
							{
                                                                  $this->insertdata=0;
							   return 'Sorry!  Try again';
							}
							}
		
                            }
                          }

}
function set_file_name()
{
		$file_name= random_string('numeric',9);
		$exists=$this->picture_model->check_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
}
function assign_product()
{	
    if($this->input->post("holddesignidforroom")!="")
    {   $value=$this->input->post("holddesignidforroom");
        $assing_product=array();
        $assing_product[$value]=$this->input->post("assign_".$value);
     }
     else
     $assing_product["product"]=$this->input->post("assign_7u7");
     if($_POST & ($this->input->post("hidproductsearch")!="search") & ($this->input->post("hidproductsearch")!="sort"))
     $this->product_model->save_product_associated_with_room($this->input->post("currentroomid"),$assing_product,$this->input->post("Design_Plan"),$this->input->post("holddesignidforroom"));	
     $this->productdetails($this->input->post("currentroomid"),$this->input->post("currentuserid"),$this->input->post("holddesignidforroom"));
}

function add_product()
{
	
	if(($this->session->userdata('adminid')==""))
	{
		$this->load->view('Admin/adminlogin');
		return;
		
	}if($_POST)
		{
			
		$holdlinkuploadimg=array();	 
               $i=0;
	    
	    while($i<=4)
	    {
	     if(!empty($_FILES['uploadproductpic'.$i]['name']))
             {
			
			 $this->for_pic_upload('uploadproductpic'.$i);
			 
		     $holdlinkuploadimg[sizeof($holdlinkuploadimg)]=$this->_File_Location;	 
		 }
		 $i++;
	     }		
		
		$holdlinkuploadimg[sizeof($holdlinkuploadimg)]=$this->input->post("productweblink");
		 
		 $typehiddenfilter=$this->input->post("typehiddenfilterid");
		 $stylehiddenfilter=$this->input->post("stylehiddenfilterid");
		 $colorhiddenfilter=$this->input->post("colorhiddenfilterid");
		 $materialhiddenfilter=	$this->input->post("materialhiddenfilterid");
	   
	    if($this->input->post("typehiddenfilter")!="")
	    {
	      $arrayaddtypefilter=explode(',',$this->input->post("typehiddenfilter"));	    
	      foreach($arrayaddtypefilter as $key=>$value)
	       {
		 
			$data=array('type'=>$value);
		   	$newtypeid=$this->product_model->insert_data_in_db('product_type',$data);
			$typehiddenfilter=($typehiddenfilter==""?$newtypeid:$typehiddenfilter.','.$newtypeid);
		
	       }
	    }
	    
		if($this->input->post("stylehiddenfilter")!="")
	    {
			 $arrayaddstylefilter=explode(',',$this->input->post("stylehiddenfilter"));
		   foreach($arrayaddstylefilter as $key=>$value)
		   {
			 
			$data =array('style'=>$value);
	        $newstyleid=$this->product_model->insert_data_in_db('product_style',$data);		
	        $stylehiddenfilter=($stylehiddenfilter==""?$newstyleid:$stylehiddenfilter.','.$newstyleid);
		  }
	   }
	  if($this->input->post("colorhiddenfilter")!="")
	  {
		 $arrayaddcolorfilter=explode(',',$this->input->post("colorhiddenfilter"));
		foreach($arrayaddcolorfilter as $key=>$value)
		{
			$data =array('color'=>$value);
			$newcolorid=$this->product_model->insert_data_in_db('product_colors',$data);
			$colorhiddenfilter=($colorhiddenfilter==""?$newcolorid:$colorhiddenfilter.','.$newcolorid);
		}
	}
	
	if($this->input->post("materialhiddenfilter")!="")
	 {
		   $arrayaddmaterialfilter=explode(',',$this->input->post("materialhiddenfilter"));
		foreach($arrayaddmaterialfilter as $key=>$value)
		{
			$data =array('material'=>$value);
			$newmaterialid=$this->product_model->insert_data_in_db('product_material',$data);
			$materialhiddenfilter=($materialhiddenfilter==""?$newmaterialid:$materialhiddenfilter.','.$newmaterialid);
		}
	}	
	 $typehiddenfilter=explode(',',$typehiddenfilter);
          sort($typehiddenfilter);
          $typehiddenfilter=implode(',',$typehiddenfilter);

          $stylehiddenfilter=explode(',',$stylehiddenfilter);
          sort($stylehiddenfilter);
          $stylehiddenfilter=implode(',',$stylehiddenfilter);

          $colorhiddenfilter=explode(',',$colorhiddenfilter);
          sort($colorhiddenfilter);
          $colorhiddenfilter=implode(',',$colorhiddenfilter);

          $materialhiddenfilter=explode(',',$materialhiddenfilter);
          sort($materialhiddenfilter);
          $materialhiddenfilter=implode(',',$materialhiddenfilter);

          $data=array('vendor_id'=>$this->input->post("vender"),'product_name'=>$this->input->post("product_name"),'price'=>$this->input->post("Price"),
'rent_price'=>$this->input->post("rentprise"),'ship_cost'=>$this->input->post("ship_cost"),'qty_in_stock'=>$this->input->post("qty_in_stock"),'link'=>$holdlinkuploadimg[0],'product_type_id'=>$typehiddenfilter.',','product_color_id'=>$colorhiddenfilter.',','product_material_id'=>$materialhiddenfilter.',','product_style_id'=>$stylehiddenfilter.',','description'=>$this->input->post("description"),'dimensions'=>$this->input->post("dimention"),'note'=>'');
		
	   $product_id=$this->product_model->insert_data_in_product_table($data);

	   $this->product_model->insert_image_link_with_product_id($product_id,$holdlinkuploadimg);
	   
	   $data['message']="Product details has been saved";
				
	}
		
		
		$data['vendors']= $this->product_model->get_vendors_details();
		$this->load->view('Admin/addproduct',$data);
	    
}
function search_text_for_ajax($text=null,$id=null)
{

	    $data['filtertext']=$this->product_model->product_search($text,$id);
             echo json_encode($data['filtertext']);
	
}

function product_details_on_hover($id=null)
{
   	$data['filtertext']=$this->product_model->product_details_by_id($id);
   	echo json_encode($data['filtertext']);
	
}

function display_product_name_associate_with_design($design_id=null,$designname=null,$room_id=null,$current_user_id=null)
{
	if(($this->session->userdata('adminid')==""))
	{
		$this->load->view('Admin/adminlogin');
		return;
		
	}
	
	$data['roomid']=$room_id;
         $data['designid']=$design_id;
	$data['designname']=urldecode($designname);
         $data['designdetail']=$this->product_model->userdesign($room_id,$design_id);
     
	$data['productassign']=$this->product_model->display_design_associated_products($design_id);
	    
	$data['designimage']=$this->product_model->design_image_for_rooms($room_id,$design_id);
         
         $data['currentuserid']=$current_user_id;
         
         $this->load->view('Admin/assignproductdesign',$data);
         
}
function Add_Design_For_Room($room_id=null,$design_name=null,$design_id=null,$user_id=null,$design_status=null)
{
	
	    $design_id=($design_status==null?$this->product_model->Add_Design_For_Room($room_id,urldecode($design_name),$design_id):$this->product_model->Add_Design_For_Room($room_id,"null",$design_id,$design_status));
	   ($user_id==null?redirect('/Admin/site/currentroomwithuser/'.$room_id.'','refresh'):($user_id=="null"?redirect('/Admin/site/currentroomwithuser/'.$room_id.'','refresh'):redirect('/Admin/site/productdetails/'.$room_id.'/'.$user_id.'/'.$design_id.'','refresh')));
           
}

}
