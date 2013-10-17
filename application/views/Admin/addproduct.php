<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>


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
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			   <li><a href="#">Order Tracker</a></li>
              <li><a href="#">Vendor Management</a></li>
              </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
   </div>


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
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator');?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>



<div id="producterrormessage" style="font-family:Times New Roman, Times, serif;font-size:15px;margin-left:500px;">
	<?php
	if(isset($message))
	echo $message;
	?>
	
</div>	
<div id="producterrormessageforuploadimage">
</div>	
<div class = "white">
<div class = "container">
<?php
$attributes = array('class' => 'addproductform', 'id' => 'addproductform','enctype'=>'multipart/form-data','method'=>'post');
echo form_open('Admin/site/add_product',$attributes);
echo '<input type="hidden" value="'.$roomid.'" name="room_hid">';
echo '<input type="hidden" value="'.$userid.'" name="user_hid">';
echo '<input type="hidden" value="'.$designid.'" name="design_hid">';
?><BR><BR><BR><BR>
<div class = "row">
<div class = "span5 sanslight">

<div class = "row">
<span class = "span2">
	Vendor Name
</span>
<span class = "span3">
	<select name="vender" id="vender">
	<?php
	foreach($vendors as $key)
	{
	echo '<option id="'.$key->vendor_id.'" value="'.$key->vendor_id.'">'.$key->vendor_name.'</option>';		
	}
	?>
</select></span></div>
<div class = "row" id = "productnamerow">
<span class = "span2">Name</span><span class = "span3"><input type="text" id="product_name" name="product_name"/></span></div>
<div class = "row" id = "pricerow">
<span class = "span2">Price</span><span class = "span3"><input type="text" id="Price" name="Price"/></span></div>
<div class = "row"><span class = "span2">Ship Cost</span><span class = "span3"><input type="text" id="ship_cost" name="ship_cost"/></span></div>
<div class = "row"><span class = "span2">Qty in Stock</span><span class = "span3"><input type="text" id="qty_in_stock" name="qty_in_stock"/></span></div>
<div class = "row" id = "dimensionrow"><span class = "span2">Dimensions</span><span class = "span3"><input type="text" id="dimention" name="dimention"/></span></div>

<div class = "row"><span class = "span2">Description</span><span class = "span3"><textarea width = "300px" id="description" name="description"/></textarea></span></div>
<div class = "row" id = "websiterow">
<span class = "span2">Website Link</span><span class = "span3"><input type="text" id="website" name="website"/></span></div>
<BR><BR>
<div class = "well">
Upload Picture
<div id="appenduploadphoto"><input type="file" name="uploadproductpic0" id="uploadproductpic"/><input type="button" class = "button2 pink" value="Add" style="display:none;" id="adduploadproductpic"></div>
Image Link <input type="text" id="productweblink" name="productweblink"/></div>
<input type="button" class = "button2 blue" name="SaveCurrentProduct" value="Save Product" id="savecurrentproduct"/>

</div>
<div class = "span4 sanslight ">
<div class = "categories well">
Type: 
	
<input type="text" id="Typefilter"  name="Typefilter"/><BR>
<div id="selecttypefilter" class = "blue_text small sanslight"></div><BR>
<ul id="ShowTypefilter" class = "small"></ul>
<input type="hidden" name="typehiddenfilter" id="typehiddenfilter"/>
<input type="hidden" name="typehiddenfilterid" id="typehiddenfilterid"/>
</div>

<div class = "categories well">Style: 
<input type="text" id="Stylefilter"  name="Stylefilter"/><br>
<div id="selectstylefilter"  class = "blue_text small sanslight"></div>
<ul id="ShowStylefilter" class ="small"></ul>
<input type="hidden" name="stylehiddenfilter" id="stylehiddenfilter"/>
<input type="hidden" name="stylehiddenfilterid" id="stylehiddenfilterid"/>
</div>
<div class = "categories well">
Color: 
<input type="text" id="Colorfilter" name="Colorfilter"/><BR>
<div id="selectcolorfilter" class = "blue_text small sanslight"></div>
<ul id="ShowColorfilter" class = "small"></ul>
<input type="hidden" name="colorhiddenfilter" id="colorhiddenfilter"/>
<input type="hidden" name="colorhiddenfilterid" id="colorhiddenfilterid"/>
</div>
<div class = "categories well">
Material
<input type="text" id="Materialfilter" name="Materialfilter"/>
<div id="selectmaterialfilter" class = "blue_text small sanslight"></div>
<ul id="ShowMaterialfilter" class = "small"></ul>
<input type="hidden" name="materialhiddenfilter" id="materialhiddenfilter">
<input type="hidden" name="materialhiddenfilterid" id="materialhiddenfilterid"/>
</div>
 <?php 
 echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
 ?>
</div>
</div></div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script type="text/javascript">
$('input[name="uploadproductpic0"]').change(function()
{
     $("#producterrormessageforuploadimage").html('');
	var exts=new Array("jpg","jpeg","gif","png","JPG");
    	var file1=$("#uploadproductpic").val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
        if($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
         $("#producterrormessageforuploadimage").append('<p>Please upload image in a jpg,png,gif,jpeg format</p>');
         
         $(".imageappend").remove();
         total=1;
         fileupload_value=0;
         $("#adduploadproductpic").hide();	
        } 
        else
        {
		$("#adduploadproductpic").show();	
		fileupload_value=1;

	}
	
}
);
function previouspage(roomid,userid,designid)
{
	window.location.href=$("#siteurl").val()+"index.php/Admin/site/productdetails/"+roomid+"/"+userid+"/"+designid+"";
	
}
</script>
<?php echo form_close(); ?>
