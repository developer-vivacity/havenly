<?php 
	include(APPPATH.'/views/templates/header.php');
?>



   <div class="top-nav">
    <div class="nav-left">
      <div class="logo"><a href = "<?php echo base_url();?>">Havenly<a></div>
      <ul>
        <li class="services-nav"><a href = "<?php echo base_url('/#services');?>"> Services</a></li>
        <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
        <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
         <li class="contact-nav"><a href = "#">How We Work</a></li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" href="<?php echo base_url('index.php/Users/site');?>">&nbsp;GET STARTED</a><li>
        <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?> height = "25px"></a>
          <ul id="dropdownList">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="<?php echo base_url('index.php/Users/site');?>">GET STARTED</a><li>
            <li class="services-nav"><a href = "<?php echo base_url('/#services');?>">Services</a></li>
            <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
            <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
            </ul>
        </li>
      </ul>
    </div>
</div>  
	<div id = "abouttheteam" class = "horizontal">

<div class = "row white">
<div class = "span3 offset1">
<img src = "<?php echo base_url('assets/Images/outtakes.jpg');?>" width="100%">

</div>
<div class = "span8 offset1">
<Br><BR><BR><BR><BR>
	<p class = "serif large blacktext ">
	We love homes.  Do you?
	</p><br>
	<p class = "sanslight dark_gray_text medium">
	 Are you fun, qualified, passionate about all things home, and looking to join a company that's growing? Do you sit at your desk wishing you could just...do... more?  
	 <br><br>Havenly is always looking for top tier talent in decorating, web design, development and operations.</p><br><br>
	<p class = "sanslight medium ">
	If that's you, reach out to lee at havenly dot com.
	</p>
	<br><br><br></div></div>
	<div class = "push white"><BR><BR>
	</div></div>
	<?php 
	include(APPPATH.'/views/templates/footer.php');
?>