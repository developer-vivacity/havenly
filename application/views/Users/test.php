
<?php
include(APPPATH.'/views/templates/header.php');
?>
<div id = "users_nav">
<div id = "button_nav">
<a id = "photo_submit"><div> <br><br>
Submit Selected</div></a>
<a id = "photo_cancel"><div> <br><br>
Cancel & Return
</div></a>
</div>
</div>

<div id= "loading">
	<img id = "loading-image" src = <?php echo base_url('assets/Images/ajax-loader.gif');?>>
	<br><br>
	</div>
	
<input type="hidden" name="description" id="description" value="<?php echo $desc;?>" />
<?php

foreach ($images as $key=>$value) 
{
	echo '<img class="inactive" src='.$value.' height=150px>';
}

?>

<script type="text/javascript">

$(document).ready(function() {
    
		$(".inactive").click(function() {
			$(this).toggleClass('active');
			});
			
		$('#loading').hide();
		
		$("#photo_submit").click(function() {
			
			$('#loading').show();
			var values = JSON.stringify($(".active").map(function()  
			{return $(this).attr('src');}).get());
			var desc = $("#description").val();
			
			 $.ajax({        
					type: 'POST',
					url: '/test/design2/index.php/users/upload/upload_photo_link',
					data: {desc:desc, images:values},
					success: function(data){
						location.href='/test/design2/index.php/users/site/';
						}
					 });
					 }); 
		
		$("#photo_cancel").click(function() {
			location.href='/test/design2/index.php/users/upload';
			});
		
		});
	
</script>
<?php
$this->load->view('templates/footer');
?>
