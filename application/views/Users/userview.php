<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js"></script>

<div class = "center bgcontainer"><BR>
<div class = "seventy">
<div style= "height:90px;">
<table class = "left-align">
<tr><td width = "78%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<?php
 

 echo '<td><a class = "condensed black_text medium" href="#">&nbsp;&nbsp;DESIGNS&nbsp;&nbsp;</a></td>';
 echo '<td><a class = "condensed black_text medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;LOG OUT</a></td>'; 
?>
</tr></table>
</div>
<BR><BR>

<div class = "padding left-align border white">
<a class = "left-align condensed midsmall" href="<?php echo base_url().'index.php/Users/site/login/'?>"> &larr;&nbsp;BACK&nbsp;&nbsp;</a> <BR><BR>
<?php

$attributes = array('class' => 'updateform', 'id' => 'updateform');
echo form_open('Users/site/updatedata/',$attributes);
?>
<div id="div_show_error_message"> 
<?php
if(isset($mailmessage))
echo $mailmessage;
?>
</div>
<p class = "sanslight medium left-align">Account Information</p>
<hr class = "style">
<div class  = "padding_left">
  <table class = "midsmall left-align sanslight "> 
<?php

foreach($query as $key)
{
	echo '<tr><td width = "50%">First Name:</td><td width = "50%"><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->first_name.'" id="update_name" name="update_name" /></td></tr>';
	echo '<tr><td>Last Name:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->last_name.'" id="update_last_name" name="update_last_name" /></td></tr>';

	echo'<tr><td>Email:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->email.'" id="update_email" name="update_email" /></td></tr>';


echo'<tr><td>Phone:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->phone.'" id="update_phone" name="update_phone" /></td></tr>';
echo'<tr><td>Address:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->address.'" id="update_address" name="update_address" /></td></tr>';

echo'<tr><td>Zip:<BR><BR></td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->zipcode.'" id="update_zip" name="update_zip" /></td></tr>';
echo'<tr><td>Facebook:<BR><BR></td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->facebook.'" id="update_facebook" name="update_facebook" /><BR><BR></td></tr>';
echo'<tr><td>Pinterest:<BR><BR></td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->pinterest.'" id="update_pinterest" name="update_pinterest" /><BR><BR></td></tr>';
echo '<tr><td> </td></tr></table>';
echo '</div><BR><BR>';

echo '<p class = "sanslight medium left-align">Password</p>';
echo '<hr class = "style">';
echo '<div class = "padding_left"><table class  ="midsmall left-align sanslight">';
echo'<tr><td width = "50%">Change Password?</td><td width = "50%"><input class = "midsmall dark_gray_text sanslight" type="radio" name="myradio" value="1" id="radioyes"/>Yes<input type="radio" name="myradio" value="1" checked="checked" id="radiono"/>No</td></tr>';
echo'<tr><td>Password:</td><td><input class = "small dark_gray_text sanslight" type="password" value="" id="update_password" name="update_password"/></td></tr>';

echo'<tr><td></td><td><BR><input class = "button3 seventy midsmall condensed" type="button" value="Update" id="update_update"></td></tr>';
echo '<input type="hidden" id="hold_id" name="hold_id" value='.$key->id.'/>';
}

?>	
</table>
</div>
</div>

<BR><BR>
</div>
<input type="hidden" id="radio_value" name="radio_value"/>
<?php echo form_close(); ?>

</body>
