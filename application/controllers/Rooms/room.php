<?php

Class Room extends CI_Controller 
{
	public $imagepath;
  function __construct() 
  {
      parent::__construct();
      $this->load->model('room_model');
      $this->load->model('preference_model');
  }
   
 
  function editroominfo($id,$userid)
  {
    if($id!="")
    {
        
      $data["userid"]=$userid;
      $data["userselectcolorstyle"]=$this->preference_model->User_preference_information($userid);
      $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();

      $data["roomassociateduserid"]= $this->room_model->updateroom_loginuser($id);
      $this->load->view('Rooms/edituserroom', $data); 
    
    }
 
  }
 function roompicsuggestbyuser($name)
  {
            
       //die("hi");     
             //echo $_FILES['update_photo1']['type'];
	 //die();
           $allowedExts = array("gif", "jpeg", "jpg", "png");
        $extension = end(explode(".", $_FILES[$name]["name"]));
 if (($_FILES[$name]["type"] == "image/gif")|| ($_FILES[$name]["type"] == "image/jpeg")|| ($_FILES[$name]["type"] == "image/jpg" || ($_FILES[$name]["type"] == "image/pjpeg") || ($_FILES[$name]["type"] == "image/x-png") || ($_FILES[$name]["type"] == "image/png")) && ($_FILES[$name]["size"] < 20000) && in_array($extension, $allowedExts))
 
             {
				
				if ($_FILES["file"]["error"] > 0)
               {
               return "Return Code: " . $_FILES["file"]["error"];
               }
            else
            {
                   if (!file_exists(base_url().'application/images')) 
                   {
                    
                   mkdir(base_url().'application/images');
                   }
               move_uploaded_file($_FILES[$name]['tmp_name'],base_url().'application/images/'.$_FILES[$name]['name']);
               $this->imagepath= base_url().'application/images/'.$_FILES[$name]["name"];
              
               return "";
            }
              
      }
  else
  {
  return "Invalid file";
  }

             
  }
  function updateroominfo()
  {
	 $imagepath1="";
	 $imagepath2="";
	 if($_FILES['update_photo1']['name']!="" & $this->roompicsuggestbyuser('update_photo1')!="")  
     $imagepath1=$this->imagepath;
     if($_FILES['update_photo2']['name']!="" & $this->roompicsuggestbyuser('update_photo2')!="")  
     $imagepath2=$this->imagepath;
    
     $data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height'),'room_photo1'=>$imagepath1,'room_photo2'=>$imagepath2); 
     $this->room_model->updateroominfowithid($this->input->post('hold_id'),$data);
     $stylepic= $this->input->post('holdstyle').",";
     $colorpic =  $this->input->post('holdcolor').",";
     $data=array('style_pics'=>$stylepic,'color_pics'=>$colorpic, 'room_type'=>$this->input->post('update_room_type'));

     $this->preference_model->updateuserpreferenceinfowithid($this->input->post('holduserid'),$data);
    
     $this->load->helper('url');
    redirect('Users/site/login');
  }
  
}
?>
