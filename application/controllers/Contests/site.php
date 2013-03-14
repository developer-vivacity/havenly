<?php
Class Site extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->library('form_validation');
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
	$data['floorplans']=$this->contest_model->get_floorplan($contest_id);
	$this->load->view('Contests/Contest_view', $data);
}


function contest_submit(){

$this->form_validation->set_rules('name','Contest Name', 'trim|required|min_length[3]|required');
$this->form_validation->set_rules('sqfoot','Square Footage','trim|required|numeric');
$this->form_validation->set_rules('about', 'Room Description', 'trim|required');
$this->form_validation->set_rules('budget','Budget','trim|required|alpha_numeric');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Contests/project_form');
		}
else
	{ 
		$id['contestid']=$this->input->post('formid');
		$query=$this->contest_model->get_floorplan($id['contestid']);
		
	if((!$query)&&$_FILES['floor_plan']['size']==0){
		$data['error']='Please show us a floorplan - pretty please';
		$this->load->view('Contests/project_form', $data);
		}
		
		else{


		if(empty($_FILES["room_photo"]["size"])||!isset($_FILES["room_photo"]["size"])||$_FILES["room_photo"]["size"]==0)
		{
			$data['error']='Let us see a picture of your room!';
			$this->load->view('Contests/test', $data);
		}
		else{
	
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
		//if we need to upload a floor plan
		if($_FILES['floor_plan']['size']==0||$_FILES['floor_plan']!=NULL&&!empty($_FILES['floor_plan'])&&isset($_FILES['floor_plan']))
		{
			$name = "floor_plan";
			$this->floorplan_upload_file($name);}
	
		//if room_photo uploaded
		if($_FILES["room_photo"]["size"][0]>0||$_FILES["room_photo"]["size"][1]>0||$_FILES["room_photo"]["size"][2]>0||$_FILES["room_photo"]["size"][3]>0||$_FILES["room_photo"]["size"][4]>0)
		{  	
			$name = "room_photo";
			$pictureid=$this->user_photo_upload($name);
			$id['contestid']=$this->input->post('formid');	
			foreach($pictureid as $picture){
				$id['pictureid']=$picture;
				$this->contest_model->set_map_current($id);
		}//endif isset for uploading room photos  
		}
		
		if($_FILES["inspr_photo"]["size"][0]>0||$_FILES["inspr_photo"]["size"][1]>0||$_FILES["inspr_photo"]["size"][2]>0||$_FILES["inspr_photo"]["size"][3]>0||$_FILES["inspr_photo"]["size"][4]>0)
		{
					$name = "inspr_photo";
					$pictureid=$this->user_photo_upload($name);
				$id['contestid']=$this->input->post('formid');	
				foreach($pictureid as $picture){
				$id['pictureid']=$picture;
				$this->contest_model->set_map_inspiration($id);
				
		}}
		}//end if room photo exists
		}//end if floorplan exists
					
				
		 redirect(base_url('index.php/Contests/site/options/'.$id['contestid']));
	}//end if validation passes
	 }
	
	
		
	
	function set_file_name()
	{
		$file_name= random_string('numeric',12);
		$exists=$this->picture_model->check_name($file_name);
		if ($exists){$file_name= 0;}
		else {$file_name = $file_name;}
		return $file_name;
	}
	
	//upload a user photo to databse
	function user_photo_upload($name){
	$numfiles = count($_FILES[$name]["size"]);
	for($i=0; $i<$numfiles; $i++){
		if(isset($_FILES[$name]['size'][$i])&&$_FILES[$name]['size'][$i]>0){
				$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG");//allowed to be uploaded
				$extension = end(explode(".", $_FILES[$name]["name"][$i]));
				if ((($_FILES[$name]["type"][$i] == "image/gif")
				|| ($_FILES[$name]["type"][$i] == "image/jpeg")
				|| ($_FILES[$name]["type"][$i] == "image/png")
				|| ($_FILES[$name]["type"][$i] == "image/pjpeg")
				|| ($_FILES[$name]["type"][$i] == "image/jpg"))
				&& ($_FILES[$name]["size"][$i] < 4000000)//less than a certain size
				&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES[$name]["error"][$i] > 0)
							{
								$data['error']='error loading file';
								$this->load->view('Contests/project_form',$data);
								}
				
				else
							{
								$file_location = $_FILES[$name]["tmp_name"][$i];
								$file_name = $this->set_file_name();
								
									if ($file_name==0)
										{
											$file_name=$this->set_file_name();//repeat until unique file name
										}
									else 
										{	
											$file_name = $file_name.'.'.$extension;
											$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
											$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
												if($s3result) {
												
													$data['file_name']=$file_name;
													$data['orig_src']=10;//since uploaded from user photo, no original link
													if($name = "room_photo"&&(!empty($_POST["room_photo_desc"]))&&($_POST["room_photo_desc"]!="Description"))
														{$data['desc']=$_POST["room_photo_desc"][$i];}//if a description was entered
														else {$data['desc']=NULL;}
													
													$pictureid=array();
													$pictureid[]=$this->picture_model->store_photo($data);//store photo in database, returns array of picture ids
																										
													}			
													
													else {
															$data['error']='Unable to Upload';	
															$this->load->view('Contests/project_form',$data);
													}	
									}	
			
			}}
			else
				{
				$data['error']='Invalid File Type, please ensure you are uploading an image';
				$this->load->view("Contests/project_form",$data);
				}}

	}//end foreach
	return $pictureid;
	}
	
		
	
	
	function floorplan_upload(){
		$this->image_path= realpath(APPPATH.'/images');
		
		$img = $_POST['img'];
		$form_id = $_POST['formid'];
		
		$img=str_replace('[removed]','',$img);
		$img = str_replace(' ', '+', $img);
	
		$dataimg = base64_decode($img);
		$file_name = $this->set_file_name();
		if ($file_name==0)
										{
											$file_name=$this->set_file_name();//repeat until unique file name
										}
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

function floorplan_upload_file($name){
			$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG");//allowed to be uploaded
				$extension = end(explode(".", $_FILES[$name]["name"][$i]));
				if ((($_FILES[$name]["type"] == "image/gif")
				|| ($_FILES[$name]["type"] == "image/jpeg")
				|| ($_FILES[$name]["type"] == "image/png")
				|| ($_FILES[$name]["type"] == "image/pjpeg")
				|| ($_FILES[$name]["type"] == "image/jpg"))
				&& ($_FILES[$name]["size"]< 3000000)//less than a certain size
				&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES[$name]["error"] > 0)
							{
								$data['error']='error loading file';
								return $data;
								}
				
				else
							{
								$file_location = $_FILES[$name]["tmp_name"];
								$file_name = $this->set_file_name();
								
									if ($file_name==0)
										{
											$file_name=$this->set_file_name();//repeat until unique file name
										}
									else 
										{	
											$file_name = $file_name.'.'.$extension;
											$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);//add to amazon s3 library
											$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
												if($s3result) {$data['filename']=$file_name;
												$data['form_id']=$this->input->post('formid');
												$this->contest_model->save_floorplan($data);
												return true;
												}
												}
	}
	}}
	
	function delete_temp(){
		$contest_id=$_POST['formid'];
		$this->contest_model->delete_temp($contest_id);
	
}

function options(){
$data['contestid']=$this->uri->segment(4);
$data['price_main']='$250';
$data['price_high']='$550+';
$this->load->view('Contests/options', $data);
}

function save_options(){
$data['option'] = $this->input->post('contest_type');
$data['contestid']=$this->input->post('contestid');
$this->contest_model->save_options($data);
redirect(base_url('index.php/Users/site'));
}


function photo_link() {
$formid = $this->input->post('formid');
$desc=$this->input->post('desc');
			if ($desc!="Description"&&$desc!="")
			{$desc=$desc;}
			else { $desc=NULL;}
			
						
	require_once(APPPATH.'/url_to_absolute_2.php');
	require_once(APPPATH.'simple_html_dom.php');
	$this->image_path= realpath(APPPATH.'/images');
	
	
	$value = $_POST['weblink'];
	if($value !='http://'&&$value!="")
	{
			$images = array();
			$link = trim($this->input->post('weblink'));
				
		 if(preg_match("/https?/", $link) == 0)
		 { $link = 'http://'.$link;}
		
		$link_ext = end(explode('.', $link));
	if ($link_ext =='jpg'||$link_ext=='png'||$link_ext == 'pjpeg'||$link_ext =='jpeg'||$link_ext=='bmp') {
		$this->image_path= realpath(APPPATH.'/images');
		$file_name = $this->set_file_name();
	//continue getting file names until get new one
	if ($file_name==0)
		{
		$file_name=$this->set_file_name();
		}
	//place to store image temporarily
	
	$file_name = $file_name.'.'.$link_ext;
			
	$file_location = $this->image_path.'/'.$file_name;
	copy($link, $file_location);
			
	//initiate bucket
	$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
	$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			
	//if s3 responds with something return 1 to the site page view
	if($s3result) {
		$data['file_name']=$file_name;
		$data['orig_src']=$link;
		$data['desc']=$desc;
		$id['pictureid']=$this->picture_model->store_photo($data);	
		$id['contestid']=$formid;
		$this->contest_model->set_map_inspiration($id);
		unlink($file_location);
		echo "<p class = 'title'>Uploaded a picture</p><img src = 'https://s3.amazonaws.com/easableimages/{$file_name}' height:50></p>";
		}
	else {
			echo '<p class = "error">Ooops, something went wrong!</p>';
		}	
	
	}		
		
	else {
			
		try{
			$html = file_get_html(urldecode(trim($link)));
		}
		catch (exception $e){ 
			$data['error']='Error:'.$e;
			echo $e;
		}
		
		if ($html->find ( 'img' )) {
		foreach($html->find('img') as $element)
		{
			$image=$element->src;
			$src= url_to_absolute($link,$image);
			$nodes[]=$src;
			}
			
		$data['images']=$this->imageDownload($nodes);
		$data['desc']=$desc;
		$data['formid']=$formid;
		$this->load->view('Contests/select',$data);
		}
		else {$data['error']='No large images found on page';
		echo $data['error'];}
		}}
	else
	{ 	
		$data['error']='No url entered, please enter';
		echo $data['error'];
	}
	

	}
	
	
function upload_photo_link()
{
	
	$this->image_path= realpath(APPPATH.'/images');
	$images =json_decode($_POST['images']);
	$desc =	$_POST['desc'];	
	$formid = $this->input->post('formid');
	foreach ($images as $image){
	$file_name = $this->set_file_name();
	//continue getting file names until get new one
	if ($file_name==0)
		{
		$file_name=$this->set_file_name();
		}
	//place to store image temporarily
	$extension = end(explode(".", $image));
	
	if(strlen($extension)>4){
				$extension = 'jpg';
				}
				
	$file_name = $file_name.'.'.$extension;
			
	$file_location = $this->image_path.'/'.$file_name;
	copy($image, $file_location);
			
	//initiate bucket
	$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
	$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
			
	//if s3 responds with something return 1 to the site page view
	if($s3result) {
		$data['desc']=$desc;
		$data['file_name']=$file_name;
		$data['orig_src']=$image;
		$id['pictureid']=$this->picture_model->store_photo($data);
		$id['contestid']=$formid;
		$this->contest_model->set_map_inspiration($id);
		unlink($file_location);
		$files=array();
		$files[]=$file_name;
		
		}
	else {
			echo '<p class = "error">Oops!  We were unable to upload your file, please try again!</p>';
		}	
}//end foreach 
if(isset($files)){
$file_name = $files[0];
echo "<div class = 'uploaded_images'><img src='https://s3.amazonaws.com/easableimages/{$file_name}' height=80></div>";}

	}

	
	

function imageDownload($nodes)
{
$mh = curl_multi_init ();
 $curl_array = array ();
 
 foreach ($nodes as $i => $url ) {
        $curl_array [$i] = curl_init ( $url );
        curl_setopt ( $curl_array [$i], CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $curl_array [$i], CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 (.NET CLR 3.5.30729)' );
        curl_setopt ( $curl_array [$i], CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt ( $curl_array [$i], CURLOPT_TIMEOUT, 15 );
        curl_multi_add_handle ( $mh, $curl_array [$i] );
    }
	
	 $running = NULL;
    do {
        usleep ( 10000 );
        curl_multi_exec ( $mh, $running );
    } while ( $running > 0 );
	
	$res = array ();
	
	 foreach ( $nodes as $i => $url ) {
	 $curlErrorCode = curl_errno ( $curl_array [$i] );
	 
	 if ($curlErrorCode === 0) {
	 $info = curl_getinfo ( $curl_array [$i] );
	 $ext = $this->getExtention ( $info ['content_type'] );
	 if ($info ['content_type'] !== null) {
		$file_name = $this->set_file_name();
		$file_name=$file_name.$ext;
		$temp = $this->image_path.'/'.$file_name;
			touch ($temp);
			$imageContent = curl_multi_getcontent ( $curl_array [$i] );
			file_put_contents ( $temp, $imageContent );
			$size = @getimagesize ( $temp );
			if($size[1]>200){
			$res[]=$url;
			unlink($temp);
			}
			else {unlink($temp);
			}
	  }
	 }
	  
	  curl_multi_remove_handle ( $mh, $curl_array [$i] );
      curl_close ( $curl_array [$i] );
}
curl_multi_close ( $mh );
 return $res;
}		
		
function getExtention($type) {
    $type = strtolower ( $type );
    switch ($type) {
        case "image/gif" :
            return ".gif";
            break;
        case "image/png" :
            return ".png";
            break;

        case "image/jpeg" :
            return ".jpg";
            break;

        default :
            return ".img";
            break;
    }
}
	




}