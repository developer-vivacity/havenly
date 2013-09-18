<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
    <ul>  
			<li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
            <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li>  
			<li><a href=<?php echo base_url('index.php/Users/site/products');?>>Goods</a></li>  
        	<li><a href=<?php echo base_url('index.php/Users/site/login');?>>Log In</a></li>  
      </ul>  
  
</div>  

<div class = "trellis">
<div class = "padding_left padding_small left-align middle inline logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=100></a></div>
<div class = "right middle">
<a class = "right-align inline button1 condensed margin black_text midlarge" id="pull2"> &#9776; </a>  
<div class = "right_align inline middle padding_small"><BR>
<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>about</li></a>
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>how</li></a>
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/products');?>>goods</li></a>
	<li class = "inline midsmall sanslight"><a class = "button4 pink white_text sanslight" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  </div>
	</div>
</ul>
		</div>
		

<div id = "designer">
<div class = "trellis center"><BR><BR>
<p class = "paddingmob sanslight midlargeplus blue_text center">
We're cheap and easy. </p><br>
<p class = "paddingmob sanslight medium black_text center">
You only pay after you see your design proposal "themeboard", so try us for free.
<BR><BR>


<div class = "third inline top border white center" style="min-height: 480px;"><BR><BR>
<p class = "condensed midlargeplus black_text">Cotton</p><br>
<p class = "condensed small black_text">Have most of your stuff?  Just need some flair?</p><BR>
<img src = "<?php echo base_url().'assets/Images/cotton.png';?>" height="150px"><br><BR>
 <p class = "sans-serif pink_text inline midsmall">Selection of accessories & furnishings</p><p class = "sanslight inline midsmall black_text">to fit in with your current room</p>
<br><BR> 
<p class = "sans-serif pink_text inline midsmall">Unlimited</p><p class = "sanslight inline midsmall black_text">&nbsp;stylish support</p>
<BR><BR>
<p class="sans-serif pink_text inline midsmall">$10</p><p class = "sanslight inline midsmall black_text">&nbsp;credit towards eligible furnishings</p>
<br><br><br>
</div>


<div class = "third inline top border white center" style="min-height: 480px;"><BR><BR>
<p class = "condensed midlargeplus black_text">Cashmere</p><br>
<p class = "condensed small black_text">Need your full room done? Our more comprehensive design plan.</p><BR>
<img src = "<?php echo base_url().'assets/Images/cashmere.png';?>" height="150px"><br><BR>
 <p class = "sans-serif pink_text inline midsmall">Whole room</p><p class = "sanslight inline midsmall black_text">&nbsp;design plan</p>
<br><BR>
<p class = "sans-serif pink_text inline midsmall">Custom</p><p class = "sanslight inline midsmall black_text">&nbsp;rendering (and one full revision)</p>
<BR><BR>
<p class = "sans-serif pink_text inline midsmall">Unlimited</p><p class = "sanslight inline midsmall black_text">&nbsp;stylish support</p>
<BR><BR>
<p class="sans-serif pink_text inline midsmall">$40</p><p class = "sanslight inline midsmall black_text">&nbsp;credit towards eligible furnishings</p>
<br>
</div>

<BR><BR></div></div>
<script>
	
$(document).ready(function(){


 $("#pull2").on('click', function(){
	$(".navmenu ul").slideToggle();
	
 
    });

	
	});
</script>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>