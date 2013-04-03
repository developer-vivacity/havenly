
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

	<div class="hero_text">
		<strong><h1 id="hero_text_1">We Decorate the <span>World.</h1></strong>
		<p>Your room, designed and delivered. </P>
			<a class = "button2 teal" href = <?php echo base_url('index.php/Users/site');?>>Take me away  	&rarr;</a>
		
</div>
</div>
	</div>
	
<div class = "push_down">.</div>
<div class = "desc_container">
<div id = "header_left"><br>
<h2 class ="desc_header">Create Some Magic</h2>
<p>Professional designers decorate your room. All for one (very low) flat fee.</p></div>
<div id= "left"> 
	<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?>>
	<h3 class = "desc_subtitle">Tell Us About Your Style</h3>
	<p>
	Get started by telling us a little about you.  Snap a pic, or tweet us, and we'll get to work.
	</p>
	</div>

<div id = "middle">
	<img src= <?php echo base_url('assets/Images/talkicon.fw.png');?>>
	<h3 class = "desc_subtitle">Select the Pieces you Love</h3>
	<p>Our professional designers show you how your place could look with the items they have picked.  You tell us to buy it all, or just a few of the items we love. </p>
	</div>

<div id = "right">
<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?>>
	<h3 class = "desc_subtitle">Love Your Finished Room</h3>
	<p>
	It's as easy as that.  We deliver it for you, and help you find a way to install them.  Keep coming back to see new items we've found that would make your home even more spectacular.
 </p>
	</div>
</div>





	
			