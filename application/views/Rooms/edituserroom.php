<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<script type="text/javascript" src=<?php echo base_url("assets/Scripts/user_validation.js")?>></script>
<div class = "header white">
<div class = "logo">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
<div class = "right">
	
<?php
 echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/Users/site/login/"> Accountinformation </a>';
?>
</div>
</div>


<div class = "center bgcontainer">
<br>
<div class = "seventy padding border white">

<?php
$attributes = array('class' => 'updateform', 'id' => 'updateform','enctype' => 'multipart/form-data');
echo form_open('Rooms/site/updateroominfo/',$attributes);
?>
<BR>

	<div id="div_show_error_message" name="div_show_error_message"></div>

<?php

foreach($roomassociateduserid as $key)
{
   $BR="";
   $LR=""; 
   if($key->room_type=="BR")
   $BR="selected";
   elseif($key->room_type=="LR")
   $LR="selected";
?>	
<div class = "border padding_small">
<p class = "medium left-align sanslight">Edit Your Room Information:</p>	<BR><BR>
<table class = "sanslight midsmall left-align dark_gray_text">
<tr width="100%"><td width: "30%">Room Type:</td>
	<td width= "60%">

		<select name="update_room_type" class = "sanslight small" id="update_room_type">
			<option value="BR" <?php echo $BR;?>>Bedroom</option>
			<option value="LR" <?php echo $LR;?>>Living Room</option>
	   </select>
	   </td></tr>
	
   
	<tr><td>Budget:</td>
	<td><input class = "sanslight small" type="textbox" value="<?php echo $key->budget;?>" id="update_budget" name="update_budget"/>
	</td></tr>
	<tr><td>
	Room Photo1:</td>
	<td><input type="file" name="update_photo1" id="update_photo1"/>
	</td></tr>
	
	<tr><td>Room Photo2:</td>
	<td><input type="file" name="update_photo2" id="update_photo2"/>
	</td></tr>
	
   <tr><td>
			Width:</td>
		  <td><input class = "sanslight small"  type="textbox" value="<?php echo $key->width;?>" name="update_width" id="update_width"/>
		  </td></tr>
		  <tr><td>Height:</td>
		  <td><input class = "sanslight small" type="textbox" value="<?php echo $key->height;?>" name="update_height" id="update_height"/>
		  </td></tr>
		  </table>
	   
<?php	
          echo '<input type="hidden" id="hold_id" name="hold_id" value="'.$key->id.'"/>';	
	}
	
?>
</div>
<BR><BR>
<div class = "padding_small border left-align">
	<p class = "sanslight medium">Style Pics:</p><BR><BR>
	<?php
	foreach($userselectcolorstyle as $cskey)
		{
		$colorpic=	explode(',',$cskey->color_pics);
		$stylepic=	explode(',',$cskey->style_pics);
		$roomtype=$cskey->room_type;
		}
		$roomfolder;
	if($roomtype=="BR")
			{
				$roomfolder="Bedroom";
				
			}
			elseif($roomtype=="LR")
			{
				$roomfolder="LivingRoom";
				
			}
	?>
<div style="width:800px;" id="select_room">
<?php
		
		$i=1;
		
		while($i<10)
		{
			
			if(in_array($i,$stylepic))
			{
			$sel="checked";
			$active = "active";}
			else{
			$active = "inactive";
			$sel="";}
			
			
	echo '<div class = "inline">';
	echo '<input type="checkbox" name="style[]" id="style[]" value = '.$i.' class="cbox" '.$sel.'/>';
	echo '<img class = '.$active.' src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height="150px"></div>';
	$i++;
		
		}	
		?>
    </div>
		</div>
	<br/><br/>
	 <div style="width:800px;float:left;display:none;" id="option_room">
	 <?php
	 if($roomfolder=="Bedroom")
	 {
	  $optionroomfolder="LivingRoom";
	  $roomtype="LR";
	 }
	 elseif($roomfolder=="LivingRoom")
	  {
	  $optionroomfolder="Bedroom";
	  $roomtype="BR";
	 }
	 $i=1;
	  while($i<10)
		{
		
			echo'<div style="float:left;">
		<input type="checkbox" name="optionstyle[]" id="optionstyle[]" value = '.$i.' class="cbox" />
		<img class = "inactive" src ='.base_url('assets/Images/'.$optionroomfolder.'/'.$roomtype.''.$i.'.jpg').' height=100em width=100em></div>';
			$i++;
		
		}	
	 ?>
	 </div>
<br/>
	 <div class = "border padding_small left-align">
			<p class = "sanslight medium">Color Pics:</p><BR><BR>
		<?php 	
          foreach($colorstylenumber as $colorkey)
          {
             if(in_array($colorkey->color_id,$colorpic)){
			 $sel="checked";
			 $active = "active";}
			 else{
			 $sel="";
			 $active = "inactive";}
			 echo '<div class = "inline">';
			 echo'<div class = '.$active.' style="width:100px;height:120px;display:inline-block"><div style = "background-color:'.$colorkey->color_code.'height:100px;">&nbsp;</div>
		     <input type="checkbox" class="colorpics cbox" name="color[]" id="color[]" value = '.$colorkey->color_id.' '.$sel.' /></div>';
			echo '</div>';
		 }	
	   ?>
   </div>

	<div ><BR>
		<input type="button" value="update" id="update_room" class = "button3 medium condensed" name="update_room">	  
	    </div>
<input type="hidden" id="holduserid" name="holduserid" value="<?php echo $userid; ?>"/>
<input type="hidden" value="" id="holdstyle" name="holdstyle"/>
<input type="hidden" value="" id="holdcolor" name="holdcolor"/>
	<?php echo form_close(); ?>
		</div>
	<div class = "push"></div>	
	</div>	
		
</form>		

<script>
 $(".cbox").hide();

$(".inactive").click(function(){
$(this).toggleClass('active');
var checkbox = $(this).parent().find('.cbox');
		checkbox.prop('checked',!checkbox[0].checked);
});
</script>
