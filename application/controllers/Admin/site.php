<?php

Class Site extends CI_Controller 
{

         public $insertdata;	
         public $_File_Location;
         public $_add_new_design;
         public $sendmailval;

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
	$this->load->model('designer_model');
	$this->load->model('concept_model');
		
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
    $this->concept_model->create_table();
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
	redirect('/Admin/site/adminlogin', 'refresh');
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
	  $data['designers']=$this->designer_model->get_designers();
      $data['privileges']=$this->session->userdata('privileges');
      $this->load->view('Admin/roomsadministrator',$data);
}
function currentroomwithuser($room_id=null,$updatetype=null)
{
	
/*------------------------------ Add Additional Notes -----------------------------------------------------*/
             if($_POST)
	    {
		    
	    $data=array('room_id'=>$this->input->post('roomid'),'Style_notes'=>$this->input->post('stylenotes'),'Ceiling_Height'=>$this->input->post('ceilingheight'),'Hates'=>$this->input->post('hates'),'Likes'=>$this->input->post('likes'),'Keep'=>$this->input->post('keep'),'Buy'=>$this->input->post('itemsbuy'));
		$querytype=$this->input->post('querytype');
		$this->admin_model->get_additional_details_user_room($this->input->post('roomid'),$data,$querytype);
         redirect('/Admin/site/currentroomwithuser/'.$this->input->post('roomid').'/urd', 'refresh');   
                  
            }

   $data['curdisplay']=(isset($updatetype)?$updatetype:'');

/*-------------------------------------------------------------------------------------------*/   
    if(($this->session->userdata('adminid')!="") && (sizeof($this->room_model->displayusreinformationwithroom(intval($room_id)))<>0))
     {
	   
	   $orderby=$this->input->post('ascproductid');
	   $condition=($this->session->userdata('privileges')=="local"?" where designer.id=".$this->session->userdata('designerid')." and user_rooms.status!='closed' and user_rooms.id=".intval($room_id)."":" where  user_rooms.id=".intval($room_id)."") ;
	   $adminrooms=$this->room_model->display_all_rooms($condition);
	   $data["roomid"]=$room_id;
	   $designer_email=$this->room_model->designer_email($room_id);
	   if($designer_email){
	   foreach ($designer_email as $des)
	   {
		$userdata=array('designer_email'=>$des->designer_email);
		
		}
		$this->session->set_userdata($userdata);
		}
	   
	   $data["roomwithuser"]=$this->room_model->displayusreinformationwithroom(intval($room_id));
	   
	   $data["conceptboard"]=$this->concept_model->admin_display($room_id);
            
       $data["colorstyle"]=$this->room_model->fetch_color_style_number();
	   
	   $data["userroomdetails"]=$this->admin_model->get_additional_details_user_room(intval($room_id));
	 
	   $data["selectproduct"]= $this->product_model->save_product_associated_with_room(intval($room_id));
	 
	   $data["designassociaterooms"]=$this->product_model->userdesign(intval($room_id));
	   
	   $data["roompicture"]=$this->room_model->display_user_room_pic($data["roomwithuser"][0]->user_id);
                 
       $data["roomvedio"]=  $this->room_model->display_user_room_video($data["roomwithuser"][0]->user_id);
          
          /*---------------------------------------------------------------------------------------*/
          /*------------ Add Additional Notes -----------------------------------------------------*/
          /*---------------------------------------------------------------------------------------*/
             
             $condition= ($this->session->userdata('privileges')=="local"? " where designer.id=".$this->session->userdata('designerid')." and user_rooms.status!='closed' and user_rooms.id=".$room_id."" : " where user_rooms.id=".$room_id."");
             $data["adminrooms"]=$this->room_model->display_all_rooms($condition);
             
             if(sizeof($data["adminrooms"])>0)
             {
	       
	          $data["additionalroomdetails"]=$this->admin_model->get_additional_details_user_room($room_id);
	   
	          $data["roomid"]=$room_id;
	      
	         }
            
	/*--------------------------------------------------------------------------------------*/
	/*---------------------------------------------------------------------------------------*/
                      
	   if(sizeof($adminrooms)!=0)
            $this->load->view('Admin/currentroomwithuser',$data);
            else
	   $this->adminlogin();
     }
     else
     {
	  
	  redirect('/Admin/site/roomsadministrator', 'refresh');
     }
}
function update_room_status_by_admin()
{
	$roomdata=array('status'=>$this->input->post('update_room_status'));
	
	$this->room_model->updateroominfowithid($this->input->post('userroomid'),$roomdata);
	
		if($_POST)
	{
	   if($this->sendmailval!=1)
	   {
	      $userdata=$this->user_model->user_getall($this->input->post('userid'));
	      
	      $this->send_mail($userdata[0]->email,$this->input->post('update_room_status'),$this->input->post('statuscomment'));
	      
            }
            
         }
         redirect('/Admin/site/roomsadministrator', 'refresh');
	
}

function assign_designer(){
	$user_id=$this->input->post('user_id');
	$designer_name=$this->input->post('designer_name');
	
	$ids=$this->designer_model->get_designer_id($designer_name);
	$designer_id = $ids[0]->id;
	
	$this->designer_model->assign_designer($user_id, $designer_id);
	echo 'Saved';
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
					
						     $file_location = $_FILES[$name]['tmp_name'];$file_name = $this->set_file_name();
							if ($file_name==0) {$file_name = $this->set_file_name();}
							else
							{
						         $file_name = $file_name.'.'.$extension;
							$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
							$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
							if($s3result)
							{
							   $this->_File_Location="http://s3.amazonaws.com/easableimages/".$file_name;
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
function assign_product($room_id=null,$user_id=null,$design_id=null)
{	
	
 if($_POST)
 {
     if($this->input->post("holddesignidforroom")!="")
     {   
        $value=$this->input->post("holddesignidforroom");
        $assign_product=array();
        $assign_product[$value]=$this->input->post("assign_".$value);
     }
     else
     {
      $assign_product["product"]=$this->input->post("assign_7u7");
     }
     
    $this->product_model->save_product_associated_with_room($this->input->post("currentroomid"),$assign_product,$this->input->post("Design_Plan"),$this->input->post("holddesignidforroom"));	
    $this->_add_new_design=1;     
    $this->Add_Design_For_Room($this->input->post("currentroomid"),rtrim(base64_encode($this->input->post("holddesignname")),'='),$this->input->post("userdesign"),$this->input->post("currentuserid"),$this->input->post("design_status"),'notthis');
     }
   
   else
   {
	$this->productdetails($room_id,$user_id,$design_id);
	   	   
   } 
}


function Add_Design_For_Room($room_id=null,$design_name=null,$design_id=null,$user_id=null,$design_status=null,$product_details=null)
{

     
          $designer_notes=null;
         
	if(isset($_POST["designroomid"])&&isset($_POST["AddDesigntext"])&&isset($_POST["designuserid"]))
         	 
	{		
		$room_id=$this->input->post("designroomid");
		$design_name=rtrim(base64_encode($this->input->post("AddDesigntext")),'=');
		$user_id=$this->input->post("designuserid");
		$design_status=null;
	}
		
	
	 if(isset($_POST["designer_notes"]))
	 {
		 $designer_notes = $_POST["designer_notes"];
	 }
	
      $design_id=($design_status==NULL?$this->product_model->Add_Design_For_Room(base64_decode($design_name),$design_id, $room_id):$this->product_model->Add_Design_For_Room(base64_decode($design_name),$design_id,$room_id,$design_status,$designer_notes));
      ($product_details==null?redirect('/Admin/site/productdetails/'.$room_id.'/'.$user_id.'/'.$design_id.'','refresh'):redirect('/Admin/site/display_product_name_associate_with_design/'.$design_id.'/'.$design_name.'/'.$room_id.'/'.$user_id.'','refresh'));
	
	
	
}


function productdetails($room_id=null,$user_id=null,$design_id=null)
{
   
  if(($this->session->userdata('adminid')!=""))
     {
	
	 if($room_id!="" && $user_id!="" && $design_id!="")
	 {
	
	    if($this->product_model->valid_user($room_id,$user_id,$design_id)==0)
	    {
			redirect('/Admin/site/roomsadministrator', 'refresh');
	    }
	     
			$data["roomid"]=$room_id;
            $data["userid"]=$user_id;
            $data["designid"]=$design_id;
           
            $data["selectproduct"]= $this->product_model->save_product_associated_with_room(intval($room_id),"","","");
            $data["producttype"]=$this->product_model->product_type();
			$data["productcolortype"]=$this->product_model->color_type();

			$data["productmaterialtype"]=$this->product_model->product_material();
			$data["productstyle"]=$this->product_model->product_style();
	  
			$data["userdesign"]=$this->product_model->userdesign(intval($room_id),intval($design_id));
			$data["designimage"]=$this->product_model->design_image_for_rooms($room_id,$design_id);   
           
           //var_dump($data["designimage"]);
           //die();
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
	
	redirect('/Admin/site/adminlogin', 'refresh');
    }
}




function add_product()
{
      if($_GET)
      {
	  if(($_GET['r']=="") || ($_GET['u']=="") || ($_GET['d']==""))
	  {
		redirect('/Admin/site/roomsadministrator', 'refresh');
       }
	  else if($this->product_model->valid_user($_GET['r'],$_GET['u'],$_GET['d'])==0)
	  {
	   redirect('/Admin/site/roomsadministrator', 'refresh');
	  }
          $data['roomid']=$_REQUEST['r'];
		  $data['userid']=$_REQUEST['u'];
		  $data['designid']=$_REQUEST['d'];
       }	
	  if(($this->session->userdata('adminid')==""))
	  {
	   redirect('/Admin/site/adminlogin', 'refresh');
	  }
	  
	  if($_POST)
		{
		  
		 $holdlinkuploadimg=array();	 
          $i=0;
		  $count=0;
	    
	    while($i<=5)
	     {
	         if(!empty($_FILES['uploadproductpic'.$i]['name']))
                 {
			
				$this->for_pic_upload('uploadproductpic'.$i);
			 	$holdlinkuploadimg[sizeof($holdlinkuploadimg)]['filename']=$this->_File_Location;
				if ($i==0)
					{$holdlinkuploadimg[sizeof($holdlinkuploadimg)]['type']='main';}
					else{$holdlinkuploadimg[sizeof($holdlinkuploadimg)]['type']=NULL;}
					
	        }
		 $i++;
	     }
		
		$count = sizeof($holdlinkuploadimg);
		$i=0;
		 while ($count<=5){
		 			
			if($this->input->post('productweblink'.$count)){		
			 $holdlinkuploadimg[$i]['filename']=$this->input->post('productweblink'.$count);
			 $holdlinkuploadimg[$i]['type']='main';
			 if ($i>0)
			 {
				 $holdlinkuploadimg[$i]['type']=NULL;
				
			}
			$i++;
			
		 }
		 $count++;
		 }
		 
		
		$typehiddenfilter=$this->input->post("typehiddenfilterid");
		$stylehiddenfilter=$this->input->post("stylehiddenfilterid");
		$colorhiddenfilter=$this->input->post("colorhiddenfilterid");
		$materialhiddenfilter=$this->input->post("materialhiddenfilterid");
	   
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
		'ship_cost'=>$this->input->post("ship_cost"),'qty_in_stock'=>$this->input->post("qty_in_stock"),
		'weblink'=>$this->input->post('website'),'product_type_id'=>$typehiddenfilter.',','product_color_id'=>$colorhiddenfilter.',','product_material_id'=>$materialhiddenfilter.',',
		'product_style_id'=>$stylehiddenfilter.',','description'=>$this->input->post("description"),'dimensions'=>$this->input->post("dimention"),'note'=>'',);
		
	   $product_id=$this->product_model->insert_data_in_product_table($data);

	   $this->product_model->insert_image_link_with_product_id($product_id,$holdlinkuploadimg);
	   
			$data['message']="Product details have been saved";
			$data['roomid']=$_POST['room_hid'];
			$data['userid']=$_POST['user_hid'];
			$data['designid']=$_POST['design_hid'];		
	}
		
		   
		 
		  
		 $data['vendors']= $this->product_model->get_vendors_details();
		 $this->load->view('Admin/addproduct',$data);
	    
}

function add_design_comment ()
{

        $designer_notes = $this->input->post('designer_notes');
        $design_id = $this->input->post('design_id');
        
        $this->product_model->update_designer_notes($design_id,$designer_notes);
        echo ('success');
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
		
		redirect('/Admin/site/adminlogin', 'refresh');
	}
		$isvalid=  $this->admin_model->is_valid_user($design_id,$room_id,$current_user_id);
         if($isvalid!=0)
	{
			$data['roomid']=$room_id;
			$data['designid']=$design_id;
			$data['designname']=base64_decode($designname);
			$data['designdetail']=$this->product_model->userdesign($room_id,$design_id);
			$data['productassign']=$this->product_model->display_design_associated_products($design_id);
	    

			$data['designimage']=$this->product_model->design_image_for_rooms($room_id,$design_id);
           
				$data['designcolor']= $this->product_model->get_paint_color($design_id);
				$data['currentuserid']=$current_user_id;
				$this->load->view('Admin/assignproductdesign',$data);
        }
        else
        {
	             
	       redirect('/Admin/site/roomsadministrator','refresh');
        }
}



function update_design_basics()
{
 
  if($_POST)
  {
     $data=array("design_name"=> $_POST["designname"],"designer_notes"=>$_POST["designnotes"],"status"=>$_POST["status"] );
     $this->product_model-> update_assignproducts($_POST["designid"],$data);
    // redirect('/Admin/site/currentroomwithuser/'.$_POST['desinerholdroomid'].'','refresh');
  }


}



function paint_colors_for_design()
{
	if($_POST)
	{
        if(isset($_POST["work"]))  
        {           

           $this->product_model->paint_color_delete($_POST["designid"], $_POST["paintid"]);
 
          }          
           else
           {
            $currentid=$this->product_model->paint_colors_for_design($_POST["designid"],$_POST["rgbpaint"],$_POST["comment"]);
            echo $currentid;           
           }          
        }
}

function designer_availability($user_id=null,$designer_id=null)
{
    if(($this->session->userdata('adminid')!=""))
     { 
	 if(is_null($user_id) || is_null($designer_id))
	 {
	 redirect('/Admin/site/roomsadministrator','refresh');
          }
	
	 $this->designer_model->create_table();
	
	 $date=date("Y-m-d h:i:s");
	
	 $data['date']=date("Y-m-d h:i:s a");
	
	 $data['startdate']=date("h");
          $data['dateformat']=date("A");
	
	 $data['enddate']=date("H",strtotime("$date +24 hours"));
	 $data['display']='admin';
	 $data['selectdate']=$this->designer_model->availability($data);
          
          $data['currentday']=date('d');
	 
	 $data['weekday']=date('D');
	 $data['numday']=date('w');
	 $data['maxdays']=date('t');
	 $data['currentmonth']=date('m');
	 $data['sortyear']=date('y');
	 $data['fullyear']=date('Y');
	 $data['designerid']=$designer_id;
	
	
	 $this->load->view('Admin/designer_availability.php',$data);
    }
   else
    {
	
	redirect('/Admin/site/adminlogin', 'refresh');
	
    }
	
}
function assign_date_time_user()
{
	
          $datetime=$_POST['designtime'];
          
          $designerid=$_POST['designerid'];
         
          $datetime=date('Y:m:d H:i:s',strtotime($datetime));
          
          if(!is_null($designerid))
          {
            $this->designer_model->insert_designer_availability($datetime,$designerid);	
            echo "success";
          }
           
          
          
}
function upload_image_for_concept_board($filename=null,$roomid=null)
{
	
       $this->for_pic_upload($filename);
       if($this->insertdata==0)
       {
		$return_data["success"]="error";       
       }
       else
       {
		 $return_data["insertid"]=$this->concept_model->save_image_info($roomid,$this->_File_Location);
         $return_data["success"]="success";       
         $return_data["imagespath"]= $this->_File_Location;
       }
       echo json_encode($return_data);
}
function update_concept_board()
{
	
      	$this->concept_model->update_concept_board_status($_POST["roomid"],$_POST["conceptid"],$_POST["status"]);
      	echo "success";
	
}

function send_mail($_email,$update_room_type,$_data)
{
	if ($this->session->userdata('designer_email'))
	{$des_email = $this->session->userdata('designer_email');}
	
	  $this->sendmailval=1;
	
             $config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'hello@havenly.com',
			'smtp_pass'=>'Motayed2');
			
	        $this->load->library('email',$config);
	        $this->email->set_newline("\r\n");
		
			$this->email->from('hello@havenly.com','Your Havenly Designer');
			$this ->email->to($_email);
			
			if ($des_email!=NULL||$des_email!=""){
			$this->email->cc($des_email);}
			
			else {$this->email->cc('shelby@havenly.com');}
			$this->email->subject('Your Havenly Design');
		    $data["message"]=$_data;
		         
		    $data["updateroom"]=$update_room_type;
		         
			$this->email->message($this->load->view('Admin/update_email', $data, true));
			
		         if($this->email->send()) 
		         {
			  $data['message']= 'thank you';
		         }
			else 
			{
			  ob_start();
			  $this->email->print_debugger();
			  $error = ob_end_clean();
			  $errors[] = $error;
                           }	
	
}

function filter_products()

{

        $data["productdetails"]=$this->product_model->filter_products($this->input->post("typeid"),$this->input->post("colorid"),$this->input->post("styleid"),$this->input->post("materialid"));
        $data["selectedproducts"]=$this->input->post("productimage");
        $view=$this->load->view('Admin/productview', $data);
        echo $view;
        
}

function clear_filter()

{
        $data["productdetails"]=$this->product_model->get_all_product();
        $data["selectedproducts"]=$this->input->post("productimage");
        $view=$this->load->view('Admin/productview', $data);
        echo $view;


}



function text_search()

{
       $data["productdetails"]=$this->product_model->search_product_name($this->input->post('productname'));
        $data["selectedproducts"]=$this->input->post("productimage");
        $view=$this->load->view('Admin/productview', $data);
        echo $view;

}

function viewconceptproducts($id=NULL)
{

if ($id==NULL){$data['concept_id']=$this->uri->segment(4);}
else {$data['concept_id']=$id;}
$data['types']=$this->product_model->product_type();
$data['conceptproducts']=$this->concept_model->viewproducts($data['concept_id']);
$data['pc_id']=$this->load->view('Admin/conceptproduct',$data);
}

function addproductconcept(){
// $data['count'] = $this->input->post('count');
$concept_id = $this->input->post('concept_id');
$category  = $this->input->post('category');
$filename  = $this->input->post('weblink');
$price = $this->input->post('price');

$data['id']=$this->concept_model->save_product_concept($concept_id, $category, $filename, $price);
$data['types']=$this->product_model->product_type();
$data['concept_id']=$concept_id;
$this->viewconceptproducts($concept_id);
}

function deleteproductconcept(){
$product_id = $this->uri->segment(5);
$concept_id = $this->uri->segment(4);
$this->concept_model->deleteproductconcept($product_id);
$this->viewconceptproducts($concept_id);
}

}
