<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>

 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
	  <div class = "white">
	  
	  
	  
<div class = "container">
<BR><BR><BR>
<?php
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
}	

	echo '<div class = "row sanslight"><div class = "span2 bottom">Update Room Status</div><div class = "span8"><select name="update_room_type" id="update_room_type"><option value="'.$roomtype.'">'.$optionroomfolder.'</option><option value="'.$otherroom_type.'">'.$otherroom_folder.'</option></select>&nbsp;<input type="submit" class = "btn small" value="Update"></div></div><BR><BR><BR>';
?>


<ul id = "bstabs" class = "nav nav-pills sanslight ">
<li ><a class = "pink white_text" href="#CurrentUser"  rel="CurrentUser">User Information</a></li>
<li><a class = "pink white_text" href="#CurrentRoom"  rel="CurrentRoom">Room Information</a></li>
<li><a class = "pink white_text" href="#currentref"  rel="currentref">Style Selections</a></li>
<li><a class = "pink white_text" href="#productdesign" rel="productdesign">View/Add Design Responses</a></li>
</ul>
<BR>
<?php
foreach($roomwithuser as $key){
	
	echo '<table id="CurrentUser" class="adminmain table" >';
	
	echo '<tr><td>User Name</td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	
	echo '<tr><td>User Phone</td><td>'.$key->phone.'</td></tr>';
	
	echo '<tr><td>User Email</td><td>'.$key->email.'</td></tr>';
	
	echo '<tr><td>User Address</td><td>'.$key->address.'</td></tr>';
	
	echo '<tr><td>Zipcode</td><td>'.$key->zipcode.'</td></tr>';
	echo '<tr><td>Instagram</td><td>'.$key->instagram.'</td></tr>';
	echo '<tr><td>Facebook</td><td>'.$key->facebook.'</td></tr>';
		echo '<tr><td>Pinterest</td><td>'.$key->pinterest.'</td></tr>';
	echo '</table>';
	
	
	$attributes = array('class' => 'updateform', 'id' => 'updateform');
<<<<<<< HEAD
    
	
	echo form_open('Admin/site/update_room_status_by_admin/',$attributes);
        
         echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
         echo '<input type="hidden" name="userroomid" id="userroomid" value="'.$key->id.'"/>';
         echo '<input type="hidden" name="userid" id="userid" value="'.$key->user_id.'"/>';
=======
         echo form_open('Admin/site/update_room_status_by_admin/',$attributes);
         
         $roomstatus=array("Open" , "Called", "Design", "Moodboard Review", "Final Design", "Order", "Closed");
         
         echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
         echo '<input type="hidden" name="userroomid" id="userroomid" value="'.$key->id.'"/>';
         echo '<input type="hidden" name="userid" id="userid" value="'.$key->user_id.'"/>';
         echo '<table id="CurrentRoom" class="adminmain" style="display:none;">';
	echo '<tr><td>Room Type</td><td><select name="update_room_type" id="update_room_type"><option value="'.$roomtype.'">'.$optionroomfolder.'</option><option value="'.$otherroom_type.'">'.$otherroom_folder.'</option></select><input type="submit" value="Update"></td></tr>';
	echo '<tr><td>Update Room Status</td><td><select name="update_room_status" id="update_room_status">';
	
	foreach($roomstatus as $statuskey=>$statusvalue)
	{
	   $select=($key->status==$statusvalue?"selected":"");
	   echo '<option value="'.$statusvalue.'" '.$select.'>'.$statusvalue.'</option>';
		
	}
	
	echo'</select><input type="submit" value="Update"></td></tr>';
	
	echo '<tr><td><img src="'.$key->room_photo1.'" height="100px" weight="100px"/></td><td><img src="'.$key->room_photo1.'" height="100px" weight="100px"/></td></tr>';
         echo '<tr><td>Room Type</td><td>'.$key->room_type.'</td></tr>';
>>>>>>> 888815f33b4d9de6fa61b9a12f90725e1ef8c112
    
	echo '<table id="CurrentRoom" class="adminmain">';
	
	echo '<tr><td><img src="'.$key->room_photo1.'" height="300px" /></td><td><img src="'.$key->room_photo2.'" height="300px" /></td></tr>';
          echo '<tr><td>&nbsp;</td></tr>';
		    echo '<tr><td>&nbsp;</td></tr>';
		  
		echo '<tr><td>Room Type</td><td>'.$key->room_type.'</td></tr>';
		   echo '<tr><td>&nbsp;</td></tr>';
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
<table id="currentref" class="adminmain table" style="display:none;">
<tr><td>Style Pic:</td></tr>
<tr>
<td>
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



<tr>
<td>
<?php

foreach($designassociaterooms as $key)
{
	
<<<<<<< HEAD
  echo '<div>&nbsp;&nbsp;<a class = "sanslight" href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.$key->design_name.'/'.$roomid.'/'.$currentuserid.'">'.$key->design_name.'</a></div>';
	
=======
  echo '<div id="displaydesignname_'.$key->design_id.'"><div style="float:left;width:200px;"><a href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.$key->design_name.'/'.$roomid.'/'.$currentuserid.'">&nbsp;&nbsp;'.$key->design_name.'</a></div><div style="float:left;width:100px;"><a href="#" onclick="displayeditdesign(\'displaydesignname_'.$key->design_id.'\',\'modifydesignname_'.$key->design_id.'\',\''.$key->design_name.'\');">Edit</a></div></div>';
  echo '<div id="modifydesignname_'.$key->design_id.'" style="display:none;"><div style="float:left;width:300px;"><input type="text" value="'.$key->design_name.'" name="designtext'.$key->design_id.'" id="designtext'.$key->design_id.'"/></div><div style="float:left;width:100px;"><a href="#" onclick="Updatedesign(\'designtext'.$key->design_id.'\','.$key->design_id.','.$roomid.');">Update</a>&nbsp;&nbsp;<a href="#" onclick="displayeditdesign(\'displaydesignname_'.$key->design_id.'\',\'modifydesignname_'.$key->design_id.'\');">Close</a></div></div>' ;	
>>>>>>> 888815f33b4d9de6fa61b9a12f90725e1ef8c112
}
?>

</td>
</tr><tr><td>&nbsp;</td></tr>
<?php
}
?>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;Add New Design:</td></tr>
<tr><td>
&nbsp;
</td></tr>
<tr><td>&nbsp;
	<?php
        $data = array(
              'name'        => 'AddDesigntext',
              'id'          => 'AddDesigntext',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '10'
            );
        echo form_input($data);

<<<<<<< HEAD
      ?>
	
	</td>
	<td>&nbsp;
    <?php
=======
      ?> <?php
>>>>>>> 888815f33b4d9de6fa61b9a12f90725e1ef8c112
	 $data = array(
	     'type'=>'button',
		 'class'=>'btn',	
              'name'        => 'NewDesign',
              'id'          => 'NewDesign',
              'value'       => 'Save',
              'onClick'    =>  'show_add_design('.$roomid.')'
            );

          echo form_input($data);

      ?>
	
	</td>

</table>


</div>
<BR><BR><BR><BR><BR><BR><BR>
</div>
<script>
function show_add_design(roomid)
{	
	 $("#enterdesign").remove();
	 if($("#AddDesigntext").val().trim()=="")
          $("#AddDesigntext").before('<p id="enterdesign">Design Name</p>');
          else
          {
           location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#AddDesigntext").val().trim();		  
          }
	
	
}
function displayeditdesign(displaydesign,editdesign)
{
	$("#designname").remove();
	
	if($("#"+displaydesign).is(':visible'))
	{
	  $("#"+displaydesign).hide();
	  $("#"+editdesign).show();
         }
        else 
         {
		
          $("#"+displaydesign).show();
	 $("#"+editdesign).hide();
		
		
	}
	
}
function Updatedesign(designtext,designid,roomid)
{
	
	if($("#"+designtext).val().trim()=="")
	$("#"+designtext).before('<p id="designname">*Enter Design Name</p>');
	else
	location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#"+designtext).val().trim()+"/"+designid;		  
}

</script>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
