<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/product_design.js"></script>
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

<body>
<?php
echo'<p>&nbsp;</p>';
echo '<p><a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'/index.php/Admin/site/currentroomwithuser/'.$roomid.'">Back</a></p>';
  echo '<div>';
 
?>
 <div id="div_show_error_message"></div>
<?php
    
   $attributes = array('class' => 'updateform', 'id' => 'saveproduct','enctype'=>'multipart/form-data','method'=>'post');
    echo form_open('Admin/site/assign_product/',$attributes);
?>
<table width="800px" style='font-size:14px;'>
 <?php
        $designidforroom="";
        
        ?>
       <tr><td colspan="2">&nbsp;&nbsp;</td></tr>
       <tr><td colspan="2"><div style="float:left;width:200px">&nbsp;User Design Name:</div><div style="float:left;width:100px">
   
     <?php
           echo $userdesign[0]->design_name;
           echo '<input type="hidden" name="holddesignidforroom" id="holddesignidforroom" value="'.$designid.'"/>';
     ?>

</div></td></tr>
<tr><td width="300px">&nbsp;Upload Design Overview</td>
<td width="500px">
	<div id="me" class="styleall" style="height:10px;width:190px;">
	<span style="font-family:Verdana, Geneva, sans-serif; font-size:12px;">Click Here To Upload Photo</span></div>
	<span id="mestatus" ></span><br/>
	<div id="files" style="list-style-type: none;">
 <li class="success" >
</li>
    </div>
</td>
</tr>
</table>
<table  width="100%" border="0" style="font-size:13px;">
<tr><td>&nbsp;
 <h1>&nbsp;Select Product Below:</h1>
<br/>
</td><td align="right">
<input type="button" value="Add Product" id="AddProduct" name="AddProduct"/><input type="button" value="Save Selected" id="SaveSelected"/>
</td></tr>
<tr><td colspan="2">
	
	<input type="hidden" name="Design_Plan" id="Design_Plan" value="Modern"/>
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
echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
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
        $design_id="";
        $selectproductid="";
        $productidhold="";
        $count=0;
       
  if(sizeof($productwithdesign)>0)
  {
       
   foreach($productwithdesign as $key2)
   {
      if($design_id!=$key2->design_id & $design_id=="" )        
       { $productidhold="";     
         $count=$count+1;
         echo '<div style="width:100%" id="showselectedproductimage'.$key2->design_id.'" class="designname">';
       }
      elseif($design_id!=$key2->design_id)
      {  
         
        if($count==1)
        $selectproductid=$productidhold;                     
       
         echo "<input type='hidden' id='designproductid_".$design_id."' value='".$productidhold."'/>";
         echo '</div>';
         echo '<div style="width:100%;float:left;display:none;" id="showselectedproductimage'.$key2->design_id.'" class="designname">';
         $productidhold="";
$count=$count+1;      
        } 
    
     foreach($selectproduct as $key)
     {
   
      if(($key2->product_id==$key->productid))
      {
         echo'<div id="select_img_'.$key2->design_id.'_'.$key->productid.'" style="float:left;width:85px;height:85px;border:solid 2px white;"><img src="'.$key->link.'" width="75px;" height="75px;"/><input type="hidden" name="assign_'.$key2->design_id.'[]" value="'.$key->productid.'" /></div>';
    
         $productidhold=($productidhold==""?$key->productid:$productidhold.','.$key->productid);	
 
            
       }

     }
    
   $design_id=$key2->design_id;
   }

if($count==1)
$selectproductid=$productidhold;
  
echo "<input type='hidden' id='designproductid_".$design_id."' value='".$productidhold."'/>";
echo '</div>';
}
elseif(sizeof($userdesign)==0)
{
   
  
  foreach($selectproduct as $key)
	   {
		 
	  echo'<div id="select_img_7u7_'.$key->productid.'" style="float:left;width:85px;height:85px;border:solid 2px white;"><img src="'.$key->link.'" width="75px;" height="75px;"/><input type="hidden" name="assign_7u7[]" value="'.$key->productid.'" /></div>';
	  if($selectproductid=="")
	  $selectproductid=$key->productid;
	  else
	  $selectproductid=$selectproductid.','.$key->productid;
	}
  echo "<input type='hidden' id='designproductid_7u7' value='".$selectproductid."' name='designproductid_7u7'/>";
}
?>
	
	</div></td></tr>
<tr>
<td  width="550px;" style="vertical-align:top !important;">
<table width="100%">
<tr><td colspan="5" >
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
		 <img class = '.$active.' src ='.$key->link.' height="100px" width="100px" onmouseover="return display_div('.$key->productid.');" onmouseout="return remove_display_div();" onclick="selectedproductimage('.$key->productid.',\''.$key->link.'\',this);" id="product_img'.$key->productid.'"/>&nbsp;&nbsp;</div>';
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
<input type="hidden" value="<?php echo $roomid;?>" id="currentroomid" name="currentroomid"/>
<input type="hidden" value="<?php echo $userid;?>" id="currentuserid" name="currentuserid"/>
 
<?php 

echo form_close(); ?>
</div>
</body>
<script>
$(".cbox").hide();

$(".inactive, .active").click(function()
{
	
                 $(this).toggleClass('active');
                 var checkbox = $(this).parent().find('.cbox');
		 checkbox.prop('checked',!checkbox[0].checked);
});
</script>

