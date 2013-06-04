<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class = "center bgcontainer"><BR>
<div class = "seventy" style= "height:80px;">
<table class = "left-align">
<tr><td width = "82%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<td width= "100%">
<?php
 echo '<a class = "condensed black_text medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;DESIGNS&nbsp;&nbsp;</a>';
 echo '<a class = "condensed black_text medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;LOG OUT</a>'; 
?>
</td></table>
</div>
<BR><BR>



<br>
<div class = "seventy clear border white">
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
			
			 echo '<tr class = "horizontal"><td><p class= "medium sanslight">'.$key->designer_name.'</p></td></tr>';
		      echo '<tr> <td><p class="small sanslight dark_gray_text">YOUR PERSONAL DECORATOR</p><br><BR></td></tr>';
			  echo '<tr><td><p class = "sanslight small">'.$key->designer_phone_number.'<Br></p></td></tr>';
			  echo '<tr><td><hr class = "third style"></td></tr>';
		      echo '<tr><td><p class = "sanslight small ">'.$key->designer_email.'<br></p></td></tr>';
	   }
	  ?>
	
	 </table>
<?php
   }
?>
</div>


<?php
if(isset($userdetails))
{
?>
<div id = "user" >

<p class = "left-align sanslight medium">Account Information</p>
<hr class = "style">
<div class = "left-align ">
<?php
$userid="";
foreach($userdetails as $key)
{

echo '<table class = "sanslight seventy midsmall left-align">';
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
echo '<tr><td></td><td><a class = "button3 center white_text condensed midsmall" href = "'.base_url().'index.php/Users/site/UserEditInformation/">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a></td></tr>';
echo '</table>';
echo '<BR><BR>';

}
?>
</div>
<?php
}
?>
</div>

<?php
if(isset($roomsassociated))
{
?>
<div id = "rooms" class = "left-align">
<p class = "left-align sanslight medium">User Room Information:</p>
<hr class = "style">
<br><BR>
<?php


echo '<table width = "100%" class = "sanslight midsmall center dark_gray_text">';
echo '<tr width= "100%">';
echo '<td width= "15%">Room Type<Br><Br></td>';
echo '<td width= "15%">Budget<Br><Br></td>';
echo '<td width= "20%">Width/Length<Br><Br></td>';
echo '<td width = "40%">Room Photos<Br><Br></td></tr>';
foreach($roomsassociated as $key){
echo '<tr class = "light_gray border"><td>'.$key->room_type.'</td>';
echo '<td>'.$key->budget.'</td>';
echo '<td>'.$key->width.'ft/ '.$key->height.'ft</td>';
if ($key->room_photo1=='not submitted')
{echo '';}
else {
echo '<td><img class = "middle inactive inline" src = "'.$key->room_photo1.'" width="100px">';}


if($key->room_photo2=='not submitted')
{echo '';}
else{
echo '<img class = "middle inactive inline" src="'.$key->room_photo2.'" height="100px"/></td>';}
echo '<td><a class = "button3 condensed midsmall white_text" href="'.base_url().'index.php/Rooms/room/editroominfo/'.$key->id.'/'.$key->user_id.'">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>';

}
$roomtype=$key->room_type;
$user_id = $key->user_id;
$room_id = $key->id;
?>

</table>
<br><BR>


<?php
}
?>
</div>

<?php
if(isset($userpreference))
{
?>
<div id= "preferences" class = "left-align" >

<p class = "medium left-align sanslight">Styles Chosen:</p>
<hr class= "style left-align ">

<table>
<tr>
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

       	$i=1;	
		while($i<15)
		{
		if(in_array($i,explode(',',$key->style_pics))){
		echo '<td>';
		echo '<img class = "inactive" src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height=150em ></div>';
		echo '</td>';
		}
		$i++;
		}	
}?>
</tr>
</table>
<br><br>
<p class = "medium sanslight">Colors Chosen:</p>
<hr class = "style">

<table class = "center"><tr>

<?php 

foreach ($userpreference as $key){
	 	foreach($colorstylenumber as $keycolor)
	 	{
			
			if(in_array($keycolor->color_id,explode(',',$key->color_pics)))
			echo'<td><div style="background-color:'.$keycolor->color_code.'height:100px;width:100px;">&nbsp;</div>';
			echo '</td>';
	    }
	    echo'</tr>';
        

}
?>
</table>

<BR><BR>
<?php
echo '<a class = "button3 center midsmall condensed " href="'.base_url().'index.php/Rooms/room/editroominfo/'.$room_id.'/'.$user_id.'">&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>';
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