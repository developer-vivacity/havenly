<?php 
	include(APPPATH.'/views/templates/header.php');
	
?>
<!---add script by kbs----------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js">
</script>
<!-- ACCOUNT TOP NAV -->
<div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "85"></a></div>
    <div class="account-nav-left">
	<ul id="bstabs">
	<li><a href="#status"  rel="status">STATUS </a></li>
      <li><a href="#designer" rel="designer">YOUR ACCOUNT</a></li>
      <li><a href="#preferences" rel="preferences">YOUR PREFERENCES</a></li>
      <?php
       if($conceptboard[0]->total>0):
       ?>
         <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">YOUR INITIAL CONCEPT BOARDS</a></li>
   <?php
    endif;
     ?>

	 
	 
    <?php 
       if(sizeof($designforloginuser)>0)
       {
         echo '<li><a href="#designs" rel="designs">VIEW DESIGN & SHOP</a></li>';
       }
   ?>
 
    </ul>
  </div><!-- nav left -->
  <div class="account-nav-right">
    <ul>
      <li><a href ="<?php echo base_url().'index.php/Users/site/logout/'; ?>">Logout</a></li>
     </ul>
  </div><!-- nav right -->
  <div class="nav-mobile">
    <ul id="list-pages-accordion">
      <li>
        <a href=""><img src=<?php echo base_url('theme/img/menu.png'); ?> height = "25px"></a>
        <ul id="bstabs" class="dropdownList">
			<li><a href="#status"  rel="status">STATUS</a></li>
          <li><a href="#designer" rel="designer">YOUR ACCOUNT</a></li>
          <li><a href="#preferences" rel="preferences">YOUR PREFERENCES</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">INITIAL CONCEPTS</a></li>
	<?php
		  if(sizeof($designforloginuser)>0)
		  {
                    echo '<li><a href="#designs" rel="designs">Your Designs</a></li>';
                     }
		  ?>
	
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->	  
	  
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">
	 <!----add new hidden variable to store current page---->
	 
	 <input type = "hidden" id = "siteurl" name = "siteurl" value = <?php echo base_url(); ?>>
	 <?php
	echo (isset($_GET["a"])?'<input type="hidden" id="currentpage" name="currentpage" value="'.$_GET["a"].'"/>':'<input type="hidden" id="currentpage" name="currentpage" value="status"/>');
	if(isset($roomsassociated))
	{
	foreach($roomsassociated as $key){
	$roomtype=$key->room_type;
	$user_id = $key->user_id;
	$room_id = $key->id;
	$room_status=$key->status;}}
	
	
	?>

 <div class = "usermain" id = "designer" style="display:none;"> 
<div class="welcome-page">
<div class="designer-information">
	<?php
	if(isset($message))
	{
	echo '<p class = "error">'.$message.'</p>';
	}
	?>
	
	
		<?php
		if(isset($designerinformation))
			{
	
			$i =1;
			$url = base_url('assets/Images');
			foreach ($designerinformation as $key)
			{
				if ($i==1) {?>
				 <div class = "designerimage"><img  src="<?php echo $url.'/'.$key->designer_picture; ?>" height="100%"></div>
				<div class="designer-info">
					<p class="designer-name"><?php echo $key->designer_name; ?></p>
					<p class="designer-contact">Your Personal Decorator</p>
					<hr>
					<p class="designer-contact"><?php echo $key->designer_phone_number; ?></p>
					<p class="designer-contact"><?php echo $key->designer_email; ?></p>
				</div>
				<?php
				$i++;}
            		}}
      ?>
   
   </div><!-- designer info -->
  <div class="user-information">
<?php
	if(isset($userdetails))
	{
		$attributes = array('class' => 'updateform', 'id' => 'updateform');
		echo form_open('Users/site/updatedata/',$attributes);

		echo '<div id="div_show_error_message" class="alert alert-error" style="display:none;"> </div>';
		echo '<input type = "hidden" name = "passcheck" id = "passcheck">';
		foreach($userdetails as $key)
		{
			echo '<table class = "midsmall table-center">';
			echo '<tr width= "100%"><td class = "dark_gray_text sanslight"><img src = "'.base_url('assets/Images/icon-user.png').'" height="15">';
			echo '&nbsp;&nbsp;<input id = "update_name" name = "update_name" class = "small-input sanslight" type = "text" value ="'.$key->first_name.'"/><input class = "sanslight" type="text" value="'.$key->last_name.'" id="update_last_name" name="update_last_name"/></td></tr>';

			echo '<tr><td class="sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-email.png').'" height="15">';
			echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_email" id = "update_email" type = "text" value = '.$key->email.'></td></tr>';
			echo '<tr>';
			echo '<td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-phone.png').'" height="15">';
			echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_phone" id = "update_phone" type = "text" value ='.$key->phone.'><br><br></td></tr>';
			

			echo '<tr><td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-home.png').'" height="15">';

		if ($key->address ==0)
		{
			echo '&nbsp;&nbsp;<input type = "text" name = "update_address" id = "update_address" class = "sanslight" value = "Add Your Address"></td></tr><tr><td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-home.png').'" height="15">&nbsp;&nbsp;<input class = "sanslight" type = "text" name = "update_zip" id = "update_zip" value = '.$key->zipcode.'>	<BR><BR></td></tr>';}
		else{
			echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_address" id = "update_address" type = "text" value ="'.$key->address.'"></td></tr><tr><td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-home.png').'" height="15">&nbsp;&nbsp;<input class = "sanslight" name = "update_zip" id = "update_zip" type = "text" value = '.$key->zipcode.'><br><br></td></tr>';
			}

			echo '<tr>';
			echo '<td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-pass.png').'" height="15">';
			echo '&nbsp;&nbsp;<input class = "sanslight small pwd" name = "update_password" id = "update_password" type = "text" value = "Update Password" ></td></tr>';
			echo '<td class = "sanslight dark_gray_text"><img src = "'.base_url('assets/Images/icon-pass.png').'" height="15">';
			echo '&nbsp;&nbsp;<input class = "sanslight small pwd" name = "update_password2" id = "update_password2" type = "text" value = "Confirm New Password"><BR><BR></td></tr>';

			echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/fblarge.png').'" height="15">';
			if($key->facebook==0){echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" name = "update_facebook" id = "update_facebook"  value = ""></td></tr>';}else{
			echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" name = "update_facebook" id = "update_facebook" value = '.$key->facebook.'></td></tr>';}
			echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/pinlarge.png').'" height="15">';
			if($key->pinterest==0){echo '&nbsp;&nbsp;<input class = "sanslight" name = "update_pinterest" id = "update_pinterest" type = "text" value = ""></td></tr>';}else{
			echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" name = "update_pinterest" id = "update_pinterest"  value = '.$key->pinterest.'></td></tr>';}
			echo '<tr><td class = "sans-serif" ><img src = "'.base_url('assets/Images/instaicon.png').'" height="15">';
			if($key->instagram=='Your Instagram Handle'||$key->instagram=='Your Instagram Page'||$key->instagram==''){echo '&nbsp;&nbsp;<input class = "sanslight" type = "text" name = "update_instagram" id = "update_instagram" value = ""></td></tr>';}else{
			echo '&nbsp;&nbsp;<input class = "sanslight" type = "text"   name = "update_instagram" id = "update_instagram" value = "'.$key->instagram.'"></td></tr>';}

			echo '</table>';
			echo '<BR><BR>';
			echo '<div class = "text-center" id = "buttonhold"><input class = "button4 seventy midsmall black condensed" type="button" value="U P D A T E" id="update_update"></div>';
 }
?>
</div>
<?php
}
?>
</div>
<?php echo form_close(); ?>
</div><!--END ACCOUNT TAB -->




<div class = "usermain" id = "designs"> <BR><BR>
<?php
//-----update code by kbs for user design ready----------------------//
echo '<input type="hidden" id="sitepath" value="'.base_url().'" name="sitepath"/>';
if(sizeof($designforloginuser)>0)
    {
?>
<?php
if (sizeof($designforloginuser>1)){
echo '<div class = "carousel" id = "myCarousel2">';
echo '<div class = "carousel-inner text-center">';}

?>

 <?php
           $url = base_url('assets/Images');

         	$i=1;

           if(isset($deletedesigninfo))
           {
			echo '<div class = "alert alert-error">'.$deletedesigninfo.'</div>';
           }
           foreach($designforloginuser as $key)
	  {
	  
		
		if ($i==1){
		   echo '<div class = "item active" id="room_des_'.$i.'">';}
		   else {echo '<div class = "designimage" id="room_des_'.$i.'">';}
                echo '<a href="'.base_url().'index.php/Cart/site/products_associate_design/'.$key->design_id.'">';
                echo '&nbsp; &nbsp;<img src="'.$key->filename.'" width = "100%"/>';
				echo '<div class = "designimagetext"><div class = "sanslight midlarge">C L I C K  &nbsp; T O  &nbsp;S H O P</div></div></a>';
                if(!empty($key->designer_notes))
                echo  '<div><span class = "serif midsmall"><b>A Note from your Designer:&nbsp;</b></span><span class = "serif midsmall">'.$key->designer_notes.'</span></div>';
                echo '</div>'; 
		   $i++;
	  }
	  ?>
</div>
<?php 

if (sizeof($designforloginuser)>1)
{
 echo '<a class="left carousel-control" href="#myCarousel2" data-slide="prev" onclick="slide_nav(\''.sizeof($designforloginuser).'\',\'prev\')">&lsaquo;</a>';
 echo '<a class="right carousel-control" href="#myCarousel2" data-slide="next" onclick="slide_nav(\''.sizeof($designforloginuser).'\',\'next\')">&rsaquo;</a>';
}

?>
	
</div>

<?php
   }
//------------end update code-----------//
?>
</div>
</div>




<?php
if(isset($userpreference))
{
?>
	<div id= "preferences" class = "usermain"  > 
	<div class="color-selections">
    <h2>Your preferred colors.</h2>
    <?php 
      foreach ($userpreference as $key){
      foreach($colorstylenumber as $keycolor)
        {
        if(in_array($keycolor->color_id,explode(',',$key->color_pics)))
        echo '<td><div style="background-color:'.$keycolor->color_code.'height:5em;width:15em;">&nbsp;</div>';
          }
        }
      ?>
	</div><!-- color selections -->

 

  <div class="style-selections">
    <h2>Your favorite styles.</h2>
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
	else {$roomfolder = "LivingRoom";
		$roomtype ="LR";}	
		
      foreach($userpreference as $key)
        {
          echo '<td class = "center">';
          $i=1; 
     while($i<20)
        {
      if(in_array($i,explode(',',$key->style_pics)))
        {
          echo '<img class = "inactive" src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.$i.'.jpg').' height=300em >';
        }
          $i++;
		} 	
		} }
		?>
  
  
 <!--<h2>Your projects.</h2>-->
	
<?php 


// echo '<table class= "table">';
// echo '<tr class = "medium">';
// echo '<td>Room Type</td>';
// echo '<td>Budget</td>';
// echo '<td>Width/Length</td>';
// echo '<td>&nbsp;</td></tr>';

// foreach($roomsassociated as $key){
// if ($key->room_type =='BR'){
// echo '<tr><td>Bedroom</td>';}
// else {echo '<tr><td>Living/Dining Room</td>';}

// if ($key->budget==0){
// echo '<td>&nbsp;</td>';} else{
// echo '<td>'.$key->budget.'</td>';}
// echo '<td>'.$key->width.'ft/ '.$key->height.'ft</td>';


//echo '<td><a class = "button3 condensed white_text" href="'.base_url().'index.php/Rooms/site/editroominfo/'.$key->id.'/'.$key->user_id.'">Edit</a>';
// }
// $roomtype=$key->room_type;
// $user_id = $key->user_id;
// $room_id = $key->id;
// $room_status=$key->status;
?></table>
  
  
</div><!-- preference-->
</div>
<!----For user status--------->
<div id ="status" class="usermain">
<div>

<?php 
$value = urldecode($room_status);
if ($value =='OPEN'|| $value =='CALLED'||$value == 'open'||$value=='Open'){
echo '<img src = "'.base_url('assets/Images/Process1.jpg').'" width="90%">';}

elseif ($value =='DESIGN'|| $value =='MOODBOARD REVIEW'){
echo '<img src = "'.base_url('assets/Images/Process2.jpg').'" width="90%">';}

elseif ($value =='PRODUCT REVIEW'){
echo '<img src = "'.base_url('assets/Images/Process3.jpg').'" width="90%">';}

elseif ($value =='FINAL DESIGN'||$value=='ORDER'||$value=='CLOSED'){
echo '<img src = "'.base_url('assets/Images/Process4.jpg').'" width="90%">';}

else {echo '<img src = "'.base_url('assets/Images/Process1.jpg').'" width="90%">';}

?>
</div>
</div>
<!----------------------------->
<input type="hidden" id="hold_cur_room_id" value="<?php echo $room_id;?>">
<BR><BR><BR>

</div>

</div>
<div class = "push"> 
</div></div>
<script>
$(document).ready(function()
{
      //  $('.carousel').carousel();
	    $(".usermain").hide();
	    $("#"+$("#currentpage").val()).show();
        $("#editroomstatus").hide();
  
		 $("#bstabs a").click(function()
		 {

		     if((this.rel!="Concepts")&&(this.rel!="designerAval"))
		     $(".usermain").hide();
		    
		      $("#"+(this.rel)).show();
	
      
	 });
		
		
		 });
		 

</script>

	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

