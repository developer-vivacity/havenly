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
		  <li><a href = "http://www.havenly.com/blog">Blog</a></li>
      </ul>
    </div><!-- nav left -->
    <div class="nav-right">
      <ul>
        <li><a id="startbutton" href="<?php echo base_url('index.php/Users/site');?>">&nbsp;GET STARTED</a><li>
        <li><a class="login" href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
      </ul>
    </div><!-- nav right -->
    <div class="nav-mobile">
      <ul id="list-pages-accordion">
        <li>
          <a href=""><img src=<?php echo base_url('theme/img/menu.png');?> height = "25px"></a>
          <ul id="dropdownList" class = "text-center">
            <li><a class="login"href="<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a><li>
            <li><a id="startbutton" class="button3" href="<?php echo base_url('index.php/Users/site');?>">GET STARTED</a><li>
            <li class="services-nav"><a href = "<?php echo base_url('/#services');?>">Services</a></li>
            <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
            <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
               <li class="contact-nav"><a href = "#">How We Work</a></li>
			  <li><a href = "http://www.havenly.com/blog">Blog</a></li>
			</ul>
        </li>
      </ul>
    </div>
</div>
<div class = "canvas">
<div class = "container text-center" id = "giftcontainer"><BR><BR>
<p class = "large serif">Give the gift of Havenly.</p><BR>
<p class = "medium sanslight">Buy your loved one a beautiful room.  It's the gift they'll appreciate every day.</p>
<BR><BR>
<div class = "row">
<div class = "span4">
<img src = "<?php echo base_url('assets/Images/giftbox.jpg');?>" width = "80%">
</div>
<div class = "span5 text-left">

<form id="user_payment_form" name="user_payment_form" method="post" action="<?php echo base_url('index.php/Cart/site/simple_checkout');?>" enctype="multipart/form-data">
<input type = "hidden" value = "Gift Card" name = "description" id = "description">
<select class = "giftselect" name = "amount">
<option value = "65">Free Design - $65</option>
<option value = "65">Free Design & $100 towards furnishing the room - $165</option>
<option value = "65">Free Design & $300 towards furnishing the room - $365</option>
</select>
<br>
<input type = "submit" class = "button4 midsmall sanslight" value = "PURCHASE">
</div>
</div>
</div>
<br><BR><BR>
</div>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>