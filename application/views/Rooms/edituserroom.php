<head>
<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery-1.9.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("assets/Scripts/user_validation.js")?>></script>
</head>
<?php
echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/Users/site/login/"> Accountinformation </a>'; 
$attributes = array('class' => 'updateform', 'id' => 'updateform');

echo form_open('Rooms/room/updateroominfo/',$attributes);
?>

<h1>Edit User Room Information:</h1>	
	<div id="div_show_error_message" name="div_show_error_message"></div>
	<div style="width:800px;">
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
	<div style="width:800px;">
	<div style="width:300px;float:left;">Room Type:</div>
	<div style="width:500px;float:left;">

		<select name="update_room_type" id="update_room_type">
			<option value="BR" <?php echo $BR;?>>Bedroom</option>
			<option value="LR" <?php echo $LR;?>>Living Room</option>
	   </select>
	</div>
    </div>
    <div style="width:800px;float:left;">
	<div style="width:300px;float:left;">Budget:</div>
	<div style="width:500px;float:left;"><input type="textbox" value="<?php echo $key->budget;?>" id="update_budget" name="update_budget"/></div>
	</div>
	<div style="width:800px;float:left;">
	<div style="width:300px;float:left;">Room Photo1:</div>
	<div style="width:500px;float:left;"><input type="file" name="update_photo1" id="update_photo1"/></div>
	</div>
	<div style="width:800px;float:left;">
	<div style="width:300px;float:left;">Room Photo2:</div>
	<div style="width:500px;float:left;"><input type="file" name="update_photo2" id="update_photo2"/></div>
	</div>
   <div style="width:800px;float:left;">
			<div>Rough room dimensions:</div>
		    <div><input type="textbox" value="<?php echo $key->width;?>" name="update_width" id="update_width"/></div>
		    <div><input type="textbox" value="<?php echo $key->height;?>" name="update_height" id="update_height"/></div>
	    </div>
		
<?php	
echo '<input type="hidden" id="hold_id" name="hold_id" value="'.$key->id.'"/>';	
	}
	
?>
<div style="width:800px;float:left;">
	<div>Style Pics:</div>
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
			$sel="checked";
			else
			$sel="";
			
			
			echo'<div style="float:left;">
		<input type="checkbox" name="style[]" id="style[]" value = '.$i.' class="cbox" '.$sel.'/>
		<img class = "inactive" src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height=100em width=100em></div>';
			$i++;
		
		}	
		?>
		</div>
	 </div>
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
	 <div style="width:800px;float:left;">
			<div>Color Pics:</div>
		<?php 	
          foreach($colorstylenumber as $colorkey)
          {
             if(in_array($colorkey->color_id,$colorpic))
			 $sel="checked";
			 else
			 $sel="";
			 echo'<div style="float:left;width:100px;height:120px;border:solid 1px;"><div style = "background-color:'.$colorkey->color_code.'height:100px;">&nbsp;</div>
		     <input type="checkbox" class="colorpics" name="color[]" id="color[]" value = '.$colorkey->color_id.' '.$sel.' /></div>';

		 }	
	   ?>
   </div>

	<div style="width:800px;float:left;">
		<input type="button" value="update" id="update_room" name="update_room">	  
	    </div>
<input type="hidden" id="holduserid" name="holduserid" value="<?php echo $userid; ?>"/>
<input type="hidden" value="" id="holdstyle" name="holdstyle"/>
<input type="hidden" value="" id="holdcolor" name="holdcolor"/>
	<?php echo form_close(); ?>
		</div>
		
		
		
</form>		


