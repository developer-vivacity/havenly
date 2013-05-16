<div>
	<?php 
    echo validation_errors('<p class="error">');
    ?>
<div class="signin_form">
	
   <?php echo form_open('Account/site/validatemail/');?>
  <label for="email">Enter Email:</label>
  <input type="text" id="enteremail" name="enteremail"  />
 <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
 <a href="<?php base_url(); ?>/parupkar/demo/havenly/index.php/Account">login User</a>
</div>
