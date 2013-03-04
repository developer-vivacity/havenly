<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<?php if (isset($contest_pics)&&!empty($contest_pics)&&$contest_pics!=0):?>
<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>
<?php endif?>
<div id = "main1">

<script type = "text/javascript">
$("#main1").hide();
</script>

<div id = "users_nav">
<div id = "button_nav">
<a href=<?php echo base_url('index.php/Users/upload');?>><div id = "add_button_left"> 
<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?>><br>Add Inspiration</div></a>
<a href=<?php echo base_url('index.php/Contests/site');?>><div id = "add_button_right"> 
<img src= <?php echo base_url('assets/Images/fileicon.fw.png');?>><br>
Add Design Contest
</div></a>
</div>
</div>



<div class = "errors">

<?php if(isset($error)&&!empty($error))
{echo $error;}
?>
</div>

<div id = "tabs">
	<ul>
	<?php if (isset($contest_pics)&&!empty($contest_pics)&&$contest_pics!=0):?>
	<li><a href="#home_contest_container">Contests</a></li><?php endif?>
	<li><a href = "#home_photo_container">Inspiration Photos</a></li>
	</ul>
		
<div id = "home_contest_container">
<?php if (isset($contest_pics)&&!empty($contest_pics)&&$contest_pics!=0):?>
	
	<?PHP
	foreach($contest_pics as $contest) {
	if (!empty($contest['files'])){
	$name= $contest['contest_name'];
	$picture= $contest['files'][0]['filename'];
	$id = $contest['contest_id'];

	echo '<div class = "user_photos" id = "contest_photos">';
	echo '<a class = "contest_show" href ="'.base_url('index.php/Contests/site/show_contest/'.$id).'">';
	echo '<img src="https://s3.amazonaws.com/easableimages/'.$picture.'" height=230  class="home_user_contest">';
	echo '<div id="title_contest_div"><h1 id = "title_contest">'.$name.'</h1></div>';
	echo '</a>';
	echo '</div>';

	}
	else {

	$id = $contest['contest_id'];
	$name= $contest['contest_name'];
	echo '<div class = "user_photos" id = "contest_photos">';
	echo '<a class = "contest_show" href ="'.base_url('index.php/Contests/site/show_contest/'.$id).'">';
	echo '<img src="'.base_url('assets/Images/linen_pop_up_fw.png').'" height=230 width=230  class="home_user_contest">';
	echo '<div id="title_contest_div"><h1 id = "title_contest">'.$name.'</h1></div>';
	echo '</a>';
	echo '</div>';



	}}
	?>
	</div>
	<?php endif?>

<div id = "home_photo_container">
<?php
if(isset($images)&&$images!=0):?>
	<?php
	foreach ($images as $value) 
	{
	$filename= $value['filename'];
	$src=$value['Orig_src'];

		echo '<div class="user_photos">';
		echo '<a href="" title ="add to design board"><img class = "photo_hidden" src='.base_url('assets/Images/addicon.fw.png').'></a>';
		echo '<a href=# title ="delete"><img class = "photo_hidden2" src='.base_url('assets/Images/delicon.fw.png').'></a>';
		if($src!=10){echo '<a class = "pic_anchor" href='.$src.'>';} else {echo '<a class = "pic_anchor" href="https://s3.amazonaws.com/easableimages/'.$filename.'">';}
		echo '<img src="https://s3.amazonaws.com/easableimages/'.$filename.'" height=200 class="home_user_pics">';
		echo '</a>';
		echo '</div>';
	}
	else : ?>
	
<div class = "upload_form_container">
<p>Let's get started: Upload some pictures that inspire you.</p>

<?php 
	if (isset($error))
		{echo '<div class = "error">';
		echo $error;
		echo '</div>';}
	else {echo '';}		
?>



<div class = "form">

<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>

<?php

	$this->load->helper('form');
	echo '<div class = "photo_form">';
	echo form_open_multipart('users/upload/upload_photo');
	echo '<div>';
	echo '<input class = "input_photo" value = "Browse for file" id = "photo_cover" type = "text" name = "cover">';?>
		<a class = "flat" id = "browse" onclick = '$("#file1").click();'>Browse</a>
	<?php
	echo form_upload("file",'Browse for a file','id = "file13"', 'class="file_hidden"');
	echo '</div>';
	echo '<br>';?>
	<input type="text" name="desc" value="Description" class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br><br>
	<?php
	echo form_submit("submit", "Submit", 'class="flat2"');
	echo form_close();
	echo '</div>';
	

	echo '<div class = "photo_form">';?>
	<?php
	$attr = array('id'=>'upload_form');
	echo form_open('users/upload/photo_link',$attr);?>
	<input type="text" name="weblink" value="http://" id="photo_link"  class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br><br>
	<input type="text" name="desc" value="Description" class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br>
	<br>
	<?php
	echo form_submit("submit1", 'Submit', 'class="flat2"', 'id="submit1"');
	echo form_close();
	echo '</div>';
	?>

</div>

</div>
<?php endif?>
</div>
<div id = "push"></div>

<?php 
include(APPPATH.'/views/templates/footer.php');
?>

</div>

<script type = "text/javascript">
    

$("div#home_contest_container img").load(function(){
	$("#main1").show();
	$("#loading").hide();
	});


$(document).ready(function(){
	$("#tabs").tabs();
	
	$(".photo_hidden").hide();
	$(".photo_hidden2").hide();
	
	$(".user_photos").hover(function(){
		$(this).find(".photo_hidden").show();
		$(this).find(".photo_hidden2").show();
		});
	
	$(".user_photos").mouseleave(function(){
		$(this).find(".photo_hidden").hide();
		$(this).find(".photo_hidden2").hide();
		});
	
	$('.photo_hidden2').bind('click', function() {
		var values = JSON.stringify($(this).parent().parent().find(".home_user_pics").attr('src'));
		// alert(values);
		if(confirm('Delete this photo from your collection?')){
			$.ajax({        
					type: 'POST',
					url: '/test/design/index.php/users/upload/delete_photo',
					data: {images:values},
					success: function(data){
						location.reload();
						}
					 });
					
		}	
		
		
		});
		
		
	
});
	
	
$(".pic_anchor").fancybox({
		'height'		: '80%',
		'width'			: '50%',
		'autoScale'     : false,
		'transitionIn'  : 'none',
		'transitionOut' : 'none',
		'type'          : 'iframe'
	});
	
	
$(".contest_show").fancybox({
		'height'		: '90%',
		'width'			: '90%',
		'autoScale'     : false,
		'transitionIn'  : 'none',
		'transitionOut' : 'none',
		'type'          : 'iframe'
	});
	
		</script>
		
	