<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<?php 
 echo '<p><a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a></p>';
 echo '<br/>';
 echo '<br/>';

echo '<p><a href="#CurrentUser"  rel="CurrentUser">Current User</a>&nbsp;|&nbsp;<a href="#CurrentRoom"  rel="CurrentRoom">Current Room</a>&nbsp;|&nbsp;<a href="#currentref"  rel="currentref">Style Prefs</a>&nbsp;|&nbsp;<a href="#productdesign" rel="productdesign">Product and Design Response</a></p>';
echo'<p>&nbsp;</p>';
$style_pics="";
$color_pics="";
$roomtype="";
$optionroomfolder="";
$otherroom_type="";
$choosebyitems="";
$buyitems=array();
$checktitems=array();
$currentroomid="";
$currentuserid="";
foreach($roomwithuser as $key)
{
    
         $currentroomid=$key->id;
         
         $currentuserid= $key->user_id;        
         
         $roomtype=$key->room_type;	
	
	 $key->room_type = ($key->room_type=="BR"?"Bedroom":"LivingRoom");
	
	$optionroomfolder=$key->room_type;
	
	$otherroom_type=($roomtype=="BR"?"LR":"BR");
	
	$otherroom_folder=($optionroomfolder=="LivingRoom"?"Bedroom":"LivingRoom");
	
	echo '<table id="CurrentUser" class="adminmain" style="display:block;">';
	
	echo '<tr><td>User Name</td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	
	echo '<tr><td>User Phone</td><td>'.$key->phone.'</td></tr>';
	
	echo '<tr><td>User Email</td><td>'.$key->email.'</td></tr>';
	
	echo '<tr><td>User Address</td><td>'.$key->address.'</td></tr>';
	echo '</table>';
	$attributes = array('class' => 'updateform', 'id' => 'updateform');
         echo form_open('Admin/site/update_room_status_by_admin/',$attributes);
        
         echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
         echo '<input type="hidden" name="userroomid" id="userroomid" value="'.$key->id.'"/>';
         echo '<input type="hidden" name="userid" id="userid" value="'.$key->user_id.'"/>';
         echo '<table id="CurrentRoom" class="adminmain" style="display:none;">';
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
<table id="currentref" class="adminmain" style="display:none;">
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
<?php
echo '<div id="productdesign" class="adminmain" style="display:none;">';
?>

	<?php
	
if(sizeof($designassociaterooms)>0)
	 {
?>

<table>

<tr><td>&nbsp;</td></tr>

<tr>
<td>&nbsp;
Design Name:
</td>
</tr>
<tr><td>
&nbsp;
</td></tr>
<tr>
<td>
<?php

foreach($designassociaterooms as $key)
{
	
  echo '<div>&nbsp;&nbsp;<a href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.$key->design_name.'/'.$roomid.'/'.$currentuserid.'">'.$key->design_name.'</a></div>';
	
}
?>

</td>
</tr>
<?php
}
?>
<tr><td>&nbsp;
	<?php
        $data = array(
              'name'        => 'AddDesigntext',
              'id'          => 'AddDesigntext',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '20'
            );
        echo form_input($data);

      ?>
	
	</td></tr>
	<tr><td>&nbsp;
    <?php
	 $data = array(
	     'type'=>'button',
              'name'        => 'NewDesign',
              'id'          => 'NewDesign',
              'value'       => 'Add New Design',
              'onClick'    =>  'show_add_design('.$roomid.')'
            );

          echo form_input($data);

      ?></td></tr>

</table>


</div>
<script>
function show_add_design(roomid)
{	
	 $("#enterdesign").remove();
	 if($("#AddDesigntext").val().trim()=="")
          $("#AddDesigntext").before('<p id="enterdesign">*Enter Desigen Name</p>');
          else
          {
           location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#AddDesigntext").val().trim();		  
          }
	
	
}

</script>
