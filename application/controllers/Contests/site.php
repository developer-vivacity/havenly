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
if($this->input->post('room_file1')){
$data['room_photo1']=$this->input->post('room_file1');}
else {$data['room_photo1']="not submitted";}


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


$data['facebook']=$this->input->post('facebook');
if ($data['facebook']=="Link to your Facebook page")
{$data['facebook']=NULL;}

$data['pinterest']=$this->input->post('pinterest');
if ($data['pinterest']=="Link to a pinterest board"){
$data['pinterest']=NULL;
}
$data['instagram']=$this->input->post('instagram');
if ($data['instagram']=="Link to a pinterest board"){
$data['instagram']=NULL;
}



$data['about']=$this->input->post('about');
$data['type']=$this->input->post('type');
$data['user_id']=$this->user_model->save_user($data);
$data['room_id']=$this->room_model->save_room($data);
$this->user_model->save_preferences($data);


$this->session->set_userdata('user_id',$data['user_id']);
$this->confirm($data);

}

function confirm($data)
{

	$config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'lee@havenly.com',
			'smtp_pass'=>'Motayed123');
			
	$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
		
			$this->email->from('lee@havenly.com','Lee from Havenly');
			$this ->email->to($data['email']);
			$this->email->subject('Hello from Havenly');
		
			$this->email->message($this->load->view('Users/confirm_email', $data, true));
			
				
			
		if($this->email->send()) {
			$data['message']= 'thank you';
			}
			else {
			ob_start();
			$this->email->print_debugger();
			$error = ob_end_clean();
			$errors[] = $error;
			
			}
		
	
	
	$this->load->library('email',$config);
			$this->email->set_newline("\r\n");
		
			$this->email->from('lee@havenly.com','Lee from Havenly');
			$this ->email->to('hello@havenly.com');
			$this->email->subject('New Room to Design');
		
			$this->email->message("New room to design from {$data['first_name']}");
		$this->email->send();
	
	$this->load->view('Users/confirm', $data);
}



}




	
		
	
	


