<?php 
	include(APPPATH.'/views/templates/header2.php');
?>
<br/>
<br/>
<br/>
<br/>
<div class = "form_container">
<?php

if($privileges=='global')
{
echo'<p><a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a>&nbsp;|&nbsp;<a href="#">User Order Trackers</a>&nbsp;|&nbsp;<a href="#">Vendor Order Management</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a></p>';
}
else
echo'<p>&nbsp;<a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a></p>';
?>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
