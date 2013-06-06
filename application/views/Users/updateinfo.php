<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<div class = "center bgcontainer"><BR>
<div class = "seventy">
<div  style= "height:80px;">
<table class = "left-align">
<tr><td width = "82%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<td width= "100%">
<?php
 
?>
</td></table>
</div>
<BR><BR>



<br>
<div class = "clear border center white">

<div style = "height:320px;"><BR><BR><BR><BR><BR><BR><BR>
<p class = "sanslight medium">
Your new password information has been sent to the email we have on file.<br><BR><BR></p>
<?php
echo'<a class = "button3 third condensed midsmall" href="'.base_url().'index.php/Users/site/login">LOG IN</a>';
?>
</div>
</div></div>
<div class = "push">
</div>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
