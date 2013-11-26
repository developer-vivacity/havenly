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
 
 <?php
    $attributes = array('class' => 'updateform', 'id' => 'saveproduct','enctype'=>'multipart/form-data','method'=>'post');
    echo form_open('Admin/site/assign_product/'.$roomid.'/'.$userid.'/'.$designid.'',$attributes);
    $designidforroom="";
 ?>

<div class = "row midlarge text-center sanslight">
<div class = "admin_design_header">
     <div id = "div_show_error_message"></div>
	 
	 <?php
	 
	  // this hidden variable stores the design name.
         
           echo '<input type="hidden" name="holddesignidforroom" id="holddesignidforroom" value="'.$designid.'"/>';
           echo '<input type="hidden" name="holddesignname" id="holddesignname" value="'.$userdesign[0]->design_name.'"/>';
		   echo $userdesign[0]->design_name;
     ?>
		<input class = "button2 blue" type="button" value="(+) Save Design" id="SaveSelected"/>
	<BR>
		<a class = "gray_text small condensed showmsg">EDIT MESSAGE</a>&nbsp;&nbsp;<a class = "gray_text small condensed showimage">EDIT IMAGE</a>&nbsp;&nbsp;<a class = " gray_text small condensed showproducts">EDIT PRODUCTS</a>
		<hr>
		<div class = "popup_design midsmall boxshadow">
			Save as Draft or Submit Design?&nbsp;
			<select name="design_status" id="design_status">
				<option value="draft">Save as Draft</option>
				<option value="submitted">Submit Design</option>
				</select>
			<input type="button" class = "button2 pink"  value="Go" onclick="saveproductdetailsofdesign();"/>
			<a class = "remove_popup"><img src="<?php echo base_url('assets/Images/delicon.fw.png');?>" width="20px" height="20px" class="float_right"></a>
</div>
</div>
<div class = "designmain" id  = "designermessage">

<div class = "well">

<p class = "medium condensed">Add a note to the client, letting them know about your inspiration, and any special instructions.</p>
<textarea name="designer_notes" id="designer_notes" cols= "50" rows = "10">
	<?php echo $userdesign[0]->designer_notes;?>
</textarea><br>
<input type = "button" id = "commentsave" class = "button2 small pink showimage" value = "Save &rarr;" onclick = "save_comment();"/>
</div></div>

<div class = "designmain" id = "designimage">



	
<p class = "condensed text-center medium"> Upload final design renderings for the room.</p><BR>
<div class = "well">
	<div id = "me" class = "styleall button2 pink white_text small sanslight">Browse</div>
		<span id="mestatus" ></span><br/>

	<div id="files"  style="list-style-type: none;">
		<li class="success" >
		</li>
</div>
<hr>
<div id="displaydesignimages">
<?php
	foreach($designimage as $key)
	{
		echo '<div class = "design_image_holder"><img src="'.$key->filename.'" height="150px"></div>';
	}
?>
</div>
</div>
<a class = "button2 pink small showproducts">Done</a>

</div>

<div class = "designmain" id = "productselection">
<p class = "medium condensed">Add products to purchase for client design.</p>
<br>
<div id = "showselectedproductimage">

<?php


        $design_id="";
        $selectproductid="";
        $productidhold="";
        $count=0;
  
  if(sizeof($productwithdesign)>0)//if products are associated with design
  {
       
   foreach($productwithdesign as $key2)//foreach product associated
   {
      if($design_id!=$key2->design_id & $design_id=="" )        
       { 
		 $productidhold="";     
         $count=$count+1;
         echo '<div id="showselectedproductimage'.$key2->design_id.'" class="designname"><p class = "condensed medium">Selected Products</p><hr class = "style">';
       }
      elseif($design_id!=$key2->design_id)
      {  
         
        if($count==1)
        $selectproductid=$productidhold;                     
       
         echo "<input type='hidden' id='designproductid_".$design_id."' value='".$productidhold."'/>";
         echo '</div>';
         echo '<div id="showselectedproductimage'.$key2->design_id.'" class="designname">';
        $productidhold="";
		$count=$count+1;      
        } 
    
     foreach($selectproduct as $key)
     {
   
      if(($key2->product_id==$key->product_id))
      {
         echo'<div id="select_img_'.$key2->design_id.'_'.$key->product_id.'" class = "selectedproductimagediv">
		 <img src="'.$key->filename.'" height="100px;"/><input type="hidden" class = "selectedprod" name="assign_'.$key2->design_id.'[]" value="'.$key->product_id.'" /></div>';
    
         $productidhold=($productidhold==""?$key->product_id:$productidhold.','.$key->product_id);	
 
            
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
		 
	  echo'<div id="select_img_7u7_'.$key->product_id.'" class = "selectedproductimagediv" ><img src="'.$key->filename.'" height="100px;"/><input type="hidden" name="assign_7u7[]" value="'.$key->product_id.'" /></div>';
	  if($selectproductid=="")
	  $selectproductid=$key->product_id;
	  else
	  $selectproductid=$selectproductid.','.$key->product_id;
	}
  echo "<input type='hidden' id='designproductid_7u7' value='".$selectproductid."' name='designproductid_7u7'/>";
}

?>
</div>
<div>
<div class = "well">
<p class = "condensed medium">Search for a product: &nbsp; &nbsp;
<input class = "search-query" type="textbox" name="productsearchbyname" id="productsearchbyname"/>
<input class = "button2 pink" type="button" value="Search" id="searchproductname"/></p>
</div>

<div class = "well">
<p class = "condensed medium">Filter by Category</p><hr>
<div class = "button_padding">
<div class="btn-group">
  <button class="button2 gray rip">Price &darr;</button>
</div></div>

<div class = "button_padding">
<div class="btn-group">
<button class="button2 gray rip">Product Type &darr;</button>
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

<div class = "button_padding">
<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="button2 gray rip" >Style &darr;</button>
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

<div class = "button_padding">
<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="button2 gray rip" >Color &darr;</button>
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
<div class = "button_padding">
<div class="btn-group">
	<!-------add rip class for jquery by kbs------->
  <button class="button2 gray rip" >Material &darr;</button>
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


<div class = "button_padding">
<input type="button" class = "button2 pink" id="filterproduct" name="filterproduct" value="Go" />
<input type="button" class = "button2 pink" id="clearfilter" name="clearfilter" value="Refresh" />
</div>

</div>

<div class = "addnewproduct">
<p class = "sanslight small">Can't find what you're looking for?</p>
<input class= "button2 blue" type="button" value="Add Product" id="AddProduct" name="AddProduct"/>
</div>	
<div id="productlist">
	<?php
	foreach($productdetails as $key)
	{	
		  $ischecked="";
		  $active = "inactive";
		  if(in_array($key->product_id,explode(',',$selectproductid)))
		   {
		   $ischecked="checked";
		   $active = "active";
		   }
		  echo'<div id = "productlistimg_'.$key->product_id.'" class = "productlistimg">
		 <input type="checkbox"  value = '.$key->product_id.' class="cbox"  name="productimage[]" id="productimage_'.$key->product_id.'"  '.$ischecked.'/>
		 <img class = '.$active.' src ='.$key->filename.' height="225px"  onmouseover="return display_div('.$key->product_id.');" mouseleave="return remove_display_div();" onclick="selectedproductimage('.$key->product_id.',\''.$key->filename.'\',this);" id="product_img'.$key->product_id.'"/>&nbsp;&nbsp;
		 <br><a class = "gray_text" href = "'.$key->weblink.'"><span class = "small condensed">'.$key->product_name.'</span>	 </div>';
	}
	if(sizeof($productdetails)==0)
	echo "<p class = 'alert alert-error'>No products matching your criteria.</p>";
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
</div></div></div></div>
<div class = "adminpush">  .
</div>
<script>
$(".cbox").hide();

$(".inactive, .active").click(function()
{
	
                 $(this).toggleClass('active');
                 var checkbox = $(this).parent().find('.cbox');
		 checkbox.prop('checked',!checkbox[0].checked);
});

$(".remove_popup").click(function()
{
	$(this).parent().hide();
});

$(".designmain").hide();
$("#designermessage").show();

$(".showproducts").click(function()
{
$(".designmain").hide();
$("#productselection").show();
});

$(".showimage").click(function()
{
$(".designmain").hide();
$("#designimage").show();
});

$(".showmsg").click(function()
{
$(".designmain").hide();
$("#designermessage").show();
});


</script>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
