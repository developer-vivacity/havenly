<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
    <ul>  
        <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
        <li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How we work</a></li>  
        	<li><a href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  
      </ul>  
  
</div>  
<div>
<div class = "padding_left left-align middle inline" id = "logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=100></a></div>
<div class = "right middle">
<a class = "button1 right-align inline condensed margin black_text midlarge" id="pull"> &#9776; </a>  
<div class = "right_align inline middle padding_small"><BR>
<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall condensed"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>ABOUT</li></a>
	<li class = "inline midsmall condensed"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>HOW WE WORK</li></a>
			<li class = "inline midsmall sanslight"><a class = "button4 pink white_text sanslight" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  </div></div>
</ul>
		</div>
		
<div id = "tabs2">
<ul>
    <li><a href="#designer">DESIGN FEE</a></li>
    <li><a href="#products">PRODUCTS</a></li>
  </ul>
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
<div id = "products">
<div class = "bgcontainer center"><BR><BR>
<div class = "seventy border white"><BR><BR>
<p class = "pink_text sanslight midlargeplus">OUR PRODUCTS</p><br>
<p class = "medium sanslight">We work with well known retailers and our own suppliers<br> to find what you're looking for.</p><BR>
<BR><BR>
<img src = <?php echo base_url('assets/Images/rendering2.jpg');?> height= 200><BR><BR>
<BR><BR>
<p class = "sanslight midlargeplus">Here's how expensive things usually are</p><br>
<p class = "sanslight dark_gray_text midsmall">Obviously, it all depends on your taste, budget, and how much you need</p>
<BR><BR>
<table class = "half center inline top">
<tr><td width = "50%">
<img src = <?php echo base_url('assets/Images/sofa.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$1,200-$5,000</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/chair.png');?> height="70px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$1,000</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/table.png');?> height="60px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$3,000</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/rug.png');?> height="60px"><BR><BR></td>
<td><p class = "sanslight medium">$150-$1,000</p><BR><BR></td></tr>
</table>

<table class = "half center inline top">
<tr><td width = "50%">
<img src = <?php echo base_url('assets/Images/bed.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$350-$2,000</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/lamp.png');?> height="70px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$400</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/pillow.png');?> height="60px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$100</p><BR><BR></td></tr>
<tr><td><img src = <?php echo base_url('assets/Images/art.png');?> height="60px"><BR><BR></td>
<td><p class = "sanslight medium">$100-$3000</p><BR><BR></td></tr>

</table>
</div>
<Br><BR><BR><BR></div></div>
</div>
<script>
	
$(document).ready(function(){

$("#tabs2").tabs();
 $("#pull").on('click', function(){
	$(".navmenu ul").slideToggle();
	
 
    });

	
	});
</script>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>