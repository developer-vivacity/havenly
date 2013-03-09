<?php 

include(APPPATH.'/views/templates/header.php');
?>

<div class="form">
<form name="Contest" enctype = "multipart/form-data" method="post" action=<?php echo base_url('index.php/Contests/site/contest_submit');?>>
<div class = "contest_form_container">
<div id = "tabs">
	<ul>
	<li><a href="#startup">Start Up</a></li>
	<li><a href="#room">Your Room</a></li>
	<li><a href ="#likes">Loves</a></li>
	<li><a href = "#other">Furnishings</a></li>
	<li><a href="#floorplan">Floorplan</a></li>
	<li><a href = "#room_photos">Room Photos</a></li>
	<li><a href = "#style">Your Style</a></li>
	<li><a href ="#inspiration">Inspiration</a><li>
	<li><a href="#budget">Budget</a></li>
	</ul>


<div id = "startup">
<div class = "form_container">
	<p class = "title">Why don't we...Start you up</p>
	<p class = "text">What are you waiting for? After all, <span>there's no day like today.</span></p>
	<input type="hidden" name="formid" id="formid" value=<?php echo $formid;?> />
	<div class = "left_form_1">
	<label for="name" id = "title_input">Name your Contest:</label><br>
	<input type="text" name="name" value="Contest Name" id="title_input" maxlength="30" onfocus='value=""' 
	/>
	</div>
	<div class = "right_form_1">
	<label for="room_type" id = "room_type">Type of Room:</label><br>
	<select name="room_type" id="room_type">
		<option value="Living Room">Living Room</option>
		<option value="Bedroom" selected="selected">Bedroom</option>
		<option value="Dining Room">Dining Room</option>
		<option value="Study">Study</option>
		<option value="Basement">Basement</option>
	</select>
	</div>
	
	<div id = "second_row">
		<hr class = "style"/><br><br>
	<div class = "left_form_1">

<label for="reno_check">Will this be a renovation project?</label>
<input type="checkbox" name="reno_check" id="reno_check" value="Yes" checked="checked" />
</div>
<div class = "right_form_1">
<label for = "sqfoot">Approx. square footage</label><br>
<input type = "text" name = "sqfoot" id = "sqfoot"/>
</div>
	</div>
	<a class="nexttab" href="#">Next: Your Room</a>
</div>
</div>
<div id = "room">
<div class = "form_container">
<p class = "title"> Tell us about your room</p>
<p class = "text">What are you using it for?  What do you want it to be?  <span>How do you want it to feel?</span></p>
<textarea rows="10" cols="80" name="about" id="about"></textarea><BR><br>
<a class="nexttab" href="#">Next: Likes and Hates</a>
</div>
</div>
<div id = "likes">
<div class = "form_container">
<div class = "left_form">
<p class = "title"> What do you love about the room?</p>
<p class = "text">Come on, we know you love <span>something.</span></p>
<textarea rows="10" cols="50" name="likes" id="likes">I love the way you lie.</textarea>
</div>
<div class = "right_form">
<p class = "title"> What do you hate about the room?</p>
<p class = "text">And we know you hate <span>something.</span></p>
<textarea rows="10" cols="50" name="not_likes" id="not_likes">I hate the turquoise wallpaper and pink tiles.</textarea>
</div>
<a class="nexttab" href="#">Next: Furnishings</a>
</div>
</div>
<div id = "floorplan">
<div class = "form_container">
<div class = "left_form_1">
<div id = "floordraw" >
<div id = "fp_container">
<p class = "title">
Draw yourself a floor plan</p>
<p class = "text">
Draw the walls, include the length of each side of your room, and try and draw us any curvatures or unusual bumps. Draw in windows and doors.  Go to town. <span>We won't judge. </span></p>
<div id = "key">
<label> For Windows: </label><img src = <?php echo base_url('assets/Images/window.fw.png');?> width = "100"> 
<br><br><label> For Doors: </label><img src = <?php echo base_url('assets/Images/door.fw.png');?> width = "100" height: 20> 
</div>
<br><br>
	<label>Pick a Drawing Object</label><br>
	<select id="dtool">
	<option value="line">Line</option>
	<option value="rect">Rectangle</option>
	<option value="pencil">Pencil</option>
	</select>

	<div id="container_fp">
	<canvas id="imageView" height="400" width="400">
	<p>Unfortunately, your browser doesn't support HTML5 canvas - which means you can't draw your floorplan online - you can download one of the following, or submit a picture.</p>
	<p>
	Supported browsers:
	<a href="http://www.opera.com">Opera</a>
	,
	<a href="http://www.mozilla.com">Firefox</a>
	, and
	<a href="http://www.apple.com/safari">Safari</a>
	</p>
	</canvas>
	<canvas id="imageTemp" width="400" height="400"></canvas>
	<a class = "flat" id = "clear">Clear</a>
	<a class = "flat" id = "image_save">Save</a>
	</div>
</div>
</div>
</div>
<div class = "right_form_1"> 
<p class = "title">
Upload a Floorplan</p>
<p class = "text">
If you're more organized than us, and have a floor plan handy, <span>upload it below. </span></p>
<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file12hide"' );?>
	<a class = "flat" onclick = '$("#file12").click();'>Browse</a>
	<?php
	echo form_upload("floor_plan",'Browse for a file','id = "file12"', 'class="file_hidden"');
	echo '</div>';
?>

<script type="text/javascript">
if(window.addEventListener) {
window.addEventListener('load', function () {
var canvas, context, canvaso, contexto;
// The active tool instance.
var tool;
var tool_default = 'line';
function init () {
// Find the canvas element.
canvaso = document.getElementById('imageView');
if (!canvaso) {
alert('Error: I cannot find the canvas element!');
return;
}
if (!canvaso.getContext) {
alert('Error: no canvas.getContext!');
return;
}
// Get the 2D canvas context.
contexto = canvaso.getContext('2d');
if (!contexto) {
alert('Error: failed to getContext!');
return;
}
// Add the temporary canvas.
var container = canvaso.parentNode;
canvas = document.createElement('canvas');
if (!canvas) {
alert('Error: I cannot create a new canvas element!');
return;
}
canvas.id = 'imageTemp';
canvas.width = canvaso.width;
canvas.height = canvaso.height;
container.appendChild(canvas);
context = canvas.getContext('2d');
// Get the tool select input.
var tool_select = document.getElementById('dtool');
if (!tool_select) {
alert('Error: failed to get the dtool element!');
return;
}
tool_select.addEventListener('change', ev_tool_change, false);
// Activate the default tool.
if (tools[tool_default]) {
tool = new tools[tool_default]();
tool_select.value = tool_default;
}
// Attach the mousedown, mousemove and mouseup event listeners.
canvas.addEventListener('mousedown', ev_canvas, false);
canvas.addEventListener('mousemove', ev_canvas, false);
canvas.addEventListener('mouseup', ev_canvas, false);
}
// The general-purpose event handler. This function just determines the mouse
// position relative to the canvas element.
function ev_canvas (ev) {
if (ev.layerX || ev.layerX == 0) { // Firefox
ev._x = ev.layerX;
ev._y = ev.layerY;
} else if (ev.offsetX || ev.offsetX == 0) { // Opera
ev._x = ev.offsetX;
ev._y = ev.offsetY;
}
// Call the event handler of the tool.
var func = tool[ev.type];
if (func) {
func(ev);
}
}
// The event handler for any changes made to the tool selector.
function ev_tool_change (ev) {
if (tools[this.value]) {
tool = new tools[this.value]();
}
}
// This function draws the #imageTemp canvas on top of #imageView, after which
// #imageTemp is cleared. This function is called each time when the user
// completes a drawing operation.
function img_update () {
contexto.drawImage(canvas, 0, 0);
context.clearRect(0, 0, canvas.width, canvas.height);
}
// This object holds the implementation of each drawing tool.
var tools = {};
// The drawing pencil.
tools.pencil = function () {
var tool = this;
this.started = false;
// This is called when you start holding down the mouse button.
// This starts the pencil drawing.
this.mousedown = function (ev) {
context.beginPath();
context.moveTo(ev._x, ev._y);
tool.started = true;
};
// This function is called every time you move the mouse. Obviously, it only
// draws if the tool.started state is set to true (when you are holding down
// the mouse button).
this.mousemove = function (ev) {
if (tool.started) {
context.lineTo(ev._x, ev._y);
context.stroke();
}
};
// This is called when you release the mouse button.
this.mouseup = function (ev) {
if (tool.started) {
tool.mousemove(ev);
tool.started = false;
img_update();
}
};
};
// The rectangle tool.
tools.rect = function () {
var tool = this;
this.started = false;
this.mousedown = function (ev) {
tool.started = true;
tool.x0 = ev._x;
tool.y0 = ev._y;
};
this.mousemove = function (ev) {
if (!tool.started) {
return;
}
var x = Math.min(ev._x, tool.x0),
y = Math.min(ev._y, tool.y0),
w = Math.abs(ev._x - tool.x0),
h = Math.abs(ev._y - tool.y0);
context.clearRect(0, 0, canvas.width, canvas.height);
if (!w || !h) {
return;
}
context.strokeRect(x, y, w, h);
};
this.mouseup = function (ev) {
if (tool.started) {
tool.mousemove(ev);
tool.started = false;
img_update();
}
};
};
// The line tool.
tools.line = function () {
var tool = this;
this.started = false;
this.mousedown = function (ev) {
tool.started = true;
tool.x0 = ev._x;
tool.y0 = ev._y;
};
this.mousemove = function (ev) {
if (!tool.started) {
return;
}
context.clearRect(0, 0, canvas.width, canvas.height);
context.beginPath();
context.moveTo(tool.x0, tool.y0);
context.lineTo(ev._x, ev._y);
context.stroke();
context.closePath();
};
this.mouseup = function (ev) {
if (tool.started) {
tool.mousemove(ev);
tool.started = false;
img_update();
}
};
};

// var save = document.getElementById('image_save');
// save.addEventListener('click', alerting, false);

// function alerting(){
// alert('yay');
// }

init();



}, false); }
// vim:set spell spl=en fo=wan1croql tw=80 ts=2 sw=2 sts=2 sta et ai cin fenc=utf-8 ff=unix:
$("#clear").bind('click', function() {
var canvas = document.getElementById('imageView');
canvas.width=canvas.width;
return false;
});

	  
$("#image_save").bind('click', function(){
		
		alert('yay');
		var canvas = document.getElementById('imageView');
		
		var img = canvas.toDataURL("image/png");
		var formid = document.getElementById('formid').value;
	
		$.ajax({
		type: "POST",
		url: '/test/design2/index.php/Contests/site/floorplan_upload',
		contentType: 'application/x-www-form-urlencoded',
		data: {
		img:img,
		formid:formid},
		success: function (){
		alert("We gotcha!");},
		error: function() {
		alert('Error Occurred');}
		});
});
	
</script>

</div><br><br>
<a class="nexttab" href="#">Next: Room Photos</a>
</div>

</div>




<div id = "room_photos">
<div class = "form_container">

<p class = "title">Upload Room Pics</p>
<p class = "text">The more, the merrier.</p>
<?php echo '<div>';
	echo form_input('room_photo_hide',"File", 'id="file1hide"' );?>
	<a class = "flat" id = "browse_file" onclick = '$("#file1").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file1"', 'class="file_hidden"');
	echo form_input("room_photo_desc[]",'Description');
	echo '</div>';
	?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"File", 'id="file2hide"' );?>
	<a class = "flat" id = "browse_file" onclick = '$("#file2").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file2"', 'class="file_hidden"');
	echo form_input("room_photo_desc[]",'Description');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"File", 'id="file3hide"' );?>
	<a class = "flat" id = "browse_file" onclick = '$("#file3").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file3"', 'class="file_hidden"');
	echo form_input("room_photo_desc[]",'Description');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"File", 'id="file4hide"' );?>
	<a class = "flat" id = "browse_file" onclick = '$("#file4").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file4"', 'class="file_hidden"');
	echo form_input("room_photo_desc[]",'Description');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"File", 'id="file5hide"' );?>
	<a class = "flat" id = "browse_file" onclick = '$("#file5").click();'>Browse</a>
	<?php
	echo form_upload("room_photo[]",'Browse for a file','id = "file5"', 'class="file_hidden"');
	echo form_input("room_photo_desc[]",'Description');
	echo '</div>';
	?>
<br>
	<a class="nexttab" href="#">Next: Your Style</a>
</div>
</div>




<div id = "style">
<div class = "form_container">
<p class = "title">Your Style</p>
<p class = "text">Now, the hard part.  We need to figure out your <span>style.</span></p>
<div id = "first_row"
<p class = "basic_text">Pick the pictures that appeal to you</p>
		
	<div class="design_photos">
	<?php echo form_checkbox('Classic', 'Classic', set_checkbox('design', 'Classic'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Classic.jpg');?> height=200 class="design_pics">
	</div>
	
	<div class="design_photos">
	<?php echo form_checkbox('Modern', 'Modern', set_checkbox('design', 'Modern'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Modern.jpg');?> height=200 class="design_pics">
	</div>
	
	<div class="design_photos">
	<?php echo form_checkbox('Eclectic', 'Eclectic', set_checkbox('design', 'Eclectic'), 'class = "cbox"');?>
	<img src=<?php echo base_url('assets/Images/Eclectic.jpg');?> height=200 class="design_pics">
	</div>
</div>
<div id = "second_row">
<hr class= "style"/>
<p class = "title"> Tell me about it, stud.</p>
<p class = "text">A picture may be a thousand words, but we want some more from you: colors you <span>love.</span>  Things that bother you.</p>
<textarea rows="10" cols="80" name="style" id="style"></textarea>
</div><br><br>
<a class="nexttab" href="#">Next: Your Inspiration</a>
</div>
</div>

<div id = "inspiration">
<div class = "form_container">
<p class = "title">What Inspires You?</p>
<p class = "text">Add some pictures of rooms you love, and <span>inspire us</span></p>

<div class = "left_form_1">
<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file11hide"' );?>
	<a class = "flat" onclick = '$("#file11").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file11"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file21hide"' );?>
	<a class = "flat" onclick = '$("#file21").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file21"', 'class="file_hidden"');
	echo '</div>';
?>

<?php echo '<div>';
	echo form_input('room_photo_hide',"", 'id="file31hide"' );?>
	<a class = "flat" onclick = '$("#file31").click();'>Browse</a>
	<?php
	echo form_upload("inspr_photo[]",'Browse for a file','id = "file31"', 'class="file_hidden"');
	echo '</div>';
?>
</div>
<div class = "right_form_1">
<a id= "photo_popup" href="#contest_inspr_photos"> Add Already Uploaded</a>

</div><br><br><a class="nexttab" href="#">Next: Budget</a>
</div>


<div id = "contest_inspr_photos">
<div id = "already_uploaded">
<br>
<p> Select Uploaded Pictures for Inspiration </p><br>
<a class = "navigation1" id = "close_user_pics">Save</a>
<br> <br>

<?php
if(isset($images)&&$images!=0&&!empty($images)){

 foreach ($images as $value) 
{
$filename= $value['filename'];
$src=$value['Orig_src'];
	
	echo '<div class="user_photos">';
	echo form_checkbox('inspr_pics[]', $filename, set_checkbox('inspr_pics', $filename), 'class = "cbox"');
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=100 class="contest_user_pics2">';
	echo '</div>';
}

}

else { echo 'You don\'t have photos uploaded'; }?>
</div>
</div>
</div>
<div id = "other">
<div class = "form_container">
<div class = "left_form">
<p class = "title"> Pieces to Keep</p>
<p class = "text">Which items do you want to keep in the room</p>
<textarea rows="10" cols="50" name="keep" id="keep">Obsessed with my couch.</textarea>
</div>
<div class = "right_form">
<p class = "title"> Pieces to Buy</p>
<p class = "text">Tell us what items you'd like recommendations on.</p>
<textarea rows="10" cols="50" name="need" id="need">Drapes, etc...</textarea>
</div><br><br><a class="nexttab" href="#">Next: Floorplan</a>
</div>
</div>

<div id = "budget">
<div class = "form_container">
<div id = "first_row">
<div class = "left_form_1">
<p class = "title"> Total Furnishings Budget</p>
<p class = "text"><span>How much are you willing to spend</span> on furniture and paint?</p>
<input type="text" name="budget" value="1 billion dollars" id="budget" maxlength="30" />
</div>
<div class = "right_form_1">
<p class = "title"> Furniture I like</p>
<p class = "text">Where do you normally shop for furniture?</p>
<label for="store1">Cheaper, funky stores like Ikea and Target</label><input type="radio" name="store" id="store1" value="ikea" checked="checked" />
<br><label for="store2">Upscale chain stores like Pottery Barn</label><input type="radio" name="store" id="store2" value="WS" />
<br><label for="store2">Custom furnishings from high end stores</label><input type="radio" name="store" id="store3" value="custom"/>
</div>
</div>	
<div id = "second_row">
<input type="submit" value="You're Done!" onclick = "window.onbeforeunload=null" class = "flat2" id = "contest_submit"/>
<div>
</div>
</div>
</div>
</div>
</form>	
<script type = "text/javascript">

	
	$(document).ready(function(){
		$("#tabs").tabs();
		
		$(".nexttab").click(function() {
		var selected = $("#tabs").tabs("option", "active");
		$("#tabs").tabs("option", "active", selected + 1);
			});
		$("#contest_inspr_photos").hide();
		$('.cbox').hide();
		});
	
		
	$(".contest_user_pics2").click(function(){
		$(this).toggleClass('active1');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.attr('checked', !checkbox.attr('checked'));
		});
		
	$(".design_pics").click(function(){
		$(this).toggleClass('active1');
		var checkbox = $(this).parent().find('.cbox');
		checkbox.attr('checked', !checkbox.attr('checked'));
		});
		
	
	$("#photo_popup").click(function(){
	$("#contest_inspr_photos").toggle('fast');});
	
	$("#close_user_pics").click(function(){
	$("#contest_inspr_photos").hide('fast');});
	
	
	$("#file1").change(function(){
	$('#file1hide').val($(this).val());
	});
	
	$("#file2").change(function(){
	$('#file2hide').val($(this).val());
	});
	
	
	$("#file3").change(function(){
	$('#file3hide').val($(this).val());
	});
	
	$("#file4").change(function(){
	$('#file4hide').val($(this).val());
	});
	
	
	$("#file5").change(function(){
	$('#file5hide').val($(this).val());
	});
	
	
		$("#file11").change(function(){
	$('#file11hide').val($(this).val());
	});
	
	$("#file21").change(function(){
	$('#file21hide').val($(this).val());
	});
	
	
	$("#file31").change(function(){
	$('#file31hide').val($(this).val());
	});
	

		$("#file12").change(function(){
	$('#file12hide').val($(this).val());
	});	
		


</script>	


<?php
$this->load->view('templates/footer');
?>