

<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js"></script>

<div class = "center bgcontainer"><BR>
<div class = "seventy">
<div style= "height:80px;">
<table class = "left-align">
<tr><td width = "82%">
	<a href =<?php echo base_url();?>> <img src= <?php echo base_url('assets/Images/Blue_dalle.png');?> height=90></a>
</td>
<td width= "100%">
<?php
 
 echo '<a class = "condensed medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;DESIGNS&nbsp;&nbsp;</a>';
 
 echo '<a class = "condensed medium" href="'.base_url().'index.php/Users/site/logout/">&nbsp;&nbsp;LOG OUT</a>'; 
?>
</td></table>
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
	echo '<tr><td width = "50%">First Name:</td><td width = "50%"><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->first_name.'" id="update_name" name="update_name" id="u_name_'.$key->id.'"/></td></tr>';
	echo '<tr><td>Last Name:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->last_name.'" id="update_last_name" name="update_last_name" id="u_lastname_'.$key->id.'"/></td></tr>';

	echo'<tr><td>Email:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->email.'" id="update_email" name="update_email" id="u_email_'.$key->id.'"/></td></tr>';


echo'<tr><td>Phone:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->phone.'" id="update_phone" name="update_phone" "u_phone_'.$key->id.'"/></td></tr>';
echo'<tr><td>Address:</td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->address.'" id="update_address" name="update_address" "u_address_'.$key->id.'"/></td></tr>';

echo'<tr><td>Zip:<BR><BR></td><td><input class = "midsmall dark_gray_text sanslight" type="textbox" value="'.$key->zipcode.'" id="update_zip" name="update_zip" "u_zip_'.$key->id.'"/><BR><BR></td></tr>';
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
