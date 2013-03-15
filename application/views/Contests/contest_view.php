<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand|Imprima' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href=<?php echo base_url("assets/Scripts/jquery.fancybox.css")?> type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.cycle.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.pack.js")?>></script>
	<link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>	


<?php
$id =  $contest_data[0]['id'];
$name = $contest_data[0]['contest_name'];
$room_type = $contest_data[0]['room_type'];
$reno_check = $contest_data[0]['renovation'];
$likes =  $contest_data[0]['likes'];
$not_likes =  $contest_data[0]['not_likes'];
$style = $contest_data[0]['style'];
$modern = $contest_data[0]['modern'];
$traditional = $contest_data[0]['traditional'];
$eclectic = $contest_data[0]['eclectic'];
$keep = $contest_data[0]['keep'];
$need = $contest_data[0]['need'];
$budget = $contest_data[0]['Budget'];
$store = $contest_data[0]['store'];
$sqfoot = $contest_data[0]['sqfoot'];
$about = $contest_data[0]['about'];
$type = $contest_data[0]['contest_type'];
?>
<div class = "view_container">
<div id = "tabs1">
	<ul>
	<li><a href ="#room_details">Room Details</a></li>
	<li><a href = "#style">Style Details</a></li>
	<li><a href="#room_photos">Room Photos</a></li>
	<li><a href ="#inspiration">Inspiration</a><li>
	<li><a href ="#floorplan">Floorplans</a><li>
	</ul>



<div id = "room_photos">
<div class = "form_container">
<?php foreach ($contest_files_curr as $file)
{ 
	$filename =  $file['filename'];
	$desc=$file['description'];
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height = 300px class = "home_user_pics" title="'.$desc.'">';
	echo '<p class = "text">'.$desc.'</p>';
}
?>
</div>
</div>

<div id = "inspiration">
<div class = "form_container">

<?php foreach ($contest_files_insp as $file)
{ 
		$desc=$file['description'];
	$filename =  $file['filename'];
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height = 300px class = "home_user_pics" title="'.$desc.'">';
		echo '<p class = "text">'.$desc.'</p>';
	}
?>
</div></div>




<div id = "floorplan">
<div class = "form_container">

<?php foreach ($floorplans as $file)
{ 
	$filename =  $file['filename'];
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height = 300px class = "home_user_pics">';
	}
?>
</div></div>


<div id = "room_details"><div class = "form_container">
<div class = "project_title">
<p class="title"> Contest Name: <span><?php echo $name; ?></span></p>
<p class ="text"><?php echo $room_type; ?></p>
</div>

<div class = "room_stuff">
<div class = "left_form_1">
<p class = "text1">Renovation Project:<span>  <?php echo $reno_check;?></span></p>
</div>
<div class = "right_form_1">
<p class = "text1">Approx Square Footage:<span>  <?php echo $sqfoot;?></span></p>
</div>
<div class = "room_stuff">
<div class = "left_form_1">
<p class = "text1">Things liked about the room: <span><?php if ($likes != NULL){echo $likes;} else {echo 'No response';}?></span></p>
</div>

<div class = "right_form_1">
<p class = "text1">Things not liked about the room: <span> <?php if ($not_likes != NULL){echo $not_likes;} else {echo 'No response';} ;?></span></p>
</div>
</div>


<div class = "room_stuff">
<div class = "left_form_1">
<p class = "text1">Things to Keep:<span> <?php if ($keep !=NULL){echo $keep;} else {echo 'No response';}?></span></p>
</div>

<div class = "right_form_1">
<p class = "text1">Things Needed:<span>  <?php if ($need !=NULL){echo $need;} else {echo 'No response';}?></span></p>
</div>


<div class = "room_stuff">
<div class = "left_form_1">
<p class = "text1">Stores I shop at:<span> <?php if ($store !=NULL){echo $store;} else {echo 'No response';}?></span></p>
</div>

<div class = "right_form_1">
<p class = "text1">About the Room:<span>  <?php if ($about !=NULL){echo $about;} else {echo 'No response';}?></span></p>
</div>
</div>
<hr class = "style"/>
<div class = "room_stuff">
<div class = "left_form_1">
<p class = "title">Budget for Furnishings: <span><?php if ($budget !=NULL){echo $budget;} else {echo 'No response';}?></span></p>
</div>
</div>
</div>
</div>
</div></div>
<div id= "style"><div class ="form_container">
<div class = "style_stuff">
<p class = "title">Your Style:</p>
<p class = "text1"><span><?php if($style!=NULL){echo $style;}else{echo'No response';}?></span></p>
</div>
<hr class = "style"/>

<div class = "style_stuff">
<p class = "title"> The styles you liked:</p>
<?php 
if($modern!=NULL){echo '<img src="'.base_url('assets/Images/Modern.jpg').'" height=200 class="design_pics">';}
if($traditional!=NULL){echo '<img src="'.base_url('assets/Images/Traditional.jpg').'" height=200 class="design_pics">';}
if($eclectic!=NULL){echo '<img src="'.base_url('assets/Images/Eclectic.jpg').'" height=200 class="design_pics">';}
?>
</div>
</div>
</div>
</div></div>
<script>
$(document).ready(function(){
		$("#tabs1").tabs();});
</script>