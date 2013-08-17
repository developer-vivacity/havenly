<?php 
	include(APPPATH.'/views/templates/header.php');
?>
 <script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/designer_script.js"></script>
<style type="text/css" media="screen">
table
{
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
		<a class="brand" href="#">Havenly</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="<?php echo base_url('index.php/Admin/site/roomsadministrator')?>">Rooms</a></li>
              <li><a>Designs</a></li>
	 </ul>
			<ul class = "nav pull-right black_text">
			
			<li><a class = "black_text sanslight" href = "<?php echo base_url('index.php/Admin/site/adminlogout');?>">LOGOUT</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
<div class = "white">
<br/>
<br/>
<br/>
<br/>
<div class = "container">
<div style="position:absolute;background-color:#F2EDEF;opacity:0.9;width:800px;height:320px;display:none;z-index:1000;margin-top:30px;" id="availability_time">
         		<div style="float:right;"><img src="../../../../../assets/Images/delicon.fw.png" onclick="hide_div('availability_time',<?php echo $userid ?>,<?php echo $designerid; ?>)"/></div>	 
	<table style="margin-left:150px;margin-top:100px;">
	<tr><td colspan="3"><div id="date_time_error"></div></td></tr>
		<tr><td>&nbsp;</td><td>Hour</td><td>Minute</td></tr>
	<tr><td>Start Time:</td><td><select id="startdesignerhour" name="startdesignerhour">
	<?php
	for($h=1;$h<=24;$h++)
	{
		echo '<option  value="'.$h.'">'.$h.'</option>';
	}
	?>
	</select>
	</td><td><select id="startdesignerminute" name="startdesignerminute">
	<?php
	for($m=1;$m<=59;$m++)
	{echo '<option value="'.$m.'">'.$m.'</option>';
	}
	?>
	</select>
</td></tr>
<tr><td>End Time:</td><td>
<select id="enddesignerhour" name="enddesignerhour">
	<?php
	for($h=1;$h<=24;$h++)
	{
	echo '<option  value="'.$h.'">'.$h.'</option>';
	}
	?>
	</select>
</td><td><select id="enddesignerminute" name="enddesignerminute">
	<?php
	for($m=1;$m<=59;$m++)
	{echo '<option value="'.$m.'">'.$m.'</option>';
	}
	?>
	</select></td></tr>
	<tr><td colspan="3"><a href="#" onclick="availability_with_time(<?php echo $userid; ?>,<?php echo $designerid; ?>);">Submit</a></tr>
	</table>
	
	</div>
		 <?php
		
		
echo'<input type="hidden" value="'.(int)$currentyear.'" name="presentyear" id="presentyear">';
echo '<input type="hidden" value="'.(int)$currentmonth.'" name="monthofyear" id="monthofyear">';
echo '<input type="hidden" value="'.(int)$currentday.'" name="dayofmonth" id="dayofmonth">';


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
		
		$dateofmonth=$currentday;
		
		if((int)$currentday>7)
		{
		$currentday=$currentday%7;
	         $day=$array_num_day[date('D')]+(7-$currentday)+1;
	         }
	         elseif((int)$currentday==7)
	         {
		$currentday=0;	
		$day=$array_num_day[date('D')]+(7-$currentday)+1;
		}
		elseif((int)$currentday<7)
		{
		
		$day=$array_num_day[date('D')]+(7-$currentday)+1;
		}
                  
		echo '<input type="hidden" id="start_month" name="start_month" value="'.$day.'"/>';
		 ?>
		 <p><b>Designer availability</b></p>
		 <table width="800px" height="200px" >
		<tr><td colspan="5" ><div id="curyear"><?php echo $currentyear;?></div></td><td colspan="5" ><div id="curmonth"><?php echo $currentmonth;?></div></td></tr>
		 <tr><td width="50px"><a href="#" id="Prev_dis">Prev&nbsp;&nbsp;</a></td><td><div style="width:77px;">Time</div></td><td width="87px">Sun</td><td width="87px">Mon</td><td width="87px">Tue</td><td width="87px">Wed</td><td width="87px">Thu</td><td width="87px">Fri</td><td width="87px">Sat</td><td width="50px"><a href="#" id="Next_dis">Next</a></td></tr>
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
                         
                           if($dateofmonth<=$num)
                            {
                               echo($flage==true?'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'.$makeid.'" onclick="remove_check('.$userid.','.$designerid.','.$num.','.$dd.','.$currentyear.','.$currentmonth.')"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div>
                               <a href="#" onclick="insertTime('.$num.','.$dd.','.$currentyear.','.$currentmonth.','.$makeid.','.$a_z.');" id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</a></td>':'<td id="lol'.$num.'">
                               <a href="#" onclick="insertTime('.$num.','.$dd.','.$currentyear.','.$currentmonth.','.$makeid.','.$a_z.');" id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</a></td>');
			}
			else
			{
			    echo($flage==true?'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'.$makeid.'" ><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div>
                               <span   id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</span></td>':'<td id="lol'.$num.'">
                               <span   id="checkdate'.$num.$dd.$currentyear.$currentmonth.'">'.$num.'</span></td>');			  
		          }	
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
		<?php
		
   echo '<input type="hidden" name="forNextday" id="forNextday" value="'.$dd.'"/>'	;	 
   echo '<input type="hidden" name="currentday" id="currentday" value="'.$currentday.'"/>';
   echo '<input type="hidden" name="currentyear" id="currentyear" value="'.$currentyear.'"/>';
   echo '<input type="hidden" name="currentmonth" id="currentmonth" value="'.$currentmonth.'"/>';
   echo '<input type="hidden" name="userid" id="userid" value="'.$userid.'"/>';
    echo '<input type="hidden" name="designerid" id="designerid" value="'.$designerid.'"/>';
   echo '<input type="hidden" name="baseurl" id="baseurl" value="'.base_url().'"/>';
           ?> 
		 </div>
	 </div>


<?php
  

	include(APPPATH.'/views/templates/footer.php');
?>
