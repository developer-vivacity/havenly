<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<div class = "center bgcontainer"><BR>
<div class = "seventy" style= "height:80px;">
<table class = "left-align">
<tr><td width = "82%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<td width= "100%">
<?php
 echo '<a class = "condensed black_text medium" href="#">&nbsp;&nbsp;DESIGNS&nbsp;&nbsp;</a>';
 echo '<a class = "condensed black_text medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;LOG OUT</a>'; 
?>
</td></table>
</div>
<BR><BR>


<div class = "center">
<br>
<div class = "seventy border white">

<?php if (isset($error))
{echo '<div class = "error">';
echo $error;
echo '</div>';}
?>

<div class = "center" style= "height:400px;">
<form name="login" method="post" action=<?php echo base_url('index.php/Admin/site/open_contests');?>>
<div class = "half"><BR><BR><BR>
<p class = "large condensed"> Password: </p><BR><BR>
<input type="password" name="password" id="password" size="10" maxlength="30" /><BR><BR>
<input type="submit" class = "blue button4 sanslight white_text" value="Submit" /></div>
</form>
</div>
</div><BR><BR><BR>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>