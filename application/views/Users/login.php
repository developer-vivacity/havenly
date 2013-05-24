<div id="content">
	<div class="signup_wrap">
<div class="signin_form">
	<p><h1>User Login:</h1></p>
	<?php 
	if(!empty($Login))
   echo $Login;
   echo validation_errors('<p class="error">');
   ?>
   <?php echo form_open('Users/site/login/');?>
  <label for="email">Email:</label>
  <input type="text" id="enteremail" name="enteremail"  value="<?php if(isset($_POST['enteremail']))echo $_POST['enteremail']; ?>"/>
  <label for="password">Password:</label>
  <input type="password" id="enterpass" name="enterpass"  value="<?php if(isset($_POST['enterpass']))echo $_POST['enterpass'];?>"/>
  <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
<div>
	<?php
	echo '<a href="'.base_url().'index.php/Users/site/forgotpassword">Forgot Password</a>&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<a href="'.base_url().'index.php/Users/site/registration/">User Registration</a>';
	?>
	</div>
</div>
	</div>

