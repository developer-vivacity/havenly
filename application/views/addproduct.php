<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<?php
$attributes = array('class' => 'addproductform', 'id' => 'addproductform','enctype'=>'multipart/form-data','method'=>'post');
echo form_open('Admin/site/add_product/',$attributes);
?>

<div id="producterrormessage">
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
<td>Style</td>
<td><input type="textbox" id="Stylefilter"  name="Stylefilter"/>
<ul id="ShowStylefilter"></ul>
<input type="hidden" name="stylehiddenfilter" id="stylehiddenfilter">
</td>
</tr>
<tr>
<td>Color</td>
<td><input type="textbox" id="Colorfilter" name="Colorfilter"/>
<ul id="ShowColorfilter"></ul>
<input type="hidden" name="colorhiddenfilter" id="colorhiddenfilter">
</td>
</tr>
<tr>
<td>Material</td>
<td><input type="textbox" id="Materialfilter" name="Materialfilter"/>
<ul id="ShowMaterialfilter"></ul>
<input type="hidden" name="materialhiddenfilter" id="materialhiddenfilter">
</td>
</tr>
</table>
 <?php 
 echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
 ?>
</div>
</div>
<?php echo form_close(); ?>
