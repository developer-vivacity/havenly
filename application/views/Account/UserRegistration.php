<div id="content">
	<?php
	echo validation_errors('<p class="error">');
	?>
<div class="user_registration">
	 <?php 
    
     
   if(!empty($email) & empty($account_info))
     echo $email;
    if(!empty($account_info) & empty($email))
    echo $account_info;
    ?>
	 <p>User Registration</p>
	
   <?php echo form_open('Account/site/add/');?>
	<p>
	<?php echo form_label('Name', 'Name');
	$data = array(
              'name'        => 'user_name',
              'id'          => 'user_name',
              'value'       => set_value('user_name'),
              'maxlength'   => '100',
              'size'        => '30',
              );
	echo form_input($data);
	?>
	</p>
	<p>
<?php
	echo form_label('Email', 'Email');
	$data = array(
              'name'        => 'user_email',
              'id'          => 'user_email',
              'value'       => set_value('user_email'),
              'maxlength'   => '100',
              'size'        => '30',
              );
	echo form_input($data);
	?>
	</p>
	<p>
		<?php
	echo form_label('Password', 'Password');
    
    $data = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => set_value('password'),
              'maxlength'   => '100',
              'size'        => '30',
              'type'=>'password'
              );
	
  echo form_input($data);
  ?>
  </p>
 <p>
 <?php
 
  echo form_label('Confirm Password', 'Confirm Password');
   $data = array(
              'name'        => 'compassword',
              'id'          => 'compassword',
              'value'       => set_value('compassword'),
              'maxlength'   => '100',
              'size'        => '30',
              'type'=>'password'
              );
	
  echo form_input($data);
 ?> 
 
  </p>
  <p>
  <?php
 
  echo form_label('Phone', 'Phone');
   $data = array(
              'name'        => 'phone_number',
              'id'          => 'phone_number',
              'value'       => set_value('phone_number'),
              'maxlength'   => '100',
              'size'        => '30');
	
  echo form_input($data);
 ?> 
  
  </p>
  <p>
  <?php
 
  echo form_label('Zip', 'Zip');
   $data = array(
              'name'        => 'zip_code',
              'id'          => 'zip_code',
              'value'       => set_value('phone_number'),
              'maxlength'   => '100',
              'size'        => '30');
	
  echo form_input($data);
 ?> 
  
  </p>
 <p>
  <input type="submit" class="greenButton" value="Submit" />
 <a href="http://www.havenly.com/testsite/index.php/Account">login User</a>
  </p> 
   
	</div>
	</div>
