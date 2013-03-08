<?php 

include(APPPATH.'/views/templates/header.php');
?>

<br><br><br><br>

<div class = "upload_form_container">
<div class='close'>X</div>
<p>Upload Product from a File or Website</P>

<?php 
	if (isset($error))
		{echo '<div class = "error">';
		echo $error;
		echo '</div>';}
	else {echo '';}		
?>

<div id="loading">
  <img id="loading-image" src=<?php echo base_url('assets/Images/ajax-loader.gif');?> alt="Loading..." />
</div>


<div class = "form">


<?php

	$this->load->helper('form');
	echo '<div class = "photo_form">';
	echo form_open_multipart('Supplier/upload/upload_photo');
	echo '<div>';
	echo '<input class = "input_photo" value = "Browse for file" id = "photo_cover" type = "text" name = "cover">';?>
		<a class = "flat" id = "browse" onclick = '$("#file13").click();'>Browse</a>
	<?php
	echo form_upload("file",'Browse for a file','id = "file13"', 'class="file_hidden"');
	echo '</div>';
	echo '<br>';?>
	
	<?php
	echo form_submit("submit", "Submit", 'class="flat2"');
	echo form_close();
	echo '</div>';
	
	echo '<div class = "photo_form">';?>
	<?php
	$attr = array('id'=>'upload_form');
	echo form_open('Supplier/upload/photo_link',$attr);?>
	<input type="text" name="weblink" value="http://" id="photo_link"  class="input_photo" 
	onfocus="value=''" onblur="value=value" /><br><br>
	<?php
	echo form_submit("submit1", 'Submit', 'class="flat2"', 'id="submit1"');
	echo form_close();
	echo '</div>';
	
	
	
?>

</div>
<br><BR><BR>
</div>
<script>
$(document).ready(function() {
    
		$(".close").click(function() {
			location.href='/test/design2/index.php/users/site';
			});
		
		$("#loading").hide();		});


		
$("#file13").change(function(){
	$('#photo_cover').val($(this).val());
	});
	
	
$("#upload_form").submit(function(){
	$('#loading').show();
	
	return true;
	});
	
</script>

<?php
$this->load->view('templates/footer');
?>