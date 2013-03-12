
<div class = "container"><br><br>
<div class = "close1">X</div>
<p class = "title">Tell Us a Little Bit More:</p>
<p class = "text1">Sometimes we <span>sort of get it wrong</span>, so it'll help everyone out quite a bit</p>

<a class="flat" id = "submit_product">Submit and Save</a><br>
<div class = "error">
Please enter in price and name for product.
</div>
<input type = "hidden" name="productid" id = "productid" value = <?php echo $productid;?> />
<input type = "hidden" name = "link" id = "link" value=<?php echo $orig_src;?>/>
<input type="text" name="name" class="input_photo" id = "name" value="<?php if(isset($title)){echo $title;} else {echo 'Product Name';}?>" onfocus="value=''" onblur="value=value" />
<input type="text" name="price" class="input_photo" id = "price" value="<?php if(isset($price)){echo $price;} else {echo 'Product Price';}?>" onfocus="value=''" onblur="value=value" />
<input type="text" name="store" class="input_photo" id = "store" value="<?php if(isset($store)){echo $store;} else {echo 'Where Can We Buy It?';}?>" onfocus="value=''" onblur="value=value" />

<br><br><br>
<?php

if(!isset($title)){
	$href = 'https://s3.amazonaws.com/easableimages/'.$images;
	echo '<div id = "container">';
	echo "<img src={$href} class='active' height=50px>";
	echo '</div>';
	}

else {	
	if (count($images)==1)
	{
	foreach ($images as $key=>$value){
		echo '<img class="active" src='.$value.' height=50px>';
		}	
	}
	else{
	foreach ($images as $key=>$value) 
	{
		echo '<img class="inactive" src='.$value.' height=50px>';
	}}
	
} ?>
<br><br>


</div>
<script>
$('.error').hide();
$('#loading').hide();

	
		$(".inactive").click(function() {
			$(this).toggleClass('active');
			});
		
		
		$("#submit_product").click(function() {
			
			var values = JSON.stringify($(".active").map(function()  
			{return $(this).attr('src');}).get());
			var name = $("#name").val();
			var store = $("#store").val();
			var price = $("#price").val();
			var productid = $("#productid").val();
			var link = $("#link").val();
			
			
			if(name!="Product Name"&& name !="" && price!="Product Price" & price!="")
			{
			 $.ajax({        
					type: 'POST',
					url: '/test/design2/index.php/Supplier/upload/upload_product',
					data: {productid:productid, link:link, name:name, store:store, price:price, images:values},
					success: function(data){
						$("#product_detail").hide();
						$(".products").append(data);},
						complete: function(){
						$("img.draggable").draggable({helper: 'clone', cursor:'move'});
						}
					 });
					 
					 }
			else {
				$('.error').show();
				}
			
			
					 }); 
		
			
		
		$(".close1").click(function() {
			$("#product_detail").hide();
			})	;
</script>
