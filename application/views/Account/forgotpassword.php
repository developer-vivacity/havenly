<div>
	<?php 
	if(!empty($register_info))
    echo $register_info;
    echo validation_errors('<p class="error">');
    ?>
<div class="signin_form">
	
   <?php echo form_open('Account/site/validatemail/');?>
  <label for="email">Enter Email:</label>
  <input type="text" id="enteremail" name="enteremail"  />
 <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
 <a href="http://www.havenly.com/testsite/index.php/Account">login User</a>
</div>
