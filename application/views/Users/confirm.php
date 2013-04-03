<?php 
	include(APPPATH.'/views/templates/header2.php');
?>


<div class = "form_container">
<p class = "title dark_gray_text">Thanks <?php echo $first_name;?>! <br>Now What Should You<span> Expect?</span>:</p>
<div id = "first" class = "third left inline"><br><br>

<img src = <?php echo base_url('assets/Images/model.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text medium text1 center">Meet Your Designer: Valerie</p>
<p class = "gray_text small center">She'll help put together a design plan for you, along with all of the items that she thinks you'd love.</p>
</div>

<div id ="second" class = "third inline"><br><br>

<img src = <?php echo base_url('assets/Images/throw.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text medium text1 center">Select the Items You Love</p>
<p class = "gray_text small center">You can decide to buy all of the items or just a few of them.  We ship them to you as quickly as we possibly can.</p>
</div>


<div id = "third" class = "third right inline"><br><br>
<img src = <?php echo base_url('assets/Images/lovehome.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text medium text1 center">Love Your Home</p>
<p class = "gray_text small center">You end up with a professionally decorated home, delivered to you.  Keep coming back to see what your personal interior designer has to rev up your house for the season.</p>
</div>
</div>
<br></div><br><br>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script>
	
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$(".third img").css("height", 400);
	$(".medium").css("font-size", "2em");

	$(".third").css("width","60%");
	$(".third").css("margin-bottom",40);
	$(".third").css("padding","0");
	$("#first").removeClass("left");
	$("#third").removeClass("right");
		
}
</script>