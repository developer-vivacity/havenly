<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<div class="navmenu">  
     <ul>  
		  <li><a href=<?php echo base_url('index.php/Users/site/whoweare');?>>About</a></li>  
		<li><a href=<?php echo base_url('index.php/Users/site/howwework');?>>How We Work</a></li>  
            <li><a href=<?php echo base_url('index.php/Users/site/pricing');?>>Pricing</a></li>  
			<li><a href=<?php echo base_url('index.php/Users/site/login');?>>Log In</a></li>  
      </ul>  
  
</div>  
<div class = "">
<div class = "padding_left padding_small left-align middle inline logo"><a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=100></a></div>
<div class = "right middle">
<a class = "right-align inline button1 condensed margin black_text midlarge" id="pull2"> &#9776; </a>  
<div class = "right_align inline middle padding_small"><BR>
<ul class = "menu_bar midsmall white_text">
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/whoweare');?>>about</li></a>
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/howwework');?>>how</li></a>
	<li class = "inline midsmall sanslight"> <a  class = "black_text" href = <?php echo base_url('index.php/Users/site/pricing');?>>price</li></a>
	<li class = "inline midsmall sanslight"><a class = "button4 pink white_text sanslight" href=<?php echo base_url('index.php/Users/site/login');?>>LOG IN</a></li>  </div>
	</div>
</ul>
		</div>
		
<div id = "products">
<div class = "center">
<div class = "seventy  white"><BR><BR>
<div class = "half inline top">
<p class = "pink_text sanslight midlargeplus">OUR PRODUCTS</p><br>
<p class = "medium sanslight">We work with well known retailers and our own suppliers to find what you're looking for.</p><BR>
<BR><BR></div><div class = "half inline top">
<img src = <?php echo base_url('assets/Images/rendering2.jpg');?> height= 150><BR><BR>
<BR><BR></div>
<p class = "sanslight blue_text midlargeplus">Here's how expensive things usually are</p><br>
<p class = "sanslight dark_gray_text midsmall">Obviously, it all depends on your taste, budget, and how much you need</p>
<BR><BR>
<table class = "half center inline top">
<tr height = "70px"><td width = "50%">
<img src = <?php echo base_url('assets/Images/sofa.png');?> height="40px"><BR><BR></td>
<td><p class = "sanslight medium">$1,200-$5,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/chair.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$1,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/table.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$250-$3,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/rug.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$150-$1,000</p><BR><BR></td></tr>
</table>

<table class = "half center inline top">
<tr height = "70px"><td width = "50%">
<img src = <?php echo base_url('assets/Images/bed.png');?> height="40px"><BR><BR></td>
<td><p class = "sanslight medium">$350-$2,000</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/lamp.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$400</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/pillow.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$30-$100</p><BR><BR></td></tr>
<tr height = "70px"><td><img src = <?php echo base_url('assets/Images/art.png');?> height="50px"><BR><BR></td>
<td><p class = "sanslight medium">$100-$3000</p><BR><BR></td></tr>

</table>
</div>
<Br><BR><BR><BR></div></div>

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