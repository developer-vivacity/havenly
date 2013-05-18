<div id="content">
	<?php
	echo validation_errors('<p class="error">');
	?>
<div class="user_registration">
	 <?php 
    
     
   if(!empty($email) & empty($accountinfo))
     echo $email;
    if(!empty($accountinfo) & empty($email))
    echo $accountinfo;
    ?>
	 <p>User Registration</p>
	
   <?php echo form_open('Users/site/add/');?>
   
	<p>
	<?php echo form_label('First Name', 'First Name');
	$data = array(
              'name'        => 'first_name',
              'id'          => 'first_name',
              'value'       => set_value('first_name'),
              'maxlength'   => '100',
              'size'        => '30',
              );
	echo form_input($data);
	?>
	</p>
	<p>
	<?php echo form_label('Last Name', 'Last Name');
	$data = array(
              'name'        => 'last_name',
              'id'          => 'last_name',
              'value'       => set_value('last_name'),
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
              'name'        => 'email',
              'id'          => 'email',
              'value'       => set_value('email'),
              'maxlength'   => '100',
              'size'        => '30',
              );
	echo form_input($data);
	?>
	</p>
	
	 <p>
  <?php
 
  echo form_label('Phone', 'Phone');
   $data = array(
              'name'        => 'phone',
              'id'          => 'phone',
              'value'       => set_value('phone'),
              'maxlength'   => '100',
              'size'        => '30');
	
  echo form_input($data);
 ?> 
  
  </p>
  <p>
  <?php
 
  echo form_label('Address', 'Address');
   $data = array(
              'name'        => 'address',
              'id'          => 'address',
              'value'       => set_value('address'),
              'maxlength'   => '100',
              'size'        => '30');
	
  echo form_input($data);
 ?> 
  
  </p>
  <p>
  <?php
 
  echo form_label('Zip', 'Zip');
   $data = array(
              'name'        => 'zipcode',
              'id'          => 'zipcode',
              'value'       => set_value('zipcode'),
              'maxlength'   => '100',
              'size'        => '30');
	
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
  <input type="submit" class="greenButton" value="Submit" />
  
 <?php 
 echo "<a href='".base_url()."index.php/Users/site/login'>login User</a>";
 ?>
 
  </p> 
   
	</div>
	</div>
