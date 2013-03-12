<?php
Class Upload extends CI_Controller {

function __construct() {
	
	parent::__construct();
	$this->load->library('s3');
	$this->load->library('session');
	$this->load->model('Contests/contest_model');
	$this->load->model('Users/picture_model');
	$this->load->model('Supplier/supplier_model');
	}
	
	
function upload_product(){
	
			
			$data['productid']=$this->input->post('productid');
			$data['name']=$this->input->post('name');
			$data['price']=$this->input->post('price');
			$data['store']=$this->input->post('store');
			$data['link']=$this->input->post('link');
			$result = $this->supplier_model->store_product($data);
			$this->supplier_model->map_product_user($data);
			
			if ($data['link']!=10){
			$this->upload_photo_link();}
						
			return $result;
		
}


function upload_photo()
	{
		$this->load->helper('string');
						
		$productid=$this->supplier_model->initialize_product();			
			$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "PNG", "JPEG", "GIF");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
			&& ($_FILES["file"]["size"] < 3000000)
			&& in_array($extension, $allowedExts))
				{
					$data['error']=0;
					if ($_FILES["file"]["error"] > 0)
							{
								$id['error']='error loading file';
								$this->load->view('Supplier/upload_form',$id);
							}
					else
							{
								$file_location = $_FILES["file"]["tmp_name"];
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
													$data['desc']='none';
											
													$id['picture_id'] = $this->picture_model->store_photo($data);
													$id['product_id']=$productid;
													
													$data['productid']=$productid;
													$data['images']=$file_name;
													$this->supplier_model->map_product_photo($id);
													$this->load->view('Supplier/product_detail',$data);
													
													
													}
												else {
													$id['error']='Unable to Upload';
													$this->load->view('Supplier/upload_form',$id);
													}		
									}	
					}	
			
			}
			else
				{
				$id['error']='Invalid File Type';
				$this->load->view('Supplier/upload_form',$id);	
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


	
	

function photo_link() {

	$productid=$this->supplier_model->initialize_product();						
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
	
			$file_name = $this->set_file_name();
			{
			$file_name=$this->set_file_name();
			}
		
			$file_name = $file_name.'.'.$link_ext;
			
		$file_location = $this->image_path.'/'.$file_name;
		copy($link, $file_location);
		
			$this->s3->putBucket('EasableImages', S3::ACL_PUBLIC_READ);
			$s3result=$this->s3->putObjectFile($file_location,'EasableImages',$file_name, S3::ACL_PUBLIC_READ);
					
			//if s3 responds with something return 1 to the site page view
			if($s3result) {
				$data['file_name']=$file_name;
				$data['orig_src']=$link;
				$data['desc']=NULL;
				$this->picture_model->store_photo($data);	
				unlink($file_location);
				$data['productid']=$productid;
				$data['images']=$file_name;
				
				if($this->input->is_ajax_request()){
				return $data;}
				else{
				$this->load->view('Supplier/product_detail',$data);}
				
				}
			else {	
					$id['error']='Unable to Upload';
					$this->load->view('Supplier/upload_form',$id);
				}}	
				
		
		try{
			$html = file_get_html(urldecode(trim($link)));
		}
		catch (exception $e){ 
			$data['error']='Error:'.$e;
			redirect(base_url('index.php/Supplier/response'));
		}
	
		if($html->find('title'))
		{
			$titles = $html->find('title');
			
			$title=$titles[0];
			$data['title']=$title->plaintext;
		}
			
		$url=parse_url($link);
		$data['store']=$url['host'];
		
		preg_match( '/(\$[0-9,]+(\.[0-9]{2})?)/', $html, $matches);
		if($matches||!empty($matches)||$matches[0]!=NULL)	
			{$data['price']=$matches[0];}
		
		if ($html->find ( 'img' )) {
		foreach($html->find('img') as $element)
		{
			$image=$element->src;
			$src= url_to_absolute($link,$image);
			$nodes[]=$src;
		}
		$data['orig_src']=$link;
		$data['productid']=$productid;
		$data['images']=$this->imageDownload($nodes);
		
		if($this->input->is_ajax_request()){
				$this->load->view('Supplier/product_detail2',$data);}
				else{
				$this->load->view('Supplier/product_detail',$data);}
		}
		else {$id['error']='Unable to Upload';
			$this->load->view('Supplier/upload_form',$id);}
	}
	
else {
$id['error']='Please add a URL';
$this->load->view('Supplier/upload_form',$id);}
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
			if($size = @getimagesize($temp)){
			if($size[1]>80){
			$res[]=$url;
			}
			else {unlink($temp);
			}}
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
	 
	
function upload_photo_link()
{
	
	$this->image_path= realpath(APPPATH.'/images');
	$images =json_decode($_POST['images']);
	
	if(!empty($_POST['desc'])&&$_POST['desc']!=NULL&&isset($_POST['desc'])){
	$desc =	$_POST['desc'];	}
	else {$desc = NULL;}
	
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
	$html="";		
	//if s3 responds with something return 1 to the site page view
	if($s3result) {
		$data['desc']=NULL;
		$data['file_name']=$file_name;
		$data['orig_src']=$image;
		$id['picture_id']=$this->picture_model->store_photo($data);	
		unlink($file_location);
		
		$id['product_id']=$this->input->post('productid');
		$this->supplier_model->map_product_photo($id);
		$product_name=$this->input->post('name');
		
		$html.="<div class = 'drag_container'><img class = 'draggable' src='https://s3.amazonaws.com/easableimages/{$file_name}' height=100 title ='{$product_name}'></div>";
		
	}else {$html=0;}
	
	
		
	} echo $html;
	
	
	}
		
		
	
}
	

	