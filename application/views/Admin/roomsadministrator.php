<?php
include(APPPATH.'/views/templates/header.php');
?>
<?php
if($privileges=='global'):
?>
<div class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container"> 
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
 </a>
		<a class="brand" href="#">HAVENLY</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url('index.php/Admin/site/adminlogin')?>">Admin Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			   <li><a href="#">Order Tracker</a></li>
              <li><a href="#">Vendor Management</a></li>
              </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<?php else:?>


 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator');?>">Rooms</a></li>
              <li><a>Designs</a></li>
			               </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<?php endif; ?>
<div class = "white">
<div class = "white container">
<BR><BR><BR><BR>

<div class = "midlarge serif gray_text padding canvas ">
Open Rooms<br></div>

<BR><BR>
<table class = "table sanslight table-hover" >
	<tr class = "midsmall sanslight gray_text">
	<td >Email Address<a class = "sanslight small black_text" href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/users.email/'.$filter.''; ?>">&nbsp; &darr;</a></td>
	<td>Order #<a class = "sanslight small black_text" href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.id/'.$filter.''; ?>">&nbsp; &darr; </a></td>
	<td>Status<a class = "sanslight small black_text" href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.status/'.$filter.''; ?>">&nbsp; &darr;</a></td>
	<td>Room Type<a class = "sanslight small black_text" href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/user_rooms.room_type/'.$filter.'';?>">&nbsp; &darr;</a></td>
	<td>Designer<a class = "sanslight small black_text" href="<?php echo base_url().'index.php/Admin/site/roomsadministrator/designer.designer_name/'.$filter.'';?>">&nbsp; &darr;</a></td>
	<td>&nbsp;</td>
	<!-----<td>&nbsp;</td>------>
	<td>&nbsp;</td>
	</tr>
<?php
foreach($adminrooms as $key)
{
         $key->Room_type=($key->Room_type=="BR"?"Bedroom":"Living room");
         echo'<tr style="text-align:left;">
         <td>'.$key->username.'</td>';
	echo '<td>'.$key->Order_number.'</td>
	<td>'.$key->Order_status.'</td>';
	echo '<td>'.$key->Room_type.'</td>
	<td>'.$key->assigned_to.'</td>';
	echo '<td><a class = "button1 boxshadow blue white_text" href="'.base_url().'index.php/Admin/site/currentroomwithuser/'.$key->Order_number.'">View Details</a></td>';
	echo '<td><a href="'.base_url().'index.php/Admin/site/designer_availability/'.$key->user_id.'/'.$key->designer_id.'">Designer  availability</a></a></td></tr>';
}
?>
</table>
</div>
<BR><BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
