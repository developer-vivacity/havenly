<?php

Class Site extends CI_Controller {

	function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Users/user_model');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
        $this->load->model('Users/user_model');
	
	}
	
	function index() {
	
		
	$this->load->view('Users/home');
		
	}
	
	
	function upload_room_pic(){
	$this->image_path= realpath(APPPATH.'/images');
		
		$name = 'qqfile';
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
								$error ='error loading file';
								echo json_encode ($error);
								}
					else {
					
						$file_location = $_FILES[$name]['tmp_name'];
						if($_FILES[$name]["type"]=='image/jpeg'||$_FILES[$name]["type"]=='image/jpg')
							{		
								$this->image_path= realpath(APPPATH.'/images');

									$exif=@exif_read_data($_FILES[$name]['tmp_name']);
									if(isset($exif['Orientation']))
									{$orientation = $exif['Orientation'];}

									$image = imagecreatefromstring(file_get_contents($_FILES[$name]['tmp_name']));

									if(!empty($orientation)){

									switch($orientation){
											case 8:
												$image = imagerotate($image,90,0);
												break;
											case 3:
												$image = imagerotate($image,180,0);
												break;
											case 6:
												$image = imagerotate($image,-90,0);
												break;
									}

									}

									$file_name = $this->set_file_name();

									if ($file_name==0) {$file_name = $this->set_file_name();}


									else{
									$file_location = $this->image_path.'/'.$file_name.'.jpg';
									imagejpeg($image,$file_location);
										
										}
							}				
						
							$file_name = $this->set_file_name();
							if ($file_name==0) {$file_name = $this->set_file_name();}
							else{
									$file_name = $file_name.'.'.$extension;
							$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
							$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
							if($s3result)
							{
							$result['filename']=$file_name;
							$result['success']=true;
							unlink ($file_location);
							header("Content-Type: text/plain");
							echo json_encode($result);}
							else {
							$result['error']= 'Sorry!  Try again';
							header("Content-Type: text/plain");
							echo json_encode($result);
							}
							}
		
}}}



	
	function upload_room_pic_phone(){
	$this->image_path= realpath(APPPATH.'/images');
		
		$name = $this->input->post('id');
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
								$error ='error loading file';
								echo json_encode ($error);
								}
					else {
					
						$file_location = $_FILES[$name]['tmp_name'];
						if($_FILES[$name]["type"]=='image/jpeg'||$_FILES[$name]["type"]=='image/jpg')
							{		
								$this->image_path= realpath(APPPATH.'/images');

									$exif=@exif_read_data($_FILES[$name]['tmp_name']);
									if(isset($exif['Orientation']))
									{$orientation = $exif['Orientation'];}

									$image = imagecreatefromstring(file_get_contents($_FILES[$name]['tmp_name']));

									if(!empty($orientation)){

									switch($orientation){
											case 8:
												$image = imagerotate($image,90,0);
												break;
											case 3:
												$image = imagerotate($image,180,0);
												break;
											case 6:
												$image = imagerotate($image,-90,0);
												break;
									}

									}

									$file_name = $this->set_file_name();

									if ($file_name==0) {$file_name = $this->set_file_name();}


									else{
									$file_location = $this->image_path.'/'.$file_name.'.jpg';
									imagejpeg($image,$file_location);
										
										}
							}				
						
							$file_name = $this->set_file_name();
							if ($file_name==0) {$file_name = $this->set_file_name();}
							else{
									$file_name = $file_name.'.'.$extension;
							$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
							$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
							if($s3result)
							{
							echo $file_name;
							unlink ($file_location);
							}
							else {
							echo 'Sorry!  Try again';
							
							}
							}
		
}}

}


function set_file_name()
	{
		$file_name= random_string('numeric',9);
		$exists=$this->picture_model->check_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
	}
	
function howwework()
	{
		$this->load->view('Static/howwework');
		
	
}

	

function whoweare()
	{
		$this->load->view('Static/whoweare');
		
	
}

function requestinvite(){

$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('zipcode', 'Zipcode', 'required|exact_length[5]');
$error = 'nope';

if ($this->form_validation->run() == FALSE)
		{
			echo $error;
		}
		else
		{
			
		$data['email'] = $this->input->post('email');
		
		$data['zipcode'] = $this->input->post('zipcode');
		
		$this->user_model->invite_request($data);
		echo '<div class = "padding"><a class = "close sanslight small padding_small light_gray_text">X Close</a><br><p class = "large blue_text serif"> Welcome! </p> <hr class = "seventy style"><p class = "condensed black_text medium"> We\'ll get back to you in a hot second</p></div>';
		
		
		

}}
//----This Function used to display registration Form-------//
  function registration()
  {

	$data["title"]="Registration";
    $this->load->view('Users/userregistration', $data);
  }
 //------- This function use for save register form data----------// 
  function add()
  { 
	 if(($this->session->userdata('first_name')!=""))
    {
	      $data["accountinfo"]="Wecome ".$this->session->userdata('first_name');
          $this->load->view('Users/accountconfirmation', $data); 
	      return; 
	} 
   $this->load->library('form_validation');
   $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[40]|xss_clean');
   $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[40]|xss_clean');
   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
   $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[20]|xss_clean');
   $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[100]|xss_clean');
   $this->form_validation->set_rules('zipcode', 'Zip', 'trim|required|is_natural|numeric|max_length[50]|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
   $this->form_validation->set_rules('compassword', 'Confirm password', 'trim|required|matches[password]');
  if($this->form_validation->run() == FALSE)
  {
    $this->registration();
  }
  else
  {  
	 
	 $this->user_model->creat_table();
	
     $user_email=$this->input->post('email');
     $user_password=md5($this->input->post('password'));
     $phone=$this->input->post('phone');
     $zip=$this->input->post('zipcode');
     
     $data=array(
    'first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'email'=>$this->input->post('email'),'phone'=>$phone,'address'=>$this->input->post('address'),'password'=>$user_password,'zipcode'=>$zip);
     $cur_id=$this->user_model->insert_user_info( $data,$this->input->post('email'));
    if($cur_id==-1)
    {
		 
    $data["email"]= "email already exists";
    $data["accountinfo"]="";
    $this->load->view('Users/userregistration', $data);
    }
   else
   {
	  
    $data["email"]="";
    $data["accountinfo"]="Wecome ".$this->input->post('user_name');
    $this->load->view('Users/accountconfirmation', $data); 
  }  
  }   
 }
//----This function used for when user login...............//
function login()
 {
    if(($this->session->userdata('first_name')!=""))
    {

	  $this->Dispalyuser($this->session->userdata('id'));
	  return; 
	}
   $this->load->library('form_validation');
   $this->form_validation->set_rules('enteremail', 'User Email', 'trim|required|valid_email');
   $this->form_validation->set_rules('enterpass', 'User Password', 'trim|required|min_length[4]|max_length[32]'); 
   
if($this->form_validation->run() == FALSE)
   {

	$data["title"]="Login";
    $this->load->view('Users/login', $data);

    return;
   }
    $email=$this->input->post('enteremail');
    $this->input->post('enterpass');
    $password=md5($this->input->post('enterpass'));
    $cur_id=$this->user_model->user_login($email,$password);
 
 if($cur_id) 
   {  
	 
	$data["username"]=$cur_id;   
	
	$this->Dispalyuser($this->session->userdata('id'));
	return;
   } 
   else        
  // $this->index();
  $this->ForLogin();
 }
  
  //------- This function use for  display login form----------//
  function ForLogin()
  {
    $data["title"]="Login"; 
	$this->load->view('Users/login', $data); 
  }
  
  //-- for forgot password//
  function forgotpassword()
  {
	$data["username"]="Forgot Password";     
    $this->load->view('Users/forgotpassword', $data); 
   }
  //-------For generate random password ----------//
 function randomPassword() 
 {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
  }

//---For update user password .  
  function validatemail()
  {
	  
	  $this->load->library('form_validation');
   
      $this->form_validation->set_rules('enteremail', 'Your Email', 'trim|required|valid_email');
  
     if($this->form_validation->run() == FALSE)
     {
	  $data["username"]="Forgot Password";   
    
       $this->load->view('Users/forgotpassword', $data); 
     }
	  else
	  {
	   $email=$this->input->post('enteremail');
       
       $password=md5($this->input->post('enterpass'));
      
      if($this->user_model->check_mail($email) & !empty($email))
        {
		
			$this->load->library('email');
            
            $this->user_model->update_password($email,md5($this->randomPassword()));
           
           $subject="Acoount Informetion in Hevenly";     
           $to =$email;
           
           $data["randompassword"]=$this->randomPassword();
           
           $message = $this->load->view('Users/sendmailmessage',$data ,true);
           
           $this->email->from('','Your Name');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();
           $data["accountinfo"]="update";
           $this->load->view('Users/updateinfo', $data); 
  		
		}
		elseif(!empty($email))
		{
	      $data["register_info"]="Your are not register user!";
		
		  $this->load->view('Users/forgotpassword', $data); 	
		}
	  }
	  
  }
  //--------For display user informetion...............
 public function Dispalyuser($id)
 {
	  
     $data['title']= 'Welcome';
     $data['query']=$this->user_model->user_getall($id);
     $this->load->view('Users/userview', $data);
     
  
 }
 //-------For logout------------
  public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => ''
  
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
 // $this->index();
 $this->ForLogin();
 }
 
 //------For update user informetion---------
 public function updatedata()
 {
	
	if($this->input->post('radio_value')=="true")
	{
		
	$data =array('first_name'=> $this->input->post('update_name'),
	'last_name'=> $this->input->post('update_last_name'),
	'email'=> $this->input->post('update_email'),
	'phone'=>$this->input->post('update_phone'),
	'address'=>$this->input->post('update_address'),
	'zipcode'=>$this->input->post('update_zip'),
	'password'=>md5($this->input->post('update_password')
	));
    }
    else
    {
		
    $data =array('first_name'=> $this->input->post('update_name'),
	'last_name'=> $this->input->post('update_last_name'),
	'email'=> $this->input->post('update_email'),
	'phone'=>$this->input->post('update_phone'),
	'address'=>$this->input->post('update_address'),
	'zipcode'=>$this->input->post('update_zip'));
    }
     $this->user_model->update_user_info($data,$this->input->post('hold_id'));
     $this->login();
 }


}
