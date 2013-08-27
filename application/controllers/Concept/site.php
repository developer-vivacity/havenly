<?php
Class Site extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
   
      $this->load->library('s3');
      $this->load->library('session');
      $this->load->model('concept_model');
      $this->load->model('cart_model');
   }
   function initial_concepts_for_user()
   {
	
	 $data['designforloginuser']=$this->cart_model->get_design_login_user();
          $data['conceptboard']=$this->concept_model->initial_concepts_for_user();
	 $this->load->view('Users/conceptboard',$data);
   }
   function  save_comment_concept_bord()
   {
	
	if($_POST)
	{
		$this->concept_model->save_comment($_POST['holdcomment'],$_POST['holdconceptid'],$_POST['holdroomid']);
		$this->initial_concepts_for_user();
		redirect('/Concept/site/initial_concepts_for_user', 'refresh');
	}   
	   
   }

}

?>
