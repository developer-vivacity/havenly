<?php 

	include(APPPATH.'/views/templates/header.php');
	
?>
<!---add script by kbs-------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/designer_script.js">
</script>
<!---------------------------->
<style type="text/css" media="screen">
table{
border-collapse:collapse;
border:1px solid #858283;
text-align:center;
}
table td
{
border:1px solid #858283;
}
</style>
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
              <li><a id = "servlink" href="<?php echo base_url('#services');?>">Services</a></li>
              <li><a id = "pricelink" href="<?php echo base_url('#price');?>">Cost</a></li>
			      <li><a id = "goodslink" href="<?php echo base_url('#goods');?>">Goods</a></li>
              <li><a id = "aboutlink" href="<?php echo base_url('index.php/Users/site/whoweare');?>">About</a></li>
              <li><a <a id = "contlink"href="<?php echo base_url('#contact');?>">Contact</a></li>
            </ul>
			<ul class = "nav pull-right white_text">
			<li><a class = "white_text sanslight" href = "<?php echo base_url().'index.php/Users/site/logout/';?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  </div>
	  
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">
<div class = "text-center">
 <ul id = "bstabs" class = "nav nav-pills sanslight ">

<li ><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>
<?php
if($conceptboard[0]->total!=0):
?>
<li><a class = "pink white_text"  href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">Initial Concepts</a></li>
<?endif;?>
<?php 
if(sizeof($designforloginuser)>0)
{
echo '<li><a class = "pink white_text"  href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
}
?>
<li><a class = "pink white_text"  href="<?php echo base_url();?>/index.php/Users/site/login?a=status"   rel="status">Status</a></li>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Contests/site/designer_availability/"  >Designer Availability</a></li>
</ul>
</div>
</div>


<form action="<?php echo base_url();?>index.php/Contests/site/book_time/no"  name="designercall" method="post"  id="designercall">
<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>"/>
<div class="error"></div>
<table class = "table text-center" >
<?php
 $radio_id=1;

 if(!empty($designeravailability))
 {
	 $attach_div="";
	 $is_check="";
	

     if(sizeof($designercall)>0)
     {
      $attach_div= '<div style="position:absolute;" id="radiocircle"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div>';
      $is_check=   'checked';   
      $timeformat = date("M, d Y h:i a", strtotime($designercall[0]["time"]));
      echo '<tr><td class = "medium">'.$attach_div.'<input class = "top" type="radio" name="time" id="time'.$radio_id.'" value = "'.$designercall[0]["time"].'" onclick="display_circle(\'time'.$radio_id.'\');" '.$is_check.'/>&nbsp; &nbsp;'.$timeformat.'<BR></td></tr>';	
      $radio_id=++$radio_id;
     }
  
  foreach($designeravailability as $designkey=>$designvalue)
  {
     $timeformat = date("M, d Y h:i a", strtotime($designvalue["time"]));
     echo '<tr><td class = "medium"><input class = "top" type="radio" name="time" id="time'.$radio_id.'" value = "'.$designvalue["time"].'" onclick="display_circle(\'time'.$radio_id.'\');" />&nbsp; &nbsp;'.$timeformat.'<BR></td></tr>';	
     $radio_id=++$radio_id;	
  }
  echo'<tr><td><a class = "btn" id="selecttime" href="#" onclick="booktime();">Book This Time</a><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm/no').'">Just Email Me</a></td></tr>';
 }
 else
 {
  echo'<tr><td>Oops, no availability on that day - select another or just let our designer email you.</td></tr><Tr><td><a class = "btn" id="skip" href = "'.base_url('index.php/Contests/site/confirm/no').'">Just Email Me</a></td></tr>';	
	
 }
?>
</table>
<input type="hidden" id="datepick" name="datepick"/>

</form>

</div>
</div>
