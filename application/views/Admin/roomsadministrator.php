<?php
//include(APPPATH.'/views/templates/header2.php');?>
<br/>
<br/>
<br/>
<br/>
<div >
<?php 
 echo '<a href="'.base_url('index.php/Admin/site/adminlogout').'">LogOut</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('index.php/Admin/site/adminlogin').'">Home</a>';
?>
<table border="1"  cellpadding="2" cellspacing="2" >
	<tr><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/users.email/'.$filter.''; ?>">User Name</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.id/'.$filter.''; ?>">Order Number </a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.status/'.$filter.''; ?>">Order Status</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.room_type/'.$filter.'';?>">Room Type</a></td><td><a href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/designer.designer_name/'.$filter.'';?>">Assigned to</a></td></tr>
<?php
foreach($adminrooms as $key)
{
    $key->Room_type=($key->Room_type=="BR"?"Bedroom":"Living room");
    echo'<tr style="text-align:left;"><td>'.$key->username.'</td><td>'.$key->Order_number.'</td><td>'.$key->Order_status.'</td><td>'.$key->Room_type.'</td><td>'.$key->assigned_to.'</td></tr>';

}
?>
</table>
</div>
<?php 
	//include(APPPATH.'/views/templates/footer.php');
?>
