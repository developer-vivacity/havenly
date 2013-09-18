<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js"></script>


<div class = "center chevron"><BR>
<div class = "container">

 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="<?php echo base_url();?>">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a id = "servlink" href="<?php echo base_url().'/#services';?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url().'/#price'; ?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url().'/#goods';?>">Goods</a></li>
              <li><a id = "aboutlink" href="#">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<BR><BR><BR><BR>

<div class = "span10 offset1 white border">
<div class = "text-left offset1 span8"><BR><BR>


<a class = "left-align condensed midsmall" href="<?php echo base_url().'index.php/Users/site/login/'?>"> &larr;&nbsp;BACK&nbsp;&nbsp;</a> <BR><BR>
<?php

$attributes = array('class' => 'updateform', 'id' => 'updateform');
echo form_open('Users/site/updatedata/',$attributes);
?>
<div id="div_show_error_message" class="alert-error"> 
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
	echo '<tr><td width = "50%">First Name:</td><td width = "50%"><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->first_name.'" id="update_name" name="update_name" /></td></tr>';
	echo '<tr><td>Last Name:</td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->last_name.'" id="update_last_name" name="update_last_name" /></td></tr>';

	echo'<tr><td>Email:</td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->email.'" id="update_email" name="update_email" /></td></tr>';


echo'<tr><td>Phone:</td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->phone.'" id="update_phone" name="update_phone" /></td></tr>';
echo'<tr><td>Address:</td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->address.'" id="update_address" name="update_address" /></td></tr>';

echo'<tr><td>Zip:</td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->zipcode.'" id="update_zip" name="update_zip" /></td></tr>';
echo'<tr><td><BR>Facebook Profile:</td><td><BR><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->facebook.'" id="update_facebook" name="update_facebook" /></td></tr>';
echo'<tr><td>Pinterest Page:<BR><BR></td><td><input class = "midsmall dark_gray_text sanslight" type="text" value="'.$key->pinterest.'" id="update_pinterest" name="update_pinterest" /><BR><BR></td></tr>';
echo '<tr><td> </td></tr></table>';
echo '</div><BR><BR>';

echo '<p class = "sanslight medium left-align">Password</p>';
echo '<hr class = "style">';
echo '<div class = "padding_left"><table class  ="midsmall left-align sanslight">';
echo'<tr><td width = "50%">Change Password?</td><td width = "50%"><input class = "midsmall dark_gray_text sanslight" type="radio" name="myradio" value="1" id="radioyes"/>Yes&nbsp;<input type="radio" name="myradio" value="1" checked="checked" id="radiono"/>No</td></tr>';
echo'<tr><td><BR>Password:</td><td><BR><input class = "small dark_gray_text sanslight" type="password" value="" id="update_password" name="update_password"/></td></tr>';

echo'<tr><td></td><td><BR><input class = "button3 seventy midsmall condensed" type="button" value="Update" id="update_update"></td></tr>';
echo '<input type="hidden" id="hold_id" name="hold_id" value='.$key->id.'/>';
}

?>	
</table>
</div>
</div>

</div>
<div class = "span12">
<BR><BR></div>
<input type="hidden" id="radio_value" name="radio_value"/>
<?php echo form_close(); ?>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>	
</body>
