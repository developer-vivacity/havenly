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
   $this->load->model('cart_model');
   $this->load->model('concept_model');
   $this->load->model('Users/picture_model');

}
 function index()
 {
 
	if($this->session->userdata('email')==''){
   $this->load->view('Users/home');}
   else {$this->login();}
   
   $this->room_model->create_table();
   $this->user_model->create_table();
   $this->preference_model->create_table();
   $this->designer_model->create_table();
   $this->cart_model->create_table();
 }
 
 function upload()
 {
 $this->load->view('Users/home');}
 
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
&& ($_FILES[$name]["size"]< 5000000)//less than a certain size
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
// header("Content-Type: text/plain");
echo json_encode($result);}
else {
$result['error']= 'Sorry! Try again';
// header("Content-Type: text/plain");
echo json_encode($result);
}
}

}}}

function upload_room_pic_phone()
{
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
echo 'Sorry! Try again';

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

function terms()
	{
		$this->load->view('Static/terms');
}

function careers()

{ 
	$this->load->view('Static/careers');
}



function faq()
{ 
	$this->load->view('Static/faq');
	}
	
	
	function howwework()
{ 
	$this->load->view('Static/howwework');
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


	$config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'hello@havenly.com',
			'smtp_pass'=>'Motayed2');
			
	$this->load->library('email',$config);
	


			$this->email->set_newline("\r\n");
		
			$this->email->from('hello@havenly.com','The Havenly Team');
			$this ->email->to($data['email']);
			$this->email->subject('Hello from Havenly');
		
			$this->email->message($this->load->view('Users/invite_email', $data, true));
			
				
			
		if($this->email->send()) {
			$data['message']= 'thank you';
			}
			else {
			ob_start();
			$this->email->print_debugger();
			$error = ob_end_clean();
			$errors[] = $error;
			
			}


echo '<div class = "padding"><a class = "close sanslight small padding_small light_gray_text">X Close</a><br><p class = "midlarge black_text serif"> <BR><BR>Thank You For Signing Up! </p><p class = "sanslight black_text medium"> We\'re working hard to get the site ready for you.  Look for an invitation in your inbox in the next week!</p><BR><BR><BR><BR></div>';

}}




function emailsignup()
{
  $this->load->library('form_validation');
  $this->form_validation->set_rules('email', 'Email', 'required');
  
  $error = 'nope';
  if($this->form_validation->run() == FALSE)
{
echo $error;
}
  else
{

$data['email'] = $this->input->post('email');

$this->user_model->save_email($data);


	$config = array(
			'protocol'=>'smtp',
			'smtp_host'=>'ssl://smtp.googlemail.com',
			'smtp_port'=> 465,
			'mailtype' => 'html',
			'smtp_user'=>'hello@havenly.com',
			'smtp_pass'=>'Motayed2');
			
	$this->load->library('email',$config);
	


			$this->email->set_newline("\r\n");
		
			$this->email->from('hello@havenly.com','The Havenly Team');
			$this ->email->to($data['email']);
			$this->email->subject('Hello from Havenly');
		
			$this->email->message($this->load->view('Users/signup_email', $data, true));
			
				
			
		if($this->email->send()) {
			$data['message']= 'thank you';
			}
			else {
			ob_start();
			$this->email->print_debugger();
			$error = ob_end_clean();
			$errors[] = $error;
			
			}


echo '<div class = "padding"><a class = "close"><img src = "'.base_url('assets/Images/closebutton1.png').'"></a></div><p class = "large black_text serif"><BR>Thank You For Signing Up! </p><p class = "sanslight black_text medium"> Your room will never be more attractive. </p><BR><BR><BR><BR></div>';

}}


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

 if(($this->session->userdata('id')!=""))
    {
     
      if($this->session->userdata('designinfo'))
       {
          $data["deletedesigninfo"]=$this->session->userdata('designinfo').'&nbsp;Design Has Been Deleted By Admin!';
          $designdata=array('designinfo'=>'');
          $this->session->unset_userdata($designdata);
        }
      if(count($this->room_model->Check_user_rooms($this->session->userdata('id')))>0)//If all user rooms in status “Open” or “Called” Redirect to user/accountinformation view
      {
	      
       $data["userdetails"]=$this->user_model->user_getall($this->session->userdata('id'));
       $data["roomsassociated"]=$this->room_model->Check_user_rooms($this->session->userdata('id'));
       //die(var_dump($data["roomsassociated"]));
       $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
       $data["userpreference"]= $this->preference_model->User_preference_information($this->session->userdata('id'));
       $data["designerinformation"]= $this->designer_model->designer_information($this->session->userdata('id'));
       $data["designforloginuser"]=$this->cart_model->get_design_login_user();
       $data["roompicture"]=$this->room_model->display_user_room_pic($this->session->userdata('id'));
      
       $data["roomvideo"]=  $this->room_model->display_user_room_video($this->session->userdata('id'));
       
        #........ConceptBoardModule==========
       $data["conceptboard"]=$this->concept_model->total_rows_initial_concepts();
        #.......ConceptBoardModule==========
       

       
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
   $this->form_validation->set_rules('enterloginemail', 'User Email', 'trim|required|valid_email');
   $this->form_validation->set_rules('enterpass', 'User Password', 'trim|required|min_length[4]|max_length[32]');
   
if($this->form_validation->run() == FALSE)
   {

    $data["title"]="Login";
    $this->load->view('Users/login', $data);
    return;
   }
    $email=$this->input->post('enterloginemail');
   
    $this->input->post('enterpass');
    $password=$this->input->post('enterpass');
    $userinfoarray=$this->user_model->user_login($email,$password);
  
  if($this->session->userdata('first_name')!="")
   {
	   
if(count($this->room_model->Check_user_rooms($this->session->userdata('id')))>0)
    {
	   if($this->session->userdata('designinfo'))
            {
	    $data["deletedesigninfo"]=$this->session->userdata('designinfo').'&nbsp;Design Has Been Deleted By Admin!';
             
             $designdata=array('designinfo'=>'');
             
             $this->session->unset_userdata($designdata);
            
            }
            
        $data["userdetails"]=$this->user_model->user_getall($this->session->userdata('id'));
        $data["roomsassociated"]=$this->room_model->Check_user_rooms($this->session->userdata('id'));
        $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
        $data["userpreference"]= $this->preference_model->User_preference_information($this->session->userdata('id'));
        $data["designerinformation"]= $this->designer_model->designer_information($this->session->userdata('id'));
        $data["roompicture"]=$this->room_model->display_user_room_pic($this->session->userdata('id'));
        $data["roomvideo"]=  $this->room_model->display_user_room_video($this->session->userdata('id'));
        $data["haveproducts"]=$this->concept_model->have_products();
      
       #........ConceptBoardModule==========
        $data["conceptboard"]=$this->concept_model->total_rows_initial_concepts();

 
        #.......CartBoardModule==========
        $id = $this->session->userdata('id');
		$prodid = "";
        $data["designforloginuser"]=$this->cart_model->get_design_login_user();
        
        #-------user last login---------#
        $this->user_model->last_user_login($id);
        #-------------------------------#
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


  //------- This function use for display login form----------//
  function ForLogin()
  {
   
   
    if($this->session->userdata('first_name')!="")
     {
      $this->Login();
      return;
     }
    $data["title"]="Login";
    $data["loginerrors"]=$this->userlogin;
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
$data["title"]="forgotpassword";
$this->load->view('Users/login',$data);
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
'smtp_user'=>'hello@havenly.com',
'smtp_pass'=>'Motayed2',
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
          

           $this->email->from('hello@havenly.com','Havenly');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();
           $data["accountinfo"]="update";
           $this->load->view('Users/passwordconfirm', $data);
  
}
elseif(!empty($email))
{
$data["errors"]="Your are not a registered user!";
$data["title"]="forgotpassword";
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
    
     $this->load->view('Users/edituserinfo', $data);
     
  
 }
 //-------For logout------------
  public function logout()
 {
  $newdata = array(
  'user_id' =>'',
  'user_name' =>'',
  'user_email' => ''
  
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  redirect('/Users/site/login/','refresh');
 }
 
 //------For update user informetion---------
 public function updatedata()
 {
	
   if($this->input->post('update_email'))
   {
      $this->mailmessage="User information has been updated";
      if($this->user_model->mail_with_login_id($this->input->post('update_email'),$this->session->userdata('id')))
      {
	     
       $this->mailmessage=$this->input->post('update_email')."&nbsp;Email already exists";
       $this->login();
       return;
    }
   }
   

   if($this->input->post('pass')!=0){

 $data =array('first_name'=> $this->input->post('update_name'),
'last_name'=> $this->input->post('update_last_name'),
'email'=> $this->input->post('update_email'),
'phone'=>$this->input->post('update_phone'),
'address'=>$this->input->post('update_address'),
'zipcode'=>$this->input->post('update_zip'),
'facebook'=>$this->input->post('update_facebook'),
'password'=>$this->input->post('update_password'),
'pinterest'=>$this->input->post('update_pinterest'),
'instagram'=>$this->input->post('update_instagram')
);}

else {
$data =array('first_name'=> $this->input->post('update_name'),
'last_name'=> $this->input->post('update_last_name'),
'email'=> $this->input->post('update_email'),
'phone'=>$this->input->post('update_phone'),
'address'=>$this->input->post('update_address'),
'zipcode'=>$this->input->post('update_zip'),
'facebook'=>$this->input->post('update_facebook'),
'pinterest'=>$this->input->post('update_pinterest'),
'instagram'=>$this->input->post('update_instagram')
);
}


   
   $this->user_model->update_user_info($data,$this->session->userdata('id'));
     
   
    
    redirect('/Users/site/login/','refresh');

 }
 
 function gifts()
 {
 
	$this->load->view('Users/gifts');
}
 
 /*
 function display_designer_vailability()
 {
    
     
     if($this->session->userdata('first_name')!="")
     {
	  
	   date_default_timezone_set('America/New_York');
            $data["currentyear"]=date('Y');
	   $data["currentday"]=date('d');
	   $data["currentmonth"]=date('m');
	   $data["userid"]=$this->session->userdata('id');
	   $data["aftermail"]="";
	   $data["selectdate"]=$this->designer_model->designer_time_for_user(date('m'),date('Y'));
	   $data["designforloginuser"]=$this->cart_model->get_design_login_user();
	   
            if($_POST)
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
   
   $subject="Designer schedule calls";
   
   $data["designerinfo"]= $this->designer_model->designer_information($this->session->userdata('id'));
  
   $data["userinfo"]=$this->user_model->get_user($this->session->userdata('id'));
           
   $to =$data["designerinfo"][0]->designer_email;
     
   $data["receivername"]=$data["designerinfo"][0]->designer_name;
   
   $sendername=  $data["userinfo"][0]["first_name"]."&nbsp;".$data["userinfo"][0]["last_name"];        
   
    $message=       "Hello&nbsp;".$data["designerinfo"][0]->designer_name."<br/>";
    $message=$message.$sendername."&nbsp;has contacted to you for designing schedule";
  
           $this->email->from('lee@havenly.com','Havenly');
           $this->email->to($to);
           $this->email->subject($subject);
           $this->email->message($message);
           $this->email->send();	   
	  $data["aftermail"]="message has been send";
	  	   
	  }
	   
	   $this->load->view('Users/designeravailabilityforuser',$data);
  }
  else
  {
            $data["title"]="Login";
            $this->load->view('Users/login', $data);
  }
}*/

}
?>
