
<?php
include(APPPATH.'/views/templates/header.php');
$this->session->keep_flashdata('desc');
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

<div class = "loader">
	<img src = <?php echo base_url('assets/Images/ajax-loader.gif');?>>
	<br><br>
	</div>
</div>
</div>


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
			
		$('.loader').hide();
		
		$("#photo_submit").click(function() {
			
			$('.loader').show();
			var values = JSON.stringify($(".active").map(function()  
			{return $(this).attr('src');}).get());
		
			
			 $.ajax({        
					type: 'POST',
					url: '/test/design/index.php/users/upload/upload_photo_link',
					data: {images:values},
					success: function(data){
						location.href='/test/design/index.php/users/site/';
						}
					 });
					 }); 
		
		$("#photo_cancel").click(function() {
			location.href='/test/design/index.php/users/upload';
			});
		
		});
	
</script>
<?php
$this->load->view('templates/footer');
?>
