<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<!----add script by kbs----->
<script type="text/javascript" src="<?php echo base_url();?>assets/Scripts/jquery-1.9.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/Scripts/ajaxupload.3.5.js" ></script>
<!-------------------------------->
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

<div class = "white">
<?php //add hidden variables by kbs---------------------------
	echo '<input type="hidden" name="siteurl" id="siteurl" value="'.base_url().'"/>';
	echo '<input type="hidden" value="'.$roomid.'" id="currentroomid" name="currentroomid"/>';
	echo '<input type="hidden" value="'.$currentuserid.'" id="currentuserid" name="currentuserid"/>';
	echo '<input type="hidden" value="'.$designid.'" id="userdesign" name="userdesign"/>';
 //=============================================================================//
?>
<div class = "container text-center">
<BR><BR><BR>

<div class = "admin_header text-center">

	<a class = "button2 float_right pink small" id = "updatechanges">(+) Update changes</a>
	<a class = "button2 float_right blue small" href = <?php echo base_url('index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid);?>>(+) Edit Design Products and Images</a>
</div>

<div class = "well white text-left"><BR><BR>
<div class = "alert"></div>
<div class = "row"><br>
<div class = "span2 offset1 top"> Design Name: </div>
<div class = "span5 top"> <?php echo '<input type="text" class= "sanslight small" value="'.$designname.'" id="designname"/>'; ?>
</div><br></div>
<div class = "row"><br>
<div class = "span2 offset1 top"> Design Status: </div>
<div class = "span5 top"><select name="DesignStatus" id="DesignStatus">
		<option value="draft" <?php if($designdetail[0]->status=="draft") echo "selected";?>>Draft</option>
		<option value="submitted" <?php if($designdetail[0]->status=="submitted") echo "selected";?>>Submitted</option>
</select>
</div>
</div>

<div class = "row"><BR>
<div class = "span2 offset1">Designer Notes</div>
<div class = "span5">
	<textarea name="designer_notes" id="designer_notes" class = "sanslight small">
	<?php echo $designdetail[0]->designer_notes;?></textarea>

</div></div><br>
<div id = "paintdiv" class = "row">
<div class = "span2 offset1">
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
  	
		echo'<div class = "paintholder" id="rgbtablerow'.$r.'">';
		echo '<div class="paintshow" style="display:inline-block;height:50px; background-color:'.$designer_key->color.'">
		<input type = "hidden" class = "paintcolor" id = "paintcolor_'.$designer_key->id.'" value='.$designer_key->id.'>';
		echo'<p class = "sanslight small">'.$designer_key->description.'
		<a href="#" class = "removebutton">
		<img src="'.base_url().'assets/Images/delicon.fw.png" height="20px;" width="20px;"/></a></p></div></div>';
	$r++;
}	
 
echo '<div class = "well"><div class= "text-center medium">ADD COLOR</div><hr>';
    echo '<div id="rgbtablerow">
		<span class = "span1 middle">Enter RGB:</span>
        <input type="text" maxlength="3" name="txtrgbfirst[]" class="txtrgb"  id="rgbone" onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
		<input type="text" maxlength="3" class="txtrgb" size="2" name="txtrgbsecond[]" id="rgbtwo"  onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
		<input type="text" maxlength="3"  name="txtrgbthird[]" size="2" class="txtrgb" id="rgbthree" onkeypress="return handle_key(event);" onblur="color_pic('.$r.');"/>
		<BR> <span class = "span1 middle">Color Name:</span><input type = "text" name="comment[]" id="comment"/>';
    echo '<input type="hidden" id="totalrgb" value="'.$r.'" name="totalrgb"/>';
	
?>
<a class="pink small button2" id = "color_add_button"/>Submit</a></div></div>

<?php echo '<input type="hidden" name="desinerholdid" id="designid" value="'.$designid.'">';
	echo '<input type="hidden" name="desinerholdroomid" id="desinerholdroomid" value="'.$roomid.'">';
?>


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
	echo '<div class = "productsassigned"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'">
	<img src="'.$key->weblink.'" height="100px" width="100px"/><br><span class = "producttitle">&nbsp;'.wordwrap($key->product_name,30,"<BR>\n").'</span></a></div>';
	}

?>
</div></div></div>

<!----start add code by kbs-------->
<script type = "text/javascript">
	
	$(".alert").hide();


$("#color_add_button").click(function(){

  if(($("#rgbone").val().trim()!="")&&($("#rgbtwo").val().trim()!="")&&($("#rgbthree").val().trim()!=""))
  {
	  
     var colortype=$("#rgbone").val()+","+$("#rgbtwo").val()+","+$("#rgbthree").val();
     var colorpic="rgb("+colortype+");";
     var comment= $("#comment").val();
	 var designid = $("#designid").val();
	 var siteurl = $("#siteurl").val();
	 $.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/paint_colors_for_design',
        type: 'POST',
        data: {rgbpaint: colorpic, comment: comment, designid:designid },
       success : function(data){
			$("#paintdiv .span5").prepend('<div class = "paintholder"><div class="paintshow" style="display:inline-block;height:50px; background-color:'+colorpic+'"><input type = "hidden" class = "paintcolor" id = "paintcolor_'+data+' value = "'+data+'"><p class = "sanslight small">'+comment+'<a href="#" onclick="removergb()"><img src="'+siteurl+'assets/Images/delicon.fw.png" height="20px;" width="20px;"/></a></div></div>');
    
	}
	});
	 
  }	
	
});

$(".removebutton").click(function(){

	var input = $(this).parent().parent().find('.paintcolor').val();
	var designid = $("#designid").val();
	var div = $(this).parent().parent().parent();
	 $.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/delete_color',
        type: 'POST',
        data: {paintid: input, designid:designid },
       success : function(data){
			div.hide();
	}
	});
});



$("#updatechanges").click(function(){
if ($("#designname").val()!=""&& $("#designer_notes").val()!="")
{
		var designname = $("#designname").val();
		var design_notes = $("#designer_notes").val();
		var status = $("#DesignStatus").val();
		var designid = $("#designid").val();
		
			
		$.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/update_design_basics',
        type: 'POST',
        data: {designname: designname, designnotes: design_notes, status: status, designid:designid },
       success : function(data){
			$(".alert").html('Successfully Saved');
			$(".alert").show();
	}
	});
		
		
}

else {
$(".alert").html('Please ensure that you have entered a name and a designer note');
$(".alert").show();}
});
</script>
