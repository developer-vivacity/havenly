<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
		
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url("assets/main.css");?> />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>

	</head>
<body>
<div id = "tabs">
	<ul>
	<li><a href="#tab1">Contests</a></li>
	<li><a href = "#tab2">Inspiration Photos</a></li>
	</ul>
	
<div id="tab1"> Test for Tab 1 here</div>
<div id = "tab2"> Test for Tab 2 here</div>
</div>	

<script type = "text/javascript">
$(document).ready(function() {
    $("#tabs").tabs();
});
</script>
</body>