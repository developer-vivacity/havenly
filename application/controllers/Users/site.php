<?php

Class Site extends CI_Controller {

	function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
	
	}
	
	function index() {
	
		
	$this->load->view('Users/home');
		
	}
	
	
	function upload_room_pic(){
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
							unlink ($file_location);}
							else {echo 'Sorry!  Try again';}
							}
		
}}}




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
		$this->load->view('howwework');
		
	
}


function whoweare()
	{
		$this->load->view('whoweare');
		
	
}

function careers()
{
$this->load->view('careers');
}

}