<?php 
	include(APPPATH.'/views/templates/header.php');
?>


<div id = "main_content">

<div class = "coverimage">
			<img src = <?php echo base_url("assets/Images/MyLR.jpg")?> class=bgM>
	
	<div class="hero_text margin_left">
		<strong><h1 id="hero_text_1">We Decorate the <span>World.</h1></strong>
		<p>Your room, designed and delivered. </P>
		<a class = "button2 teal" href = <?php echo base_url('index.php/Users/site');?>>Take me away  	&rarr;</a>
		
	</div>
</div>
</div>
<div>.</div>	
<div class = "horizontal">
<div class = "row padding_small">
<h2 class ="desc_header dark_gray_text padding_left padding_right">
	Your very own professional interior decorator.</h2><br>
			<p id = "subheader" class = "text padding_left dark_gray_text padding_right midlarge">
			Our professional interior designers 
			will create a design plan for you based 
			on your style and budget- whether you’re 
			starting from scratch or you’re just looking for that one special piece. 
			</p>
</div></div>
<div class = "horizontal">
<div class = "row padding_small center">
<br><br>
<div class= "third top dark_gray_text center inline padding_left"> 
	<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?> height="45">
	<h3 class = "desc_subtitle">Tell Us About Your Style</h3>
	<p>
		Get started by telling us a little about you.  
		Snap a pic, or tweet us, and we'll get to work.
	</p>
	</div>

<div class = "third top dark_gray_text center padding_small_sides inline">
	<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?> height="45px">
	<h3 class = "desc_subtitle">Select the Pieces you Love</h3>
	<p>Our professional designers show you how your place could look with the items they have picked.  You tell us to buy it all, or just a few of the items we've chosen. </p>
	</div>

<div class = "third top dark_gray_text center inline padding_right">
<img src= <?php echo base_url('assets/Images/heart.fw.png');?> height="45px">
	<h3 class = "desc_subtitle">Love Your Finished Room</h3>
	<p>
	Show off your new room! Check back in with us for more fun items, as your designer will continue to find you items that you love.
 </p>
	</div>
</div>
<br>
<br>
<br>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script>
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$(".hero_text").css("top","4em");
	$(".hero_text").css("left",".3em");
	$(".hero_text").css("width","70%");
	$(".hero_text").css("text-align","center");
	$(".hero_text a").css("font-size","2em");
	$("#subheader").css("font-size", "1.8em");	
	$(".third").css("width", "70%");
	$(".third").removeClass("padding_left");
	$(".third").removeClass("padding_right");
	$(".third").addClass("padding_small");
	$("h3").css("font-size","2.5em");
	
}

</script>



	
			