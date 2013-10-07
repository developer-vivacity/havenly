<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/product_design.js"></script>
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
              <li class="active"><a href="<?php echo base_url('/index.php/Admin/site/currentroomwithuser/'.$roomid);?>">Back</a></li>
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

<BR><BR><BR><BR><BR>
 <div id="div_show_error_message" class="alert alert-error"></div>
 <?php
    $attributes = array('class' => 'updateform', 'id' => 'saveproduct','enctype'=>'multipart/form-data','method'=>'post');
    echo form_open('Admin/site/assign_product/'.$roomid.'/'.$userid.'/'.$designid.'',$attributes);
    $designidforroom="";
 ?>

<div class = "row midlarge text-center sanslight">
<div class = "admin_design_header">
     <?php
	 
	  // this hidden variable stores the design name.
           echo $userdesign[0]->design_name;
           echo '<input type="hidden" name="holddesignidforroom" id="holddesignidforroom" value="'.$designid.'"/>';
           echo '<input type="hidden" name="holddesignname" id="holddesignname" value="'.$userdesign[0]->design_name.'"/>';
     ?>&nbsp;
		<input class = "button2 pink" type="button" value="Save Selected" id="SaveSelected"/>

		<p class = "midsmall sanslight">Edit user design and add products to complete user design.</p>
		<div class = "popup_design midsmall boxshadow">
			Save as Draft or Submit Design?&nbsp;
			<select name="design_status" id="design_status">
				<option value="draft">Save as Draft</option>
				<option value="submitted">Submit Design</option>
				</select>
			<input type="button" class = "button2 pink" value="Go" onclick="saveproductdetailsofdesign();"/>
			
</div>
</div>

	
<div class = "well">

	
<p class = "sanslight text-center midsmall">Step 1:  Upload Design Images</p>
	<div id = "me" class = "styleall button2 pink white_text small condensed">Browse</div>
		<span id="mestatus" ></span><br/>
		

	<div id="files"  style="list-style-type: none;">
		<li class="success" >
		</li>
</div>
<div id="displaydesignimages">
<?php
	foreach($designimage as $key)
	{
		echo '<div class = "design_image_holder"><img src="'.$key->filename.'" height="150px"></div>';
	}
?>
</div>
</div>
<br/><br/><br/>


<div class = "row">

<!--<div>
<b>Sortable by:</b>
<table>
<tr><td width="200px;">
&nbsp;&nbsp;Product Type:
</td><td>
<div>
// <?php
// foreach($producttype as $key)
// echo '<div style="float:left;"><input type="checkbox" name="producttypecheck[]" value="'.$key->type_id.'">'.$key->type.'</div>';
// ?>
</div>

</td>
</tr>
<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;Product Color:
	</td>
     <td>
<div>
// <?php
// foreach($productcolortype as $key)
// echo '<div style="float:left;"><input type="checkbox" name="productcolortypecheck[]" value="'.$key->color_id.'">'.$key->color.'</div>';?>
</div>     
</td>
</tr>

<tr><td colspan="2">&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;Product Material:</td>
	<td>
// <?php
// foreach($productmaterialtype as $key)
// echo '<div style="float:left;"><input type="checkbox" name="productmaterialtypecheck[]" value="'.$key->material_id.'">'.$key->material.'</div>';?>
	
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
// <?php
// echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
// foreach($productstyle as $key)
// echo '<div style="float:left;"><input type="checkbox" name="productstylecheck[]" value="'.$key->style_id.'">'.$key->style.'</div>';
// ?>

&nbsp;&nbsp;
<input type="button" value="go" id="ascproduct"/>
</td>
</tr>
</table>

<input type="hidden" name="hidproducttypecheck" id="hidproducttypecheck"/>
<input type="hidden" name="hidproductcolortypecheck" id="hidproductcolortypecheck"/>
<input type="hidden" name="hidproductmaterialtypecheck" id="hidproductmaterialtypecheck"/>
<input type="hidden" name="hidproductstylecheck" id="hidproductstylecheck"/>

</div>-->
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

<div class = "span12"><div class = "well">

<p class = "sanslight medium">Search for a product: &nbsp; &nbsp;
<input class = "search-query" type="textbox" name="productsearchbyname" id="productsearchbyname"/>
<input class = "btn" type="button" value="Search" id="searchproductname"/></p>

<input type="hidden"  name="hidproductsearch" id="hidproductsearch" />

<input type="hidden"  name="searchoptionfortype" id="searchoptionfortype" />
<input type="hidden"  name="searchoptionforprice" id="searchoptionforprice" />
<input type="hidden"  name="searchoptionforstyle" id="searchoptionforstyle" />
<input type="hidden"  name="searchoptionforcolor" id="searchoptionforcolor" />
<input type="hidden"  name="searchoptionformaterial" id="searchoptionformaterial" />
<br/>
<div class = "row">
<div class = "span2">
<div class="btn-group">
  <button class="btn rip">Price</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="display_child('drop_price')">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" id="drop_price">
&nbsp;&nbsp;<input type="checkbox" id="High" name="searchprice[]" value="1"/>&nbsp;&nbsp;High<br/>
&nbsp;&nbsp;<input type="checkbox" id="Moderate" name="searchprice[]" value="2"/>&nbsp;&nbsp;Moderate<br/>
&nbsp;&nbsp;<input type="checkbox" id="Low" name="searchprice[]" value="3"/>&nbsp;&nbsp;Low<br/>
</ul></div></div>
<div class = "span2">
<div class="btn-group">

 <!-------add rip class for jquery by kbs------->
  <button class="btn rip">Product Type</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="display_child('drop_type')">
  <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" id="drop_type">
  <?php
        foreach($producttype as $key)
	{
		echo '<div>&nbsp;&nbsp;<input type="checkbox" id="'.$key->type_id.'" name="searchproducttype[]" value="'.$key->type_id.'"/>&nbsp;&nbsp;'.$key->type.'</div>';	
	}
?>
  </ul>
</div></div>

<div class = "span2">


<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="btn rip" >Style</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="display_child('drop_style')">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" id="drop_style">
<?php

foreach($productstyle as $key)
{
    echo '<div>&nbsp;&nbsp;<input type="checkbox" id="'.$key->style_id.'" name="searchproductstyle[]" value="'.$key->style_id.'"/>&nbsp;&nbsp;'.$key->style.'</div>';	
}
?></ul>
</div></div>
<div class = "span2">
<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="btn rip" >Color</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="display_child('drop_color')">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" id="drop_color">
<?php
foreach($productcolortype as $key)
{
    echo '<div>&nbsp;&nbsp;<input type="checkbox" id="'.$key->color_id.'" name="searchproductcolor[]" value="'.$key->color_id.'"/>&nbsp;&nbsp;'.$key->color.'</div>';	
}
?></ul>
</div></div>
<div class = "span2">
<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="btn rip" >Material</button>
  <button class="btn dropdown-toggle" data-toggle="dropdown" onclick="display_child('drop_material')">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" id="drop_material">
<?php
foreach($productmaterialtype as $key)
{
    echo '<div>&nbsp;&nbsp;<input type="checkbox" id="'.$key->material_id.'" name="searchproductmaterial[]" value="'.$key->material_id.'"/>&nbsp;&nbsp;'.$key->material.'</div>';	
}
?>
</div></div>

<!----Add code by kbs------>
<div>
<input type="button" id="filterproduct" name="filterproduct" value="Filter" />
</div>
<!----------------->

</div>

<input class= "btn" type="button" value="Add Product" id="AddProduct" name="AddProduct"/>	
	
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

<input type="hidden" value="" id="ascproductid" name="ascproductid"/>
<input type="hidden" value="" id="productid" name="productid"/>
<input type="hidden" value="<?php echo $roomid;?>" id="currentroomid" name="currentroomid"/>
<input type="hidden" value="<?php echo $userid;?>" id="currentuserid" name="currentuserid"/>
<!---add hidden variable by kbs--->
<input type="hidden" name="siteurl" id="siteurl" value="<?php echo base_url();?>"/>
<input type="hidden"  id="product_status" name="product_status"/>
<input type="hidden" value="<?php echo $designid;?>" id="userdesign" name="userdesign"/>
<!-------------->
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

$(".btn.rip").click(function()
{
$("#hidproductsearch").val("search");	
});
</script>

