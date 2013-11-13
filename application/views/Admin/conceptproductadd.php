	
	
	<a class = "button4 midsmall" href = "<?php echo base_url('index.php/Admin/site/deleteproductconcept/'.$concept_id.'/'.$id);?>">Delete</a><BR><BR>
	<?php echo '<div class = "row'.$count.'">'; ?>
	<div class = "span3">
	<?php 
	echo '<input type = "hidden" name = "counthold" value = '.$count.' class = "counthold">';
	echo '<select class = "selecttype" id = "select.'.$count.'">';
	 
	foreach ($types as $key){
	echo '<option value = "'.$key->type.'">'.$key->type;
	echo '</option>';
	  }
	echo '</select>';

	?>
	</div>
	<div class = "span5">
	<input type = "text" name = "weblink" value = "Image Link" class = "weblink" onclick="if(this.value=='Image Link'){this.value=''}" onblur="if(this.value==''){this.value='Image Link'}">
	<input type = "text" name = "price" value = "Price" class = "price" onclick="if(this.value=='Price'){this.value=''}" onblur="if(this.value==''){this.value='Price'}">
	</div>
	<div class = "span1">
	<?php echo '<a class = "productconsave button4 small white_text" onclick ="add_product_concept('.$count.');">Save This</a>'; ?>
	</div>
	  
	  </div>