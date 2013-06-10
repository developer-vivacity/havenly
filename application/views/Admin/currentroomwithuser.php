
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<p><a href="#CurrentUser"  rel="CurrentUser">Current User</a>|<a href="#CurrentRoom"  rel="CurrentRoom">Current Room</a>|<a href="#currentref"  rel="currentref">Style Prefs</a>|<a href="#">Product and Design Response</a></p>

<?php
$style_pics="";
$color_pics="";
$roomtype="";
$optionroomfolder="";
$otherroom_type="";
//var_dump($roomwithuser);
foreach($roomwithuser as $key)
{
    $roomtype=$key->room_type;	
	
	$key->room_type = ($key->room_type=="BR"?"Bedroom":"Living Room");
	
	$optionroomfolder=$key->room_type;
	
	$otherroom_type=($roomtype=="BR"?"LR":"BR");
	$otherroom_folder=($optionroomfolder=="Living Room"?"Bedroom":"Living Room");
	echo '<table id="CurrentUser" class="adminmain">';
	
	echo '<tr><td>User Name</td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	
	echo '<tr><td>User Phone</td><td>'.$key->phone.'</td></tr>';
	
	echo '<tr><td>User Email</td><td>'.$key->email.'</td></tr>';
	
	echo '<tr><td>User Address</td><td>'.$key->address.'</td></tr>';
	echo '</table>';
	$attributes = array('class' => 'updateform', 'id' => 'updateform');
    echo form_open('Admin/site/update_room_status_by_admin/',$attributes);
    echo '<input type="hidden" name="userroomid" id="userroomid" value="'.$key->id.'"/>';
    echo '<input type="hidden" name="userid" id="userid" value="'.$key->user_id.'"/>';
    echo '<table id="CurrentRoom" class="adminmain">';
	echo '<tr><td>Update Room Status</td><td><select name="update_room_type" id="update_room_type"><option value="'.$roomtype.'">'.$optionroomfolder.'</option><option value="'.$otherroom_type.'">'.$otherroom_folder.'</option></select><input type="submit" value="Update"></td></tr>';
	echo '<tr><td><img src="'.$key->room_photo1.'" height="100px" weight="100px"/></td><td><img src="'.$key->room_photo1.'" height="100px" weight="100px"/></td></tr>';
    
    echo '<tr><td>Room Type</td><td>'.$key->room_type.'</td></tr>';
    
    echo '<tr><td>Width/Height</td><td>'.$key->width.'ft/'.$key->height.'ft</td></tr>';
    echo '</table>';
    $style_pics=$key->style_pics;    
    $color_pics=$key->color_pics;    
     echo form_close(); 
}
?>
<table id="currentref" class="adminmain">
	
	<tr><td>Style Pic:</td></tr>
<tr>
	
<td >
	<?php 
	$style_pics= explode(',',$style_pics);
	$i=0;
	while($i<sizeof($style_pics)-1):
	$imgurl=base_url('assets/Images/'.$optionroomfolder.'/'.$roomtype.''.$style_pics[$i].'.jpg');
	?>
	<div style="float:left;"><img src="<?php echo $imgurl;?>" height="100px" width="100px"/></div>
	<?php
         $i=$i+1;
	    endwhile;
    ?>
	</td>

</tr>
<tr><td>Color pics:</td></tr>
<tr>
<td>
<?php

$color_pics=explode(',',$color_pics);
foreach($colorstyle as $key):
if(in_array($key->color_id,$color_pics))

echo'<div style ="height:100px;float:left;width:100px;background-color:'.$key->color_code.';">&nbsp;&nbsp;&nbsp;&nbsp;</div>';

?>
<?php
endforeach;
?>
</td>
</tr>
</table>
