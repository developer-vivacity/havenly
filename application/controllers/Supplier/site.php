<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
	}
	
	
function contests(){
$per_pg=20;
$offset=$this->uri->segment(4);
$this->load->library('pagination');
$config['base_url']=base_url('index.php/Supplier/site/contests');
$config['total_rows']=$this->supplier_model->get_contests_numrows();
$config['per_page']= $per_pg;
$config['full_tag_open'] = '<div id="pagination">';
$config['full_tag_close'] = '</div>';
$this->pagination->initialize($config);
$data['pagination']=$this->pagination->create_links();
$data['contests']=$this->supplier_model->get_recent_contests($per_pg, $offset);
$this->load->view('Supplier/home1',$data);
}


function profile(){
$data['profile'] = $this->supplier_model->get_supplier_profile();
$this->load->view('Supplier/profile', $data);
}

function upload_profile_pic(){
		$this->image_path= realpath(APPPATH.'/Images');
		$name = 'profile_pic';
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
							$file_location = $_FILES[$name]["tmp_name"];
							$file_name = $this->set_file_name();
							if ($file_name==0) {$file_name = $this->set_file_name();}
							else{
							$file_name = $file_name.'.'.$extension;
							$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
							$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
							if($s3result)
							{unlink($file_location);
							echo $file_name;}
							else {echo 'Sorry!  Try again';}
							}
		
}}

else 
{
echo json_encode('Invalid File Type');
}
}

	function set_file_name()
	{
		$file_name= random_string('numeric',9);
		$exists=$this->supplier_model->check_file_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
	}
	
function submit_profile(){
	$data['first_name']=$this->input->post('First_Name');
	$data['last_name']=$this->input->post('Last_Name');
	$data['business_name']=$this->input->post('ProName');
	$data['pic_filename']=$this->input->post('profile_pic_file');
	$data['about']=$this->input->post('About');
	$data['Certification']=$this->input->post('Associations');
	$data['user_id']=$this->session->userdata('userid');
	$this->supplier_model->store_profile($data);
	$this->profile();
	//$this->load->view('Supplier/test',$data);
	
	}
	
	}