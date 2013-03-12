<?php 
	include(APPPATH.'/views/templates/header2.php');
?>
<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>
<div class = "drag_drop_container">
<hr class = "style"/>
<p class='title'>1. Drag and Drop Products and Images to Create a <span>Design Board</span></p>
<hr class = "style"/>
<div class = "canvas_container">




 <div id="template" class="temp"> 
 <div class = "canvas_menu">
<ul>
<li><a id = "rotate">Rotate</a></li>
<li><a id = "delete">Delete</a></li></ul>
</div>
 <div class = "item" id = "plan_image" style="z-index: 0; position: absolute; top: 10px; left: 10px; background-color: #F8F8F8 ; z-index: 0; font-family: 'Sanchez'; font-size: .8em; width: 50%; height: 220px; text-align: center; border: 1px dotted lightgray;">
<br><br><br><br><br><br>Picture or Rendering Showing the Design Concept
 </div>
 <div class = "item"  id = "plan_furn3" style="background-color: #F8F8F8 ; z-index: 1; position: absolute; top: 170px; right: 10px; font-family: 'Sanchez'; font-size: .8em; width: 170px; line-height: 150px; height: 150px;  text-align: center; border: 1px dotted lightgray;">
 Furniture
 </div>
  <div class = "item" id = "plan_furn1"  style="background-color: #F8F8F8; position: absolute; top: 230px; left: 10px;font-family: 'Sanchez'; font-size: .8em; width: 170px; line-height: 150px; height: 150px; text-align: center; border: 1px dotted lightgray;">
 Furniture
 </div>
  <div class = "item" id = "plan_furn2" style=" background-color: #F8F8F8; z-index: 3; position: absolute; top: 10px; right: 10px;font-family: 'Sanchez'; font-size: .8em; width: 170px; line-height: 150px; height: 150px;  text-align: center; border: 1px dotted lightgray;">
Furniture
 </div>
  <div class = "item" id = "plan_furn4" style=" background-color: #F8F8F8; z-index: 3; position: absolute; bottom: 10px; left: 10px;font-family: 'Sanchez'; font-size: .8em; width: 170px; line-height: 150px; height: 150px;  text-align: center; border: 1px dotted lightgray;">
Furniture
 </div>
 
 <div class = "item" id = "plan_decor1" style="background-color: #F8F8F8; z-index: 4; position: absolute; top: 300px; left: 190px; font-family: 'Sanchez'; display: inline-block; font-size: .8em; width: 130px; line-height: 110px; height: 110px; text-align: center; border: 1px dotted lightgray;">
	Decor Item
 </div>
 
   <div class = "item" id = "plan_decor2" style="background-color: #F8F8F8; position: absolute; top: 180px; right: 190px; z-index: 5; font-family: 'Sanchez'; font-size: .8em; width: 130px; line-height: 110px; height: 110px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Decor Item
 </div>
 
    <div class = "item" id = "plan_decor2" style="background-color: #F8F8F8; position: absolute; bottom: 10px; left: 190px; z-index: 5; font-family: 'Sanchez'; font-size: .8em; width: 130px; line-height: 110px; height: 110px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Decor Item
 </div>
 
 
    <div class = "item" id = "plan_decor3" style="background-color: #F8F8F8; z-index: 6; font-family: 'Sanchez'; position: absolute; top: 310px; right: 160px;font-size: .8em; width: 130px; line-height: 110px; height: 110px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Decor Item
 </div>
 
   <div class = "item" id = "plan_color1" style="background-color: #F8F8F8;font-family: 'Sanchez'; position: absolute; bottom: 10px; right: 10px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 1
 </div>
    <div class = "item" id = "plan_color2" style="background-color: #F8F8F8;font-family: 'Sanchez'; position: absolute; bottom: 10px; right: 110px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 2
 </div>
 
<div class = "item" id = "plan_color3" style="background-color: #F8F8F8; font-family: 'Sanchez'; position: absolute; bottom: 120px; right: 10px; font-size: .8em; width: 90px; line-height: 100px; height: 100px; vertical-align: middle; text-align: center; border: 1px dotted lightgray;">
Color 3
 </div></div><br><a class = "flat" id = "template_save">Save</a>

</div>
 <div id = "tabs2">
 <ul>
	<li><a href="#user_items">Your Products</a></li>
	<li><a href="#user_pictures">Your Pictures</a></li>
	<li><a href="#room">Furniture</a></li>
	<li><a href="#room">Paint Colors</a></li>
	<li><a href="#room">Home Decor</a></li>
</ul>

 <div id="user_items">	
 Add a product<input type="text" name="weblink" value="http://" id="product_link"  class="input_product" 
onfocus="value=''" onblur="value=value" /><a class = "flat" id = "submit_link">Submit</a><br><br>
 <?php if (isset($products)&&!empty($products)&&$products!=0):?>

<div class="products">
 <?php foreach ($products as $product){
	$picture = $product['file_name'];
	$name = $product['product_name'];
	$id = $product['product_id'];
	$price = $product['product_price'];
		
	echo "<div class = 'drag_container'>";
	echo "<img class = 'draggable' src='https://s3.amazonaws.com/easableimages/{$picture}' height=100 title ='{$name}'>";
	echo "</div>";
	}

	
	?>
	</div>
<?php endif?>
<div id = "product_detail">
<div id = "product_window">
</div>
</div>
	
        </div>
 <div id="user_pictures">
 <div id="user_items">	
 Add a picture<input type="text" name="weblink" value="Browse" id="product_link"  class="input_product" 
onfocus="value=''" onblur="value=value" /><a class = "flat" id = "submit_link">Browse</a><br><br>
<?php if (isset($products)&&!empty($products)&&$products!=0):?>
 <?php foreach ($images as $value) 
	{
		$filename= $value['filename'];
		$desc=$value['Description'];

		echo '<div class="drag_container">';
		echo "<img class = 'draggable' src='https://s3.amazonaws.com/easableimages/{$filename}' height=100 title='{$desc}'>";
		echo '</div>';
	}
	
	?>
<?php endif?>			
</div>	

</div>	</div>	

<script type ="text/javascript">
$(document).ready(function(){
 $("#tabs2").tabs(); 
 $('.canvas_menu').hide();
 $("#loading").hide();
 $("#product_detail").hide();
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
			// $(this).find('img').css('border','1px solid black');
			$(this).find('img').attr('class',"dropped_image");
			$(this).find('img').resizable({
			aspectRatio:true,
						});
						
			}
        });


		
		
$("#template_save").click(function(){
	$('.item').css('background-color','transparent');
	$('.item').css('border','none');
	$('.item').css('color','white');
	var html = $("#template").html();
	
	 $.ajax({        
					type: 'POST',
					url: '/test/design2/index.php/Supplier/response/test',
					data: {html:html},
					success: function(data){
					$("#template").replaceWith(data);
					}
					 });
					 });
	
	
	
	
$('.item').on('click','.dropped_image',function(){
if($(this).attr('id')=='selected')
{$(this).removeAttr('id','selected');
$('.canvas_menu').hide();
}

else{
$('#selected').removeAttr('id','selected');
$(this).attr('id','selected');
$('.canvas_menu').fadeIn('slow');}
});

$('#rotate').click(function(){

var el = document.getElementById('selected');
var st = window.getComputedStyle(el, null);

var tr = st.getPropertyValue("-webkit-transform") ||
         st.getPropertyValue("-moz-transform") ||
         st.getPropertyValue("-ms-transform") ||
         st.getPropertyValue("-o-transform") ||
         st.getPropertyValue("transform") ||
		 0;

if(tr==0||tr=="none"){angle = 0}
else{
var values = tr.split('(')[1];
    values = values.split(')')[0];
    values = values.split(',');
var a = values[0];
var b = values[1];
var c = values[2];
var d = values[3];		 
		 
var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));}
var degrees = 90+angle;

$("#selected").css({
  '-webkit-transform' : 'rotate('+degrees+'deg)',
     '-moz-transform' : 'rotate('+degrees+'deg)',  
      '-ms-transform' : 'rotate('+degrees+'deg)',  
       '-o-transform' : 'rotate('+degrees+'deg)',  
          'transform' : 'rotate('+degrees+'deg)', 
});
});

$('#delete').click(function(){
$('#selected').parent().css('background-color','lightgray');
$('#selected').parent().css('border','1px solid gray');
$('#selected').parent().find('img').remove();
$('.canvas_menu').hide();

});

$("#submit_link").click(function(){

$("#loading").show();
var link=$("#product_link").val();
 $.ajax({        
					type: 'POST',
					url: '/test/design2/index.php/Supplier/upload/photo_link',
					data: {weblink:link},
					success: function(data){
						$("#product_detail").show();
					    $("#product_window").html(data);
				
					}
					 })


});

					

});

</script>	</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>	