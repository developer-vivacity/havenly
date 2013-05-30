<?php

Class Room extends CI_Controller 
{
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
  function updateroominfo()
  {
      $data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height'),'room_photo1'=>$this->input->post('update_photo1'),'room_photo2'=>$this->input->post('update_photo2')); 
    $this->room_model->updateroominfowithid($this->input->post('hold_id'),$data);
    
    $stylepic= $this->input->post('holdstyle').",";
   $colorpic =  $this->input->post('holdcolor').",";
   $data=array('style_pics'=>$stylepic,'color_pics'=>$colorpic, 'room_type'=>$this->input->post('update_room_type'));

   $this->preference_model->updateuserpreferenceinfowithid($this->input->post('holduserid'),$data);
    
    $this->load->helper('url');
    redirect('Users/site/login');
  }
  
 //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 /*function edituserpreferenceinfo($id)
  {
	  
   $data["userid"]=$id;
   $data["userselectcolorstyle"]=$this->preference_model->User_preference_information($id);
   $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
   $this->load->view('Rooms/edituserpreferenceinfo', $data); 
  }
  //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
  function updateuserpreferenceinfo()
  {

   $stylepic= $this->input->post('holdstyle').",";
   $colorpic =  $this->input->post('holdcolor').",";
   $data=array('style_pics'=>$stylepic,'color_pics'=>$colorpic);

   $this->preference_model->updateuserpreferenceinfowithid($this->input->post('holduserid'),$data);
$this->load->helper('url');   
redirect('Users/site/login');
  }
  * */
  //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
?>
