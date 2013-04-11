<?php 
	include(APPPATH.'/views/templates/header2.php');
?>


<?php if (isset($error))
{echo '<div class = "error">';
echo $error;
echo '</div>';}
?>
</div>
<div class = "form_container">
<form name="login" method="post" action=<?php echo base_url('index.php/Admin/site/open_contests');?>>
<input type="password" name="password" id="password" size="20" maxlength="30" />
<input type="submit" class = "teal button2" value="Submit" />
</form>
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>