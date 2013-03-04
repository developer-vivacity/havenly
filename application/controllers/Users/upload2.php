<?php
Class Upload2 extends CI_Controller {

	function __construct() {
	
		parent::__construct();
		$this->load->library('s3');
		$this->load->model('users/picture_model');
		
		$user_auth=$this->session->userdata('is_logged_in');
		if(!$user_auth) {
		redirect (base_url());
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

						
	require_once(APPPATH.'/url_to_absolute_2.php');
	require_once(APPPATH.'simple_html_dom.php');
	$this->image_path= realpath(APPPATH.'/images');
	
if (isset($_POST['submit1']))
	{
	
	$value = $_POST['weblink'];
	if($value !='http://'&&$value!="")
	{
			$images = array();
			$link = trim($this->input->post('weblink'));
				
		 if(preg_match("/https?/", $link) == 0)
			{ $link = 'http://'.$link;}
			
	
		try{
			$html = file_get_html(urldecode(trim($link)));
		}
		catch (exception $e){ 
			$data['error']='Error:'.$e;
			redirect(base_url('index.php/users/site'));
		}
		
		
		if ($html->find ( 'img' )) {
		foreach($html->find('img') as $element)
		{
			$image=$element->src;
			$src= url_to_absolute($link,$image);
			$nodes[]=$src;
	}
	
		$data['images']=$this->imageDownload($nodes);
		$this->load->view('Users/test',$data);
		}
}}}


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
			$size = getimagesize ( $temp );
			if($size[1]>200){
			$res[]=$url;
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
	