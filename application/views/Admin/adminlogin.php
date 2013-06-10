<?php 
	include(APPPATH.'/views/templates/header2.php');
?>


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

<div class = "form_container">
<form name="login" method="post" action=<?php echo base_url('index.php/Admin/site/adminlogin');?>>
<p><label>Username:</label><input type="testbox" name="username" id="username" size="20" maxlength="30" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" /></p>
<p><label>Password:</label><input type="password" name="password" id="password" size="20" maxlength="30" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"/></p>
<p><input type="submit" class = "teal button2" value="Submit" /></p>
</form>
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
