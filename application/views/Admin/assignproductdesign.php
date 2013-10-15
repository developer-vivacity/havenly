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

    <?php
        /* $attributes = array( 'id' => 'upadteassignproduct','enctype' => 'multipart/form-data');
         echo form_open('Admin/site/update_assignproducts/',$attributes);
*/
    ?>
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
<div class = "span5 top"> <?php echo '<input type="text" class= "sanslight small" value="'.$designname.'" id="designname" name="designname"/>'; ?>
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
		<a href="#" class = "removebutton" onclick="removergb(\'rgbtablerow'.$r.'\','.$designer_key->id.','.$designer_key->design_id.')">
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

/*	
if(sizeof($productassign)==0)
	echo "No Products Uploaded";
     foreach($productassign as $key)
	{
	echo '<div class = "productsassigned"><a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'">
	<img src="'.$key->weblink.'" height="100px" width="100px"/><br><span class = "producttitle">&nbsp;'.wordwrap($key->product_name,30,"<BR>\n").'</span></a></div>';
	}
*/
?>

<?php
   $start_id=1;
    $product_id="";
	if(sizeof($productassign)==0)
echo "No Products Uploaded";
	else
	{
	foreach($productassign as $key)
	{
	 if(($product_id!="") && ($product_id!=$key->product_id))
	 {
	      $visibility=($start_id<6?'opacity:0.4;filter:alpha(opacity=40);':'');
	      echo '<div style="float:left;height:60px;width:60px;'.$visibility.';" id="next_button_'.$product_id.'">
	     <img src="'.base_url().'assets/Images/media_next.png" height="50px" width="50px">
	     </div></div>';
         $start_id=1;
     }
	 if($product_id!=$key->product_id)	
	 {
	     $start_id=1;
	     $product_id=$key->product_id;
	     echo '<div style="width:100%;margin-top:40px;float:left;">
	     <a href="'.base_url().'index.php/Admin/site/productdetails/'.$roomid.'/'.$currentuserid.'/'.$designid.'" id="big_img_'.$product_id.'">
	     <img src="'.$key->filename.'" height="300px" width="300px"/>
	    </a>
	     <div style="margin-left:100px;margin-top:5px;margin-bottom:5px;font-weight:bold;">
	     &nbsp;'.wordwrap($key->product_name,15,"<br />\n").'
	     </div>
	     </div>';
         echo '<div style="width:70%" >
         <div style="float:left;height:60px;width:60px;opacity:0.4;filter:alpha(opacity=40);" id="prev_button_'.$product_id.'" onclick="display_prev('.$product_id.');">
         <img src="'.base_url().'assets/Images/media_previous.png" height="50px" width="50px">
         </div>
         <div style="float:left;height:60px;width:60px;" id="small_img_'.$product_id.'_'.$start_id.'"><img src="'.$key->filename.'" height="50px" width="50px" 
         onclick="change_format(\''.$key->filename.'\',\'big_img_'.$product_id.'\');"/>
         </div>';
     }
     else
     {
		
		  $start_id=$start_id+1;
	      $display= ($start_id>=6?'none':'block');
	      echo '<div style="float:left;height:60px;width:60px;display:'.$display.'" id="small_img_'.$product_id.'_'.$start_id.'">
	      <img src="'.$key->filename.'" height="50px" width="50px" 
	      onclick="change_format(\''.$key->filename.'\',\'big_img_'.$product_id.'\');"/></div>';	
     }
	}
	 $visibility=($start_id<6?'opacity:0.4;filter:alpha(opacity=40);':'');
     echo '<div style="float:left;height:60px;width:60px;'.$visibility.';" id="next_button_'.$product_id.'">
     <img src="'.base_url().'assets/Images/media_next.png" height="50px" width="50px" onclick="display_next(\''.$product_id.'\',6,'.$start_id.');"></div></div>';
     $start_id=1;
     
 }
?>
</div></div></div>

<!----start add code by kbs-------->
<script type = "text/javascript">
	
	$(".alert").hide();

var rgb_id=1;
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
rgb_id=rgb_id+1;
$("#paintdiv .span5").prepend('<div class = "paintholder" id="rgb'+rgb_id+'"><div class="paintshow" style="display:inline-block;height:50px; background-color:'+colorpic+'"><input type = "hidden" class = "paintcolor" id = "paintcolor_'+data+' value = "'+data+'"><p class = "sanslight small">'+comment+'<a href="#" onclick="removergb(\'rgb'+rgb_id+'\','+data+','+designid+')"><img src="'+siteurl+'assets/Images/delicon.fw.png" height="20px;" width="20px;"/></a></div></div>');
    
	}
	});
	 
  }	
	
});

$(".removebutton").click(function(){

	var input = $(this).parent().parent().find('.paintcolor').val();
	var designid = $("#designid").val();
	var div = $(this).parent().parent().parent();
	 $.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/paint_colors_for_design',
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

function change_format(file_name,id)
{
	$("#"+id).html("<img src="+file_name+" height='300px' width='300px'/>");
	
}

var productidsnext=new Array();
var productidsprev=new Array();
var nextopacity=new Array();
//productidsnext[1]=1;
//var hasnext=1; 
//var hasprev=0;
var prevopacity=new Array();
function display_next(product_id,curdisplay,totaldisplay)
{
	
  if((nextopacity[product_id]==undefined) || (nextopacity[product_id]==1))
  {
	  
	 if(productidsnext[product_id]==undefined) 
	 {
		 
	    $("#small_img_"+product_id+"_"+curdisplay).show();   
	    productidsnext[product_id]=parseInt(curdisplay);
        prevhide=parseInt(1);
        $("#small_img_"+product_id+"_"+prevhide).hide();
        productidsprev[product_id]=prevhide;
        
     }
     else
     {

		curdisplay=(productidsnext[product_id]+1);
		
		productidsnext[product_id]=parseInt(curdisplay);
		
		$("#small_img_"+product_id+"_"+curdisplay).show();
		
		prevhide=(parseInt(productidsprev[product_id])+1);
		$("#small_img_"+product_id+"_"+prevhide).hide();
        productidsprev[product_id]=prevhide;
	 }
        at_time_display(prevhide,totaldisplay,product_id);
        
        
  }
}
function at_time_display(prevhide,totaldisplay,product_id)
{
	
   nextopacity[product_id]= ((totaldisplay-prevhide)<=5?0:1);
 
   if(nextopacity[product_id]==0)
   {
      $('#next_button_'+product_id).css('opacity', 0.4);
      $('#next_button_'+product_id).css('filter', 'alpha(opacity=40);');
       
      
   }
 prevopacity[product_id]=1;
 
  $('#prev_button_'+product_id).css('opacity', 1.0);
   $('#prev_button_'+product_id).css('filter', 'alpha(opacity=100);');

}
function display_prev(product_id)
{
	
	if(prevopacity[product_id]==1)
	{
         $("#small_img_"+product_id+"_"+productidsprev[product_id]).show();
         $("#small_img_"+product_id+"_"+productidsnext[product_id]).hide();   
	    
	     productidsprev[product_id]=parseInt(productidsprev[product_id])-1;
	    
	     productidsnext[product_id]=parseInt(productidsnext[product_id])-1;
	    
	     if(productidsprev[product_id]==1)
	     {
	       $('#prev_button_'+product_id).css('opacity', 0.4);
           $('#prev_button_'+product_id).css('filter', 'alpha(opacity=40);');
	       prevopacity[product_id]=0;
	     }
       
         nextopacity[product_id]=1;
         $('#next_button_'+product_id).css('opacity', 1);
         $('#next_button_'+product_id).css('filter', 'alpha(opacity=100);');
        
	}
	
	
}
$("#updatechanges").click(function(){


    $("#upadteassignproduct").submit();

})
function removergb(rgbid,remove_id,design_id)
{

  $.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/paint_colors_for_design',
        type: 'POST',
        data: {paintid: remove_id,designid:design_id,work:"remove"},
       success : function(data){

                   
                   $("#"+rgbid).remove();
	}});


}
</script>
