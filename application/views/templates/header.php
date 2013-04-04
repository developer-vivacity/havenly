<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Havenly | Design for Everyone</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index,follow" />
	<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href=<?php echo base_url("assets/Images/icon.png");?> />
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"/>
	<link rel="stylesheet" href=<?php echo base_url("assets/Scripts/jquery.fancybox.css")?> type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />

	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery-1.9.js")?>></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.fancybox.pack.js")?>></script>
	<script type="text/javascript" src=<?php echo base_url("assets/Scripts/jquery.cycle.js")?>></script>
	</head>

<body>



<div class = "full_wrapper">
<div class = "inner_wrapper">
					<div class = "header_main">
					
									
									
						
						<div class = "logo_container_main padding_left third inline">
						<a class = "logo dark_gray_text" href=<?php echo base_url();?>>Havenly</a>
						<p class = "small dark_gray_text text1">Decorate the world.</p>
						</div>
					
					<div class = "login_button inline">
					 
							<ul class = "menu_bar">
							<li class = "inline"> <a href = <?php echo base_url('index.php/Users/site/howwework');?>>How we work</li>
							<li class = "inline"> <a href = <?php echo base_url('index.php/Users/site/whoweare');?>>Who we are </li>
							</ul>
					<?php 
							$userid = $this->session->userdata('userid');
							if($userid):?>
								<a class = "fancybox_logout" href= <?php echo base_url('index.php/site/logout');?> onclick="FB.logout()">Logout</a>
							 <?php else: ?>
								<a class = "fancybox"  href="#login"> Login </a>
							 <?php endif?>
							
							
					</div>
					
					</div>
														

			
				