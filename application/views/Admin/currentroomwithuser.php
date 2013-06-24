
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<p><a href="#CurrentUser"  rel="CurrentUser">Current User</a>|<a href="#CurrentRoom"  rel="CurrentRoom">Current Room</a>|<a href="#currentref"  rel="currentref">Style Prefs</a>|<a href="#">Product and Design Response</a></p>

<?php

//print_r($userroomdetails);

$style_pics="";
$color_pics="";
$roomtype="";
$optionroomfolder="";
$otherroom_type="";
$choosebyitems="";
$buyitems=array();
$checktitems=array();
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
  
    $style_pics=$key->style_pics;    
    $color_pics=$key->color_pics;    
    
}
?>


<?php

$buyitems=array('1'=>'Couch','2'=>'Coffee Table','3'=>'Bed','4'=>'Bed Frame/Headboard','5'=>'Art','6'=>'Chair','7'=>'Dresser','8'=>'Décor items','9'=>'Linens/Sheets','10'=>'Pillows','11'=>'Media','12'=>'Side Tables/Console Tables','13'=>'Nightstands','14'=>'Other');

if(isset($userroomdetails))
foreach($userroomdetails as $key)
{

   echo'<tr><td>Style notes:</td><td>'.$key->Style_notes.'</td></tr>';	
   echo'<tr><td>Ceiling Height:</td><td>'.$key->Ceiling_Height.'</td></tr>';	
   echo'<tr><td>Hates:</td><td>'.$key->Hates.'</td></tr>';	
   echo'<tr><td>Likes:</td><td>'.$key->Likes.'</td></tr>';		
   echo'<tr><td>Keep:</td><td>'.$key->Keep.'</td></tr>';
   echo'<tr><td valign="top">Buy:</td><td>';

   $checktitems=explode(',',$key->Buy);
   
   foreach($buyitems  as $newkey=>$newvalue)
   {
	  if(in_array($newkey, $checktitems))
	  { 
	   $choosebyitems=($newkey==14?$checktitems[sizeof($checktitems)-1]:$newvalue);
       echo '<div>'.$choosebyitems.'</div>';
      }
	   
  }

   echo '</td></tr>';	

}
echo '</table>';
 echo form_close(); 
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
