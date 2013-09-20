<?php 
	include(APPPATH.'/views/templates/header.php');
	
?>
<!---add script by kbs----------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js">
</script>
<!-- ACCOUNT TOP NAV -->
<div class="account-nav">
    <div class="account-nav-logo"><a href="<?php echo base_url();?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "100"></a></div>
    <div class="account-nav-left">
	<ul id="bstabs">
	<li>
	 <a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">Status</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Account</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Preferences</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Rooms</a></li>
	   <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">CONCEPT BOARDS</a></li>
	  
	  <?php if(sizeof($designforloginuser)>0)
	  {
           echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">SHOP</a></li>';
           }
	  ?>
 <li><a href="<?php echo base_url();?>/index.php/Contests/site/designer_availability/"  rel="designer">Designer Availability</a></li>	  	  
    </ul>
  </div><!-- nav left -->
  <div class="account-nav-right">
    <ul>
      <li><a href ="<?php echo base_url().'index.php/Users/site/logout/'; ?>">Logout</a></li>
    </ul>
  </div><!-- nav right -->
  <div class="nav-mobile">
    <ul id="list-pages-accordion">
      <li>
        <a href=""><img src=<?php echo base_url('theme/img/menu.png'); ?>></a>
        <ul id="bstabs" class="dropdownList">
		<li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=status"  rel="status">Current Status</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=designer"  rel="designer">Your Account</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=preferences"  rel="preferences">Your Preferences</a></li>
          <li><a href="<?php echo base_url();?>/index.php/Users/site/login?a=rooms"  rel="rooms">Your Rooms</a></li>
		   <li><a href="<?php echo base_url();?>/index.php/Concept/site/initial_concepts_for_user/"   rel="Concepts">Initial Concepts</a></li>
	 <?php 
		if(sizeof($designforloginuser)>0)
		{
		  echo '<li><a href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
		}
	?>
	<li><a href="<?php echo base_url();?>/index.php/Contests/site/designer_availability/"  rel="designer">Designer Availability</a></li>	  	  	
          <li><a href="<?php echo base_url().'index.php/Users/site/logout/';?>">Logout</a></li>
        </ul>
  </div><!-- nav-mobile -->
</div><!-- top nav -->
<div class = "white">
<BR><BR>
<div class = "container text-center">
<BR><BR>
<div class = "white">

 
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

<div class = "push"> 

</div><BR><BR><BR>
</div>

<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
