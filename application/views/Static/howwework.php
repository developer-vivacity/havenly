<?php 
	include(APPPATH.'/views/templates/header.php');
?>

   <div class="top-nav">
    <div class="nav-left">
      <div class="logo">Havenly</div>
      <ul>
        <li class="services-nav">Services</li>
        <li class="cg-nav">Cost &amp; Goods</li>
        <li class="about-nav">About</li>
        <li class="contact-nav">Contact</li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" class="button3" href="#overlay">&nbsp;GET STARTED</a><li>
        <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?>></a>
          <ul id="dropdownList">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="#overlay">GET STARTED</a><li>
            <li class="services-nav">Services</li>
            <li class="cg-nav">Cost &amp; Goods</li>
            <li class="about-nav">About</li>
            <li class="contact-nav">Contact</li>
          </ul>
        </li>
      </ul>
    </div>
</div>  

<div class = "white">
<div class = "container">
<div class = "text-center">
<BR><BR>
<p class = "midlarge sanslight">WE MAKE THINGS ALMOST TOO EASY WITH A FUN AND SIMPLE DESIGN PROCESS</p><BR>
<hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step1.png');?>" height = "150px"><BR><BR>
<p class = "condensed midlarge">Take Our Survey.</p>
<p class = "sanslight midsmall">After signing up for our service, you will fill out a brief style survey and upload pictures of your room.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step1img.jpg');?>" width = "100%">
</div></div>
<hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step2.png');?>" height = "150px"><BR><BR>
<p class = "condensed midlarge">Chat With Us.</p>
<p class = "sanslight midsmall">Your designer will contact you to discuss your needs.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step2img.jpg');?>" width = "100%">
</div></div><hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step3.png');?>" height = "150px"><BR><BR>
<p class = "condensed midlarge">See Concepts.</p>
<p class = "sanslight midsmall">You get two concepts for your space.  Provide feedback to your designer on them and we find alternatives.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step3img.jpg');?>" width = "100%">
</div></div><hr class = "style">
<div class = "row">
<div class = "span3"><BR>
<img src = "<?php echo base_url('assets/Images/step4.png');?>" height = "150px"><BR><BR>
<p class = "condensed midlarge">Get Decorated.</p>
<p class = "sanslight midsmall">You get a final room rendering and a list of products and prices.  One click buying and coordination from our accounts team makes getting decorated just so easy.</p>

</div>
<div class = "span6">
<img src = "<?php echo base_url('assets/Images/step4img.jpg');?>" width = "100%">
</div></div><BR><BR>

</div>
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>