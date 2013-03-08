<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class = "drag_drop_container">
 <div id="template" class="temp"> 
 <div class = "item" id = "plan_image" style="background-color: #F8F8F8 ; z-index: 0; font-family: 'Sanchez'; font-size: .8em; width: 100%; line-height: 200px; height: 200px; text-align: center; border: 1px dotted lightgray;">
Picture or Rendering Showing an Idea
 </div>
 <div class = "item"  id = "plan_furn3" style="background-color: #F8F8F8 ; z-index: 1; position: absolute; top: 270px; left: 100px; font-family: 'Sanchez'; font-size: .8em; width: 150px; line-height: 100px; height: 100px;  text-align: center; border: 1px dotted lightgray;">
 Furniture
 </div>
  <div class = "item" id = "plan_furn1"  style="background-color: #F8F8F8; position: absolute; top: 190px; left: 10px;font-family: 'Sanchez'; font-size: .8em; width: 150px; line-height: 100px; height: 100px; text-align: center; border: 1px dotted lightgray;">
 Furniture
 </div>
  <div class = "item" id = "plan_furn2" style=" background-color: #F8F8F8; z-index: 3; position: absolute; top: 190px; right: 10px;font-family: 'Sanchez'; font-size: .8em; width: 150px; line-height: 100px; height: 100px;  text-align: center; border: 1px dotted lightgray;">
Furniture
 </div>
  <div class = "item" id = "plan_furn4" style=" background-color: #F8F8F8; z-index: 3; position: absolute; bottom: 10px; left: 20px;font-family: 'Sanchez'; font-size: .8em; width: 150px; line-height: 100px; height: 100px;  text-align: center; border: 1px dotted lightgray;">
Furniture
 </div>
 
 <div class = "item" id = "plan_decor1" style="background-color: #F8F8F8; z-index: 4; position: absolute; top: 320px; left: 10px; font-family: 'Sanchez'; display: inline-block; font-size: .8em; width: 100px; line-height: 100px; height: 100px; text-align: center; border: 1px dotted lightgray;">
	Decor Item
 </div>
 
   <div class = "item" id = "plan_decor2" style="background-color: #F8F8F8; position: absolute; top: 220px; right: 150px; z-index: 5; font-family: 'Sanchez'; font-size: .8em; width: 100px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Decor Item
 </div>
 
    <div class = "item" id = "plan_decor3" style="background-color: #F8F8F8; font-family: 'Sanchez'; position: absolute; top: 310px; right: 50px;font-size: .8em; width: 100px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Decor Item
 </div>
 
   <div class = "item" id = "plan_color1" style="background-color: #F8F8F8;font-family: 'Sanchez'; position: absolute; bottom: 10px; right: 10px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 1
 </div>
    <div class = "item" id = "plan_color2" style="background-color: #F8F8F8;font-family: 'Sanchez'; position: absolute; bottom: 10px; right: 110px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 2
 </div>
 
<div class = "item" id = "plan_color3" style="background-color: #F8F8F8; font-family: 'Sanchez'; position: absolute; bottom: 10px; right: 210px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 3
 </div>
 
</div>
 <div id = "tabs2">
 <ul>
	<li><a href="#user_items">Your Products</a></li>
	<li><a href="#user_pictures">Your Pictures</a></li>
	<li><a href="#room">Furniture</a></li>
	<li><a href="#room">Paint Colors</a></li>
	<li><a href="#room">Home Decor</a></li>
</ul>

	
 <?php if (isset($products)&&!empty($products)&&$products!=0):?>
 <div id="user_items">
 <?php foreach ($products as $product){
	$picture = $product['file_name'];
	$name = $product['product_name'];
	$id = $product['product_id'];
	$price = $product['product_price'];
	
	echo "<div class = 'drag_container'>";
	echo "<img class = 'draggable' src='https://s3.amazonaws.com/easableimages/{$picture}' height=50 title ='{$name}'>";
	echo "</div>";
	}
	
	
	?>
<?php endif?>	
        </div>
<?php if (isset($products)&&!empty($products)&&$products!=0):?>
 <div id="user_pictures">
 <?php foreach ($images as $value) 
	{
		$filename= $value['filename'];
		$desc=$value['Description'];

		echo '<div class="drag_container">';
		echo "<img class = 'draggable' src='https://s3.amazonaws.com/easableimages/{$filename}' height=50 title='{$desc}'>";
		echo '</div>';
	}
	
	?>
<?php endif?>			
</div>	
		
		</div>
		</div>
<script type ="text/javascript">
$(document).ready(function(){
 $("#tabs2").tabs(); 
 $.ui.draggable.prototype.destroy = function (ul, item) { }; 
 
 $(".draggable").draggable({
            helper:'clone',
			cursor: 'move',
				
	          });
 
		 
$(".item").droppable({
		    drop: function (e, ui) {
			$(this).text("");
			$(this).append(ui.draggable.clone());
			var height = $(this).height();
			$(this).css('background-color','transparent');
			$(this).css('border','none');
			$(this).find('img').height(height);
			$(this).find('img').resizable({
			aspectRatio:true,
						});
						
			}
        });
	
		

		
		
		});
</script>	
			