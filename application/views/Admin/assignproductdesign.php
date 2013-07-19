<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<!----add script by kbs----->
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
		<a class="brand" href="#">Havenly</a>
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

<div class = "white">
<div class = "container">
<BR><BR><BR><BR><BR>
	  
<table>

<tr><td class = "midlarge"><?php echo $designname;?></td><td>

	&nbsp;&nbsp;<a class = "btn" href = <?php echo base_url('index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid);?>>Edit Design</a>
	</td></tr>
	
	<tr><td>&nbsp;</td></tr>
<tr>
	
<td>

<?php
//----add div tag by kbs----
if(sizeof($designimage)==0)
echo "<span id='messagefordesign'>No Image</span>";
echo '<div id="designimageassignproduct">';
foreach($designimage as $key)
{
//echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->filename.'" width="100%"/></a></div>';
echo '<div style="float:left;width:110px;"><img src="'.$key->filename.'" width="100%" height="100px"/></div>';
}
echo '<div>';	
//---end add div tag.......
?>
</td>
</tr>
<tr>
<td>&nbsp;</td></tr>



<tr>
<td>

<?php

	if(sizeof($productassign)==0)
	echo "No Products Uploaded";
        foreach($productassign as $key)
	{
	echo '<div style="float:left;width:110px;"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'"><img src="'.$key->link.'" height="100px" width="100px"/><br><span>&nbsp;'.wordwrap($key->product_name,15,"<br />\n").'</span></a></div>';
			
	}

//add hidden variable by kbs---------------------------	
echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
echo '<input type="hidden" value="'.$roomid.'" id="currentroomid" name="currentroomid"/>';
echo '<input type="hidden" value="'.$currentuserid.'" id="currentuserid" name="currentuserid"/>';
echo '<input type="hidden" value="'.$designid.'" id="userdesign" name="userdesign"/>';
 //=============================================================================//


?>

</td>

</tr>
<!----start add code by kbs-------->	
<tr><td>&nbsp;</td></tr>
<tr><td>

 <?php echo '<div id="updatedesign">Design name <input type="textbox" value="'.$designname.'" id="designtext"/><a href="#" onclick="Updatedesign('.$designid.','.$roomid.',\'name\');">Update</a></div>';?>

</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>
	 
Design Status <select name="DesignStatus" id="DesignStatus"><option value="draft" <?php
	 if($designdetail[0]->status=="draft") echo "selected";?>>draft</option><option value="submitted" <?php if($designdetail[0]->status=="submitted") echo "selected";?>>submitted</option></select>
<?php echo '<a href="#" onclick="Updatedesign('.$designid.','.$roomid.',\'status\');">Update</a>'?>
</td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td>
<div>
<p>Upload Design Images</p>


 <div id="me" class="styleall" style=" cursor:pointer;">
  <span style=" cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:9px;">
  <span style=" cursor:pointer;">Click Here To Upload Profile Photo</span></span></div><span id="mestatus" ></span>        
         
         <div id="files" style="list-style-type: none;">
    <li class="success" >
</li>



</div>

</td></tr>
<!---end add code by kbs code----->

</table>
</body>
<!----start add code by kbs-------->
<script>
function Updatedesign(designid,roomid,type)
{
	$(".error").remove();
	if(type=="name")
	{
	if($("#designtext").val().trim()=="")
	$("#updatedesign").before('<p  style="margin-left:200px;" class="error">*Enter Design Name</p>');
	else
	location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/"+$("#designtext").val().trim()+"/"+designid;		  
         }
         else
         {
	location.href=$("#siteurl").val()+"index.php/Admin/site/Add_Design_For_Room/"+roomid+"/null/"+designid+"/null/"+$("#DesignStatus").val();		  
	}
}



</script>

<!----end add code by kbs------->
