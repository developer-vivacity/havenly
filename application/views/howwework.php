<?php 
	include(APPPATH.'/views/templates/header4.php');
?>
<div class = "center auto">
<div  class = "seventy auto center">

<div id = "tabs">
	<ul>
	<li class = "text1"><a class = "text1 small" href="#video">How We Work</a></li>
	<li class = "text1"><a class = "text1 small" href = "#Whyus">Why Use Havenly?</a></li>
	<li class = "text1"><a class = "text1 small" href = "#returns">Returns</a></li>
	</ul>


<div id = "video">


<iframe width="560" height="315" src="http://www.youtube.com/embed/UxMgM_TCbPE" frameborder="0" allowfullscreen></iframe>
<br><br><br>
<div class = "seventy center">
<div class = "third horizontal auto paddng_small center inline">
<p class = "center quicksand medium teal_text">1. Fill Out Your Style Profile<br></p><br>
<p class = "center small text1">We use this to get you the exact right designer, and get to know you a little better. That way there's no need to hunt around finding the right pieces, we'll do it for you. 
</p>
</div><br><br><br><br>
<div class = "third horizontal auto paddng_small center inline">
<p class = "center quicksand medium teal_text">2. Work With Your Designer<br> </p><br>
<p class = "center small text1">Your decorator calls you to discuss your style and needs, and creates a design plan for you.  We focus on pulling your home together, working around the furniture you already have, with decor and furnishings that fit your look.</p>
</div><br><br><br><br>
<div class = "third horizontal auto paddng_small center inline">
<p class = "center quicksand medium teal_text">3. Get the Goods<br></p><br>
<p class = "center small text1">We ship everything you like to you.  Smaller items come within a week, and larger items are shipped separately, right to your door.  All you have to do is love your room.</p>
</div>
</div>
</div>

<div id = "Whyus">
<div class = "horizontal middle block ">
<div class = "forty inline left top">
<img class = "inline middle" src = <?php echo base_url('assets/Images/telephone.fw.png');?> height=30>
<p class = "large dark_gray_text top inline"> Help Is Here.</p><br><br>
<p class = "medium dark_gray_text text ">
Maybe you are a total decor novice, and have no idea where to start.  Maybe you're just a busy gal who needs someone to do it for her.  Or maybe you love doing it yourself, but need some great ideas.
<br><br>Our designers are here to help.  We think they've got real style, and we hope that you think so too.<br><br>

It's simple:  We match you with a designer based on your style profile, they create a design plan for you, and we ship you everything that you need for a beautiful room.  If you don't like something (or anything) you don't have to buy it!  We're just trying to make decorating easier.

</p>

</div>
<div class = "forty inline top">
<img class = "inline middle" src = <?php echo base_url('assets/Images/talkicon.fw.png');?> height= 30>
<p class = "large top dark_gray_text inline">Our Products.</p><br><br>
<p class = "medium dark_gray_text text">
Our designers not only pick out furniture, if you need it, but home decor items to complete your room, which are often overlooked.<br><br>
We source furnishings based on what you (and our designers) say you want.  Our designers search far and wide to get a stylish, but affordable, selection to you.  We know you're picky, so are we.
<br><br> By being selective, but also being price-sensitive, we can get items that are both one of a kind, but also less expensive than what you'd normally find on your own.  Not to mention designer discounts that we receive.  We believe in decorating on a budget, after all.

</p><br><br><br>
</div>
</div></div>

<div id = "returns">
<div class = "horizontal block">



<img class = "inline padding_small" src = <?php echo base_url('assets/Images/samplechair.jpg');?> height=300/>

<div class = "padding_left half inline">
<img class = "inline" src = <?php echo base_url('assets/Images/lock.fw.png');?> height=30>
<p class = "inline top title dark_gray_text">
Need to return?
</p><br><br>
<p class = "text medium dark_gray_text left_align">
We really hope you don't, but don't worry, we can help you figure it out.  Nearly everything you buy from us will have a return policy - which we will clearly state on your consolidated confirmation email.
<br><br><br>Right now, we are ordering on your behalf from suppliers.  Eventually, all of our items will come with prepaid shipping labels, with the exception of furniture delivered in-home.
<br><br><br>
We know furniture is hard to buy online, which is why we try and stick with the basics for large items, like couches.  
In the event that you dislike a furniture item, we'll help you work with the vendor for returns.</p>

</div>
<br><br><br><br><br><br>
</div>
</div>
<br><br><br><br><br><br>
</div>
</div>
<br><br><br>
</div>


<script>

$("#tabs").tabs();
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	$(".padding").css("padding","2em");
	$(".forty").css("width","70%");
	$(".forty").addClass("padding_left");
	$(".forty").addClass("padding");
	$(".large").css("font-size","4em");
	$(".medium").css("font-size","2.5em");
	$(".half").css("width","80%");
	}

</script>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>