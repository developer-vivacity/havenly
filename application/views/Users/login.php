
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
<div class = "bgM horizontal right-align">
	  <a class = "button1 right-align inline condensed margin white_text midlarge" id="pull"> &#9776; </a>  
</div>
<div class = "center bgcontainer">
<div class = "center padding_small_top">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=120></a>
</div>
<br>

<div class="signup_wrap half border white center">
<div class="signin_form padding">
	<?php 
	
    echo validation_errors('<p class="error">');?>
   <?php echo form_open('Users/site/login/');?>
   <div class = "horizontal">
   <div class = "third inline right-align bottom	">
  <label class = "medium condensed" for="email">Email:</label></div>
  <div class = "half inline">
  <input type="text" id="enteremail" name="enteremail"  /><br></div>
  </div>
  <div class = "horizontal">
  <div class = "third inline right-align">
  <label class = "medium condensed " for="password">Password:</label></div>
  <div class = "half inline">
  <input type="password" id="enterpass" name="enterpass"  /><br></div></div><br>
  <div class = "third inline right-align">
  </div>
  <div class = "half inline">
  <input type="submit" class="button3 horizontal small condensed" value="Sign in" /></div>
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
<div class = "sanslight blue_text small">
	<?php
	echo '<a href="'.base_url().'index.php/Users/site/forgotpassword">Forgot Password</a>';
	?>
	</div>
</div>
	</div><div class = "bgcontainer">
<br><BR><div class = "push">
</div>
	</div>
	

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
