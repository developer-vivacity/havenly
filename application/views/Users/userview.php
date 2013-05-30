<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js"></script>
</head>
<body>
<?php
echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/Users/site/login/"> Accountinformation </a>'; 
$attributes = array('class' => 'updateform', 'id' => 'updateform');
echo form_open('Users/site/updatedata/',$attributes);
echo '<h1>Edit User Information:</h1>';
?>
<div id="div_show_error_message"> 
<?php
if(isset($mailmessage))
echo $mailmessage;
?>
</div>
  <div class="div_update_table">      
<?php

foreach($query as $key)
{
 echo '<div class="div_update_row"><div class="div_update_col">First Name</div><div class="div_update_col"><input type="textbox" value="'.$key->first_name.'" id="update_name" name="update_name" id="u_name_'.$key->id.'"/></div></div>';

echo '<div class="div_update_row"><div class="div_update_col">Last Name</div><div class="div_update_col"><input type="textbox" value="'.$key->last_name.'" id="update_last_name" name="update_last_name" id="u_lastname_'.$key->id.'"/></div></div>';

echo'<div class="div_update_row"><div class="div_update_col">Email</div><div class="div_update_col"><input type="textbox" value="'.$key->email.'" id="update_email" name="update_email" id="u_email_'.$key->id.'"/></div></div>';


echo'<div class="div_update_row"><div class="div_update_col">Phone</div><div class="div_update_col"><input type="textbox" value="'.$key->phone.'" id="update_phone" name="update_phone" "u_phone_'.$key->id.'"/></div></div>';
echo'<div class="div_update_row"><div class="div_update_col">Address</div><div class="div_update_col"><input type="textbox" value="'.$key->address.'" id="update_address" name="update_address" "u_address_'.$key->id.'"/></div></div>';

echo'<div class="div_update_row"><div class="div_update_col">Zip</div><div class="div_update_col"><input type="textbox" value="'.$key->zipcode.'" id="update_zip" name="update_zip" "u_zip_'.$key->id.'"/></div></div>';
echo'<div class="div_update_row"><div class="div_update_col">Do you want change password</div><div class="div_update_col"><input type="radio" name="myradio" value="1" id="radioyes"/>Yes<input type="radio" name="myradio" value="1" checked="checked" id="radiono"/>No</div></div>';
echo'<div class="div_update_row" id="update_row_password"><div class="div_update_col">Password</div><div class="div_update_col"><input type="password" value="" id="update_password" name="update_password"/></div></div>';
echo'<div class="div_update_row"><input type="button" value="update" id="update_update"></div>';
echo '<input type="hidden" id="hold_id" name="hold_id" value='.$key->id.'/>';
}

?>	
</div>

<input type="hidden" id="radio_value" name="radio_value"/>
<?php echo form_close(); ?>

</body>
