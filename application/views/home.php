
<script>
$(document).ready(function() {
				$('#slideshow').cycle({
				fx: 'fade',
				pager: '#smallnav', 
				pause:   1, 
				speed: 1800,
				timeout:  3500 
			});			
		});
</script>

<div id = "main_content">

<div id = "slideshow_holder">
	<div id = "slideshow">
			<img src = <?php echo base_url("assets/Images/MyDr.jpg")?> class=bgM>
			<img src = <?php echo base_url("assets/Images/MyLR.jpg")?> class=bgM>
	</div>
	<div>.</div>

	<div class="hero_text margin_left">
		<strong><h1 id="hero_text_1">We Decorate the <span>World.</h1></strong>
		<p>Your room, designed and delivered. </P>
			<a class = "button2 teal" href = <?php echo base_url('index.php/Users/site');?>>Take me away  	&rarr;</a>
		
</div>
</div>
	</div>
	
<div class = "push_down">.</div>
<div class = "desc_container">
<div id = "header_left"><br><br>
<h2 class ="desc_header padding_left">Your very own professional interior decorator.</h2><br>
<p class = "padding_left">Our professional interior designers will create a design plan for you based on your style and budget- whether you’re starting from scratch or you’re just looking for that one special piece. </p></div>

<br><br><br><br><div id= "left"> 
	<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?> height="45">
	<h3 class = "desc_subtitle">Tell Us About Your Style</h3>
	<p>
	Get started by telling us a little about you.  Snap a pic, or tweet us, and we'll get to work.
	</p>
	</div>

<div id = "middle">
	<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?> height="45px">
	<h3 class = "desc_subtitle">Select the Pieces you Love</h3>
	<p>Our professional designers show you how your place could look with the items they have picked.  You tell us to buy it all, or just a few of the items we've chosen. </p>
	</div>

<div id = "right">
<img src= <?php echo base_url('assets/Images/heart.fw.png');?> height="45px">
	<h3 class = "desc_subtitle">Love Your Finished Room</h3>
	<p>
	Show off your new room! Check back in with us for more fun items, as your designer will continue to find you items that you love.
 </p>
	</div>
</div><br><br><br><br><br>
<br>
<br>
<br>




	
			