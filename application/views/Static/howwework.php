<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li>  
        <li><a href="#">1-888-978-3152</a></li>  
      </ul>  
  
</div>  
<div id = "howwework">
<div class = "padding_left padding_small left-align middle inline" id = "logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=100></a></div>
<div class = "right middle">
<a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
<div class = "right_align inline middle padding_small"><BR>
<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall condensed"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>ABOUT</li></a>
				<li class = "inline midsmall condensed"> <a  class = "white_text" href = "#">1-888-978-3152</li></a>
		<li class = "inline midsmall condensed"><a class = "button4 condensed" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  </div></div>
</ul>
		</div>
<div class = "horizontal light_gray"><br><br><BR>
<p class = "padding_left paddingmob sanslight midlargeplus dark_gray_text left-align">
How it works</p><br><BR><BR></div><BR><BR><BR>
<div class = "center">
<table class = "hwwtable horizontal center dark_gray_text">
<tr class = "horizontal padding_small_top">
<td class = "center middle half"><BR><BR>
<p class = "sanslight center midlarge">
You tell us about you
</p><br><BR>
<p class = "serif small space center">
Tell us about your room and your style<br><br>
Take a picture of your room<br><BR>
Your personal decorator calls you in three business days to chat further<br><br>

</p>
</td>
<td class = "half center"><img src = <?php echo base_url('assets/Images/survey.jpg');?> height= 250>
</td>
</tr>
</table><BR><BR><BR>
<hr class = "seventy style">
</div><div class = "center">
<table class = "hwwtable horizontal center dark_gray_text">
<tr class = "horizontal padding_small_top">
<BR><BR>
<td class = "half center"><img src = <?php echo base_url('assets/Images/rendering.jpg');?> height= 300>
</td>
<td class = "center middle half"><BR><Br><BR>
<p class = "sanslight center midlarge">
..and then we decorate
</p><br><BR>
<p class = "serif small space center">
Our team sends you some ideas, and you tell us which ones you like<br><br>
Using your feedback, we suggest paint colors, furnishings and furniture<br><br>
We also show you what your room could look like with your new gear<br><br>

</p>
</td>

</tr>
</table><BR><BR><BR>
<hr class = "seventy style">
</div>
<div class = "center">
<table class = "hwwtable horizontal center dark_gray_text">
<tr class = "horizontal padding_small_top">
<td class = "center half middle half"><BR><BR>
<p class = "sanslight center midlarge">
..and send everything to you.
</p><br><BR>
<p class = "serif small space center">
Log back in and select the items you love<br><br>
We send it all to you with one click<br><BR>
(No searching through different sites or entering your address 10 times)<br><br>

</p>
</td>
<td class = "half center"><BR><BR>
<img src = <?php echo base_url('assets/Images/shopping.jpg');?> height= 220>
</td>
</tr>
</table><BR><BR><BR>
</div>


<div class = "horizontal center padding_small_top light_gray"><BR><BR>
<p class = "seventy large center pink_text condensed">
Try us out  <a class = "pink_text cursive" id= "startbutton2" href="#overlay"> here &rarr;</a></p><br>
<p class = "serif small pink_text">
(we're really nice, we promise.)</p><BR><BR>
</div>


<div id = "overlay">
<div class = "boxoverlay"><div class = "paddingmob padding_small">
<a class = "close sanslight small padding_small light_gray_text">X Close</a>
<p class = "padding_small_top midlarge serif">You like us!</p>
<hr class = "seventy style">
<p class = "condensed medium padding_small">Havenly is currently open to people with an invitation.  To request an invite, submit your email address and zip code, and we'll hit you back.<br><br>
</p>
<form name="signup" method="post" action=<?php echo base_url('index.php/Users/site/requestinvite');?>>
<div class = "horizontal">
<label class = "half sanslight medium middle inline" for="Email">Email Address:</label><br><br>
<input class = "half middle inline" type="text" name="email" value="" id="email" maxlength="30"/>
</div><br><br>
<div class = "horizontal">
<label class = "half sanslight medium middle inline" for="Zipcode">Zipcode:</label><br><br>
<input class = "half middle inline" type="text" name="zipcode" value="" id="zipcode" maxlength="30" /></div><br><br>
<a class = "button3 pink white_text serif" id = "requestinvite2">Request</a><br><br>
</form>
</div></div></div>

<script>
	
$(document).ready(function(){
 $("#pull").on('click', function(){
	$(".navmenu ul").slideToggle();
	
 
    });
	
$("#startbutton2").click(function(){
$("#overlay").fadeIn(1000);
});

$("#overlay .close").on("click", function(){
$("#overlay").fadeOut(1000);
});
$('#overlay').click(function(e) {
    if (e.target.id === "overlay"){
        $('#overlay').fadeOut();
    }
});

$("#requestinvite2").click(function(){
var email = $("#email").val();
var zipcode = $("#zipcode").val();
$.ajax({
    type: "POST",
    url: "requestinvite",
    data: {email: email, zipcode: zipcode},
    success: function(data) {
		if(data=='nope')
			{$(".boxoverlay").prepend('<p class = "medium error">Oops, we need more information</p>');}
		else{
        $(".boxoverlay").html(data);
		$("#overlay .close").on("click", function(){
			$("#overlay").fadeOut(1000);
			});}
    }
	});
});

	
	});
</script>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>