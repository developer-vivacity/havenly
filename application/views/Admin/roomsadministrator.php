<?php
//include(APPPATH.'/views/templates/header2.php');?>
<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<?php
if($privileges=='global')
{
echo'<p><a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a>&nbsp;|&nbsp;<a href="#">User Order Trackers</a>&nbsp;|&nbsp;<a href="#">Vendor Order Management</a></p>';
}
else
echo'<p>&nbsp;<a href="'.base_url('index.php/Admin/site/roomsadministrator').'">Rooms</a>&nbsp;|&nbsp;<a href="#">Designs</a></p>';
?>
<table border="1"  cellpadding="2" cellspacing="2" >
	<tr><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/users.email/'.$filter.''; ?>">User Name</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.id/'.$filter.''; ?>">Order Number </a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.status/'.$filter.''; ?>">Order Status</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.room_type/'.$filter.'';?>">Room Type</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/designer.designer_name/'.$filter.'';?>">Assigned to</a></td><td>&nbsp;</td></tr>
<?php
foreach($adminrooms as $key)
{
    $key->Room_type=($key->Room_type=="BR"?"Bedroom":"Living room");
    echo'<tr style="text-align:left;"><td>'.$key->username.'</td><td>'.$key->Order_number.'</td><td>'.$key->Order_status.'</td><td><a href="'.base_url().'index.php/Admin/site/currentroomwithuser/'.$key->Order_number.'">'.$key->Room_type.'</a></td><td>'.$key->assigned_to.'</td><td><a href="'.base_url().'index.php/Admin/site/additional_details_user_room/'.$key->Order_number.'">Add/Update current Room Information:</a></td></tr>';
}
?>
</table>
</div>
<?php 
	//include(APPPATH.'/views/templates/footer.php');
?>
