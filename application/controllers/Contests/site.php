<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
		}
	}

function index()
{
	$userid =$this->session->userdata('userid');
	$data['formid']=$this->contest_model->get_formid($userid);
	$data['images'] = $this->picture_model->get_user_photos($userid);
	$this->load->view('Contests/project_form',$data);
}

function show_contest(){
	$contest_id = $this->uri->segment (4);
	$data['contest_data']=$this->contest_model->get_contest($contest_id);
	$data['contest_files_insp']=$this->contest_model->get_contest_photos($contest_id);
	$data['contest_files_curr']=$this->contest_model->get_contest_photos_current($contest_id);
	$this->load->view('Contests/Contest_view', $data);
}


function contest_submit()


{ 		
	if (!empty($_POST))
	{	//setup basic form data
		$data['form_id']=$this->input->post('formid');
		$data['userid']=$this->session->userdata('userid');
		$data['name']=$this->input->post('name');
		$data['room_type']=$this->input->post('room_type');
		$reno = $this->input->post('reno_check');
		if($reno)
		{$data['renovation']='yes';}
		else {$data['renovation']='no';}
		$data['sqfoot']=$this->input->post('sqfoot');
		$data['about']=$this->input->post('about');
		$data['likes']=$this->input->post('likes');
		$data['not_likes']=$this->input->post('not_like');
		$data['keep']=$this->input->post('keep');
		$data['need']=$this->input->post('need');
		$data['style']=$this->input->post('style');
		$data['budget']=$this->input->post('budget');
			$modern = $this->input->post('Modern');
			if($modern)
			{$data['modern']='yes';}
			else {$data['modern']=NULL;}
			
			$traditional = $this->input->post('Classic');
			if($traditional)
			{$data['traditional']='yes';}
			else {$data['traditional']=NULL;}
			
			$eclectic = $this->input->post('Eclectic');
			if($eclectic)
			{$data['eclectic']='yes';}
			else {$data['eclectic']=NULL;}
			
			
		$data['store']=$this->input->post('store');
		$this->contest_model->submit_contest($data);
		
		$id['contestid']=$this->input->post('formid');
	
		
				
		//if room_photo uploaded
		if($_FILES["room_photo"]["size"][0]>0)
		{  	
			$name = "room_photo";
			$this->user_photo_upload($name);
		}//endif isset for uploading room photos
		
		if($_FILES["inspr_photo"]["size"][0]>0)
		{
			$name = "inspr_photo";
			$this->user_photo_upload($name);
		}
			//room pics from uploaded
			if (!empty($_POST['inspr_pics']))
			{
				foreach($_POST['inspr_pics'] as $pic){
					$filename = $pic;
					$data['pictureid'] = $this->picture_model->get_pictureid($filename);
					$id['pictureid']=$data['pictureid'][0]['id'];
					$this->contest_model->set_map_inspiration($id);
					
					}
				}
				
	
				
				
				
				
		redirect(base_url('index.php/Users/site'));
	}
	}
	
	
		
	
	function set_file_name()
	{
		$file_name= random_string('numeric',12);
		$exists=$this->picture_model->check_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
	}
	
	
	function user_photo_upload($name){
			$numfiles = count($_FILES[$name]["size"]);
			$id['contestid']=$this->input->post('formid');
				for($i=0; $i<$numfiles; $i++) {
				if ($_FILES[$name]["size"][$i]>0){
				
			
				$data['file']=$_FILES[$name];
				$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG");
				$extension = end(explode(".", $_FILES[$name]["name"][$i]));
				if ((($_FILES[$name]["type"][$i] == "image/gif")
				|| ($_FILES[$name]["type"][$i] == "image/jpeg")
				|| ($_FILES[$name]["type"][$i] == "image/png")
				|| ($_FILES[$name]["type"][$i] == "image/pjpeg")
				|| ($_FILES[$name]["type"][$i] == "image/jpg"))
				&& ($_FILES[$name]["size"][$i] < 3000000)
				&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES[$name]["error"][$i] > 0)
							{
								$data['error']='error loading file';
								}
				
				else
							{
								$file_location = $_FILES[$name]["tmp_name"][$i];
								$file_name = $this->set_file_name();
								
									if ($file_name==0)
										{
											$file_name=$this->set_file_name();
										}
									else 
										{	
											$file_name = $file_name.'.'.$extension;
											$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
											$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
												if($s3result) {
												
													$data['file_name']=$file_name;
													$data['orig_src']=10;
													if($name = "room_photo"&&(!empty($_POST["room_photo_desc"]))&&($_POST["room_photo_desc"]!="Description"))
														{$data['desc']=$_POST["room_photo_desc"][$i];}
														else {$data['desc']=NULL;}
																										
													$id['pictureid']=$this->picture_model->store_photo($data);
													
													if ($name = "room_photo")
													{$this->contest_model->set_map_current($id);}
													{$this->contest_model->set_map_inspiration($id);}
																									
													}
												else {
													$data['error']='Unable to Upload';
																									
													
													}		
									}	
					}	
			
			}
			else
				{
				$data['error']=$_FILES[$name];
				$this->load->view("Contests/test",$data);
				}
}//end name check
}	//end for		
}	
	
	
	
	function user_photo_select(){
	}
	
	
	
	function floorplan_upload(){
		$this->image_path= realpath(APPPATH.'/images');
		
		$img = $_POST['img'];
		$form_id = $_POST['formid'];
		
		$img=str_replace('[removed]','',$img);
		$img = str_replace(' ', '+', $img);
	
		$dataimg = base64_decode($img);
		$file_name = $this->set_file_name();
		$file_name = $file_name.'.png';
		$file_location=$this->image_path.'/'.$file_name;
		$data['file_location'] = $this->image_path.'/'.$file_name;
		file_put_contents($file_location, $dataimg); 
				
		$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
		$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			if ($s3result) {
				$data['filename']=$file_name;
				$data['form_id']=$form_id;
				$this->contest_model->save_floorplan($data);
				unlink($file_location);
				}
}
				
	
	
		
	
}
