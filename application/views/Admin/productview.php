<?php

// print_r($selectedproducts);

	foreach($productdetails as $key)
	{	
		  $ischecked="";
		  $active = "inactive";
		  if(in_array($key->product_id,explode(',',$selectedproducts)))
		   {
		   $ischecked="checked";
		   $active = "active";
		   }
		  echo'<div id = "productlistimg_'.$key->product_id.'" class = "productlistimg">
		 <input type="checkbox"  value = '.$key->product_id.' class="cbox"  name="productimage[]" id="productimage_'.$key->product_id.'"  '.$ischecked.'/>
		 <img class = '.$active.' src ='.$key->filename.' height="225px"  onmouseover="return display_div('.$key->product_id.');" mouseleave="return remove_display_div();" onclick="selectedproductimage('.$key->product_id.',\''.$key->weblink.'\',this);" id="product_img'.$key->product_id.'"/>&nbsp;&nbsp;</div>';
	}
	if(sizeof($productdetails)==0)
	echo "<p class = 'alert alert-error'>No products matching your criteria.</p>";
        ?>

