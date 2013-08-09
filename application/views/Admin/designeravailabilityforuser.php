<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<!---add script by kbs-------->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/cart_design.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/user_validation.js">
</script>
<!---------------------------->
<style type="text/css" media="screen">
table{
border-collapse:collapse;
border:1px solid #858283;
text-align:center;
}
table td{
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

if(sizeof($designforloginuser)>0)
{
echo '<li><a class = "pink white_text"  href="'.base_url().'/index.php/Users/site/login?a=designs" rel="designs">YOUR DESIGNS</a></li>';
}
?>
<li><a class = "pink white_text" href="<?php echo base_url();?>/index.php/Users/site/display_designer_vailability/"  rel="designer">Designer Availability</a></li>
</ul>
</div>
</div>
<?php


		  if($currentyear%4)
		  {
		  $array_num_in_month=array('1'=>'31','2'=>'28','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'30');	  
		  }
		  else
		  {  
		  $array_num_in_month=array('1'=>'31','2'=>'29','3'=>'31','4'=>'30','5'=>'31','6'=>'30','7'=>'31','8'=>'31','9'=>'30','10'=>'31','11'=>'30','12'=>'30');
		  }
		 $array_week_day=array('1'=>'Sun','2'=>'Mon','3'=>'Tue','4'=>'Wed','5'=>'Thu','6'=>'Fri','7'=>'Sat');
		 $array_num_day=array('Sun'=>'1','Mon'=>'2','Tue'=>'3','Wed'=>'4','Thu'=>'5','Fri'=>'6','Sat'=>'7');
		
		 
		if($currentday>7)
		$currentday=$currentday%7;
		elseif($currentday==7)
	         {
		$currentday=0;	
		}
		elseif($currentday!=1)
		$currentday=$currentday-($currentday-1);
		$day=$array_num_day[date('D')]-($currentday-1);
		echo '<input type="hidden" id="start_month" name="start_month" value="'.$day.'"/>';
		 ?>
		 <table width="700px" height="200px" >
		<tr><td colspan="5" ><div id="curyear"><?php echo $currentyear;?></div></td><td colspan="5" ><div id="curmonth"><?php echo $currentmonth;?></div></td></tr>
		 <tr><td width="50px">&nbsp;</td><td><div style="width:77px;">Time</div></td><td width="87px">Sun</td><td width="87px">Mon</td><td width="87px">Tue</td><td width="87px">Wed</td><td width="87px">Thur</td><td width="87px">Fri</td><td width="87px">Sat</td><td width="50px">&nbsp;</td></tr>
		  <tr><td>&nbsp</td>
		  <td colspan="8" id="design_day" width="600px" height="275px"><table  width="100%" height="100%">
		  <?php
		 $displaytime="";		
		 $flage=false;
		 for($z=1;$z<=(31+$day);$z++)
		 {

                          $num=$z-($day-1);
                          
						  foreach($selectdate as $key)
	                                                 {
                                                     if($key->day==$num)
						    {						
						    $flage=true;
							
							$displaytimeid=(int)$num.(int)$currentmonth.(int)$currentyear;

$displaytime=($displaytime==""?'<div id=di_ti'.$displaytimeid.'>'.$key->start_time.'&nbsp;to&nbsp;'.$key->end_time.' </div>':$displaytime.'<div id=di_ti'.$displaytimeid.'>'.$array_week_day[$key->week_day].':'.$key->start_time.'</div>');
	
	
							break;
						    }
						    else
						    $flage=false;
						  }		
						  if($z%7==1)
                                                        {$dd=0;
                                                        $a_z=$z;
		     echo'<tr><td width="75px" valing="top"><div style="width:5px;font-size:12px;" id="designertime'.$a_z.'">&nbsp;</div></td>';
	                                               }
                                                       if($z>=$day)
                                                      {
		                
		                                      $currentmonth=(int)$currentmonth;
                          if($num<=$array_num_in_month[$currentmonth])
                          {
                          $dd=$dd+1;
                          $makeid=$num.$dd.$currentyear.$currentmonth;
                          echo($flage==true?'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'.$makeid.'"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div><span href="#"  id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</span></td>':'<td id="lol'.$num.'"><span href="#"  id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</span></td>');
						  
						  
	                 }
                     else
                     echo'<td></td>';
	                 }
                     else
                          {
                          echo'<td></td>';
	                      }
                          if($z%7==0)
                          {
						  echo '</tr>';
						 echo'<script>
						 
	 document.getElementById("designertime'.$a_z.'").innerHTML="'.$displaytime.'"</script>';
						 $displaytime="";
						  }
		}
		
		 ?></table></td><td></td>
		 </tr>
		 </table>






</div>
</div>
