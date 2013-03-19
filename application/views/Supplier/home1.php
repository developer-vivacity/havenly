
<?php 
	include(APPPATH.'/views/templates/header2.php');
?>
<br>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.html'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Profile</span></a></li>
   <li class='has-sub'><a href='#'><span>Contests</span></a></li>
   <li><a href='#'><span>Responses</span></a></li>
   <li class='last'><a href='#'><span>Messages</span></a></li>
</ul>
</div>
<div id = 'display_area'>
<div class = 'desc_header'>Open Contests</div>
<div class = "search_bar">
<div class = 'display_box'>Design Style<div class = 'drop_arrow'>v</div></div>
<div class='search_res'>
<input type="checkbox" name="style" id="style" value=" Modern">Modern<br>
<input type="checkbox" name="style" id="style" value="Traditional" >Traditional<br>
<input type="checkbox" name="style" id="style" value="Eclectic" >Eclectic<br>
</div></div>

<div class = "search_bar">
<div class = 'display_box'>Room Type<div class = 'drop_arrow'>v</div></div>
<div class='search_res'>
<input type="checkbox" name="room" id="room" value=" Modern">Living Room<br>
<input type="checkbox" name="room" id="room" value="Traditional" >Bedroom<br>
<input type="checkbox" name="room" id="room" value="Eclectic" >Study<br>
<input type="checkbox" name="room" id="room" value="Eclectic" >Basement<br>
<input type="checkbox" name="room" id="room" value="Eclectic" >Kitchen<br>
<input type="checkbox" name="room" id="room" value="Eclectic" >Bathroom<br>
</div></div>
<br>
<?php
foreach ($contests as $contest){
$current = $contest['current'];
$inspiration=$contest['inspiration'];
$style = $contest['style'];

echo "<div class = 'contest_show_container' data-style ='{$style}' data-room = '{$contest['room']}'>";
echo '<a href="'.base_url('index.php/Contests/site/show_contest/'.$contest['id']).'">';
echo '<div class = "contest_pic_container">';
echo '<img src = "https://s3.amazonaws.com/easableimages/'.$current.'" class = "contest_pic">';
echo '<img src = "https://s3.amazonaws.com/easableimages/'.$inspiration.'" class = "contest_pic">';	
echo '<div class="contest_name">'.$contest['name'].'</div>';
echo '</div>';
echo '<div class = "contest_detail_container">';
echo 'room type: <span>'.$contest['room'].'</span><br><br>';
echo 'contest closes: <span>'.$contest['time_close'].'</span><br>';
echo 'budget: <span> '.$contest['budget'].'</span><br><br><br>';
echo '<span> '.$contest['about'].'</span><br>';
echo '</div></div></a>';
}	

?>
</div>
</div>
<script>
$('.search_res').hide();

$('.display_box').click(function(){
$(this).parent().find('.search_res').toggle();
});



</script>