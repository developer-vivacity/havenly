<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<br/>
<br/>
<br/>
<br/>
<div class = "container">
<?php

if($privileges=='global')
{
echo'<p class = "condensed medium"><a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a>&nbsp;|&nbsp;<a href="#">User Order Trackers</a>&nbsp;|&nbsp;<a href="#">Vendor Order Management</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a></p>';
}
else
echo'<p class = "condensed medium">&nbsp;<a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a></p>';
?>
</div>

<div class = "container">
	<div class = "row">
		<div style="height:500px;">
		
	</div>
	</div></div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
