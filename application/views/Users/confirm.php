<?php 
	include(APPPATH.'/views/templates/header2.php');
?>


<div class = "form_container">

<br><br><br><br><br><br>
<p class = "sanslight large blue_text">Thanks <?php echo $first_name;?>! </p>
<p class = "serif medium dark_gray_text">Now What Should You<span> Expect?</span>	</p>

<div id = "display">
<div id = "first" class = "third left inline"><br><br>
<img src = <?php echo base_url('assets/Images/model.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text midlarge condensed center">Meet Your Designer: Shelby</p><br>
<p class = "gray_text small sanslight center">Shelby will give you a call within three business days, and she'll help put together a design plan for you, including all of the items that she thinks you'd love.</p>
</div>

<div id ="second" class = "third inline"><br><br>

<img src = <?php echo base_url('assets/Images/throw.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text midlarge condensed center">Select the Items You Love</p><br>
<p class = "gray_text small sanslight center">Via email, you'll receive your personalized design plan. You can decide to buy all of the items or just a few of them.  We ship them to you as quickly as we possibly can.</p>
</div>


<div id = "third" class = "third right inline"><br><br>
<img src = <?php echo base_url('assets/Images/lovehome.jpg');?> height=200><br><br><br>
<p class = "dark_gray_text midlarge condensed center">Love Your Home</p><br>
<p class = "gray_text small sanslight center">You end up with a professionally decorated home, delivered to you.  Keep coming back to see what your personal interior designer has to rev up your house for the season.</p>
</div>
</div>
<br><br><br><BR><BR>
</div>


<!-- Google Code for Completed Form Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 993352783;
var google_conversion_language = "en";
var google_conversion_format = "2";
// var google_conversion_color = "ffffff";
var google_conversion_label = "FkCVCPmWyQQQz7jV2QM";
var google_conversion_value = 0;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:none;">
<img height="1" width="1" style="border-style:none; display: none;" alt="" src="//www.googleadservices.com/pagead/conversion/993352783/?value=0&amp;label=FkCVCPmWyQQQz7jV2QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>





<script>
var left = ($(window).width())/2;
$("#loading-image").css("left",left);
$(".form_continer").hide();
$(".form_container img").load(function(){
	$("#loading").hide();
	$(".form_container").fadeIn();
});

$("#display").hide();
$(window).load(function(){
	$("#display").fadeIn(4000);
	});


var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$("#logo").height(50);
	$(".third img").css("height", 400);
	$(".medium").css("font-size", "2em");

	$(".third").css("width","60%");
	$(".third").css("margin-bottom",40);
	$(".third").css("padding","0");
	$("#first").removeClass("left");
	$("#third").removeClass("right");
		
}


</script>