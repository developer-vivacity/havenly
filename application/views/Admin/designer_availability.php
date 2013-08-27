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

<div><h3>Designer availability:</h3></div>
<table style="height:150px;font:8px;vertical-align:text-top;" id="designercall">
	
<?php
   $dayofweek=array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
   $month=array('1'=>'Jan','2'=>'Feb','3'=>'Mar','4'=>'Apr','5'=>'May','6'=>'Jun','7'=>'Jul','8'=>'Aug','9'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
  for($dr=$startdate,$displaytime=$startdate,$_z=0;$dr<($startdate+24);$dr++,$displaytime++,$_z=1)
   {   
      $flage=0;
      if((($dr%12)==0)&($_z!=0)) 
       {
         $dateformat=($dateformat=="AM"?"PM":"AM"); 
         $currentday=($dateformat=="AM"?($currentday===$maxdays?1:++$currentday):$currentday);
         $weekday=($dateformat=="AM"?($numday==7?$dayofweek[1]:$dayofweek[++$numday]):$dayofweek[$numday]);
         $currentmonth=($currentday==1?($currentmonth==12?1:++$currentmonth):$currentmonth);
         $fullyear=($currentmonth==1?($fullyear+1):$fullyear);
       }
       if(!empty($selectdate))
       foreach($selectdate as $z_key=>$z_value)
       {
	      $matchtime=($dateformat=="PM"?((int)$displaytime+12):$displaytime);
	      if($matchtime==date('H',strtotime($z_value["time"])))  
               {
	      echo '<td><div><span id="d_'.$dr.'">'.$currentday.'</span><span id="m_'.$dr.'">'.$month[(int)$currentmonth].'</span><br/><span id="y_'.$dr.'">'.$fullyear.'</span><br/><span id="w_'.$dr.'">'.$weekday.'</span></div><div ><img src="'.base_url().'assets/Images/l.png" height="30px;" width="30px;" id="haveimg'.$dr.'" /><a href="#" id="hour'.$displaytime.''.$dateformat.'" onclick="designer_call(\''.$displaytime.'\',\''.$dateformat.'\',\'hour'.$displaytime.''.$dateformat.'\','.$dr.')" >'.date('h:i:s A',strtotime($z_value["time"])).'</a></div></td><td>&nbsp;&nbsp;</td>';	   
               $flage=1;
               }
       }
       if($flage==0)
       echo '<td><div><span id="d_'.$dr.'">'.$currentday.'</span><span id="m_'.$dr.'">'.$month[(int)$currentmonth].'</span><br/><span id="y_'.$dr.'">'.$fullyear.'</span><br/><span id="w_'.$dr.'">'.$weekday.'</span></div><div ><a href="#" id="hour'.$displaytime.''.$dateformat.'" onclick="designer_call(\''.$displaytime.'\',\''.$dateformat.'\',\'hour'.$displaytime.''.$dateformat.'\','.$dr.')" >'.$displaytime.'&nbsp;'.$dateformat.'</a></div></td><td>&nbsp;&nbsp;</td>';	   
       
       if(($dr%12)==0) 
       {
          $displaytime=0;
          
       }

   }
   echo '</tr>';
?>
</table>	

<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>"/>
<input type="hidden" name="designerid" id="designerid" value="<?php echo $designerid; ?>"/>
</div>
</div>


<?php
  

	include(APPPATH.'/views/templates/footer.php');
?>
