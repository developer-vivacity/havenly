
<head>
	<title>Havenly | Design for Everyone</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"/>
	<link rel="stylesheet" href=<?php echo base_url("assets/Scripts/jquery.fancybox.css")?> type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />

	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery-1.9.js")?>></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.pack.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.cycle.js")?>></script>
	</head>

<div id = "users_nav">
<div id = "button_nav">
<a id = "photo_submit"><div> <br><br>
Submit Selected</div></a>
<a id = "photo_cancel"><div> <br><br>
Cancel & Return
</div></a>
</div>
</div>
<br>
<div class = "select_container">
<label for="description">Tell Us What You Like About This Picture</label>
<input type="text" name="description" id="description" value="<?php echo $desc?>"/>
<input type="hidden" name="description" id="formid" value="<?php echo $formid?>" />

<p class = 'title'>Select The Picture That Inspires You</p>
<?php

foreach ($images as $key=>$value) 
{
	echo '<img class="inactive" src='.$value.' height=150px>';
}

?>


</div>
<script>

$(function(){
 		$(".inactive").click(function() {
			
			$(this).toggleClass('active');
			});
			
			
		$("#photo_submit").click(function() {
			
			$('#loading').hide();
			var values = JSON.stringify($(".active").map(function()  
			{return $(this).attr('src');}).get());
			
			var desc = $("#description").val();
			var formid = $("#formid").val();
			
			 $.ajax({        
					type: 'POST',
					url: '/test/design2/index.php/Contests/site/upload_photo_link',
					data: {desc:desc, images:values, formid:formid},
					success: function(data){
								$("#product_detail").hide();
						$("#inspiration .right_form_1").append(data);
						}
					 });
					 }); 
		
		$("#photo_cancel").click(function() {
			$("#picture_detail").hide();
			});
		
});		
	
</script>
