<?php

Class Site extends CI_Controller 
{
public $userlogin;	
public $mailmessage;
function __construct() 
{
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');

	$this->load->model('user_model');
   $this->load->model('room_model');
   $this->load->model('preference_model');
   $this->load->model('designer_model');

	$this->load->model('Users/picture_model');
	
}
 function index() 
 {
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

function requestinvite()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules('email', 'Email', 'required');
  $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|exact_length[5]');
  $error = 'nope';
  if($this->form_validation->run() == FALSE)
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
  // function registration()
  // {
    // if($this->session->userdata('first_name')!="")
    // {    
       // $this->login();
       // return;
     // }
 	 // $data["title"]="Registration";
    // $this->load->view('Users/userregistration', $data);
  // }
 //------- This function used to save register form data----------// 
  // function add()
  // { 
	// if(($this->session->userdata('first_name')!=""))
    // {
	      // $data["accountinfo"]="Wecome ".$this->session->userdata('first_name');
          // $this->load->view('Users/accountconfirmation', $data); 
	      // return; 
	// } 
   // $this->load->library('form_validation');
   // $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[40]|xss_clean');
   // $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[40]|xss_clean');
   // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
   // $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[20]|xss_clean');
   // $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[100]|xss_clean');
   // $this->form_validation->set_rules('zipcode', 'Zip', 'trim|required|is_natural|numeric|max_length[50]|xss_clean');
   // $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
   // $this->form_validation->set_rules('compassword', 'Confirm password', 'trim|required|matches[password]');
  // if($this->form_validation->run() == FALSE)
  // {
    // $this->registration();
  // }
  // else
  // {  
	 
	  // $user_email=$this->input->post('email');
     // $user_password=md5($this->input->post('password'));
     // $phone=$this->input->post('phone');
     // $zip=$this->input->post('zipcode');
     
     // $data=array(
    // 'first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'email'=>$this->input->post('email'),'phone'=>$phone,'address'=>$this->input->post('address'),'password'=>$user_password,'zipcode'=>$zip);
     // $cur_id=$this->user_model->insert_user_info( $data,$this->input->post('email'));
    // if($cur_id==-1)
    // {
		 
    // $data["email"]= "email already exists";
    // $data["accountinfo"]="";
    // $this->load->view('Users/userregistration', $data);
    // }
   // else
   // {
    // $data["email"]="";
    // $data["accountinfo"]="Wecome ".$this->session->userdata('first_name');
    // $this->load->view('Users/accountconfirmation', $data); 
  // }  
  // }   
 // }
//--For User edit information 
function UserEditInformation()
{
   if(($this->session->userdata('first_name')!=""))
     {
      $this->Displayuser($this->session->userdata('id'));
     }
}
//----This function used for when user login...............//
 function login()
 {

  $this->user_model->update_userstables();
  
 if(($this->session->userdata('first_name')!=""))
    {
 if(count($this->room_model->Check_user_rooms($this->session->userdata('id')))>0)//If all user rooms in status “Open” or “Called” Redirect to user/accountinformation view
     {
	   $data["userdetails"]=$this->user_model->user_getall($this->session->userdata('id'));
       $data["roomsassociated"]=$this->room_model->Check_user_rooms($this->session->userdata('id'));
       $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
       $data["userpreference"]= $this->preference_model->User_preference_information($this->session->userdata('id'));
       $data["designerinformation"]= $this->designer_model->designer_information($this->session->userdata('id'));  
       $this->load->view('Users/accountinformation', $data); 
       return;
     }
     else
     {
     $data["message"]="No Rooms found";
     $this->load->view('Users/accountinformation', $data); 
	 return; 
     }
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
    $password=$this->input->post('enterpass');
    $userinfoarray=$this->user_model->user_login($email,$password);
  
  if($this->session->userdata('first_name')!="") 
   {  
	 if(count($this->room_model->Check_user_rooms($this->session->userdata('id')))>0)
    {
       $data["userdetails"]=$this->user_model->user_getall($this->session->userdata('id'));
       $data["roomsassociated"]=$this->room_model->Check_user_rooms($this->session->userdata('id'));
        $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
       $data["userpreference"]= $this->preference_model->User_preference_information($this->session->userdata('id'));
       $data["designerinformation"]= $this->designer_model->designer_information($this->session->userdata('id'));
       $this->load->view('Users/accountinformation',$data);   
    }
    else
    {
     $data["message"]="No Rooms found";
     $this->load->view('Users/accountinformation', $data); 
     return;   
    }
	} 
	 else
	 {
     if($userinfoarray=="haveemail")
     {
     $this->userlogin="Password does not match our records.";
     } 
    else
    { 
    $this->userlogin="The email you entered is not yet registered.";   
    }
    $this->ForLogin();
   }
 }


  //------- This function use for  display login form----------//
  function ForLogin()
  {
    if($this->session->userdata('first_name')!="") 
     {
	    $this->Login();
	    return;
     } 
    $data["title"]="Login"; 
    $data["errors"]=$this->userlogin; 	
    $this->load->view('Users/login', $data); 
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
   
      $this->form_validation->set_rules('enteremail', 'Email', 'trim|required|valid_email');
  
     if($this->form_validation->run() == FALSE)
     {
	        $this->load->view('Users/login'); 
     }
	  else
	  {
	   $email=$this->input->post('enteremail');
     
      $receivername=$this->user_model->check_mail($email);
      if(!empty($receivername)&!empty($email)){
        $config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'lee@havenly.com',
			'smtp_pass'=>'Motayed123',
			);
			
	       $this->load->library('email',$config);
		   $this->email->set_newline("\r\n"); 
           
		   
		   $randompassword= $this->randomPassword();
		   $this->user_model->update_password($email,$randompassword);
          //die($randompassword);
           
		   $subject="Account Information from Havenly";     
           $to =$email;
           $data["receivername"]=$receivername;
           $data["randompassword"]=$randompassword;
           $message = $this->load->view('Users/sendmailmessage',$data,true);
          

           $this->email->from('lee@havenly.com','Havenly');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();
           $data["accountinfo"]="update";
           $this->load->view('Users/updateinfo', $data); 
  		
		}
		elseif(!empty($email))
		{
	      $data["errors"]="Your are not a registered user!";
		
		  $this->load->view('Users/login', $data); 	
		}
	  }
	  
  }
  //--------For display user informetion...............
 public function Displayuser($id)
 {
	  
     $data['title']= 'Welcome';
     $data['mailmessage']=$this->mailmessage;
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
 
 $this->ForLogin();
 }
 
 //------For update user informetion---------
 public function updatedata()
 {
   if($this->input->post('update_email'))
   {  
      $this->mailmessage="User information has been updated";
      if($this->user_model->mail_with_login_id($this->input->post('update_email'),$this->input->post('hold_id')))
      {
       $this->mailmessage=$this->input->post('update_email')."&nbsp;email already exists";
       $this->login();
       return;
    }
   }
	if($this->input->post('radio_value')=="true")
	{
	 $data =array('first_name'=> $this->input->post('update_name'),
	 'last_name'=> $this->input->post('update_last_name'),
	 'email'=> $this->input->post('update_email'),
	 'phone'=>$this->input->post('update_phone'),
	 'address'=>$this->input->post('update_address'),
	 'zipcode'=>$this->input->post('update_zip'),
	 'password'=>$this->input->post('update_password'),
	 'facebook'=>$this->input->post('update_facebook')
	 
	);
    }
    else
    {
    $data =array('first_name'=> $this->input->post('update_name'),
	 'last_name'=> $this->input->post('update_last_name'),
	 'email'=> $this->input->post('update_email'),
	 'phone'=>$this->input->post('update_phone'),
	 'address'=>$this->input->post('update_address'),
	 'zipcode'=>$this->input->post('update_zip'), 'facebook'=>$this->input->post('update_facebook')
	 );
	
    }
     $this->user_model->update_user_info($data,$this->input->post('hold_id'));
     
     if($this->input->post('radio_value')=="true")
     {
           
          
          $config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'lee@havenly.com',
			'smtp_pass'=>'Motayed123');
			
	       $this->load->library('email',$config);
		   $subject="Account Information From Havenly";     
           $to =$this->input->post('update_email');
           $data["receivername"]=$this->input->post('update_name')."&nbsp;".$this->input->post('update_last_name');
           $data["randompassword"]=$this->input->post('update_password');
           $message = $this->load->view('Users/sendmailmessage',$data,true);
                   
           $this->email->from('lee@havenly.com','Havenly');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();

     }
     $this->login();
 }

}
