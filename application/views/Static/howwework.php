<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/pricing');?>>Pricing</a></li>  
			<li><a href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  
      </ul>  
  
</div>  
<div id = "howwework">
<div class = "padding_left padding_small left-align middle inline" id = "logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=100></a></div>
<div class = "right middle">
<a class = "button1 right-align inline condensed margin black_text midlarge" id="pull"> &#9776; </a>  
<div class = "right_align inline middle padding_small"><BR>
<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall condensed"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>ABOUT</li></a>
	<li class = "inline midsmall condensed"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/pricing');?>>PRICING</li></a>
		<li class = "inline midsmall sanslight"><a class = "button4 pink white_text sanslight" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  </div></div>
</ul>
		</div>
<div class = "horizontal trellis center"><br><br><BR>
<p class = "seventy paddingmob sanslight midlargeplus black_text center">
IT TAKES A LOT OF WORK TO GET YOUR ROOM RIGHT.  WE CAN HELP.</p><br><BR><BR></div><BR><BR><BR>
<div id = "process">
<div class = "center">
<table class = "hwwtable horizontal">
<tr class = "horizontal padding_small_top">
<td class = "center middle right-align half"><BR>
<p class = "sanslight blue_text right-align midlarge">
You tell us about you.
</p><br><BR>
<p class = "sanslight seventy midsmall right-align space center">
We hear about what you like, don't like<br> and the things you need on our survey.<br><br>  
Then, one of our decorators gives<br> you a call to hear a little bit more.
</p>
</td>
<td class = "half center"><img src = <?php echo base_url('assets/Images/survey.jpg');?> height= 250>
</td>
</tr>
</table><BR><BR><BR>
<hr class = "seventy style">
</div><div class = "center">
<table class = "hwwtable horizontal center">
<tr class = "horizontal padding_small_top">
<BR><BR>
<td class = "half center"><img src = <?php echo base_url('assets/Images/rendering.jpg');?> height= 300>
</td>
<td class = "left-align middle half"><BR>
<p class = "sanslight blue_text left-align midlarge">
We do the hard work.
</p><br><BR>
<p class = "sanslight midsmall seventy space left-align">
We put together proposals for you,<br> with different directions for your room.<br><br>
You choose the one you like, and we design everything you need for your room.<br><br>
Sure, technology helps us, but there's a real human to talk to, too!

</p>
</td>

</tr>
</table><BR><BR><BR>
<hr class = "seventy style">
</div>
<div class = "center">
<table class = "hwwtable horizontal center">
<tr class = "horizontal padding_small_top">
<td class = "right-align half middle half"><BR><BR>
<p class = "sanslight blue_text right-align midlarge">
And send you everything
</p><br><BR>
<p class = "sanslight midsmall space right-align seventy">
Select the items you love, and we send it all to you with one click, at the lowest price around.<BR><BR> 
(You don't have to search through different sites or enter your address 10 times)

</p>
</td>
<td class = "half center"><BR><BR>
<img src = <?php echo base_url('assets/Images/shopping.jpg');?> height= 220>
</td>
</tr>
</table><BR><BR><BR>
</div>
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