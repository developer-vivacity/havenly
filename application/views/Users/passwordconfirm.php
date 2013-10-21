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
            <li class="services-nav"><a href = "<?php echo base_url('/#services');?>">Services</a></li>
            <li class="cg-nav"><a href = "<?php echo base_url('/#goods');?>">Cost &amp; Goods</a></li>
            <li class="about-nav"><a href = "<?php echo base_url('/#about');?>">About</a></li>
            </ul>
        </li>
      </ul>
    </div>
</div>

<div class = "chevron">
	  <BR><BR>

<br>
<div class = "container text-center">
<div class = "span10 text-center"><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<p class = "sanslight medium">
Your new password information has been sent to the email address we have on file.<br><BR><BR></p>
<?php
echo'<a class = "button3 third condensed midsmall" href="'.base_url().'index.php/Users/site/login">L O G &nbsp; I N</a>';
?><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
</div>
</div></div>
<div class = "push">
</div>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
