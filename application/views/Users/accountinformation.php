<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<!---add script by kbs-------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js">
</script>
<!---------------------------->
 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="<?php echo base_url();?>">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a id = "servlink" href="<?php echo base_url('#services');?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url('#price');?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url('#goods');?>">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="<?php echo base_url('#contact');?>">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			<li><a class = "white_text sanslight" href = "<?php echo base_url().'index.php/Users/site/logout/';?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
	  
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">

  <div class = "text-center">
 <ul id = "bstabs" class = "nav nav-pills sanslight ">
<li ><a class = "pink white_text" href="#designer"  rel="designer">Your Account</a></li>
<li><a class = "pink white_text" href="#preferences"  rel="preferences">Your Preferences</a></li>
<li><a class = "pink white_text" href="#rooms"  rel="rooms">Your Rooms</a></li>
<?php if(sizeof($designforloginuser)>0){
echo '<li><a class = "pink white_text" href="#designs" rel="designs">YOUR DESIGNS</a></li>';
}?>
</ul></div>
 
<div class = "usermain text-center" id = "designer"> <BR><BR>
<?php
if(isset($message))
{
	echo '<p>'.$message.'</p>';
}
?>
<div class = "row">
<?php
if(isset($designerinformation))
    {
?>
<div class = "span5">
  <table class = "table-center >
 
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
	
	 </table></div><BR><BR>
<?php
   }
?>
<div class = "span5 offset1 left-align">

<?php
if(isset($userdetails))
{
?>
<?php

$attributes = array('class' => 'updateform', 'id' => 'updateform');
echo form_open('Users/site/updatedata/',$attributes);
?>

<?php
if(isset($mailmessage)){
echo '<div id="div_show_error_message" class="alert-error"> ';
echo $mailmessage.'</div>';}
?>

<?php
foreach($userdetails as $key)
{
echo '<table class = "midsmall table-center">';
echo '<tr width= "100%"><td class = "dark_gray_text sanslight"><i class = "icon-user"></i>';
echo '&nbsp;&nbsp;<input id = "update_name" name = "update_name" class = "sanslight" type = "text" value ="'.$key->first_name.'&nbsp;'.$key->last_name.'"></td></tr>';

echo '<tr><td class="sanslight dark_gray_text"><i class = "icon-envelope"></i>';
echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_email" id = "update_email" type = "text" value = '.$key->email.'></td></tr>';
echo '<tr>';
echo '<td class = "sanslight dark_gray_text"><i class = "icon-comment"></i>';
echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_phone" id = "update_phone" type = "text" value ='.$key->phone.'><br><br></td></tr>';

echo '<td class = "sanslight dark_gray_text"><i class = "icon-home"></i>';

if ($key->address ==0){echo '&nbsp;&nbsp;<input type = "text" name = "update_address" id = "update_address" class = "sanslight" value = "Your Address">&nbsp;<BR><i class = "icon-home"></i>&nbsp;&nbsp;<input type = "text" name = "update_zip" id = "update_zip" value = '.$key->zipcode.'>	<BR><BR></td>';}
else{
	echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_address" id = "update_address" type = "text" value ='.$key->address.'>&nbsp;<br><i class = "icon-home"></i> <input class = "sanslight" name = "update_zip" id = "update_zip" type = "text" value = '.$key->zipcode.'><br><br></td></tr>';
	}


echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/fblarge.png').'" height="15">';
echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" value = '.$key->facebook.'></td></tr>';
echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/pinlarge.png').'" height="15">';
echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" value = '.$key->pinterest.'></td></tr>';
echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/instaicon.png').'" height="15">';
echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" value = "'.$key->instagram.'"></td></tr>';

echo '</table>';
echo '<BR><BR>';

echo '<div class = "text-center"><a class = "text-left light_pink button3 white_text third condensed midsmall" href = "'.base_url().'index.php/Users/site/UserEditInformation/">Edit</a></div>';
   
}
?>
</div>
<?php
}
?>
</div>
<?php echo form_close(); ?>

</div>

<div class = "usermain" id = "designs"> <BR><BR>
<?php
//-----update code by kbs for user design ready----------------------//
echo '<input type="hidden" id="sitepath" value="'.base_url().'" name="sitepath"/>';
if(sizeof($designforloginuser)>0)
    {
	   
?>
  <table class = "table-center span5" id="designer_table">
 
	 <?php
              
              $url = base_url('assets/Images');
              echo '<tr><td colspan="4"> You have a design ready.</td></tr>';
	  foreach($designforloginuser as $key)
	  {
              echo '<tr>
              <td>'.$key->design_name.'</td>
              <td><a href="'.base_url().'index.php/Cart/site/products_associate_design/'.$key->design_id.'">
              <img src="'.$key->filename.'" width="100px" height="100px"/></a></td>
              <td>'.$key->status.'</td>
              <td><a href="#"  onclick="delete_design('.$key->user_id.','.$key->design_id.','.$key->room_id.');">
              <img src="'.$url.'/delicon.fw.png" width="50px" height="50px"/></a>
              </td>
              </tr>';
	  }
	  ?>
	
	 </table><BR><BR>
<?php
   }
//------------end update code-----------//
?>
</div>



<?php

if(isset($roomsassociated))
{
?>
<div id = "rooms" class = "usermain left-align"> <BR><BR>

<?php


echo '<table class = "table">';
echo '<tr width = 80%>';
echo '<td>Room Type</td>';
echo '<td>Budget</td>';
echo '<td>Width/Length</td>';
echo '<td>&nbsp;</td></tr>';

foreach($roomsassociated as $key){
echo '<tr><td>'.$key->room_type.'</td>';

if ($key->budget==0){
echo '<td>&nbsp;</td>';} else{
echo '<td>'.$key->budget.'</td>';}
echo '<td>'.$key->width.'ft/ '.$key->height.'ft</td>';


echo '<td><a class = "button3 condensed white_text" href="'.base_url().'index.php/Rooms/site/editroominfo/'.$key->id.'/'.$key->user_id.'">Edit</a>';
}
$roomtype=$key->room_type;
$user_id = $key->user_id;
$room_id = $key->id;
?>


</table>
<br><BR><br><BR>
<?php
}
?>
<!-------embded video and picture ------------> 
<hr class = "style">
<p class = "condensed midsmall">Pictures</p>
<hr class = "style">
	<?php
	foreach($roompicture as $key)
	{
	  echo '<div class = "padding left-align inline"><img src="'.$key->filename.'" height="200px" width="300px"/></div>';	
		
	}
	?>
	</td><td>
	<?php
	foreach($roomvideo as $key)
	{
	 echo '<div style="width:600px;float:right;">
	     <iframe id="video" width="100%" height="315" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="'.$key->filename.'">
	     </iframe>
	   </div>';
	 
	}
	?>
	</td></tr>
	</table>
<!--------------------------------------------------->
</div>

<?php
if(isset($userpreference))
{
?>
<div id= "preferences" class = "left-align usermain"  > <BR><BR>


<hr class = "style">
<p class = "text-left condensed midsmall">&nbsp;Style Selections</p>
<hr class = "style">
<table class = "center">
<tr class = "center">
<?php
                          $roomfolder="";
	
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
echo '<td class = "center">';
       	$i=1;	
		while($i<15)
		{
		if(in_array($i,explode(',',$key->style_pics)))
		{
	
		echo '<img class = "inactive" src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height=150em >';
		}
		$i++;
		}	
}?>
</td>
</tr>
</table><BR><BR>
<hr class = "style">
<p class = "condensed text-left midsmall">&nbsp;Color Selections</p>
<hr class = "style">
<table class = "center"><tr>
<td>
<?php 

foreach ($userpreference as $key){

	 	foreach($colorstylenumber as $keycolor)
	 	{
			
			if(in_array($keycolor->color_id,explode(',',$key->color_pics)))
			echo '<td><div style="background-color:'.$keycolor->color_code.'height:100px;width:100px;">&nbsp;</div>';
			echo '</td>';
	    }
	   
        

}
?>
</td></tr>
</table>

<BR><BR>
<?php
echo '<a class = "button3 medium condensed " href="'.base_url().'index.php/Rooms/site/editroominfo/'.$room_id.'/'.$user_id.'">Edit</a>';
}
?>
</div>

</div>

</div>
<div class = "push"> 
</div><BR><BR><BR></div>
<script>
$(document).ready(function(){

   $(".usermain").hide();
   $("#designer").show();
  
		 $("#bstabs a").click(function()
		 {

		     $(".usermain").hide();
		     $("#"+(this.rel)).show();
	
      
		 });
		 
		 });


</script>

	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

