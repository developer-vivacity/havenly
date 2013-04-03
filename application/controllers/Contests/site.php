<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->library('form_validation');
	$this->load->model('user_model');
	$this->load->model('room_model');
	$this->load->model('Users/picture_model');
		
	}


function room_submit(){

$data['room_photo1']=$this->input->post('room_file1');

if($this->input->post('room_file2'))
{$data['room_photo2']=$this->input->post('room_file2');}

else {$data['room_photo2']="not submitted";}

$data['about']=$this->input->post('about');
$data['room_width']=$this->input->post('room_width');
$data['room_height']=$this->input->post('room_height');
$data['room_type']=$this->input->post('room_type');


$data['styles'] = $this->input->post('style');
$data['style']= "";
foreach ($data['styles'] as $style){
$data['style'].=$style.",";
}


$data['colors'] = $this->input->post('color');
$data['color']="";
foreach ($data['colors'] as $color){
$data['color'].=$color.",";
}


$data['first_name']=$this->input->post('first_name');
$data['last_name']=$this->input->post('last_name');
$data['email']=$this->input->post('email');
$data['phone']=$this->input->post('phone');
$data['address']=$this->input->post('address');
$data['zipcode']=$this->input->post('zipcode');
$data['password']=$this->input->post('password');




$data['about']=$this->input->post('about');
$data['type']=$this->input->post('type');
$data['user_id'] =$this->user_model->save_user($data);
$this->user_model->save_preferences($data);
$this->room_model->save_room($data);

$this->session->set_userdata('user_id',$data['user_id']);
$this->confirm($data);

}

function confirm($data)
{
	$this->load->view('Users/confirm',$data);

}



}




	
		
	
	


