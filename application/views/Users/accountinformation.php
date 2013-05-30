<?php
 echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>'; 
?>
<?php
if(isset($message))
{
	echo '<p>'.$message.'</p>';
}
?>
<?php
if(isset($designerinformation))
    {
?>
  <table>
	 <?php
     
	  foreach($designerinformation as $key)
	  {
            echo '<tr><td><img src="'.$key->designer_picture.'" width="100px" height="100px"></td></tr>';
		      echo '<tr><td>Your Designer is:</td><td>'.$key->designer_name.'</td></tr>';
		      echo '<tr><td>Her Phone Number is:</td><td>'.$key->designer_phone_number.'</td></tr>';
		      echo '<tr><td>Her Email Address is:</td><td>'.$key->designer_email.'</td></tr>';
	   }
	  ?>
	 </table>
<?php
   }
?>
<?php
if(isset($userdetails))
{
?>
<p><h1>User Information:</h1></p>
<table>
<tr><td>&nbsp;First Name&nbsp;</td><td>&nbsp;Last Name&nbsp;</td><td>&nbsp;Email&nbsp;</td><td>&nbsp;Address&nbsp;</td><td>&nbsp;Phone Number&nbsp;</td><td>&nbsp;Zip Code&nbsp;</td><td>&nbsp;</td></tr>
<?php
$userid="";
foreach($userdetails as $key)
{
  if($userid!=$key->id)
   {
     $userid=$key->id;
     echo '<tr><td>&nbsp;'.$key->first_name.'&nbsp;</td><td>&nbsp;'.$key->last_name.'&nbsp;</td><td>&nbsp;'.$key->email.'&nbsp;</td><td>&nbsp;'.$key->address.'&nbsp;</td><td>&nbsp;'.$key->phone.'&nbsp;</td><td>&nbsp;'.$key->zipcode.'&nbsp;</td><td><a href="'.base_url().'index.php/Users/site/UserEditInformation/">Edit</a></td></tr>';
    }
}
?>
</table>
<?php
}
?>
<?php
if(isset($roomsassociated))
{
?>
<p><h1>User Room Information:</h1></p>
<table>
<tr><td>&nbsp;Roomtype&nbsp;</td><td>&nbsp;Budget&nbsp;</td><td>&nbsp;Room Width/Height&nbsp;</td><td>&nbsp;Room Photo1&nbsp;</td><td>&nbsp;Room Photo1&nbsp;</td><td>&nbsp;</td></tr>
 <?php

foreach($roomsassociated as $key)
{
   if($key->room_photo1=="not submitted")
   $show_img_one="#";
   else
   $show_img_one=$key->room_photo1;
   
   if($key->room_photo2=="not submitted")
   {
   $show_img_two="#";
   }
   else
   {
   $show_img_two=$key->room_photo2;
   }
   echo '<tr><td>&nbsp;&nbsp;'.$key->room_type.'&nbsp;</td><td>&nbsp;&nbsp;'.$key->budget.'&nbsp;</td><td>&nbsp;&nbsp;'.$key->width.'/'.$key->height.'&nbsp;</td><td><img src="'.$key->room_photo1.'" width="100px" height="100px"/></td><td><img src="'.$key->room_photo2.'" width="100px" height="100px"/></td><td><a href="'.base_url().'index.php/Rooms/room/editroominfo/'.$key->id.'/'.$key->user_id.'">Edit</a></td></tr>';
  $roomtype= $key->room_type;

}
?>
</table>
<?php
}
?>
<?php
if(isset($userpreference))
{
?>
<p><h1>User Preference Information:</h1></p>

<table>
<tr><td>&nbsp;Style Pics:&nbsp;</td></tr>
<?php
$roomfolder;
	if($roomtype=="BR")
			{
				$roomfolder="Bedroom";
				
			}
			elseif($roomtype=="LR")
			{
				$roomfolder="LivingRoom";
				
			}
foreach($userpreference as $key)
{

        echo '<tr style="width:800px;" id="select_room"><td >';
		$i=1;	
		while($i<10)
		{
		if(in_array($i,explode(',',$key->style_pics)))
		echo'<div style="float:left;">
		<img class = "inactive" src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height=100em width=100em></div>';
		$i++;
		}	
		echo '</td></tr>';
		echo'<tr><td>&nbsp;Color Pics:&nbsp;</td></tr>';
	 	echo '<tr><td >';
	 	foreach($colorstylenumber as $keycolor)
	 	{
			
			if(in_array($keycolor->color_id,explode(',',$key->color_pics)))
			echo'<div style="background-color:'.$keycolor->color_code.'height:100px;float:left;width:100px;">&nbsp;</div>';
			
	    }
	    echo'</td></tr>';
        

}
?>
</table>
<?php
}
?>




