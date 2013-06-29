<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<?php
$attributes = array('class' => 'addproductform', 'id' => 'addproductform','enctype'=>'multipart/form-data','method'=>'post');
echo form_open('Admin/site/add_product',$attributes);

?>
<p><?php 

 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="history.back();">Back</a>';
?></p>
<div id="producterrormessage" style="font-family:Times New Roman, Times, serif;font-size:15px;margin-left:500px;">
	<?php
	if(isset($message))
	echo $message;
	?>
	
</div>	
<div id="producterrormessageforuploadimage">
</div>	
<div style="width:100%">
<div style="float:left;width:500px;">

	
<table>
	<tr><td>Select Vender</td><td><select name="vender" id="vender">
	<?php
	foreach($vendors as $key)
	{
	echo '<option id="'.$key->vendor_id.'" value="'.$key->vendor_id.'">'.$key->vendor_name.'</option>';		
	}
	?>
</select></td></tr>
<tr><td>SKU</td><td><input type="textbox" id="product_name" name="product_name"/></td></tr>
<tr><td>Price</td><td><input type="textbox" id="Price" name="Price"/></td></tr>
<tr><td>Ship Cost</td><td><input type="textbox" id="ship_cost" name="ship_cost"/></td></tr>
<tr><td>Qty in Stock</td><td><input type="textbox" id="qty_in_stock" name="qty_in_stock"/></td></tr>
<tr><td>Description</td><td><input type="textbox" id="description" name="description"/></td></tr>
<tr><td>Dimention</td><td><input type="textbox" id="dimention" name="dimention"/></td></tr>
<tr><td>Upload Picture</td><td>
<div id="appenduploadphoto"><input type="file" name="uploadproductpic0" id="uploadproductpic"/><input type="button" value="Add" style="display:none;" id="adduploadproductpic"></div></td></tr>
 <tr><td>or,Weblink</td><td><input type="textbox" id="productweblink" name="productweblink"/></td></tr>
<tr><td colspan="2"><input type="button" name="SaveCurrentProduct" value="Save Product" id="savecurrentproduct"/></td></tr>
</table>
</div><div style="float:left;width:600px;"><br/><br/><table><tr><td>Retail option</td><td><input type="radio" name="retail_option" value="on" >On<input type="radio" name="retail_option" value="off" checked>Off</td><td>Rent Price</td><td><input type="textbox"  name="rentprise" value="" id="rentprise"  readonly /></td></tr></table></div>
<div style="float:left;width:300px;"><br/><br/>
<table>
<tr>
<td valign="top">Type</td><td>
<div id="selecttypefilter"></div>	
<input type="textbox" id="Typefilter"  name="Typefilter"/>
<ul id="ShowTypefilter"></ul>
<input type="hidden" name="typehiddenfilter" id="typehiddenfilter"/>
<input type="hidden" name="typehiddenfilterid" id="typehiddenfilterid"/>
</td>
</tr>
<tr>
<td valign="top">Style</td>
<td>
<div id="selectstylefilter"></div>
<input type="textbox" id="Stylefilter"  name="Stylefilter"/>
<ul id="ShowStylefilter"></ul>
<input type="hidden" name="stylehiddenfilter" id="stylehiddenfilter"/>
<input type="hidden" name="stylehiddenfilterid" id="stylehiddenfilterid"/>
</td>
</tr>
<tr>
<td valign="top">Color</td>
<td>
<div id="selectcolorfilter"></div>
<input type="textbox" id="Colorfilter" name="Colorfilter"/>
<ul id="ShowColorfilter"></ul>
<input type="hidden" name="colorhiddenfilter" id="colorhiddenfilter"/>
<input type="hidden" name="colorhiddenfilterid" id="colorhiddenfilterid"/>
</td>
</tr>
<tr>
<td valign="top">Material</td>
<td><div id="selectmaterialfilter"></div>
	<input type="textbox" id="Materialfilter" name="Materialfilter"/>
<ul id="ShowMaterialfilter"></ul>
<input type="hidden" name="materialhiddenfilter" id="materialhiddenfilter">
<input type="hidden" name="materialhiddenfilterid" id="materialhiddenfilterid"/>
</td>
</tr>
</table>
 <?php 
 echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
 ?>
</div>
</div>
<script type="text/javascript">
$('input[name="uploadproductpic0"]').change(function()
{
        $("#producterrormessageforuploadimage").html('');
	var exts=new Array("jpg","jpeg","gif","png","JPG");
    	var file1=$("#uploadproductpic").val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
        if($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
         $("#producterrormessageforuploadimage").append('<p>*Upload product pic in jpg,png,gif,jpeg format</p>');
         
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

</script>
<?php echo form_close(); ?>
