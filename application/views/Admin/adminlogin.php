<?php 
	include(APPPATH.'/views/templates/header.php');
?>


 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a id = "servlink" href="#services">Services</a></li>
              <li><a id = "pricelink" href="#price">Cost</a></li>
			      <li><a id = "goodslink" href="#goods">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Users/site/login');?>">LOGIN</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>


<?php if (isset($error))
{echo '<div class = "error">';
echo $error;
echo '</div>';}
echo validation_errors('<p class="error">');
?>
<br/>
<br/>
<br/>
<br/>

<div class = "container">
<div class = "span6 offset3">
<BR><BR><BR><BR><BR>
<form name="login" method="post" action=<?php echo base_url('index.php/Admin/site/adminlogin');?>>
<p><label class = "sanslight">Username:</label><input type="text" name="username" id="username" size="20" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" /></p>
<p><label class = "sanslight">Password:</label><input type="password" name="password" id="password" size="20" maxlength="30" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"/></p>
<p><input type="submit" class = "pink button3" value="Submit" /></p>
</form>
</div>
</div>
<div class ="push">
<BR><BR><BR><BR><BR><BR><BR><BR><BR>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
