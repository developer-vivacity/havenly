<?php 
	include(APPPATH.'/views/templates/header.php');
?>

 <div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
        <div class="container"> 
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		<a class="brand" href="<?php echo base_url();?>">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
              <li><a id = "servlink" href="<?php echo base_url().'/#services';?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url().'/#price'; ?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url().'/#goods';?>">Goods</a></li>
              <li><a id = "aboutlink" href="#">About</a></li>
              <li><a <a id = "contlink"href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
	  <BR><BR>



<br>
<div class = "chevron">
<div class = "container text-center">
<div class = "span6 offset3 center"><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
<p class = "sanslight medium">
Your new password information has been sent to the email we have on file.<br><BR><BR></p>
<?php
echo'<a class = "button3 third condensed midsmall" href="'.base_url().'index.php/Users/site/login">LOG IN</a>';
?><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
</div>
</div></div>
<div class = "push">
</div>
</div>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
