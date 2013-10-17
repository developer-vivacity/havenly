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
  $this->load->model('designer_model');
  $this->load->model('cart_model');
  $this->load->model('concept_model');

}




function room_submit()
{
   if($_POST)
   {
  $data['about']=$this->input->post('about');
  $data['room_width']=$this->input->post('room_width');
  $data['room_height']=$this->input->post('room_height');
  $data['room_type']=$this->input->post('room_type');
  $data['styles'] = $this->input->post('style');
  $data['style']= "";
  foreach ($data['styles'] as $style)
  {
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
 if($this->input->post('room_file1'))
{
   $data['photo']=$this->input->post('room_file1');
   if($data['photo']!= base_url('assets/Images/uploadpng.png')){
   $this->room_model->save_photo($data);}
}

if($this->input->post('room_file2'))
{$data['photo']=$this->input->post('room_file2');
if($data['photo']!= base_url('assets/Images/uploadpng.png')){
$this->room_model->save_photo($data);}
}


if($this->input->post('room_file3'))
{$data['photo']=$this->input->post('room_file3');
if($data['photo']!= base_url('assets/Images/uploadpng.png')){
$this->room_model->save_photo($data);}
}

if($this->input->post('room_file4'))
{$data['photo']=$this->input->post('room_file4');
if($data['photo']!= base_url('assets/Images/uploadpng.png')){
$this->room_model->save_photo($data);}
}
$this->user_model->save_preferences($data);

$this->session->set_userdata('id',$data['user_id']);
$this->session->set_userdata('first_name',$data['first_name']);
$this->session->set_userdata('email',$data['email']);
/*----------------------------*/

$this->cart_model->add_designfee($this->input->post('designfeeid'),$this->input->post('hidesigntype'),$this->session->userdata("id"));

if(($this->input->post('tokencode')!=""))
{
   $this->cart_model->insert_token($this->input->post('tokencode'),$this->session->userdata("id"));
   Stripe::setApiKey("sk_test_jcYSUW3M1IXTTycn0epuWkyt");
   $token = $_POST['tokencode'];
   try {
$charge = Stripe_Charge::create(array(
  "amount" => 100, // amount in cents, again
  "currency" => "usd",
  "card" => $token,
  "description" => "Paying User")
);
} catch(Stripe_CardError $e) {
  // The card has been declined
}
}
/*----------------------------*/
}
 $data['id']=$this->session->userdata('id');
 $data['first_name']=$this->session->userdata('first_name');
 $data['last_name']=$this->session->userdata('last_name');
 $data['email']=$this->session->userdata('email');
 $data['phone']=$this->session->userdata('phone');
 $data['address']=$this->session->userdata('address');
 $data['zipcode']=$this->session->userdata('zipcode');

 
$this->confirm();

}
function confirm($is_login=null)
{

$config = array(
'protocol'=>'smtp',
'smtp_host'=>'ssl://smtp.googlemail.com',
'smtp_port'=> 465,
'mailtype' => 'html',
'smtp_user'=>'lee@havenly.com',
'smtp_pass'=>'Motayed123');

$this->load->library('email',$config);

$data['email'] = $this->session->userdata('email');
$data['first_name'] = $this->session->userdata('first_name');
$this->email->set_newline("\r\n");

$this->email->from('lee@havenly.com','Lee from Havenly');
$this ->email->to($data['email']);
$this->email->subject('Hello from Havenly');
$this->email->message($this->load->view('Users/confirm_email',$data, true));

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

   $this->load->library('email',$config);
   $this->email->set_newline("\r\n");

   $this->email->from('lee@havenly.com','Lee from Havenly');
   $this ->email->to('hello@havenly.com');
   $this->email->subject('New Room to Design');

   $this->email->message("New room to design from {$data['first_name']}");
   $this->email->send();

   if(is_null($is_login))
   $this->load->view('Users/confirm', $data);
   else
   redirect('/Users/site/login', 'refresh');


}


function availability()
{
$this->load->view('Users/availability');

}

function check()
{

$data['user_id']=$this->session->userdata('id');

$data['date']=$this->input->post('datecheck');

$return = '<BR><BR><BR><BR><table class = "table text-center" >';
if ($data==0 || $data['date']=="")
{	
  $return .='<tr><td>Oops, no availability on that day - select another or just let our designer email you.</td></tr><Tr><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm').'">Just Email Me</a></td></tr></table>'; 

}

/*
 if ($data==0)
 {
 $return .='<tr><td>Oops, no availability on that day - select another or just let our designer email you.</td></tr><Tr><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm').'">Just Email Me</a></td></tr></table>';

 }*/
 
 else
 {$data=$this->designer_model->availability($data);
	$radio_id=1;
 
  if(!empty($data))
  {
    foreach ($data as $time)
    {
    $time = $time['time'];
  // $time = str_replace("/", "-", $time['time']);
   $timeformat = date("M, d Y h:i a", strtotime($time));
   $return.= '<tr><td class = "medium"><input class = "top" type="radio" name="time" id="time'.$radio_id.'" value = "'.$time.'" onclick="display_circle(\'time'.$radio_id.'\');"/>&nbsp; &nbsp;'.$timeformat.'<BR></td></tr>';
   $redio_id = ++$radio_id;
   }
   $return .= '<tr><td><a class = "btn" id="select" href = "#">Book This Time</a></td><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm').'">Just Email Me</a></td></tr></table>';
}
else
{
   $return .='<tr><td>Oops, no availability on that day - select another or just let our designer email you.</td></tr><Tr><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm').'">Just Email Me</a></td></tr></table>';	
	
}
 //$return .= '<tr><td><a class = "btn" id="select" href = "'.base_url('index.php/Contests/site/book_time').'">Book This Time</a></td><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm').'">Just Email Me</a></td></tr></table></form>';
 
 }
  echo $return;
}
function book_time($is_login=null)
{
      
      $this->designer_model->update_designer_call();
      
      $data['user_id']=$this->session->userdata('id');
      //die($this->input->post('datepick'));
      
      $data['date']=$this->input->post('datepick');
      $data=$this->designer_model->book($data);
      
      if(is_null($is_login))
      $this->confirm();
      else
      $this->confirm($is_login);
      
      if($is_login=="no")
      $this->designer_availability();

}
function designer_availability()
{
	$data['date']=date("Y-m-d h:i:s a");
	$data['designeravailability']=$this->designer_model->availability($data);
	$data['designforloginuser']=$this->cart_model->get_design_login_user();
	  
         $data['conceptboard']=$this->concept_model->total_rows_initial_concepts();
        
	$data['designercall']=$this->designer_model->designer_call();
	$this->load->view('Users/designeravailabilityforuser',$data);
	
}

}

?>
