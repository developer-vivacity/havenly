<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class = "header white">
<div class = "logo">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
<div class = "right">
	
<?php
 echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>'; 
?>
</div>
</div>

<div class = "center bgcontainer">
<br>
<div class = "seventy border white">
<div id = "tabs">
<ul>
    <li><a href="#designer">DESIGNER</a></li>
    <li><a href="#user">PROFILE</a></li>
	<li><a href="#preferences">PREFERENCES</a></li>
    <li><a href="#rooms">ROOMS</a></li>
  </ul>
  
 <div id = "designer">
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
  <table class = "horizontal center">
 
	 <?php
     $url = base_url('assets/Images');
	  foreach($designerinformation as $key)
	  {
            echo '<tr class = "horizontal"><td><img src="'.$url.'/'.$key->designer_picture.'" height="150px"><br><BR></td></tr>';
			
			 echo '<tr class = "horizontal"><td><p class= "medium sanslight dark_gray_text">'.$key->designer_name.'</p></td></tr>';
		      echo '<tr> <td><p class="small sanslight dark_gray_text">YOUR PERSONAL DECORATOR</p><br><BR></td></tr>';
			  echo '<tr><td><p class = "sanslight small dark_gray_text">'.$key->designer_phone_number.'<Br></p></td></tr>';
			  echo '<tr><td><hr class = "third style"></td></tr>';
		      echo '<tr><td><p class = "sanslight small dark_gray_text">'.$key->designer_email.'<br></p></td></tr>';
	   }
	  ?>
	
	 </table>
<?php
   }
?>
</div>

<div id = "user">
<?php
if(isset($userdetails))
{
?>
<p class = "left-align sanslight medium">User Information:</p>
<br>
<div class = "left-align">
<?php
$userid="";
foreach($userdetails as $key)
{

echo '<table class = "sanslight seventy midsmall left-align dark_gray_text">';
echo '<tr width= "100%"><td width = "50%">First Name:<br><br></td>';
echo '<td width = "50%">'.$key->first_name.'<br><br></td></tr>';
echo '<tr><td>Last Name:<br><br></td>';
echo '<td>'.$key->last_name.'<br><br></td></tr>';
echo '<tr><td>Email:<br><br></td>';
echo '<td>'.$key->email.'<br><br></td></tr>';
echo '<tr><td>Address:<br><br></td>';
echo '<td>'.$key->address.'<br><br></td></tr>';
echo '<td>Phone Number:<br><br></td>';
echo '<td>'.$key->phone.'<br><br></td></tr>';
echo '<td>Zip Code:<br><br></td>';
echo '<td>'.$key->zipcode.'<br><br></td></tr>';
echo '</table>';
echo '<BR><BR>';

echo '<a class = "light_pink button2 blue_text condensed medium" href = "'.base_url().'index.php/Users/site/UserEditInformation/">Edit</a>';
   
}
?>
</div>
<?php
}
?>
</div>
<div id = "rooms">
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
</div>
<div id= "preferences">
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
</div>

</div>

</div>
<div class = "push"> 
</div>
<script>
$("#tabs").tabs();
</script>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>