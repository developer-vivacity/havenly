<div id="content">
	
<div class="user_registration">
	 <p>User Registration</p>
	<?php 
    echo validation_errors('<p class="error">');
     
   if(!empty($email) & empty($accoun_info))
    echo $email;
    if(!empty($accoun_info) & empty($email))
    echo $accoun_info;
    ?>
   <?php echo form_open('Account/site/add/');?>
	<p>
	<?php echo form_label('User Name', 'User Name');
	$data = array(
              'name'        => 'user_name',
              'id'          => 'user_name',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '30',
              
            );
	echo form_input($data);
	?>
	</p>
	<p>
		<?php
	echo form_label('User Email', 'User Email');
	$data = array(
              'name'        => 'user_email',
              'id'          => 'user_email',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '30',
              );
	echo form_input($data);
	?>
	</p>
	<p>
		<?php
	echo form_label('User password', 'User Password');
    
    $data = array(
              'name'        => 'password',
              'id'          => 'password',
              'value'       => '',
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
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '30',
              'type'=>'password'
              );
	
  echo form_input($data);
 ?> 
 
  </p>
 <p>
  <input type="submit" class="greenButton" value="Submit" />
 <a href="<?php base_url(); ?>/parupkar/demo/havenly/index.php/Account">login User</a>
  </p> 
   
	</div>
	</div>
