<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<script type="text/javascript" src=<?php echo base_url("assets/Scripts/user_validation.js")?>></script>


<div class = "center chevron"><BR>
<div class = "container">

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
              <li><a id = "servlink" href="<?php echo base_url().'/#services';?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url().'/#price'; ?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url().'/#goods';?>">Goods</a></li>
              <li><a id = "aboutlink" href="#">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<BR><BR><BR><BR>

<div class = "span10 offset1 white border">
<div class = "text-left offset1"><BR><BR>
<a class = "condensed midsmall" href="<?php echo base_url().'index.php/Users/site/login/'?>"> &larr;&nbsp;BACK&nbsp;&nbsp;</a> <BR><BR></div>

<div class = "span8 offset1">
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

<p class = "medium left-align sanslight">Edit Your Room Information:</p>	<hr class = "style">
<table class = "sanslight midsmall text-left dark_gray_text">
<tr width="100%"><td width: "30%">Room Type:</td>
	<td width= "60%">

		<select name="update_room_type" class = "sanslight small" id="update_room_type">
			<option value="BR" <?php echo $BR;?>>Bedroom</option>
			<option value="LR" <?php echo $LR;?>>Living Room</option>
	   </select>
	   </td></tr>
	
   
	<tr><td>Budget:</td>
	<td><input type="text" value="<?php echo $key->budget;?>" id="update_budget" name="update_budget"/>
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
		  <td><input class = "sanslight small"  type="text" value="<?php echo $key->width;?>" name="update_width" id="update_width"/>
		  </td></tr>
		  <tr><td>Height:</td>
		  <td><input class = "sanslight small" type="text" value="<?php echo $key->height;?>" name="update_height" id="update_height"/>
		  </td></tr>
		  </table>
	   
<?php	
          echo '<input type="hidden" id="hold_id" name="hold_id" value="'.$key->id.'"/>';	
	}
	
?>

<BR><BR>

	<p class = "sanslight medium">Style Pics:</p><hr class = "style">
	<?php
$colorpic=array();
$stylepic=array();
$roomtype="BR";
$roomfolder="Bedroom";

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
	echo '<img class = '.$active.' src ='.base_url('assets/Images/'.$roomfolder.'/'.$roomtype.''.$i.'.jpg').' height="100px" width="100px"/></div>';
	$i++;
		
		}	
		?>
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
	  while($i<12)
		{
		
			echo'<div style="float:left;">
		<input type="checkbox" name="optionstyle[]" id="optionstyle[]" value = '.$i.' class="cbox" />
		<img class = "inactive" src ='.base_url('assets/Images/'.$optionroomfolder.'/'.$roomtype.''.$i.'.jpg').' height="100px" width="100px"/></div>';
			$i++;
		
		}	
	 ?>
	 </div>
<br/>
	 <div class = "padding_small left-align">
			<p class = "sanslight medium">Color Pics:</p><hr class = "style">
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
<BR><BR>
	<div ><BR>
		<input type="button" value="update" id="update_room" class = "button3 medium condensed" name="update_room">	  
	    </div>
<input type="hidden" id="holduserid" name="holduserid" value="<?php echo $userid; ?>"/>
<input type="hidden" value="" id="holdstyle" name="holdstyle"/>
<input type="hidden" value="" id="holdcolor" name="holdcolor"/>
	<?php echo form_close(); ?>
		</div>
	<div class = "push"><BR><BR></div>	

	</div>		
	</div>	
</form>		

<script>
 $(".cbox").hide();

$(".inactive, .active").click(function(){
$(this).toggleClass('active');
var checkbox = $(this).parent().find('.cbox');
		checkbox.prop('checked',!checkbox[0].checked);
});
</script>
	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>	