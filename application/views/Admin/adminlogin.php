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
  </div><!-- top nav -->


<div class = "container">
<BR><BR><BR>
<?php if (isset($error))
{echo '<div class = "alert alert-error">';
echo ' <button type="button" class="close" data-dismiss="alert">&times;</button>';
echo $error;
echo '</div>';}
echo validation_errors('<p class="error alert-error">');
?>
<br/>
<div class = "span6 offset3">
<BR><BR>
<form name="login" method="post" action=<?php echo base_url('index.php/Admin/site/adminlogin');?>>
<p><label class = "sanslight">Username:</label><input type="text" name="username" id="username" size="20" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" /></p>
<p><label class = "sanslight">Password:</label><input type="password" name="password" id="password" size="20" maxlength="30" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"/></p>
<p><input type="submit" class = "pink condensed button3" value="Submit" /></p>
</form>
</div>
</div>
<div class ="push">
<BR><BR><BR><BR><BR><BR><BR><BR><BR>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
