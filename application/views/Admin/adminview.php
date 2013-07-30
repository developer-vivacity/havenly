<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<br/>
<br/>
<br/>
<br/>
<?php

if($privileges=='global'):?>


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
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
			   <li><a href="#">Order Tracker</a></li>
              <li><a href="#">Vendor Management</a></li>
              </ul>
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
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
			<ul class = "nav pull-right white_text">
			
			<li><a class = "white_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>

<?php endif; ?>

<div class = "container">
	<div class = "row">
		<div style="height:500px;">
		
	</div>
	</div></div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
