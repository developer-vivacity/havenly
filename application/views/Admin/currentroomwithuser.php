<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery.fineuploader-3.4.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/ajaxfileupload.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/Ajaxfileupload-jquery-1.3.2.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>

<style  type="text/css">
#upload{
	margin:18px 3px 0px 3px; padding:2px 2px 2px 6px;
	font-weight:bold; font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	text-align:left;
	text-decoration:underline;
	background:#f2f2f2;
	color:#730707;
	border:1px solid #ccc;
	width:180px;
	
	}
.styleall{
	margin:18px 3px 0px 3px; padding:2px 2px 2px 6px;
	font-weight:bold; font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	text-align:left;
	text-decoration:underline;
	
}

</style>
<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<p><a href="#CurrentUser"  rel="CurrentUser">Current User</a>|<a href="#CurrentRoom"  rel="CurrentRoom">Current Room</a>|<a href="#currentref"  rel="currentref">Style Prefs</a>|<a href="#productdesign" rel="productdesign">Product and Design Response</a></p>

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
foreach($roomwithuser as $key)
{
    
    $currentroomid=$key->id;
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
    
    echo '<input type="hidden" name="currentdisplay" id="currentdisplay" value="'.$productshow.'"/>';
    echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
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
<div id="productdesign" class="adminmain" style="display:">
<?php
	$attributes = array('class' => 'updateform', 'id' => 'saveproduct','enctype'=>'multipart/form-data','method'=>'post');
    echo form_open('Admin/site/save_product/',$attributes);
    ?>
<table width="800px">
<tr><td width="300px">Upload Design Overview</td>
<td width="500px"><div id="me" class="styleall" style="height:10px;">
	<span style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">Click Here To Upload Photo</span></div>
	<span id="mestatus" ></span><br/>
	<div id="files" style="list-style-type: none;">
              <li class="success" >
              </li>
              </div>
</td></tr>

</table>
<table  width="1000px" border="1">
<tr><td width="300px">
Select Product Below:
</td><td align="right"><input type="button" value="Add Product" id="AddProduct" name="AddProduct"/><input type="button" value="Save Selected" id="SaveSelected"/></td></tr>
<tr>
<td><input type="textbox" name="productsearch"/><input type="button" value="go"/></td>
<td>Sortable by:<br/>
<input type="checkbox" value="product_type_id" name="productcheck[]"/>product type<input type="checkbox" value="product_color_id" name="productcheck[]"/> product color <input type="checkbox" value="product_material_id" name="productcheck[]"/>product material <input type="checkbox" value="product_style_id" name="productcheck[]"/>product style
<input type="button" value="go" id="ascproduct"/>
</td>
</tr>
<tr>
<td><table width="300px">
<tr><td>Price</td><td>Type</td></tr>
<tr><td valign="top">
<div><input type="checkbox" id="High" name="High" value="1000"/>High</div>
<div><input type="checkbox" id="Moderate" name="Moderate" value="500"/>Moderate</div>
<div><input type="checkbox" id="Low" name="Low" value="100"/>Low</div>
</td>
<td>
<?php
$type=array('1'=>'Couch','2'=>'Table','3'=>'Chair','4'=>'Bed','5'=>'Pillow','6'=>'Lamp','7'=>'Decor','8'=>'Furniture','9'=>'Accessories');
foreach($type as $key=>$value)
{
    echo '<div><input type="checkbox" id="'.$key.'" name="High" value="'.$key.'"/>'.$value.'</div>';	
}
?>
</td>
</tr>
</table>
</td>
<td><div style="border:solid 1px;height:300px;">
	<?php
	$selectproductid="";
	if(isset($selectproduct))
	{
	    foreach($selectproduct as $key)	
		$selectproductid=$key->product_id;
		
	}
	foreach($productdetails as $key)
	{	
		  $ischecked="";
		  if(in_array($key->productid,explode(',',$selectproductid)))
		  $ischecked="checked";
		  echo'<div style="float:left;">
		 <input type="checkbox"  value = '.$key->productid.' class="cbox"  name="productimage[]" id="productimage[]" '.$ischecked.'/>
		 <img class = "inactive" src ='.$key->link.' height="100px" width="100px" /></div>';
	}
	?>
</div>
</td>
</tr>
</table>
<input type="hidden" value="23" id="ascproductid" name="ascproductid"/>
<input type="hidden" value="" id="productid" name="productid"/>
<input type="hidden" value="<?php echo $currentroomid;?>" id="currentroomid" name="currentroomid">
<?php echo form_close(); ?>
</div>
