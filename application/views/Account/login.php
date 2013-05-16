<div id="content">
	<div class="signup_wrap">
<div class="signin_form">
	<?php 
    echo validation_errors('<p class="error">');?>
   <?php echo form_open('Account/site/login/');?>
  <label for="email">Email:</label>
  <input type="text" id="enteremail" name="enteremail"  />
  <label for="password">Password:</label>
  <input type="password" id="enterpass" name="enterpass"  />
  <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
<div><a href="<?php base_url();?>Account/site/forgotpassword">Forgot Password</a>
	<a href="<?php base_url();?>Account/site/registration/">User Registration</a></div>
</div>
	</div>

