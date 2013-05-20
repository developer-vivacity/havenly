<head>
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js"></script>

</head>
<body>
<?php
echo '<a href="'.base_url().'index.php/Users/site/logout/">Log Out</a>'; 
$attributes = array('class' => 'updateform', 'id' => 'updateform');
echo form_open('Users/site/updatedata/',$attributes);
?>

<div class="div_update_table">
	
<div id="div_show_error_message"> </div>
<div class="div_update_row"><div class="div_update_col">First Name</div><div class="div_update_col"><input type="textbox" value="" id="update_name" name="update_name"/></div></div>

<div class="div_update_row"><div class="div_update_col">Last Name</div><div class="div_update_col"><input type="textbox" value="" id="update_last_name" name="update_last_name"/></div></div>

<div class="div_update_row"><div class="div_update_col">Email</div><div class="div_update_col"><input type="textbox" value="" id="update_email" name="update_email"/></div></div>

<div class="div_update_row"><div class="div_update_col">Phone</div><div class="div_update_col"><input type="textbox" value="" id="update_phone" name="update_phone"/></div></div>
<div class="div_update_row"><div class="div_update_col">Address</div><div class="div_update_col"><input type="textbox" value="" id="update_address" name="update_address"/></div></div>
<div class="div_update_row"><div class="div_update_col">Zip</div><div class="div_update_col"><input type="textbox" value="" id="update_zip" name="update_zip"/></div></div>
<div class="div_update_row"><div class="div_update_col">Do you want change password</div><div class="div_update_col"><input type="radio" name="myradio" value="1" id="radioyes"/>Yes<input type="radio" name="myradio" value="1" checked="checked" id="radiono"/>No</div></div>
<div class="div_update_row" id="update_row_password"><div class="div_update_col">Password</div><div class="div_update_col"><input type="password" value="" id="update_password" name="update_password"/></div></div>
<div class="div_update_row"><div class="div_update_col">
<input type="button" value="update" id="update_update">
</div><div class="div_update_col">
<input type="button" value="cancel" id="cancel_update"/>

</div></div>
</div>
<input type="hidden" id="hold_id" name="hold_id">
<input type="hidden" id="radio_value" name="radio_value">
<?php echo form_close(); ?>
<table align="center" width="600px" border="1">
<tr>

<td  width="100px">First Name</td>
<td  width="100px">Last Name</td>
<td  width="100px">Email</td>
<td  width="100px">Phone</td>
<td  width="100px">Address</td>
<td  width="100px">zipcode</td>
<td width="100px">Edit</td>

</tr>
<?php

foreach($query as $key)
{
   echo '<tr>';
   echo '<td  id="u_name_'.$key->id.'">'.$key->first_name.'</td>
   <td  id="u_lastname_'.$key->id.'" >'.$key->last_name.'</td>
   
   <td  id="u_email_'.$key->id.'" >'.$key->email.'</td>
   <td  id="u_phone_'.$key->id.'" >'.$key->phone.'</td>
   
   <td  id="u_address_'.$key->id.'" >'.$key->address.'</td>
   <td  id="u_zip_'.$key->id.'" >'.$key->zipcode.'</td>
   <td  ><input type="button" value="Edit" id="'.$key->id.'" class="edit_button"></td>
   </tr>';
}
?>
</table>
</body>
