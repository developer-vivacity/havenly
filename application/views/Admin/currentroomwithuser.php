<?php 
	include(APPPATH.'/views/templates/header.php');
?>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/admin_script.js"></script>

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

	$roomstatus=array("Open" , "Called", "Design", "Moodboard Review", "Final Design", "Order", "Closed");
	
	echo '<div class= "row">';
	echo '<div class = "span6 medium sanslight">';
	echo 'Update Room Status: &nbsp;';
	echo '<select class = "small sanslight" name="update_room_status" id="update_room_status">';

	foreach($roomstatus as $statuskey=>$statusvalue)
	{
	   $select=($key->status==$statusvalue?"selected":"");
	   echo '<option value="'.$statusvalue.'" '.$select.'>'.$statusvalue.'</option>';
		
	}
	
	echo '</select>&nbsp;&nbsp;<input type="submit" class = "btn" value="Update"><BR><BR></div></div>';
	
?>


<ul id = "bstabs" class = "nav nav-pills sanslight ">
<li ><a class = "pink white_text" href="#CurrentUser"  rel="CurrentUser">User Information</a></li>
<li><a class = "pink white_text" href="#CurrentRoom"  rel="CurrentRoom">Room Information</a></li>
<li><a class = "pink white_text" href="#currentref"  rel="currentref">Style Selections</a></li>
<li><a class = "pink white_text" href="#productdesign" rel="productdesign">View/Add Design Responses</a></li>
</ul>
<BR>
<?php

foreach($roomwithuser as $key){
	echo '<div class = "span10">';
	echo '<table id="CurrentUser" class="adminmain table" >';
	
	echo '<tr><td>User Name</td><td>'.$key->first_name.'&nbsp;'.$key->last_name.'</td></tr>';
	echo '<tr><td>User Phone</td><td>'.$key->phone.'</td></tr>';
	echo '<tr><td>User Email</td><td>'.$key->email.'</td></tr>';
	echo '<tr><td>User Address</td><td>'.$key->address.'</td></tr>';
	echo '<tr><td>Zipcode</td><td>'.$key->zipcode.'</td></tr>';
	echo '<tr><td>Instagram</td><td>'.$key->instagram.'</td></tr>';
	echo '<tr><td>Facebook</td><td>'.$key->facebook.'</td></tr>';
	echo '<tr><td>Pinterest</td><td>'.$key->pinterest.'</td></tr>';
	echo '</table>';
	
	echo '<table id="CurrentRoom" class="adminmain" style="display:none;">';
	echo '<tr><td class = "sanslight medium">Room Type:</td><td class = "sanslight medium">'.$key->room_type.'</td></tr>';
         echo '<tr><td>&nbsp;</td></tr>';
	echo '<tr><td class = "sanslight medium">Width/Height:</td><td class = "sanslight medium">'.$key->width.'ft/'.$key->height.'ft</td></tr>';
	echo '<tr><td colspan="2">&nbsp;</td></tr>';
	echo '<tr class = "top"><td class = "sanslight medium">About the Room:</td><td class = "sanslight small">'.$key->about.'</td></tr>';
	
	echo '<tr><td colspan="2">&nbsp;</td></tr>';
	echo '<tr><td ><img src="'.$key->room_photo1.'" height="300px" /></td>';
	echo '<td><img src="'.$key->room_photo2.'" height="300px" /></td></tr>';
	
	$buyitems=array('1'=>'Couch','2'=>'Coffee Table','3'=>'Bed','4'=>'Bed Frame/Headboard','5'=>'Art','6'=>'Chair','7'=>'Dresser','8'=>'Décor items','9'=>'Linens/Sheets','10'=>'Pillows','11'=>'Media','12'=>'Side Tables/Console Tables','13'=>'Nightstands','14'=>'Other');
        $style_pics=$key->style_pics;    
        $color_pics=$key->color_pics; 

       if(isset($userroomdetails))
      foreach($userroomdetails as $key)
     {

        echo'<tr><td>Style notes:</td><td>'.$key->Style_notes.'</td></tr>';	
        echo'<tr><td>Ceiling Height:</td><td>'.$key->Ceiling_Height.'</td></tr>';	
        echo'<tr><td>Hates:</td><td>'.$key->Hates.'</td></tr>';	
        echo'<tr><td>Likes:</td><td>'.$key->Likes.'</td></tr>';		
        echo'<tr><td>Keep:</td><td>'.$key->Keep.'</td></tr>';
        echo'<tr><td valign="top">Buy:</td><td>';

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
	
        //-------embded vedio and picture by kbs------------> 
	echo '<tr><td colspan="2">&nbsp;</td></tr>';
	
	echo '<tr><td class = "sanslight medium">Room Pictures:</td><td class = "sanslight medium">User Videos:</td></tr>';
	echo  '<tr><td  style="vertical-align:top;">';
	foreach($roompicture as $roompickey)
	{
	  echo '<div><img src="'.$roompickey->filename.'" height="200px" width="300px"/></div>';	
		
	}
	if(sizeof($roompicture)==0)
	echo "No Room Pictures Uploaded By User";
	echo'</td><td>';
	foreach($roomvedio as $roomvediokey)
	{
	 echo '<div style="width:600px;float:right;">
	     <iframe id="video" width="100%" height="315" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="'.$roomvediokey->filename.'">
	     </iframe>
	   </div>';
	 }
	 if(sizeof($roomvedio)==0)
	echo "No Room Vedio Uploaded By User";
	 echo'</td></tr>';
	//=======end embded vedio and picture by kbs=============//
	echo '</table>
         </div>';
  
  
       
 }
?>
<?php
 echo form_close(); 
?>

<table id="currentref" class="adminmain table" style="display:none;">
<tr><td>Style Pictures:</td></tr>
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
<tr><td>Color Pictures:</td></tr>
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
<?php
echo '<div id="productdesign" class="adminmain" style="display:none;">';
?>
<?php
if(sizeof($designassociaterooms)>0)
 {
?>
<?php
echo '<div class = "well midsmall">';
foreach($designassociaterooms as $key)
{
	echo '<div id="displaydesignname_'.$key->design_id.'"><div style="float:left;"><a href="'.base_url().'index.php/Admin/site/display_product_name_associate_with_design/'.$key->design_id.'/'.$key->design_name.'/'.$roomid.'/'.$currentuserid.'">&nbsp;&nbsp;'.$key->design_name.'</a></div><div style="float:left;margin-left:100px;"><a href="'.base_url().'index.php/Cart/site/delete_assign_design/'.$currentuserid.'/'.$currentroomid.'/'.$key->design_id.'/admin" >Delete</a></div></div>';
	echo '<BR>';
}
?>

</div>
<?php
}
?>
<table>
<tr><td colspan="4" id="textmessage">&nbsp;</td></tr>
<tr><td class = "sanslight" colspan="4">&nbsp;Add a New Design &nbsp;</td><td>
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
		 'class'=>'btn',	
              'name'        => 'NewDesign',
              'id'          => 'NewDesign',
              'value'       => 'Go',
              'onClick'    =>  'show_add_design('.$roomid.')'
            );

          echo form_input($data);

      ?>
	
	</td></tr>

</table>


</div>
<BR><BR><BR><BR><BR><BR><BR>
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
$("#textmessage").html('<p id="enterdesign" style="margin-left:50px;width:150px;float:right;">*Enter Design Name</p>');
 }            else
             {
	      var designid="null"; 
	      
              location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#AddDesigntext").val().trim()+"/"+designid+"/"+$("#userid").val()+"/"+null;		  
             }
	
	
}
</script>
<BR><BR><BR>
<?php 
	include(APPPATH.'/views/templates/footer.php');
?>
