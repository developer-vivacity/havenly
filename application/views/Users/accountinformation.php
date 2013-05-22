<?php
 echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>'; 
?>
  <table>
	 <?php
     
	  foreach($designerinformation as $key)
	  {
            echo '<tr><td><img src="'.$key->designer_picture.'"></td></tr>';
		      echo '<tr><td>Your Designer is:</td><td>'.$key->designer_name.'</td></tr>';
		      echo '<tr><td>Her Phone Number is:</td><td>'.$key->designer_phone_number.'</td></tr>';
		      echo '<tr><td>Her Email Address is:</td><td>'.$key->designer_email.'</td></tr>';
	   }
	  ?>
	 </table>

<p><h1>User Information:<h1></p>
<table>
<tr><td>&nbsp;First Name&nbsp;</td><td>&nbsp;Last Name&nbsp;</td><td>&nbsp;Email&nbsp;</td><td>&nbsp;Address&nbsp;</td><td>&nbsp;Phone Number&nbsp;</td><td>&nbsp;Zip Code&nbsp;</td></tr>
<?php
$userid="";
//foreach($roomsassociated as $key)
foreach($userdetails as $key)
{
  if($userid!=$key->id)
   {
     $userid=$key->id;
     echo '<tr><td>&nbsp;'.$key->first_name.'&nbsp;</td><td>&nbsp;'.$key->last_name.'&nbsp;</td><td>&nbsp;'.$key->email.'&nbsp;</td><td>&nbsp;'.$key->phone.'&nbsp;</td><td>&nbsp;'.$key->address.'&nbsp;</td><td>&nbsp;'.$key->zipcode.'&nbsp;</td></tr>';
    }
}
?>
</table>
<p><h1>User Room Information:<h1></p>
<table>
<tr><td>&nbsp;Roomtype&nbsp;</td><td>&nbsp;Budget&nbsp;</td><td>&nbsp;Room Width/Height&nbsp;</td><td>&nbsp;Room Photo1&nbsp;</td><td>&nbsp;Room Photo1&nbsp;</td></tr>
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
   echo '<tr><td>&nbsp;&nbsp;'.$key->room_type.'&nbsp;</td><td>&nbsp;&nbsp;'.$key->budget.'&nbsp;</td><td>&nbsp;&nbsp;'.$key->width.'/'.$key->height.'&nbsp;</td><td><img src="'.$key->room_photo1.'" width="100px" height="100px"/></td><td><img src="'.$key->room_photo2.'" width="100px" height="100px"/></td></tr>';
}
?>
</table>
<p><h1>User Preference Information:</h1></p>

<table>
<tr><td>&nbsp;Style Pics&nbsp;</td><td>&nbsp;Color Pics&nbsp;</td></tr>
<?php
foreach($userpreference as $key)
{
echo '<tr><td>&nbsp;&nbsp;'.$key->style_pics.'&nbsp;</td><td>&nbsp;&nbsp;'.$key->color_pics.'&nbsp;</td></tr>';

}
?>

</table>




