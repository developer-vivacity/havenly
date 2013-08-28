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
	  <div class = "canvas">
	  
	  
	  
<div class = "container">
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
	
	echo '<div class= "span11 well blue white_text">';
	echo '<div class = "span6 midsmall Condensed">';
	echo 'UPDATE STATUS &nbsp;';
	echo '<select class = "small " name="update_room_status" id="update_room_status">';

	foreach($roomstatus as $statuskey=>$statusvalue)
	{
	   $select=($key->status==$statusvalue?"selected":"");
	   echo '<option value="'.$statusvalue.'" '.$select.'>'.$statusvalue.'</option>';
		
	}
	
	echo '</select>&nbsp;&nbsp;<input type="submit" class = "button2 condensed blue_text white" value="Update"></div></div>';
	
?>

<div class = "span3 canvas">
<ul id = "bstabs" class = "nav sanslight">
<li><a class = "gray_text" href="#CurrentUser"  rel="CurrentUser">User Information</a></li>
<li><a class = "gray_text" href="#CurrentRoom"  rel="CurrentRoom">Room Information</a></li>
<li><a class = "gray_text" href="#currentref"  rel="currentref">Style Selections</a></li>
<li><a class = "gray_text" href="#conceptboard"  rel="conceptboard">Initial Concept Responses</a></li>
<li><a class = "gray_text" href="#productdesign" rel="productdesign">View/Add Design Responses</a></li>
</ul>
<BR></div>
<div class = "span8 white padding boxshadowleft">
<?php

foreach($roomwithuser as $key){
	echo '<div class= "padding">';
	echo '<table id="CurrentUser" class="adminmain" >';
	
	echo '<tr><td><i class = "icon-user"></i></td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	echo '<tr><td><i class = "icon-comment"></i></td><td>'.$key->phone.'</td></tr>';
	echo '<tr><td><i class = "icon-envelope"></i></td><td>'.$key->email.'</td></tr>';
	echo '<tr><td><i class = "icon-home"></i></td><td>'.$key->address.'</td></tr>';
	echo '<tr><td><i class = "icon-home"></i></td><td>'.$key->zipcode.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/instaicon.png').' height = 15px></td><td>'.$key->instagram.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/fblarge.png').' height = 15px></td><td>'.$key->facebook.'</td></tr>';
	echo '<tr><td><img src = '.base_url('assets/Images/pinlarge.png').' height = 15px></td><td>'.$key->pinterest.'</td></tr>';
	echo '</table>';
	
	// Room Information
	
	echo '<table id="CurrentRoom" class="adminmain span4" style="display:none;">';
	echo '<tr><td width = "100%" class = "sanslight gray_text midsmall">ROOM TYPE</td></tr>';
	echo '<tr><td class = "sanslight small">'.$key->room_type.'</td></tr>';
		echo '<tr><td>&nbsp;</td></tr>';
   	echo '<tr><td class = "sanslight gray_text midsmall">WIDTH/LENGTH</td></tr>';
	echo '<td class = "sanslight small">'.$key->width.'ft/'.$key->height.'ft</td></tr>';
	echo '<tr><td>&nbsp;</td></tr>';
	echo '<tr class = "top"><td class = "sanslight gray_text midsmall">WHAT SHE SAYS</td></tr>';
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
	foreach($roompicture as $roompickey)
	{
	  echo '<div><img src="'.$roompickey->filename.'" height="200px"/></div>';	
		
	}
	if(sizeof($roompicture)==0)
	echo "No pictures uploaded";
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
<?php
if(sizeof($designassociaterooms)>0)
 {
?>
<?php
echo '<div class = "well midsmall" >';
echo '<table>';
foreach($designassociaterooms as $key)
{
	
	echo '<tr><td width = "80%" id="displaydesignname_'.$key->design_id.'"><a href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.$key->design_name.'/'.$roomid.'/'.$currentuserid.'">&nbsp;&nbsp;'.$key->design_name.'</a></td><td><a class = "small" href="'.base_url().'index.php/Cart/site/delete_assign_design/'.$currentuserid.'/'.$currentroomid.'/'.$key->design_id.'/admin" >Delete</a></td></tr>';
}
?>
</table>
</div>
<?php
}
?>
<table id="roomdesignname">
<tr><td colspan="6" id="textmessage">&nbsp;</td></tr>
<tr><td class = "condensed" colspan="6">&nbsp;ADD A DESIGN &nbsp;</td><td>
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

</div>
<BR><BR><BR><BR><BR><BR><BR>
</div></div>
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
		$("#roomdesignname").before('<div class = "padding" style="position:absolute;width:600px;height:200px;z-index:100;background-color:gray;opacity:0.9;"><div id="inputcomment"><div><p class = "white_text">Add Design Notes:<BR><br></p><textarea name="designer_notes" id="designer_notes" cols= "50"></textarea></div><div ><input class = "button2 sanslight pink white_text" type="button" value="submit" onclick="submit_designer_comment();"/></div><input type="hidden" name="designroomid" value="'+roomid+'"><input type="hidden" name="designuserid" value="'+$("#userid").val()+'"></div>');
            
             }

}
function submit_designer_comment()
{
	   $(".error").remove();
	   if($("#designer_notes").val().trim()=="")
	   $("#inputcomment").before("<div style='float:right;color:white;' class='error'>Enter Comment!</div>");
	   else
	   $("#designeform").submit();
}

</script>
<BR><BR><BR>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
