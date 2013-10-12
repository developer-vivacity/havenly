<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/jquery-1.9.js" ></script>
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
	<a class="brand" href="<?php echo base_url();?>">Havenly</a>
         <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href = "<?php echo base_url();?>">Home</a></li>
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
	  
	  
	  
<BR><BR><BR>
<?php
$style_pics="";
$color_pics="";
$roomtype="";
$optionroomfolder="";
$otherroom_type="";
$choosebyitems="";
$buyitems=array();
$checktitems=array();
$currentroomid="";
$currentuserid="";

foreach($roomwithuser as $key)
{
    
    $currentroomid=$key->id;
         
    $currentuserid= $key->user_id;        
         
    $roomtype=$key->room_type;	
	
	$key->room_type = ($key->room_type=="BR"?"Bedroom":"LivingRoom");
	
	$optionroomfolder=$key->room_type;
	
	$otherroom_type=($roomtype=="BR"?"LR":"BR");
	
	$otherroom_folder=($optionroomfolder=="LivingRoom"?"Bedroom":"LivingRoom");
}	

$attributes = array('class' => 'updateform', 'id' => 'updateform');

	echo form_open('Admin/site/update_room_status_by_admin/',$attributes);
	
	echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
	echo '<input type="hidden" name="userroomid" id="userroomid" value="'.$currentroomid.'"/>';
	echo '<input type="hidden" name="userid" id="userid" value="'.$currentuserid.'"/>';

	$roomstatus=array("OPEN" , "CALLED", "DESIGN", "MOODBOARD REVIEW", "FINAL DESIGN", "ORDER", "CLOSED");
	
	echo '<div class= "span12 well blue white_text">';
	echo '<div class = "span10 midsmall Condensed">';
	echo '<p class = "condensed medium white_text">CHANGE ROOM STATUS</p><hr class = "white">';
	// echo 'UPDATE STATUS &nbsp;';
	echo '<select class = "small " name="update_room_status" id="update_room_status">';

	foreach($roomstatus as $statuskey=>$statusvalue)
	{
	   $select=($key->status==$statusvalue?"selected":"");
	   echo '<option value="'.$statusvalue.'" '.$select.'>'.$statusvalue.'</option>';
		
	}
	
	echo '</select>&nbsp;&nbsp;<textarea id="uprc" name="statuscomment">We have changed your room status!</textarea><input type="submit" class = "button2 condensed blue_text white" value="Update" id="uprs"></div></div>';
	
?>
<div class = "">
<div class = "span3 ">
<ul id = "bstabs" class = "nav sanslight">
<li><a class = "gray_text" href="#CurrentUser"  rel="CurrentUser">User Information</a></li>
<li><a class = "gray_text" href="#CurrentRoom"  rel="CurrentRoom">Room Information</a></li>
<li><a class = "gray_text" href="#currentref"  rel="currentref">Style Selections</a></li>
<li><a class = "gray_text" href="#moreinformation" rel="moreinformation">Add More Information</a></li>
<li><a class = "gray_text" href="#conceptboard"  rel="conceptboard">Initial Concept Responses</a></li>
<li><a class = "gray_text" href="#productdesign" rel="productdesign">View/Add Design Responses</a></li>

</ul>
<BR></div>
<div class = "span9 white padding boxshadowleft">
<?php
    
   $roomupdate=($curdisplay=='urd'?'block':'none');
   $userinfo=  ($roomupdate=='block'?'none':'block');
  
foreach($roomwithuser as $key)
{
	echo '<div class= "padding" >';
	echo '<table id="CurrentUser" class="adminmain condensed small gray_text" style="display:'.$userinfo.';">';
	echo '<tr><td><img src = '.base_url('assets/Images/icon-user.png').' height = 15px></td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/icon-phone.png').' height = 15px></i></td><td>'.$key->phone.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/icon-email.png').' height = 15px></td><td>'.$key->email.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/icon-home.png').' height = 15px></td><td>'.$key->address.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/icon-home.png').' height = 15px></td><td>'.$key->zipcode.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/instaicon.png').' height = 15px></td><td>'.$key->instagram.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/fblarge.png').' height = 15px></td><td>'.$key->facebook.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/pinlarge.png').' height = 15px></td><td>'.$key->pinterest.'</td></tr>';
	echo '</table>';
	
	// Room Information
	
	echo '<table id="CurrentRoom" class="adminmain span4" style="display:'.$roomupdate.';">';
	echo '<tr><td width = "100%" class = "sanslight gray_text midsmall">ROOM TYPE</td></tr>';
	echo '<tr><td class = "sanslight small">'.$key->room_type.'</td></tr>';
	echo '<tr><td>&nbsp;</td></tr>';
   	echo '<tr><td class = "sanslight gray_text midsmall">WIDTH/LENGTH</td></tr>';
	echo '<td class = "sanslight small">'.$key->width.'ft/'.$key->height.'ft</td></tr>';
	echo '<tr><td>&nbsp;</td></tr>';
	echo '<tr class = "top"><td class = "sanslight gray_text midsmall">WHAT S/HE SAYS</td></tr>';
	echo '<tr><td class = "sanslight small">'.$key->about.'</td></tr>';
	echo '<tr><td>&nbsp;</td></tr>';

        
        $buyitems=array('1'=>'Couch','2'=>'Coffee Table','3'=>'Bed','4'=>'Bed Frame/Headboard','5'=>'Art','6'=>'Chair','7'=>'Dresser','8'=>'Décor items','9'=>'Linens/Sheets','10'=>'Pillows','11'=>'Media','12'=>'Side Tables/Console Tables','13'=>'Nightstands','14'=>'Other');
        $style_pics=$key->style_pics;    
        $color_pics=$key->color_pics; 

       if(isset($userroomdetails))
      
      foreach($userroomdetails as $key)
      {

        echo'<tr><td>STYLE NOTES</td></tr><tr><td class = "sanslight small">'.$key->Style_notes.'</td></tr>';	
        echo'<tr><td>CEILING HEIGHT</td></tr><tr><td class = "sanslight small">'.$key->Ceiling_Height.'</td></tr>';	
        echo'<tr><td>HATES</td></tr><tr><td class = "sanslight small">'.$key->Hates.'</td></tr>';	
        echo'<tr><td>LIKES</td></tr><tr><td class = "sanslight small">'.$key->Likes.'</td></tr>';		
        echo'<tr><td>KEEP</td></tr><tr><td class = "sanslight small">'.$key->Keep.'</td></tr>';
        echo'<tr><td valign="top">BUY</td></tr><tr><td class = "sanslight small">';

        $checktitems=explode(',',$key->Buy);
      foreach($buyitems  as $newkey=>$newvalue)
      {
	  if(in_array($newkey, $checktitems))
	  { 
	    $choosebyitems=($newkey==14?$checktitems[sizeof($checktitems)-1]:$newvalue);
             echo '<div>'.$choosebyitems.'</div>';
           }
	   
      }
       echo '</td></tr>';	
          
}
	
 //-------embded video and picture by kbs------------> 
       echo '<tr><td>&nbsp;</td></tr>';
	
       echo '<tr><td class = "sanslight gray_text midsmall">ROOM PICTURES</td></tr>';
       echo  '<tr><td>';
	
	if(sizeof($roompicture)==0)
	{
	echo "No pictures uploaded";
	}
	else
	{
	foreach($roompicture as $roompickey)
	{
	  echo '<div><img src="'.$roompickey->filename.'" height="200px"/></div>';	
		
	}}
	
	
	echo'</td></tr><tr><td class = "sanslight gray_text">VIDEOS</td><td>';
	foreach($roomvedio as $roomvediokey)
	{
	 echo '<div style="width:400px;float:right;">
	     <iframe id="video" width="100%" height="315" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="'.$roomvediokey->filename.'">
	     </iframe>
	   </div>';
	 }
	 if(sizeof($roomvedio)==0)
	echo "";
	 echo'</td></tr>';
	//=======end embded video and picture by kbs=============//
	echo '</table>
         </div>';
       
 }
?>
<?php
 echo form_close(); 
?>
<table id="currentref" class="adminmain" style="display:none;">
<tr><td>STYLE PICTURES</td></tr>
<tr>
<td>
         <?php 
	$style_pics= explode(',',$style_pics);
	$i=0;
	while($i<sizeof($style_pics)-1):
	$imgurl=base_url('assets/Images/'.$optionroomfolder.'/'.$roomtype.''.$style_pics[$i].'.jpg');
	?>
	<div style="float:left;"><img src="<?php echo $imgurl;?>" height="200px"/></div>
	<?php
         $i=$i+1;
	endwhile;
         ?>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>COLORS</td></tr>
<tr>
<td>
<?php
$color_pics=explode(',',$color_pics);
foreach($colorstyle as $key):
if(in_array($key->color_id,$color_pics))
echo'<div style ="height:100px;float:left;width:100px;background-color:'.$key->color_code.';">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
?>
<?php
endforeach;
?>
</td>
</tr>
</table>
<!--------Concept Board Module---------->
<form  enctype="multipart/form-data" method="post" id="conceptboard" class="adminmain">
 <table id="displayconceptimg" width = "100%">
 <tr><td class = "text-center">UPLOAD CONCEPT BOARD<br>Upload an image of a concept board for review by client<BR><BR></td></tr><tr>
 <td><input type="file" name="imageUpload" id="imageUpload" /><div id="mestatus"></div></td><td>&nbsp;</td>
 </tr>
 <?php

  foreach($conceptboard as $conceptkey)
 {

   $comment=($conceptkey->comments!=""?$conceptkey->comments:'&nbsp;');
   if((string)$conceptkey->status!="0") 

  echo '<tr id="conceptrow'.$conceptkey->concept_id.'"><td><img src="'.$conceptkey->filename.'" height="100px" width="100px"></td><td id="conceptcol'.$conceptkey->concept_id.'"><input type="button" class = "button2 pink white_text" value="Archive" onclick="concept_confirmation(1,'.$currentroomid.','.$conceptkey->concept_id.');"/><input type="button" class = "button2 pink white_text" value="Delete &nbsp;" onclick="concept_confirmation(0,'.$currentroomid.','.$conceptkey->concept_id.');"/></td></tr><tr id="conceptcomment'.$conceptkey->concept_id.'"><td>USER COMMENTS<BR>'.  wordwrap($comment,20,'<br/>').'<BR><BR></td></tr>';	 

 }
 ?>
 </table>
</form>

<!-------------------------------------->
<?php

     echo '<div id="productdesign" class="adminmain" style="display:none;">';
     $attributes = array( 'id' => 'designeform','method'=>'post');
     echo form_open('Admin/site/Add_Design_For_Room/',$attributes);
?>

<table id="roomdesignname">
<tr><td colspan="6" id="textmessage">&nbsp;</td></tr>
<tr><td class = "condensed" colspan="6">&nbsp;ADD A NEW DESIGN &nbsp;</td><td>
	<?php
             $data = array('name' => 'AddDesigntext','id'  => 'AddDesigntext',
              'value'       => 'Design Name',
              'maxlength'   => '100',
              'size'        => '10'
            );
         echo form_input($data);
?>
	
	</td>
	<td>
   <?php
	 $data = array(
	     'type'=>'button',
	     'class'=>'button2 condensed',	
              'name'        => 'NewDesign',
              'id'          => 'NewDesign',
              'value'       => 'Go',
              'onClick'    =>  'show_add_design('.$roomid.')'
            );

          echo form_input($data);?>
	
	</td></tr>

</table>
<?php
echo form_close();
?>

<?php
if(sizeof($designassociaterooms)>0)
 {
?>
<?php

  echo '<div class = "well small" >';
  echo '<table>';
  echo '<tr class = "text-center"><p class = "medium condensed">EXISTING DESIGNS</p><hr></tr>';
  $count = 0;
  foreach($designassociaterooms as $key)
  {
	$count = $count+1;
	echo '<tr><td width = "80%" id="displaydesignname_'.$key->design_id.'"><a class = "gray_text" href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.rtrim(base64_encode($key->design_name),'=').'/'.$roomid.'/'.$currentuserid.'">&nbsp;&nbsp;'.$count.'.&nbsp; &nbsp;'.$key->design_name.'</a></td><td><a class = "small" href="'.base_url().'index.php/Cart/site/delete_assign_design/'.$currentuserid.'/'.$currentroomid.'/'.$key->design_id.'/admin" >Delete</a></td></tr>';
  }
  
?>
</table>
</div>
<?php
}
?>

</div>
<!----------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---------------------------------------------->
<!------------Add More Information In Room ----------------------------------------------->
<!----------@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@---------------------------------------------->

<BR><BR><BR>
<div id="moreinformation" class="adminmain" style="display:none;">


<div id="alert alert-error div_show_error_message">

</div>
<?php
$querytype  = (sizeof($additionalroomdetails)==0?"insert":"update");
$attributes = array('class' => 'addaditionnotesform', 'id' => 'addaditionnotesform','enctype' => 'multipart/form-data');
echo form_open('Admin/site/currentroomwithuser/',$attributes);
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
</td></tr></table></div>
<BR><BR><BR><BR><BR><BR><BR>
</div>

</div>
<script>
$("#AddDesigntext").click(function(){
	
$("#AddDesigntext").val("");	
	})
$("#AddDesigntext").blur(function()
{
    if($("#AddDesigntext").val()=="")
    $("#AddDesigntext").val("Design Name");		
	
})	
function show_add_design(roomid)
{	
	    $("#enterdesign").remove();
	
	    if($("#AddDesigntext").val().trim()=="" || $("#AddDesigntext").val().trim()=="Design Name")
             {             
             $("#textmessage").html('<p id="enterdesign" class = "alert alert-error">Enter a Name for the Design</p>');
             }            
             else
             {
             var designid="null"; 
			if($("#roomdesignname").length!=0)
					{
					 $(".alert alert-error").remove();
					 $("#designeform").submit();
					 }
             }

}




</script>
<BR><BR><BR><BR><BR>

<div style = "clear: both;">
<BR><BR><BR><BR>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
