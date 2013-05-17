<?php

class Site extends CI_Controller
{
	public $data =array();
 
  function __construct()
  {
    parent::__construct();
    $this->load->model('Accounts/account_model');
  //$this->load->model('Users/picture_model');
  }
  function registration()
{

	$data["title"]="Registration";
	$this->load->view('Account/UserRegistration', $data);
	
}

  function index()
  {
	 
	  $data["title"]="Login";
	  //$this->load->view('template', $data);
	  //var_dump($data);
	  //die();
	  $this->load->view('Account/login', $data);
	 
  }
  function add()
  {
	 
   $this->load->library('form_validation');
   // field name, error message, validation rules
   $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email');
  
  $this->form_validation->set_rules('password', 'User Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('compassword', 'Confirm_password', 'trim|required|matches[password]');

  if($this->form_validation->run() == FALSE)
  {
	  // die("hi");
    $this->registration();
  }
  else
  {  
	  $this->account_model->creat_table();
    //$user_name=$this->input->post('user_name');

    $user_email=$this->input->post('user_email');
    //echo $this->input->post('password').'<br>';
   $user_password=md5($this->input->post('password'));

 $data=array(
    'username'=>$this->input->post('user_name'),'email'=>$this->input->post('user_email'),'password'=>$user_password);

   $cur_id=$this->account_model->insert_user_info( $data,$this->input->post('user_email'));
    
  if($cur_id==-1)
  {
  
    $data["email"]= "email already exist!";
    $data["accoun_info"]="";
    $this->load->view('Account/UserRegistration', $data);
    
   // return;

  }
  else
  {
	  /*
	$config['protocol'] = 'smtp'; // mail, sendmail, or smtp    The mail sending protocol.
    $config['smtp_host'] = 'smtp.gmail.com'; // SMTP Server Address.
    $config['smtp_user'] = 'me@gmail.com'; // SMTP Username.
    $config['smtp_pass'] = '123'; // SMTP Password.
    $config['smtp_port'] = '25'; // SMTP Port.
    $config['smtp_timeout'] = '5'; // SMTP Timeout (in seconds).
    $config['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
    $config['wrapchars'] = 76; // Character count to wrap at.
    $config['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
    $config['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
    $config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
    $config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
    $config['crlf'] = "\r\n"; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
    $config['newline'] = "\r\n"; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
    $config['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
    $config['bcc_batch_size'] = 200;
	 */ 
	  
   $this->load->library('email');
            /*
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; 
            
            $this->email->initialize($config);
            */
  $to =$this->input->post('user_email');

  
  $subject = 'For Account Informetion';
  
   //$config['base_url'];
  $data["email"]="";
  $data["accoun_info"]= "Account has created!";
  $this->load->view('Account/UserRegistration', $data); 
  /*
  $message = 'Your account has been created For more Informetion please Click here <a href="'.base_url().'">Click here</a>'; 
  
  $this->email->from('','Your Name');
  $this->email->to($to);
  $this->email->subject($subject);
  $this->email->message($message);
  $this->email->send();
  
  echo $this->email->print_debugger();
  
  //mail($to, $subject, $message, $headers);
  
  $this->thank(); 
  */
  
  }
    
 } 
	  
  }
function login()
 {
  
   $this->load->library('form_validation');
   // field name, error message, validation rules
   
  
  $this->form_validation->set_rules('enteremail', 'User Email', 'trim|required|valid_email');
  
  $this->form_validation->set_rules('enterpass', 'User Password', 'trim|required|min_length[4]|max_length[32]'); 
  if($this->form_validation->run() == FALSE)
  {
	  // die("hi");
	   $data["title"]="Login";
    $this->load->view('Account/login', $data);
    return;
  }
   
   
   
   
    $email=$this->input->post('enteremail');
 $this->input->post('enterpass');
    $password=md5($this->input->post('enterpass'));
//die($password);

  //echo  $email."----".$password;
  //die();

   //$result=$this->account_model->login($email,$password);
 
  $cur_id=$this->account_model->user_login($email,$password);
 
  if($cur_id) 
  {  
	 
	$data["username"]=$cur_id;   
	
	$this->Displayuser();
	return;
    //$this->load->view('Account/wecome', $data); 
    //$url = $_SERVER['HTTP_REFERER'];
    //redirect($url);
     //$this->index();
   } 
  else        
  $this->index();
  }
  function forgotpassword()
  {
	$data["username"]="Forgot Password";   
    
   $this->load->view('Account/forgotpassword', $data); 
	  
	  
  }
  
 function randomPassword() 
 {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
  function validatemail()
  {
	  
	     $this->load->library('form_validation');
   
   
        $this->form_validation->set_rules('enteremail', 'Your Email', 'trim|required|valid_email');
  
     if($this->form_validation->run() == FALSE)
     {
	  $data["username"]="Forgot Password";   
    
       $this->load->view('Account/forgotpassword', $data); 
     }
	  
	  
	  
	  
	   $email=$this->input->post('enteremail');
      //echo $email;
      //die(); 
      //$this->input->post('enterpass');
       
       $password=md5($this->input->post('enterpass'));
      
      if($this->account_model->check_mail($email) & !empty($email))
        {
		
			$this->load->library('email');
            
          $this->account_model->update_password($email,md5($this->randomPassword()));
           //var_dump($this->randomPassword()) ;
          
           //die();   
           $subject="Account Information from Havenly";     
           $to =$email;
           $message = 'hi<br>
           This is your  new password : '.$this->randomPassword().'<br>Thank you
              <a href="'.base_url().'">Hevenly</a>'; 
  
              $this->email->from('','Your Name');
              $this->email->to($to);
             $this->email->subject($subject);
  $this->email->message($message);
  $this->email->send();
  
  //echo $this->email->print_debugger();
  $data["accountinfo"]="update";
 $this->load->view('Account/updateinfo', $data); 
  
  //mail($to, $subject, $message, $headers);
            
            
			
		}
		elseif(!empty($email))
		{
	
		//echo "Your are not register user!";
			
		}
	  
	  
  }
  
 public function Displayuser()
 {
	 
  $arg_list = func_get_args(); 
  $this->load->library('pagination');
  
  $config['base_url'] = 'http://web2.kindlebit.com/parupkar/demo/havenly/index.php/Account/site/';
  $config['total_rows'] = $this->account_model->total_rows();
//$config['total_rows'] = 20;
 
  $config['per_page'] = 10;

  $this->pagination->initialize($config);
  $data["link"]=$this->pagination->create_links();

 // $user = $this->session->userdata('isAdmin');
//if((!empty($user)))
  {
    $data['title']= 'Welcome';
   // $this->load->model('user_model');
    if(sizeof($arg_list)>0)  
    {     
       $this->db->limit(10, $arg_list[0]);
    }
    else
    {
        $this->db->limit(10, 0);
    }
       $data['query']=$this->account_model->user_getall();
    // var_dump($data['query']);
       //die("hi");
	//$this->load->view('header_view',$data);
        $this->load->view('Account/userview', $data);
  //echo $this->pagination->create_links();
  //$this->load->view('thank_view.php', $data);
      // $this->load->view('footer_view',$data);
  }
 
 /*else
 {
 $this->index();
 }	*/
  
 }
  
}
?>
