<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<br>
<div class = "cover">
<img src = <?php echo base_url('assets/Images/havenlydecor.jpg');?> width=100%>
<div class = "absolute padding">

<p class = "title">
	Ever wanted the help of a professional?
</p><br>
<p class = "text teal_text right"> 
.....Now you've got one.</p>
</div>
<div class = "horizontal pink middle block"><br><br>
<p class = "large white_text padding_left"> We help you get your home perfect.</p><br><br>
</div>
<div class = "light_gray horizontal middle block ">.<br><br><br><br><br>
<div class = "forty padding_left inline top">
<img class = "inline" src = <?php echo base_url('assets/Images/telephone.fw.png');?> height=40>
<p class = "large dark_gray_text top inline"> Help Is On the Way.</p><br><br>
<p class = "medium dark_gray_text text2 ">
Maybe you are a total decor novice, and have no idea where to start.  Maybe you're just a busy gal who needs someone to do it for her.  Or maybe you love doing it yourself, but need some great ideas.
<br><br>Our designers are here to help.  We think they've got real style, and we hope that you think so too.</p>

</div>
<div class = "forty inline top">
<img src = <?php echo base_url('assets/Images/talkicon.fw.png');?> height= 40>
<p class = "large top dark_gray_text inline">Our Offerings</p><br><br>
<p class = "medium dark_gray_text text2">
We source based on what you (and our designers) say you want.  Our designers search far and wide to get a stylish, but affordable, selection to you.  We know you're picky, so are we.
<br><br> By being selective, but also being price-sensitive, we can get items that are both one of a kind, but also less expensive than what you'd normally find</p>
</div><br><br><br><br><br><br><br><br><br>
</div>
<div class = "horizontal block">
<br><br><br><br><br>
<div class = "inline">
<img class = "padding_left padding_small" src = <?php echo base_url('assets/Images/samplechair.jpg');?> height=300>

<div class = "half padding_left inline top">
<img class = "inline" src = <?php echo base_url('assets/Images/lock.fw.png');?> height=40>
<p class = "inline top title dark_gray_text">
What if I hate it?
</p><br><br>
<p class = "text2 medium dark_gray_text left_align">
We really hope you don't, but if it comes over and you want to send it back, you have 10 days to do so, free!  
<br><br><br>All of our items come with prepaid shipping labels, with the exception of furniture delivered in-home.
<br><br><br>
We know furniture is hard to buy online, which is why we try and stick with the basics for large items, like couches.  
In the event that you dislike a furniture item, give us a call - we'll pick it up!</p>

</div>
<br><br><br><br><br><br>
</div>
</div>

<div class = "light_teal horizontal block">
<br><br><br><br><br>
<div class = "inline">
<div class = "padding_left padding_right inline top">
<img src = <?php echo base_url('assets/Images/heart.fw.png');?> height=40>
<p class = "inline top title dark_gray_text">
No really, why should I use Havenly?
</p><br><br>
<p class = "text2 medium dark_gray_text left_align">
Do you not have time to visit multiple stores and take months to get your room done? <br><br>
Are you sick of watching HGTV and trying to figure out how to replicate their DIY crafts?<br><br>
Do you just feel like your room needs a little something, but you're not sure what?<br><br>
<br>
<p class = "midlarge dark_gray_text">We're good at this. Let us help.</p>
</div>
<br><br><br><br><br><br>
</div>
</div>
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>



<script>
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$(".padding").css("padding","2em");
	$(".absolute").css("top","4em");
	$(".forty").css("width","70%");
	$(".forty").addClass("padding_left");
	$(".forty").addClass("padding");
	$(".large").css("font-size","4em");
	$(".medium").css("font-size","2.5em");
	
}

</script>