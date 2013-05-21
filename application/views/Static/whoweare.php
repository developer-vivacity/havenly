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
<div id = "abouttheteam">
<div class = "padding_left padding_small left-align inline" id = "logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a></div>


<div class = "right">

<a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
<div class = "right_align inline top padding_small"><ul class = "menu_bar dark_gray_text" id="menu_bar">
		<li class = "inline white_text medium condensed"> <a  class = "white_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>HOW </li></a>/
			
		<li class = "dark_gray_text medium condensed inline"> 1-888-978-3152</li>
		<li class = "inline white_text  medium condensed"> <a  class = "button2 padding gray white_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>Login </li></a>
		</ul></div></div>
	
<div id = "abouthero" class = "horizontal padding_small_top center">

<p class = "cursive middle white_text large">
We've been there.  </p>
<p class = "half condensed white_text middle medium">We were in the same shoes, not so long ago.  We know you're busy, we know you don't want to pay too much. Because we don't either.</p><br><br>
<hr class = "style2 half"><br>
<ul class = "menu_bar white_text">
<a href = "#team"><li class = "inline white_text midsmall condensed">TEAM</li></a>
<a href = "#careers"><li class = "inline white_text midsmall condensed">CAREERS</li></a>
<a href = "#contact"><li class = "inline white_text midsmall condensed">CONTACT</li></a>
</ul><br>
<hr class = "style half">
</div></div>
<div class = "center" id = "team">

<div class = "padding white seventy left-align">
<div>
<p class = "large blue_text serif">
We love decorating.
</p><br>
<p class = "dark_gray_text medium sanslight">
Havenly was started by two sisters, neither of whom could satisfactorily sort through all the clutter to figure out how to get the best items for their rooms.  Interior decorators seemed way out of reach, and the prospect of doing it on their own seemed too time consuming for their busy lives.
<br><br>
The philosophy of Havenly is that everyone should be able to afford and access a beautifully decorated room.  And the team is working to fulfill that vision.</p>
</p>
</div><br><br><br>
<div class = "center">
<div class = "forty center inline">
<img class = "translucent" src = <?php echo base_url('assets/Images/Lee.jpg');?> height=150><br><br>
<p class = "condensed midlarge ">
Lee Mayer
</p><br>
<p class = "sanslight small dark_gray_text">
Lee is a Denver resident who misses the East Coast. 
She was formerly a VP at Bankrate, a consultant at Bain, and worked in strategy and corporate development at Canon, Inc. 
<br><br>Lee has an MBA from Harvard Business School and a B.S. from Columbia University.<br><br>
She loves cows and has most recenly learned to ski.  Ask her about her collection of speeding tickets.</p>
</div>
<div class = "forty center inline top">
<img class = "translucent" src = <?php echo base_url('assets/Images/Emily.jpg');?> height=150><br><br>
<p class = "condensed midlarge">
Emily Motayed
</p>
<br>
<p class = "sanslight small dark_gray_text">
Emily is a DC gal at heart, but is currenly a nomad traveling between Denver, Chicago and NYC.
She was formerly in marketing at American Express, and a consultant for Huron Consulting.
<br><br>Emily has a B.A. from Vanderbilt University.<br><br><br>
She hates sweating too much, and loves to pocket dial her parents at 3am.</p>
</div></div>
<br><br><br><br></div></div>

<div id = "careers" class = "blue center padding">
<div class = "seventy center">
<p class = "serif large white_text ">
	Want to Join Us?
	</p><br>
	<p class = "sanslight white_text midlarge">
	 Havenly is always looking for top tier talent in decorating, web design, development and operations.</p><br><br>
	<p class = "sanslight white_text midlarge">
	If that's you, reach out to lee at havenly dot com.
	</p></div></div>
	
	

<div id = "contact" class = "center padding">
<div class = "seventy center left-align"><br><br><br><br>
<hr>
<div class = "centerline midlarge"><span class = "white large serif dark_gray_text">
	Let's Talk.</span></div>
	<br><br><br>
	<p class = "sanslight blue_text midlarge">
	 speak: 1-888-978-3152<br>
	 write: hello@havenly.com<br>
	 follow: @thehavenly<br><br>
	 like: www.facebook.com/thehavenly<br>
	 pin: www.pinterest.com/thehavenly
	 </p><br><br>
	<br><br><br><br><br>
	</p></div></div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>

<script>
function heroheight(){
var viewportHeight = $(window).height();
$("#abouttheteam").height(viewportHeight-20);
$("#abouthero").show().animate({top:(viewportHeight/2-100)}, {duration: 2200, easing: 'easeInOutBack'});
}

$(document).ready(function(){
var viewportHeight = $(window).height();
var isMobile = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/);
if (isMobile)
{
	
	$("hr").hide();
	}
else{

heroheight();
$(window).bind('resize', heroheight);}

 $("#pull").on('click', function(){
	$(".navmenu ul").slideToggle();
	
 
    }); 

});

</script>
