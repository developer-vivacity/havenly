
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
			<img src = <?php echo base_url("assets/Images/LR_1.jpg")?> class=bgM>
			<img src = <?php echo base_url("assets/Images/LR_2.jpg")?> class=bgM>
	</div>
	<div>.</div>

	<div class="hero_text">
		<strong><h1 id="hero_text_1">We Design the <span>World.</h1></strong>
		<p>Interior decorating, for the rest of us. </P>
		<p class = "small">Search design inspiration:</p>
		<?php echo form_open('');
		echo form_input("search", "Search");
		?>
		
</div>
</div>
	</div>
	
<div class = "push_down">.</div>
<div class = "desc_container">
<div id = "header_left"><br>
<h2 class ="desc_header">Get Your Design</h2>
<p>We build you a custom design plan from professional decorators and design enthusiasts. <br><br> All for one flat fee.</p></div>
<br>
<div id= "left"> 
	<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?>>
	<h3 class = "desc_subtitle">Tell Us About Your Style</h3>
	<p>
	Get started by saving some insipration photos.
	Complete a short design brief that outlines 
	what you’re looking for in your new space. 
	Choose which design package best suits your needs.  
	</p>
	</div>

<div id = "middle">
	<img src= <?php echo base_url('assets/Images/talkicon.fw.png');?>>
	<h3 class = "desc_subtitle">Work With Your Favorite Designer</h3>
	<p>Designers submit concepts to make your room magical. 
	Compare and choose a winner to help design a room that you’re sure to love. </p>
	</div>

<div id = "right">
<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?>>
	<h3 class = "desc_subtitle">Love Your Finished Room</h3>
	<p>
	Choose your favorite design concept and complete your room.
	You will receive a custom design box, 
	including drawings, paint swatches, floor plans, and an 
	itemized list of what you'll need, all for a transparent, flat per room fee. 
 </p>
	</div>
</div>





	
			