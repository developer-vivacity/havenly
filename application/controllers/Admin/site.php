<?php

Class Site extends CI_Controller {

	function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Users/picture_model');
	$this->load->model('room_model');
	$this->load->model('user_model');
	$this->load->model('admin_model');
	$this->load->model('preference_model');
	}
	
	function index() {
	
		
		$this->load->view('Admin/home');
		
	}
	
	
	
	function open_contests() {
		$password = $this->input->post('password');
		if($password =="stitch"){
		$data['room_data']=$this->room_model->get_open_rooms();
		$this->load->view('Admin/Open_rooms', $data);
		}
		else{
			$data['error']= 'Wrong Password';
			$this->load->view('Admin/home', $data);
			
		
	}
	
	}
	function show_contest(){
		$room_id = $this->uri->segment (4);
		$data['room_data']=$this->room_model->get_room($room_id);
		$room_type = $data['room_data'][0]['room_type'];
		$user_id = $data['room_data'][0]['user_id'];
		$data['user_prefs']=$this->user_model->get_user_prefs($user_id, $room_type);
		$data['user']=$this->user_model->get_user($user_id);
		$this->load->view('Admin/Room_View', $data);
}

	function change_status(){
		$room_id = $this->uri->segment(4);
		$status = $this->input->post('status');
		$this->room_model->change_status($room_id, $status);
		$data['room_data']=$this->room_model->get_open_rooms();
		$this->load->view('Admin/Open_rooms', $data);
}

function adminlogin()
{
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
     if(!empty($orderby)&!empty($ordertype)) 
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
function currentroomwithuser($room_id)
{
	if(($this->session->userdata('adminid')!=""))
     {
	$data["roomwithuser"]=$this->room_model->displayusreinformationwithroom($room_id);
	$data["colorstyle"]=$this->room_model->fetch_color_style_number();
	if(sizeof($data["roomwithuser"])!=0)
	$this->load->view('Admin/currentroomwithuser',$data);
	else
	$this->load->view('Admin/adminlogin',$data);
    }
    else
    {
		$this->load->view('Admin/adminlogin');
	}
}
function update_room_status_by_admin()
{
	$data=array('room_type'=>$this->input->post('update_room_type'));
	$this->room_model->updateroominfowithid($this->input->post('userroomid'),$data);
	$this->preference_model->updateuserpreferenceinfowithid($this->input->post('userid'),$data);
	$this->roomsadministrator();
}
function additional_details_user_room($room_id=null)
{
	if($_POST)
	{
		$data=array('room_id'=>$this->input->post('roomid'),'Style_notes'=>$this->input->post('stylenotes'),'Ceiling_Height'=>$this->input->post('ceilingheight'),'Hates'=>$this->input->post('hates'),'Likes'=>$this->input->post('likes'),'Keep'=>$this->input->post('keep'),'Buy'=>$this->input->post('itemsbuy'));
		$querytype=$this->input->post('querytype');
		$this->admin_model->get_additional_details_user_room($this->input->post('roomid'),$data,$querytype);
		$this->adminlogin();
	}
	else
	{
	   $data["additionalroomdetails"]=$this->admin_model->get_additional_details_user_room($room_id);
	   $data["roomid"]=$room_id;
	   $this->load->view('Admin/userroomdetailsbyadmin',$data);
       
    }
}

}
