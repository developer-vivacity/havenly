<div>
	<div class="signin_form">
<p><h1>Forgot Password:</h1></p>
  <?php 
	 if(!empty($register_info))
    echo $register_info;
    echo validation_errors('<p class="error">');
  ?>
  <?php echo form_open('Users/site/validatemail/');?>

 <label for="email">Enter Email:</label>
 <input type="text" id="enteremail" name="enteremail" value="<?php if(isset($_POST['enteremail'])) echo $_POST['enteremail']; ?>"/>
 <input type="submit" class="" value="Sign in" />
 <?php echo form_close(); ?>
  <?php 
  
  echo'<a href="'.base_url().'index.php/Users/site/login">login User</a>';
  
  ?>
  
 </div>
