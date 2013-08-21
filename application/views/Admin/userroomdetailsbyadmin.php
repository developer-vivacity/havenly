<?php 
	include(APPPATH.'/views/templates/header.php');
?>



<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/Scripts/concept_board.js" ></script>

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
<div class = "container">
<BR><BR><BR>
<div class = "midlarge serif gray_text padding canvas boxshadow">

Add Additional Notes<br></div>
<BR><BR>
<div id="alert alert-error div_show_error_message">

</div>
<?php

$querytype  = (sizeof($additionalroomdetails)==0?"insert":"update");
$attributes = array('class' => 'updateform', 'id' => 'updateform','enctype' => 'multipart/form-data');
echo form_open('Admin/site/additional_details_user_room/',$attributes);
echo '<input type="hidden" name="querytype" value="'.$querytype.'">';
echo '<input type="hidden" value="'.$roomid.'" name="roomid"/>';

?>

<?php 
$stylenotes="";
$ceilingheight="";
$hates="";
$likes="";
$keep="";
$buy="";
$checked="";
$sel="";
$byarray=array();
$buyitems=array('1'=>'Couch','2'=>'Coffee Table','3'=>'Bed','4'=>'Bed Frame/Headboard','5'=>'Art','6'=>'Chair','7'=>'Dresser','8'=>'Décor items','9'=>'Linens/Sheets','10'=>'Pillows','11'=>'Media','12'=>'Side Tables/Console Tables','13'=>'Nightstands','14'=>'Other');

foreach($additionalroomdetails as $key)
{
	$stylenotes=$key->Style_notes;
	$ceilingheight=$key->Ceiling_Height;
	$hates=$key->Hates;
	$likes=$key->Likes;
	$keep=$key->Keep;
	$buy=$key->Buy;

}

?>
<table class = "inline span6">
<tr><td width = "25%" class = "top">
<label class= "inline midsmall bottom" for "stylenotes">Designer Comments: </label></td><td>
<textarea rows = "5" cols = "100" value="'.$stylenotes.'" name="stylenotes" id="stylenotes">
<?php echo $stylenotes;?>
</textarea></td></tr>

<tr><td class = "top">
<label class= "inline midsmall top" for "hates">Dislikes: </label></td><td>
<textarea rows = "2" name = "hates" id = "hates">
<?php echo $hates;?>
</textarea></td></tr>

<tr><td class = "top">
<label class= "inline midsmall top" for "likes">Likes: </label></td><td>
<textarea rows = "2" name = "likes" id = "likes">
<?php echo $likes; ?>
</textarea></td></tr>
<tr><td class = "top">
<label class = "inline midsmall top" for "keep"> Keep: </label></td><td>
<textarea rows = "2" name = "keep" id = "keep">
<?php echo $keep; ?>
</textarea></td></tr>
<tr><td class = "top">
<label class = "inline midsmall top" for "ceilingheight"> Ceiling Height: </label></td><td>

<input type="text" value= "<?php echo $ceilingheight;?>" name="ceilingheight" id="ceilingheight"/>
</td></tr></table>

<table class = "inline span5">
<tr><td class = "top" width = "35%"><label class = "inline midsmall top" for "buy"> Buy: </label></td><td>
<?php 
foreach($buyitems as $key=>$value)
{
$sel="";
$byarray=explode(',',$buy);
if(in_array($key,$byarray))
$sel="checked";
  echo '<div class = "sanslight">
     <input type="checkbox" class = "padding" name="buy[]"  value="'.$key.'" '.$sel.'/>&nbsp;'.$value.'</div>';
  if($key==14)
  {
  $othervalue=($sel=="checked"?$byarray[sizeof($byarray)-1]:"");
  echo '<div><BR><input type="textbox" name="othervalue"  value="'.$othervalue.'" display="hidden" id="othervalue"/></div>';
  }
}
echo '<BR><BR>';
echo'<input type="button" class = "button3 sanslight" value="Save" name="addroominfo" id="addroominfo"/>';


echo '<input type="hidden" value="'.$roomid.'" name="itemsbuy" id="itemsbuy"/>';
echo form_close();
?>
</td></tr></table>
</div>

<BR><BR><BR>


<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
