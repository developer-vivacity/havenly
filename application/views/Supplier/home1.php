
<?php 
	include(APPPATH.'/views/templates/header2.php');
?>

<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>

<br>
<div id='cssmenu'>
<ul>
   <li class='active'><a href=<?php echo base_url('index.php/Supplier/site');?>><span>Home</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url('index.php/Supplier/site/profile');?>'><span>Profile</span></a></li>
   <li class='has-sub'><a href='<?php echo base_url('index.php/Supplier/site/contests');?>'><span>Contests</span></a></li>
   <li><a href='#'><span>Responses</span></a></li>
   <li class='last'><a href='#'><span>Messages</span></a></li>
</ul>
</div>
<div id = 'display_area'>
<div class = 'desc_header'>Open Contests</div><hr class = "style">
<div class = "search_bar">
<div class = 'display_box'>Design Style<div class = 'drop_arrow'>v</div></div>
<div class='search_res'>
<input type="checkbox" name="style" id="style" value="modern" checked = 'checked'>Modern<br>
<input type="checkbox" name="style" id="style" value="traditional" checked = 'checked' >Traditional<br>
<input type="checkbox" name="style" id="style" value="eclectic" checked = 'checked' >Eclectic<br>
</div></div>

<div class = "search_bar">
<div class = 'display_box'>Room Type<div class = 'drop_arrow'>v</div></div>
<div class='search_res'>
<input type="checkbox" name="room" id="room" value="Living Room" checked = 'checked'>Living Room<br>
<input type="checkbox" name="room" id="room" value="Bedroom" checked = 'checked'>Bedroom<br>
<input type="checkbox" name="room" id="room" value="Study" checked = 'checked'>Study<br>
<input type="checkbox" name="room" id="room" value="Basement" checked = 'checked'>Basement<br>
<input type="checkbox" name="room" id="room" value="Kitchen" checked = 'checked'>Kitchen<br>
<input type="checkbox" name="room" id="room" value="Bathroom" checked = 'checked'>Bathroom<br>
</div></div>
<br>
<?php
foreach ($contests as $contest){
$current = $contest['current'];
$inspiration=$contest['inspiration'];
$style = $contest['style'];

echo "<div class = 'contest_show_container' data-object ='{$style} {$contest['room']}'>";
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
echo $pagination;
?>

</div>
</div>
<script>
$('.contest_pic_container img').load(function(){
	$("#loading").hide();
	});

$('.search_res').hide();

$('.search_bar').mouseenter(function(){
$(this).find('.search_res').show();
});

$('.search_bar').mouseleave(function(){
$(this).find('.search_res').hide();
});


$('.search_bar :checkbox').change(function() {
    $('.contest_show_container').show();
	$(':checkbox:not(:checked)').each(function(){
		 $('[data-object*="'+$(this).val()+'"]').hide();
	 });
	
	});
	
	
</script>