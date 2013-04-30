<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<a id = "hidden_link" href = "#welcome"></a>
<div id = "main_content">

<div class = "coverimage">
			<img src = <?php echo base_url("assets/Images/MyLR.jpg")?> class=bgM>
	
	<div class="hero_text margin_left">
		<strong><h1 id="hero_text_1">We Decorate the <span>World.</h1></strong>
		<p>Your room, designed and delivered. </P>
		<a class = "button2 teal" href = <?php echo base_url('index.php/Users/site');?>>Get Started  	&rarr;</a>
		
	</div>
	
</div>
</div>
<div>.</div>	
<div class = "horizontal">
<div class = "row padding_small">
<h2 class ="desc_header gray_text padding_left padding_right"><br>
	Want a beautiful room, easily?</h2><br>
			<p id = "subheader" class = "text padding_left gray_text padding_right midlarge">
			Let our decorators help you pull your room together.  Whether you’re 
			starting from scratch or you <span>just need a little flair</span>.  
			We work around the room you already have to suggest items that will complete your style.
			</p>
</div></div><br>
<div class = "horizontal">
<div class = "row center">
<div class= "third top gray_text center inline padding_left"> 
	<img src= <?php echo base_url('assets/Images/photoicon2.fw.png');?> height="45"><br>
	<h3 class = "quicksand midlarge gray_text">Tell Us About You</h3><br>
	<p class = "text1 small gray_text">
		Get started by telling us a little about you and your room.  
		<span>Snap a pic</span>, fill out the quick form, and we'll get to work.  We'll match you with a designer that shares your style.
	</p>
	</div>

<div class = "third top gray_text center padding_small_sides inline">
	<img src= <?php echo base_url('assets/Images/houseicon.fw.png');?> height="45px"><br>
	<h3 class = "quicksand midlarge gray_text">Select What You Love</h3><br>
	<p class = "text1 small gray_text">Our professional designers decorate your place, and show you how your room would look with the <span>items they have picked</span>.  You tell us what you'd like to buy, and we send it to you as quickly as we can. </p>
	</div>

<div class = "third top gray_text center inline padding_right">
<img src= <?php echo base_url('assets/Images/heart.fw.png');?> height="45px">
	<h3 class ="quicksand midlarge gray_text">Enjoy Your Room</h3><br>
	<p class = "text1 small gray_text">
	Show off your new room! Check back in with us for more fun items, your designer will continue to find you items that you love.  You have <span>no commitment</span> to buy anything you don't love!
 </p>
 
</div>
  <br><br><br><br><br>	<p class = "text1 midlarge gray_text"><span> No minimums or commitments.</span>  Give us a try! (it's free)</p>

</div>
<br>
<br>
<br>
<br><br>

			<div id="welcome" class="center" style="display:none";>
				<div class = "gray padding center middle">
					<p class="title large teal_text"> Welcome! </p><br>
					<p class="medium white_text text"> We're excited to have you visit the pre-beta version of Havenly.<br><br>
					We know we're a work in progress, but we hope you bear with us as we work out our kinks.
				In exchange for your
					patience, we're offering our design services completely free.  <br><br>
					We'd love to hear about your experience, please email us at hello@havenly.com<br><br>
					
					-Lee & Emily
					</p>
					
				</div>
			</div>



<?php 
	include(APPPATH.'/views/templates/footer.php');
?>


		
				
<script type = "text/javascript">
 $(document).ready(function() {
    	$("#hidden_link").fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			width: '100px',
			fitToView: false,
			maxWidth: '50%',
			afterLoad   : function() {
               this.content = this.content.html();
			
			  }
	});
	$("#hidden_link").trigger('click');
	
	   	
	
    });
	
	
</script>	


<script>




var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$(".hero_text").css("top","4em");
	$(".hero_text").css("left",".3em");
	$(".hero_text").css("width","70%");
	$(".hero_text").css("text-align","center");
	$(".hero_text a").css("font-size","2.2em");
	$("#subheader").css("font-size", "2em");	
	$(".third").css("width", "70%");
	$(".third").removeClass("padding_left");
	$(".third").removeClass("padding_right");
	$(".third").addClass("padding_small");
	$("h3").css("font-size","3em");
	$(".midlarge").css("font-size", "3em");
	$(".small").css("font-size", "1.5em");
	$(".gray_text").removeClass("gray_text");
	
}

</script>



	
			