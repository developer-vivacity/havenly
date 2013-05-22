<?php 
	include(APPPATH.'/views/templates/header2.php');
	
?>
<br><br>
<div class = "status_change padding_left">
<form name="change_status" method="post" action=<?php echo base_url('index.php/Admin/site/change_status/'.$room_data[0]['id']);?>>
<label for="status">Change Status To:</label>
<select name="status" id="status">
		
		<option value="called" selected="selected">Called</option>
		<option value="emailed" >Emailed Full Order</option>
		<option value="ordered" >Ordered Items</option>
		<option value="closed" >Completed Order</option>
	</select>

<input type="submit" class = "button2 top midlarge teal" value="Submit" />
<br><br><br></div>
<div class = "horizontal center gray">
<p class = "white_text midlarge title padding_small">
Room Details</p>
</div><br>
<div class = "inline padding_left padding_right">
<p class = "title medium">Design Type:</p> 
<p class = "text medium">
<span>
<?php echo $room_data[0]['type'];?><br>
<?php echo date('m.d.y',strtotime($room_data[0]['Timestamp']));?><br>
<?php echo $room_data[0]['room_type'];?></p>
</span>
</p>
</div>

<div class = "inline padding_left padding_right">
<p class = "title medium">About:</p> 
<p class = "text dark_gray_text medium"><?php echo $room_data[0]['about'];?></p>
</div><br>

<div class = "inline top padding_left padding_right">
<p class = "title medium">Width:</p> 
<p class = "text dark_gray_text medium"><?php echo $room_data[0]['width'];?></p>
<p class = "title medium">Height:</p> 
<p class = "text dark_gray_text medium"><?php echo $room_data[0]['height'];?></p>
</div>

<div class = "inline padding_left padding_right">
<P class = "medium dark_gray_text">Photo 1</p>
<img src = <?php echo $room_data[0]['room_photo1'];?> height = 300>
</div>
<div class = "inline padding_left padding_right">
<?php
if (isset($room_data[0]['room_photo2'])){
echo "<P class = 'medium dark_gray_text'>Photo 2</p>";
echo "<img src ={$room_data[0]['room_photo2']} height = 300>";
}
?>
</div>
</div>
<br><br>
<div class = "center">
<div class = "horizontal center gray">
<p class = "white_text midlarge title padding_small">
User Preferences</p>
</div><br>
<div class = "inline padding_left padding_right">
<p class = "medium dark_gray_text">
Photos Picked</p><br>
<?php 
	if ($user_prefs[0]['room_type']=='BR')
	{
		$room = 'Bedroom';
		$room_abbr = 'BR';
	}
	else {
		$room = 'LivingRoom';
		$room_abbr = 'LR';
		}
	
	$pics = explode(',',$user_prefs[0]['style_pics']);
	foreach ($pics as $pic)
	{
		$html = base_url('assets/Images/'.$room.'/'.$room_abbr.$pic.'.jpg');
		echo "<img class = 'padding_small' src = {$html} height = 200>";
		}
?>
</div><br><hr class = "half style"><br>
<div class = "inline padding_left padding_right">
<p class = "medium dark_gray_text">
Colors Picked</p><br>
<?php 
	
	$colors = explode(',',$user_prefs[0]['color_pics']);
	foreach ($colors as $color)
	{
		switch ($color){
		case 1:
		echo '<div class = "color" style = "background-color: rgb(188,196,188);"></div>';
		break;
		case 2:
		echo '<div class = "color" style = "background-color: rgb(255,243,196);"></div>';
		break;
		case 3:
		echo '<div class = "color" style = "background-color: rgb(99, 121, 134);"></div>';
		break;
		case 4:
		echo '<div class = "color" style = "background-color: rgb(255, 186, 180);"></div>';
		break;
		case 5:
		echo '<div class = "color" style = "background-color: rgb(204, 199, 185);"></div>';
		break;
		case 6:
		echo '<div class = "color" style = "background-color: rgb(241, 242, 235);"></div>';
		break;
		case 7:
		echo '<div class = "color" style = "background-color: rgb(197, 222, 204);"></div>';
		break;
		case 8:
		echo '<div class = "color" style = "background-color: rgb(190, 210, 213);"></div>';
		break;
		case 9:
		echo '<div class = "color" style = "background-color: #FF0055;"></div>';
		break;
		case 10:
		echo '<div class = "color" style = "background-color: #006FFF;"></div>';
		break;
		case 11:
		echo '<div class = "color" style = "background-color: #00FFF7;"></div>';
		break;
		case 12:
		echo '<div class = "color" style = "background-color: #00FF5E;"></div>';
		break;
		case 13:
		echo '<div class = "color" style = "background-color: #FFD500;"></div>';
		break;
		case 14:
		echo '<div class = "color" style = "background-color: #FF1100;"></div>';
		break;
}		
		
		
		
		}
		
?><br>
</div></div><br>
<div class = "center">
<div class = "horizontal center gray">
<p class = "white_text midlarge title padding_small">
User Details</p>
</div><br>
<p class = "dark_gray_text text">
<?php 

echo $user[0]['first_name'].' ';
echo $user[0]['last_name'].'<br>';
echo $user[0]['phone'].'<br>';
echo $user[0]['email'].'<br>';
echo $user[0]['zipcode'].'<br>';
echo $user[0]['address'].'<br>';
?>
<p>

<br>
</div>
</div>
</form>