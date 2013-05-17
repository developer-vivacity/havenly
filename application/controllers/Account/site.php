<?php

class Site extends CI_Controller
{
	public $data =array();
 //--For load account_model--------------//
  function __construct()
  {
    parent::__construct();
    $this->load->model('Accounts/account_model');
  
  }
 
 //----This Function used to display registration Form-------//
  function registration()
  {

	$data["title"]="Registration";
	$this->load->view('Account/UserRegistration', $data);
	
  }
 
 //------- This function use for  display login form----------//
  function index()
  {
	
	 
	  $data["title"]="Login";
	  
	  $this->load->view('Account/login', $data);
	 
  }
  
 //------- This function use for save register form data----------// 
  function add()
  {
	 
   $this->load->library('form_validation');
  
   $this->form_validation->set_rules('user_name', 'Name', 'trim|required|max_length[40]|xss_clean');
   $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
  
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('compassword', 'Confirm_password', 'trim|required|matches[password]');
  $this->form_validation->set_rules('phone_number', 'Phone', 'trim|required|max_length[20]|xss_clean');
  $this->form_validation->set_rules('zip_code', 'Zip', 'trim|required|max_length[20]|xss_clean');
  if($this->form_validation->run() == FALSE)
  {
	  
    $this->registration();
    
  }
  else
  {  
	  $this->account_model->creat_table();
    

    $user_email=$this->input->post('user_email');
   
   $user_password=md5($this->input->post('password'));
   $phone=$this->input->post('phone_number');
   $zip=$this->input->post('zip_code');

 $data=array(
    'username'=>$this->input->post('user_name'),'email'=>$this->input->post('user_email'),'password'=>$user_password,'Phone_number'=>$phone,'Zip_code'=>$zip);

$cur_id=$this->account_model->insert_user_info( $data,$this->input->post('user_email'));
    
  if($cur_id==-1)
  {
  
    $data["email"]= "email already exists";
    $data["accountinfo"]="";
    $this->load->view('Account/UserRegistration', $data);
  }
  else
  {
	 $data["email"]="";
  $data["accountinfo"]="Your account has been successfully created.";
  
  $data["Name"]=$this->input->post('user_name');
  $this->load->view('Account/UserRegistration', $data); 
   
  
  }
    
 } 
	  
  }

//----This function used for when user login...............//
function login()
 {

    if(($this->session->userdata('user_name')!=""))
    {
	      
	  $this->Dispalyuser($this->session->userdata('user_id'));
	  return; 
	}

   $this->load->library('form_validation');
   
 
  $this->form_validation->set_rules('enteremail', 'User Email', 'trim|required|valid_email');
  
  $this->form_validation->set_rules('enterpass', 'User Password', 'trim|required|min_length[4]|max_length[32]'); 
  if($this->form_validation->run() == FALSE)
  {
	  
	   $data["title"]="Login";
    $this->load->view('Account/login', $data);
    return;
   }

    $email=$this->input->post('enteremail');
    $this->input->post('enterpass');
    $password=md5($this->input->post('enterpass'));
 
    $cur_id=$this->account_model->user_login($email,$password);
 
   if($cur_id) 
   {  
	 
	$data["username"]=$cur_id;   
	
	$this->Dispalyuser($this->session->userdata('user_id'));
	return;
   } 
   else        
   $this->index();
 }
  
  //-- for forgot password//
  function forgotpassword()
  {
	$data["username"]="Forgot Password";   
    
   $this->load->view('Account/forgotpassword', $data); 
	  
	  
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
    
       $this->load->view('Account/forgotpassword', $data); 
     }
	  else
	  {
	  
	  
	  
	   $email=$this->input->post('enteremail');
       
       $password=md5($this->input->post('enterpass'));
      
      if($this->account_model->check_mail($email) & !empty($email))
        {
		
			$this->load->library('email');
            
          $this->account_model->update_password($email,md5($this->randomPassword()));
           
           $subject="Acoount Informetion in Hevenly";     
           $to =$email;
           $message = 'hi<br>
           This is your  new password : '.$this->randomPassword().'<br>Thank you
              <a href="'.base_url().'">Hevenly</a>'; 
  
              $this->email->from('','Your Name');
              $this->email->to($to);
             $this->email->subject($subject);
             $this->email->message($message);
             $this->email->send();
  

            $data["accountinfo"]="update";
            $this->load->view('Account/updateinfo', $data); 
  		
		}
		elseif(!empty($email))
		{
	      $data["register_info"]="Your are not register user!";
		
		  $this->load->view('Account/forgotpassword', $data); 	
		}
	  }
	  
  }
  //--------For display user informetion...............
 public function Dispalyuser($id)
 {
	
  

  $arg_list = func_get_args(); 
  $this->load->library('pagination');
  

  $config['base_url'] = 'http://www.havenly.com/testsite/index.php/Account/site/Dispalyuser';
  $config['total_rows'] = $this->account_model->total_rows();


  $config['per_page'] = 10;

  $this->pagination->initialize($config);
  $data["link"]=$this->pagination->create_links();

 {
    $data['title']= 'Welcome';
   
    if(sizeof($arg_list)>0)  
    {     
       $this->db->limit(10, $arg_list[0]);
    }
    else
    {
        $this->db->limit(10, 0);
    }
       $data['query']=$this->account_model->user_getall($id);
    
        $this->load->view('Account/userview', $data);
     }
  
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
  $this->index();
 }
 
 //------For update user informetion---------
 public function updatedata()
 {
	
	
	if($this->input->post('radio_value')=="true")
	{
		
	$data=array(
    'username'=> $this->input->post('update_name'),'email'=>$this->input->post('update_email'),'password'=>$this->input->post('update_password'),'Phone_number'=>$this->input->post('update_phone'),'Zip_code'=>$this->input->post('update_zip'));
    }
    else
    {
		
    $data=array(
    'username'=> $this->input->post('update_name'),'email'=>$this->input->post('update_email'),'Phone_number'=>$this->input->post('update_phone'),'Zip_code'=>$this->input->post('update_zip'));
    }
     $this->account_model->update_user_info($data,$this->input->post('hold_id'));
     $this->login();
 }
 
 
 
}
?>
