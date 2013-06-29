<?php 
	include(APPPATH.'/views/templates/header.php');
	?>

<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
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
<script type="text/javascript">
 $(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
		new AjaxUpload(btnUpload, {
			action: $("#siteurl").val()+'index.php/Admin/site/upload_design_pic_by_admin/'+'uploadfile/'+$("#userroomid").val()+'/'+$("#userid").val(),
			name: 'uploadfile',
			roomid:$("#userroomid").val(),
			userid:$("#userid").val(),
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response)
			{
				files.html('');
				if(response==="success"){
					mestatus.text('Photo Uploaded Sucessfully!');
				} else{
					mestatus.text('file uploded is failed!')
				}
			}
		});
		
		
		
		
	});


</script>
<?php 
 echo '<p><a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a></p>';
echo '<br/>';
echo '<br/>';

?>
<p><a href="#CurrentUser"  rel="CurrentUser">Current User</a>&nbsp;|&nbsp;<a href="#CurrentRoom"  rel="CurrentRoom">Current Room</a>&nbsp;|&nbsp;<a href="#currentref"  rel="currentref">Style Prefs</a>&nbsp;|&nbsp;<a href="#productdesign" rel="productdesign">Product and Design Response</a></p>
<br/>
<br/>
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
$otherlinkshow=($productshow=='block'?'none':'block');

foreach($roomwithuser as $key)
{
    
    $currentroomid=$key->id;
    $roomtype=$key->room_type;	
	
	$key->room_type = ($key->room_type=="BR"?"Bedroom":"Living Room");
	
	$optionroomfolder=$key->room_type;
	
	$otherroom_type=($roomtype=="BR"?"LR":"BR");
	
	$otherroom_folder=($optionroomfolder=="Living Room"?"Bedroom":"Living Room");
	
	
	
	echo '<table id="CurrentUser" class="adminmain" style="display:'.$otherlinkshow.'">';
	
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

<?php
echo '<div id="productdesign" class="adminmain" style="display:'.$productshow.'">';

 
$selectproductid="";

   if(!empty($selectproduct))
	 {
		
	    foreach($selectproduct as $key)	
	    {
		$selectproductid=$key->product_id;
		

            }
	  
	 }

$display=($productshow=='none' ? ($selectproductid==""? 'none': 'block'): 'none');
$show_section=($selectproductid==""? 2: 1);
$productdisplay=($display=='block'?'none':'block');
echo '<input type="hidden" value="'.$show_section.'" id="select_section"/>'
?>
  
	<?php
	 
	 echo '<div style="display:'.$display.'" id="select_products_for_room">';

	
	   echo '<table><tr><td>Product Name</td><td>&nbsp;&nbsp;Images</td><td>Details</td></tr><tr><td colspan="3">&nbsp;</td></tr>';	
   
if(!empty($selectproductid))
	 {

	foreach($productdetails as $key)
	{
		 if(in_array($key->productid,explode(',',$selectproductid)))
		   {
			
			   echo '<tr><td>'.$key->product_name.'</td><td><div style="width:110px;height:110px;border:solid 1px white;"><img src="'.$key->link.'" height="100px" width="100px"/></div></td><td><div style="height:110px;width:110px;border:solid 2px white;"><a href="#" onclick="show_product_details();">Details</a></div></td></tr>';
			
		   }
		
	}

	
 }

echo '</table>';
echo '</div>';
echo '<div style="display:'.$productdisplay.'" id="allproductdisplay">';

?>




<div id="productdesign" class="adminmain" style="display:<?php echo $productshow; ?>">

<div id="div_show_error_message"></div>
<?php
	$attributes = array('class' => 'updateform', 'id' => 'saveproduct','enctype'=>'multipart/form-data','method'=>'post');
    echo form_open('Admin/site/assign_product/',$attributes);
    ?>
    
<table width="800px" style='font-size:14px;'>
<tr><td width="300px">Upload Design Overview</td>
<td width="500px">
	
	<div id="me" class="styleall" style="height:10px;width:190px;">
	<span style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">Click Here To Upload Photo</span></div>
	<span id="mestatus" ></span><br/>
	<div id="files" style="list-style-type: none;">
    <li class="success" >
    </li>
    </div>
</td></tr>
</table>
<table  width="100%" border="0" style="font-size:13px;">
<tr><td width="300px" >
Select Product Below:
<br/>
</td><td align="right"><input type="button" value="Add Product" id="AddProduct" name="AddProduct"/><input type="button" value="Save Selected" id="SaveSelected"/>
</td></tr>
<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr>
<td colspan="2">
<div>
<b>Sortable by:</b>
<table>
<tr><td width="200px;">
&nbsp;&nbsp;Product Type:
</td><td>
<div>
<?php
foreach($producttype as $key)
echo '<div style="float:left;"><input type="checkbox" name="producttypecheck[]" value="'.$key->type_id.'">'.$key->type.'</div>';
?>
</div>

</td>
</tr>
<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;Product Color:
	</td>
     <td>
<div>
<?php
foreach($productcolortype as $key)
echo '<div style="float:left;"><input type="checkbox" name="productcolortypecheck[]" value="'.$key->color_id.'">'.$key->color.'</div>';?>
</div>     
</td>
</tr>

<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;Product Material:</td>
	<td>
<?php
foreach($productmaterialtype as $key)
echo '<div style="float:left;"><input type="checkbox" name="productmaterialtypecheck[]" value="'.$key->material_id.'">'.$key->material.'</div>';?>
	
</td>

</tr>

<tr><td colspan="2">&nbsp;&nbsp;</td></tr>

<tr><td>&nbsp;&nbsp;Product Price:</td><td>
<div style="float:left;">
<input type="checkbox" id="High1" name="ascprice[]" value="1"/>High</div>
<div style="float:left;">
<input type="checkbox" id="Moderate1" name="ascprice[]" value="2"/>Moderate</div>
<div style="float:left;">
<input type="checkbox" id="Low1" name="ascprice[]" value="3"/>Low
</div>

</td></tr>

<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;Product Style:</td>
<td>
<?php
foreach($productstyle as $key)
echo '<div style="float:left;"><input type="checkbox" name="productstylecheck[]" value="'.$key->style_id.'">'.$key->style.'</div>';
?>&nbsp;&nbsp;
<input type="button" value="go" id="ascproduct"/>
</td>
</tr>
</table>

<input type="hidden" name="hidproducttypecheck" id="hidproducttypecheck"/>
<input type="hidden" name="hidproductcolortypecheck" id="hidproductcolortypecheck"/>
<input type="hidden" name="hidproductmaterialtypecheck" id="hidproductmaterialtypecheck"/>
<input type="hidden" name="hidproductstylecheck" id="hidproductstylecheck"/>

</div>

</td>
</tr>
<tr>
	<td colspan="2">&nbsp;&nbsp;
</td></tr>
<tr><td>&nbsp;</td><td>
<div id="showselectedproductimage"> 
	<?php
	 
	foreach($productdetails as $key)
	{
		 if(in_array($key->productid,explode(',',$selectproductid)))
		   {
			   echo'<div id="select_img_'.$key->productid.'" style="float:left;width:85px;height:85px;border:solid 2px white;"><img src="'.$key->link.'" width="75px;" height="75px;"/></div>';
			   
		   }
		
	}
	?>
	
	</div></td></tr>
<tr>
<td valign="top" width="550px;">
<table width="100%">
<tr><td colspan="5" style="vertical-align:top;">
<input type="textbox" name="productsearchbyname" id="productsearchbyname"/>
<input type="button" value="Search" id="searchproductname"/>

<input type="hidden"  name="hidproductsearch" id="hidproductsearch" />

<input type="hidden"  name="searchoptionfortype" id="searchoptionfortype" />
<input type="hidden"  name="searchoptionforprice" id="searchoptionforprice" />
<input type="hidden"  name="searchoptionforstyle" id="searchoptionforstyle" />
<input type="hidden"  name="searchoptionforcolor" id="searchoptionforcolor" />
<input type="hidden"  name="searchoptionformaterial" id="searchoptionformaterial" />
<br/>
</td></tr>
<tr><td width="100px">
<h5>Price</h5></td><td width="100px"><h5>Type</h5></td><td width="100px"><h5>Product Style</h5></td><td width="100px"><h5>Product Color</h5></td><td width="100px"><h5>Product Material</h5></td></tr>
<tr><td  style="vertical-align:top;">
<input type="checkbox" id="High" name="searchprice[]" value="1"/>High<br/>
<input type="checkbox" id="Moderate" name="searchprice[]" value="2"/>Moderate<br/>
<input type="checkbox" id="Low" name="searchprice[]" value="3"/>Low<br/>
</td>
<td >
<?php
foreach($producttype as $key)
{
    echo '<div><input type="checkbox" id="'.$key->type_id.'" name="searchproducttype[]" value="'.$key->type_id.'"/>'.$key->type.'</div>';	
}
?></td><td style="vertical-align:top;">
<?php
foreach($productstyle as $key)
{
    echo '<div><input type="checkbox" id="'.$key->style_id.'" name="searchproductstyle[]" value="'.$key->style_id.'"/>'.$key->style.'</div>';	
}
?>

</td><td style="vertical-align:top;"><?php
foreach($productcolortype as $key)
{
    echo '<div><input type="checkbox" id="'.$key->color_id.'" name="searchproductcolor[]" value="'.$key->color_id.'"/>'.$key->color.'</div>';	
}
?></td><td style="vertical-align:top;"><?php
foreach($productmaterialtype as $key)
{
    echo '<div><input type="checkbox" id="'.$key->material_id.'" name="searchproductmaterial[]" value="'.$key->material_id.'"/>'.$key->material.'</div>';	
}
?></td></tr></table></td>
<td>
	
	
<div style="border:solid 1px;height:300px;overflow-y:scroll;" id="productlist">
	<?php
	

	foreach($productdetails as $key)
	{	
		  $ischecked="";
		  $active = "inactive";
		  if(in_array($key->productid,explode(',',$selectproductid)))
		   {
		   $ischecked="checked";
		   $active = "active";
		   }
		  echo'<div style="float:left;width:150px;height:150px;cursor:pointer;">
		 <input type="checkbox"  value = '.$key->productid.' class="cbox"  name="productimage[]" id="productimage_'.$key->productid.'"  '.$ischecked.'/>
		 <img class = '.$active.' src ='.$key->link.' height="100px" width="100px" onmouseover="return display_div('.$key->productid.');" onmouseout="return remove_display_div();" onclick="selectedproductimage('.$key->productid.',\''.$key->link.'\',this);"/>&nbsp;&nbsp;</div>';
	}
	if(sizeof($productdetails)==0)
	echo "No products found!";
	?>
</div>
</td>
</tr>
</table>
<input type="hidden" value="" id="ascproductid" name="ascproductid"/>
<input type="hidden" value="" id="productid" name="productid"/>
<input type="hidden" value="<?php echo $currentroomid;?>" id="currentroomid" name="currentroomid">

<?php echo form_close(); ?>
</div>
</div>
<script>
 $(".cbox").hide();

$(".inactive, .active").click(function()
{
	
  $(this).toggleClass('active');
  var checkbox = $(this).parent().find('.cbox');
		
		checkbox.prop('checked',!checkbox[0].checked);
});
var global_prodct_id;
var global_image_path;
var object;
function selectedproductimage(productid,productimagepath,refobject)
{
	
	global_prodct_id=productid;
	global_image_path=productimagepath;
	object=refobject;
	if($("#productimage_"+productid+"").is(':checked')==false)
	$("#productlist").append("<div style='width:100%;height:300px;border:solid 1px;transparent;position: absolute;background-color:black;opacity:0.8;' id='popup'><div style='background:white;border-radius: 5px ;content: attr(title);padding: 5px 5px;z-index: 98;width: 300px;height:100px;margin-left:300px;margin-top:100px;border:solid 1px;cursor:pointer;'> <p><img src='"+$("#siteurl").val()+"assets/Images/delicon.fw.png' width='20px' height='20px' style='float:right;' onclick='distory_popup();'/></p><br/><br/><br/><span style='margin-lop:150px;margin-left:105px;border:solid 1px #ccc;bacground-color:red;cursor:pointer;' onclick='addselectimg();'>Add To Design</span></div></div>");
	else
	$("#select_img_"+productid).remove();
}
function distory_popup()
{
	
	$("#popup").remove();
	$("#productimage_"+global_prodct_id).removeAttr('checked');
	$(object).toggleClass('active');

}
function addselectimg()
{
	
  	$("#showselectedproductimage").append('<div id="select_img_'+global_prodct_id+'" style="float:left;width:85px;height:85px;border:solid 2px white;"><img src="'+global_image_path+'" width="75px;" height="75px;"/></div>');
  	$("#popup").remove();
}
function show_product_details()
{

            $("#select_products_for_room").hide();
  	    $("#allproductdisplay").show();
	
}
</script>
