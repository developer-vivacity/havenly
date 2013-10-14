<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<!----add script by kbs----->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/product_design.js"></script>
<!-------------------------------->
<body>
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
              <li class="active"><a href="<?php echo base_url('/index.php/Admin/site/currentroomwithuser/'.$roomid);?>">Back</a></li>
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

	  <?php //add hidden variables by kbs---------------------------
echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
echo '<input type="hidden" value="'.$roomid.'" id="currentroomid" name="currentroomid"/>';
echo '<input type="hidden" value="'.$currentuserid.'" id="currentuserid" name="currentuserid"/>';
echo '<input type="hidden" value="'.$designid.'" id="userdesign" name="userdesign"/>';
 //=============================================================================//


?>
<div class = "white">
<div class = "container text-center">
<BR><BR><BR>

<div class = "admin_header text-center">
	<p class = "midlarge"><?php echo '<div id="updatedesign"><input type="textbox" class= "midlarge sanslight" value="'.$designname.'" id="designtext"/>
	<input type="button" onclick="Updatedesign('.$designid.','.$roomid.',\'name\');" value="Update Name" class="pink small button2"/></div>';?>
	<a class = "button2 float_right blue small" href = <?php echo base_url('index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid);?>>Edit Design</a>
</div>
<BR><BR>
<div class = "well white text-left">
<div class = "span3 top"> Design Status: </div>
<div class = "span5 top"><select name="DesignStatus" id="DesignStatus">
		<option value="draft" <?php if($designdetail[0]->status=="draft") echo "selected";?>>Draft</option>
		<option value="submitted" <?php if($designdetail[0]->status=="submitted") echo "selected";?>>Submitted</option>
</select>
<?php echo '<input type="button" onclick="Updatedesign('.$designid.','.$roomid.',\'status\');" value="Update" class="pink button2 small"/>'?>
</div>

<?php
	$attributes = array( 'id' => 'insertrgb','enctype' => 'multipart/form-data');
	echo form_open('Admin/site/paint_colors_for_design/',$attributes);
?>
<div>
<div class = "span3">Designer Notes</div>
<div class = "span5">
	<textarea name="designer_notes" id="designer_notes">
	<?php echo $designdetail[0]->designer_notes;?></textarea><input type="button"  onclick="insert_color('comment');" value="Update" class="pink small button2"/>
	<div id="designercommenterror" class="alert alert-error error_show"></div>
	
</div></div><br>
<div>
<div class = "span3">
Paint Color:</div>
<div class = "span5">
<?php
$r=0;
$name="";
$addmore='';
$display='none';
foreach($designcolor as $designer_key)
{        
	         
    $designcolor= explode(',',str_replace("rgb(","",str_replace(");","",$designer_key->color)));
     ++$r;
    echo'<div id="rgbtablerow'.$r.'">'
          .$name.
          '<div id="colorpic'.$r.'">
		  <div style="background-color:'.$designer_key->color.'>
          <input type="text" name="txtrgbfirst[]" class="txtrgb"  id="rgbone'.$r.'" maxlength="3" value="'.$designcolor[0].'" onblur="color_pic('.$r.');"/></td>
          <input type="text" size="2" class="txtrgb" name="txtrgbsecond[]" id="rgbtwo'.$r.'" maxlength="3" value="'.$designcolor[1].'"/>
          <input type="text" name="txtrgbthird[]" size="2" class="txtrgb" id="rgbthree'.$r.'" maxlength="3" value="'.$designcolor[2].'"/></td>
          <br>
		  Color Name: 
		  <input type = "text" name="comment[]" id="comment'.$r.'" value='.$designer_key->description.'/>
		  <a href="#" onclick="removergbrow(\'rgbtablerow'.$r.'\')"><img src="'.base_url().'assets/Images/delicon.fw.png" height="30px;" width="30px;"/></a></td>
          <div id="rgberror'.$r.'" class="alert alert-error error_show2"></div>
          </div></div></div>';
	
}	
   
if($r==0)
{
    $r=$r+1;
    echo '<div id="rgbtablerow'.$r.'">
    <Enter RGB><div id="colorpic'.$r.'"></div>
    <input type="text" maxlength="3" name="txtrgbfirst[]" class="txtrgb"  id="rgbone'.$r.'" onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
    <input type="text" maxlength="3" class="txtrgb" size="2" name="txtrgbsecond[]" id="rgbtwo'.$r.'"  onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
    <input type="text" maxlength="3"  name="txtrgbthird[]" size="2" class="txtrgb" id="rgbthree'.$r.'" onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
    Color Name
	<textarea name="comment[]" id="comment'.$r.'"></textarea>
    <a href="#" onclick="removergbrow(\'rgbtablerow'.$r.'\')"><img src="'.base_url().'assets/Images/delicon.fw.png" height="30px;" width="30px;"/>
   <div id="rgberror'.$r.'" class="alert alert-error error_show2"></div>';
   }
echo '<input type="hidden" id="totalrgb" value="'.$r.'" name="totalrgb"/>';
echo '<div id="rgbtablerow"><div id="d_color"><input type="button"  id="addmorergb" value="Add Color" class="pink small button2/></div></div>';
?>
<input type="button"  class="pink small button2" onclick="insert_color('color');" value="Submit" /></div>

<?php echo '<input type="hidden" name="desinerholdid" id="desinerholdid" value="'.$designid.'">';
	echo '<input type="hidden" name="desinerholdroomid" id="desinerholdroomid" value="'.$roomid.'">';
?>
<?php  echo form_close(); ?>

</div></div></div>
<BR><BR>
<div class = "well white">	<hr>
<p class = "medium condensed">DESIGN RENDERINGS</p>
<hr>


<?php
//----add div tag by kbs----
if(sizeof($designimage)==0)
	{echo "<div id='messagefordesign'><p class = 'alert alert-error'>No Design Images Uploaded</p></div>";}
else {
echo '<div id="designimageassignproduct">';
	
	foreach($designimage as $key)
	{
		echo '<div class = "inline"><img src="'.$key->filename.'" height="200px"/></div>';
	}
echo '</div>';}	
//---end add div tag.......
?>
</div>
<br><BR>
<div class = "well white"><hr>
<p class = "medium condensed">SELECTED PRODUCTS</p>
<hr>

<?php

	if(sizeof($productassign)==0)
	echo "No Products Uploaded";
     foreach($productassign as $key)
	{
	echo '<div><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'">
	<img src="'.$key->weblink.'" height="100px" width="100px"/><br><span>&nbsp;'.wordwrap($key->product_name,15,"<br />\n").'</span></a></div>';
	}

?>
</div>
</body>
<!----start add code by kbs-------->
<script>
	
$(document).ready(function()
{
	
	$(".alert").hide();
	
});
function handle_key(event)
{
        var k = event.keyCode ? event.keyCode : event.charCode
        if((k>=97 && k<=122)||(k>=35 && k<=38)||(k>=40 && k<=45))
        {
        return false;        
        }

}

$('.error_show').hide();
	
function Updatedesign(designid,roomid,type)
{
	if($("#designname").length>0)
	$("#designname").remove();
	
	if(type=="name")
	{
	if($("#designtext").val().trim()=="")
	$("#updatedesign").before('<p  style="margin-left:200px;" class="alert alert-error" id="designname">*Enter Design Name</p>');
	else
location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#designtext").val().trim()+"/"+designid+"/"+$("#currentuserid").val()+"/"+$("#DesignStatus").val()+"/"+1;		  
	  
         }
         else
         {
	location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#designtext").val().trim()+"/"+designid+"/"+$("#currentuserid").val()+"/"+$("#DesignStatus").val()+"/"+1;		  	
			  
	}
}

$('.txtrgb').keydown(
function(event)
{
	
	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
		 
                event.preventDefault(); 
            }   
        }	
	
});


function color_pic(text_id)
{
	
	
  if(($("#rgbone"+text_id+"").val().trim()!="")&&($("#rgbtwo"+text_id+"").val().trim()!="")&&($("#rgbthree"+text_id+"").val().trim()!=""))
  {
	  
     var colortype=$("#rgbone"+text_id+"").val()+","+$("#rgbtwo"+text_id+"").val()+","+$("#rgbthree"+text_id+"").val();
     var colorpic="rgb("+colortype+");";
     $("#colorpic"+text_id+"").html('<div style="background-color:'+colorpic+';width:50px;height:50px;">&nbsp;</div>')
  }	
	
}
var error_flage=true;
function display_error()
{
	error_flage=true;
	
	$(".error_show2").hide();
	for(k=1;k<=zi;k++)
	{
	   if($("#rgbone"+k+"").length>0)
	   if(($("#rgbone"+k+"").val().trim()=="")||($("#rgbtwo"+k+"").val().trim()=="")||($("#rgbthree"+k+"").val()=="")||($("#comment"+k+"").val().trim()==""))
     	   {  
	   error_flage=false;
	   $("#rgberror"+k+"").html("Fill all value!");
	   $("#rgberror"+k+"").show();
	   return false;	
	   }
	  }
	
}

var zi=1;
$("#addmorergb").click(function()
{
	
	if($("#totalrgb").val()!=0)
	{
	   zi=$("#totalrgb").val();
	   $("#totalrgb").val(0)
	 }
    	display_error();
        
        if(error_flage)
	{
	 if(zi<5)
	 {
	   zi= ++zi;
	   $("#rgberror"+(zi-1)+"").html("");
	   $("#rgberror"+(zi-1)+"").hide();
	   $("#rgbtablerow").before('<tr id="rgbtablerow'+zi+'"><td>Enter RGB</td><td id="colorpic'+zi+'">&nbsp;</td><td><input type="text" maxlength="3" name="txtrgbfirst[]" style="width:20px;" class="txtrgb"  id="rgbone'+zi+'" onkeypress="return handle_key(event);" onblur="color_pic('+zi+');"/></td><td><input type="text" maxlength="3" class="txtrgb" size="2" style="width:20px;" name="txtrgbsecond[]" id="rgbtwo'+zi+'" onkeypress="return handle_key(event);" onblur="color_pic('+zi+');"/></td><td><input type="text" maxlength="3"  name="txtrgbthird[]" size="2" style="width:20px;" class="txtrgb" id="rgbthree'+zi+'" onkeypress="return handle_key(event);" onblur="color_pic('+zi+');"/></td><td>Description</td><td><textarea name="comment[]" id="comment'+zi+'"></textarea></td><td><a href="#" onclick="removergbrow(\'rgbtablerow'+zi+'\')"><img src="'+$("#siteurl").val()+'assets/Images/delicon.fw.png" height="30px;" width="30px;"/></td><td><div id="rgberror'+zi+'" class="alert alert-error" style="display:none;"></div></td></tr>');
	   $("#sub_color").show();
	}
	if(zi>=5)
	$("#d_color").hide();
        }
        })
function removergbrow(id)
{
	
	if($("#totalrgb").val()!=0)
	{
	   zi=$("#totalrgb").val();
	   $("#totalrgb").val(0)
	}
	
	$("#"+id).remove();
	zi= --zi;
	
	if(zi==0)
	{
	    $("#sub_color").hide()
      }
	
	$("#d_color").show();
	$("#totalrgb").val(zi);
}
function insert_color(type)
{    
	
	zi=($("#totalrgb").val()!=0?$("#totalrgb").val():zi);
         
         if(type=="color")
         display_error();	
         else if(type="comment")
	{
		if($("#designer_notes").val().trim()=="")
		{
		$("#designercommenterror").html("Please enter a note to the client");
		$("#designercommenterror").show();
		$("#designercommenterror").focus();
	         error_flage=false;
	         }
	         else
	         {
	          error_flage=true;
                  }
         }
	if(error_flage)
	{
	  $("#insertrgb").submit();	
         }	
		
	
}
</script>

<!----end add code by kbs------->
