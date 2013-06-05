<?php

Class site extends CI_Controller 
{
   public $imagepath;
  function __construct() 
  {
      parent::__construct();
      $this->load->model('room_model');
      $this->load->model('preference_model');
      
      $this->load->model('Users/picture_model');
      $this->load->library('session');
      $this->load->library('s3');
      $this->load->helper(array('form', 'url'));
  }
  function editroominfo($id=null,$userid=null)
  {
    if(($this->session->userdata('first_name')!="") & $id!="" & $userid!="") 
    {
       $data["userid"]=$userid;
       $data["userselectcolorstyle"]=$this->preference_model->User_preference_information($userid);
       $data["colorstylenumber"]= $this->room_model->fetch_color_style_number();
       $data["roomassociateduserid"]= $this->room_model->updateroom_loginuser($id);
       $this->load->view('Rooms/edituserroom', $data); 
   }
   else
   {
   $this->load->helper('url');
   redirect('Users/site/login');
   } 
 }
//...for upload image 
function set_file_name()
{
    $file_name= random_string('numeric',9);
    $exists=$this->picture_model->check_name($file_name);
    if ($exists){$file_name= 0;}
    else {$file_name = $file_name;}
    return $file_name;
}	
 function roompicsuggestbyuser($name)
 {
  $this->image_path= realpath(APPPATH.'/images');


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
$this->imagepath="https://s3.amazonaws.com/easableimages/".$file_name;
unlink ($file_location);
return 1;
}
}
}}}
//---update room information.
  function updateroominfo()
  {
	  $imagepath1="";
	  $imagepath2="";
    if(isset($_FILES['update_photo1']['name']))
	 if($_FILES['update_photo1']['name']!="" & $this->roompicsuggestbyuser('update_photo1')!="" )  
     $imagepath1=$this->imagepath;
    if(isset($_FILES['update_photo2']['name']))
     if($_FILES['update_photo2']['name']!="" & $this->roompicsuggestbyuser('update_photo2')!="")  
     $imagepath2=$this->imagepath;

 if($imagepath1!="" & $imagepath2!="")     
$data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height'),'room_photo1'=>$imagepath1,'room_photo2'=>$imagepath2); 
elseif($imagepath1!="")     
$data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height'),'room_photo1'=>$imagepath1); 
elseif($imagepath2!="")     
$data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height'),'room_photo2'=>$imagepath2); 
else
$data=array('room_type'=>$this->input->post('update_room_type'),'budget'=>$this->input->post('update_budget'),'width'=>$this->input->post('update_width'),'height'=>$this->input->post('update_height')); 

     $this->room_model->updateroominfowithid($this->input->post('hold_id'),$data);
     $stylepic= $this->input->post('holdstyle').",";
     $colorpic =  $this->input->post('holdcolor').",";
     $data=array('style_pics'=>$stylepic,'color_pics'=>$colorpic, 'room_type'=>$this->input->post('update_room_type'));

     $this->preference_model->updateuserpreferenceinfowithid($this->input->post('holduserid'),$data);
    
     $this->load->helper('url');
    redirect('Users/site/login');
  }
  
}
?>
