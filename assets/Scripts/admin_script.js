$(document).ready(function()
{

    $(".adminmain").hide();
	if($("#currentdisplay").val()=="none")
	 $("#CurrentUser").show();
	 else
	 $("#productdesign").show();
	 
		 $("p a").click(function()
		 {
			 $(".adminmain").hide();
		     $("#"+(this.rel)).show();
		 }
		 )
		 $("#addroominfo").click(function()
		 {
			$("#div_show_error_message").html(""); 	
			e_value=1;
			 
             if($("#stylenotes").val().trim()=="")
             {
                $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter style notes:</p>'); 
                e_value=0;
            }
			if($("#ceilingheight").val().trim()=="")
             {
                $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter ceiling height:</p>'); 
                e_value=0;
            }
            if($("#hates").val().trim()=="")
             {
                $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter hates:</p>'); 
                e_value=0;
            }
            if($("#keep").val().trim()=="")
             {
                $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter keep:</p>'); 
                e_value=0;
            }
            if($("#ceilingheight").val().trim()!="" && !$.isNumeric($("#ceilingheight").val()))
             {
                $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter ceiling height in numeric format:</p>'); 
                e_value=0;
            }
			if($('input[name="buy[]"]:checked').length<=0)
			{
				$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one Checkboxes:</p>'); 
                e_value=0;
				
			}
			if(e_value==1)
			{
	            var buyarea ="";
	            $('input[name="buy[]"]:checked').each(function(i,e)
	            {
                  if(buyarea=="")
                  {
		            buyarea=e.value;
		    
	              }
	              else
	              {
		            buyarea=buyarea+","+e.value;
	              }
				  if(e.value==14)
	              { 
					   if($("#othervalue").val().trim()=="")
					   {
					     $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter value in other:</p>');  			
			             e_value=0;
				       }
				       else
				       {
				           buyarea=buyarea+","+$("#othervalue").val();
				           e_value=1;
				       }
			      }
			    });
			    if(e_value==1)
			    {
			       $("#itemsbuy").val(buyarea);
			       $("#updateform").submit();
		       }
	      }
		 
})
$('input[name$="retail_option"]').click(function()
		{
			$('#rentprise').val("");
			if(this.value=="off")
			{
			$('#rentprise').attr('readonly', 'readonly');
		    }
		    else
		    {
		    $('#rentprise').removeAttr('readonly')
		    }
		})

$("#Stylefilter,#Colorfilter, #Materialfilter").keyup(function(event)
{
	            
	
	  $("#ShowStylefilter").html("");
      var filterid= (this.id=="Stylefilter" ? 1 :(this.id=="Colorfilter"?2:(this.id=="Materialfilter"?3:0))); 
      $.getJSON($("#siteurl").val()+'index.php/Admin/site/search_text_for_ajax/'+this.value+'/'+filterid, function(data) {
      $.each(data, function(key, val) 
			  {
				 $("#ShowStylefilter").html("");
				 $("#ShowColorfilter").html("");
				 $("#ShowMaterialfilter").html("");
				 
				 
                      if(filterid==1)    
                      $("#ShowStylefilter").append('<li id="' + val.style_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.style+'\','+filterid+','+val.style_id+')">' + val.style + '</li>');
                      else if(filterid==2)				     
                      $("#ShowColorfilter").append('<li id="' + val.color_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.color+'\','+filterid+','+val.color_id+')">' + val.color + '</li>');
                      else if(filterid==3)
                      $("#ShowMaterialfilter").append('<li id="' + val.material_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.material+'\','+filterid+','+val.material_id+')">' + val.material + '</li>');
              }); 
                      if(data=="")
                      {
					 
					  $("#ShowStylefilter").html("");
				 $("#ShowColorfilter").html("");
				 $("#ShowMaterialfilter").html("");
					 
                      if(filterid==1)    
                      $("#ShowStylefilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');		  
				      else if(filterid==2)
				      $("#ShowColorfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');		  
				      else if(filterid==3)
				      $("#ShowMaterialfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');
				      }
			  })

  
}
);
  $("#AddProduct").click(
  function()
  {
		  document.location.href=$("#siteurl").val()+"index.php/Admin/site/add_product";
  
  });
  $("#SaveSelected").click(function()
  {
	  var productimage="";
	  $("#div_show_error_message").html('');
	   $('input[name="productimage[]"]:checked').each(function(i,e)
	  {
		  if(productimage=="")
		  productimage=e.value;
		  else
		  productimage=productimage+','+e.value;	  
	  });
	 if(productimage=="")
	 {
		 
		  $("#div_show_error_message").html('<p>*Select at least one product:</p>');
	 }  
	 else
	 {
		
	       $("#productid").val(productimage);
	       $("#saveproduct").submit();
     }
  });
  
  
  $("#ascproduct").click(function(){
	  
	           var buyarea ="";
	           
	            $('input[name="productcheck[]"]:checked').each(function(i,e)
	            {
                  
                  if(buyarea=="")
                  {
		            buyarea=e.value;
		    
	              }
	              else
	              {
		            buyarea=buyarea+","+e.value;
	              }
			  })
           if(buyarea!="")
           {
			  buyarea=" order by "+buyarea+" asc";
	         $("#ascproductid").val(buyarea);
	         
	         $("#saveproduct").submit();
	       
           }
  
  
});
$("#savecurrentproduct").click(function(){
	
	$p_value=1;
	
    $("#producterrormessage").html("");
	if($("#product_name").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter product name</p>");	
	   $p_value=0;	
	}
	if($("#Price").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter product price</p>");	
	   $p_value=0;	
	}
	if($("#ship_cost").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter ship cost</p>");	
	   $p_value=0;
	}
	if($("#qty_in_stock").val().trim()=="")
	{
	  $("#producterrormessage").append("<p>*Enter qty in stock</p>");	
	  $p_value=0;
	}
	if($("#description").val().trim()=="")
	{
	  $("#producterrormessage").append("<p>*Enter Description</p>");	
	  $p_value=0;
	}
	if($("#dimention").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Dimention</p>");	
	   $p_value=0;		
	}
	if($("#dimention").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Dimention</p>");		
	   $p_value=0;
	}
	if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Rent Prise</p>");	
	   $p_value=0;
	}
	if($("#Stylefilter").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Style</p>");		
	   $p_value=0;
	}
	if($("#Colorfilter").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Color</p>");		
	   $p_value=0;
	}
	if($("#Materialfilter").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Enter Material</p>");	
	   $p_value=0;	
	}
	if($("#uploadproductpic").val().trim()=="" && $("#productweblink").val().trim()=="")
	{
	   $("#producterrormessage").append("<p>*Upload picture or weblink</p>");		
	   $p_value=0;
	}
	if($("#Price").val().trim()!="" && !$.isNumeric($("#Price").val()))
    {
		$("#producterrormessage").append("<p>*Enter price in numeric format</p>");	
		$p_value=0;	
	}
	if($("#ship_cost").val().trim()!="" && !$.isNumeric($("#ship_cost").val()))
    {
		$("#producterrormessage").append("<p>*Enter ship cost in numeric format</p>");	
		$p_value=0;
	}
	if($("#ship_cost").val().trim()!="" && !$.isNumeric($("#ship_cost").val()))
    {
		$("#producterrormessage").append("<p>*Enter ship cost in numeric format</p>");	
		$p_value=0;	
	}
	if($("#qty_in_stock").val().trim()!="" && !$.isNumeric($("#qty_in_stock").val()))
	{
	   $("#producterrormessage").append("<p>*Enter ship cost in numeric format</p>");	
	   $p_value=0;
    }
    if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()!="" && !$.isNumeric($("#rentprise").val()) )
	{
	    $("#producterrormessage").append("<p>*Enter rentprise in numeric format</p>");	
	    $p_value=0;
    }
	if(($("#productweblink").val().trim()!="") && (/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#productweblink").val()))==false)
    {
        $("#producterrormessage").append("<p>*Enter valid Url</p>");	
        $p_value=0;
    }
    else if($p_value==1)
    {
	  $("#addproductform").submit();	
	}
	})
$('input[name="uploadproductpic0"]').change(function()
{
	  
	  
	    var exts=new Array("jpg", "jpeg", "gif", "png", "JPG");
    	var file1=$("#uploadproductpic").val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
        if($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
         $("#producterrormessage").append('<p>*Upload product pic in jpg,png,gif,jpeg,pjpeg format</p>');
         
         $(".imageappend").remove();
         total=1;
        } 
        else
        {
		$("#adduploadproductpic").show();	
		}
	
}
);
var total=1;
$("#adduploadproductpic").click(function()
{
	
	if(total<=4)
	{
	$("#appenduploadphoto").append('<p id="uploadproductpic_'+total+'" class="imageappend"><input type="file" name="uploadproductpic'+total+'" class="uploadproductpic"/><input type="button" value="remove" onclick="removeuploadpic('+total+')"></p>');
    total++;	
    }
});


   $(function(){
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');
		new AjaxUpload(btnUpload, {
			action: $("#siteurl").val()+'index.php/Admin/site/upload_design_pic_by_admin/'+'uploadfile/'+$("#userroomid").val()+'/'+$("#userid").val(),
			name: 'uploadfile',
			roomid:$("#userroomid").val(),
			userid:$("#userid").val(),
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    mestatus.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				mestatus.html('<img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" height="16" width="16">');
			},
			onComplete: function(file, response)
			{
				
				//On completion clear the status
				files.html('');
				//Add uploaded file to list
				if(response==="success"){
					mestatus.text('Photo Uploaded Sucessfully!');
				} else{
					mestatus.text('file uploded is failed!')
				}
			}
		});
		
		
		
		
	});




});
function removeuploadpic(id)
{
	
	$("#uploadproductpic_"+id).remove();
	total--;	
}
function filtercheck(filterval,filterid,filtervalueid)
{
 	 
	  if(filterid==1)
	  {  
	  $("#Stylefilter").val(filterval);
      $("#stylehiddenfilter").val(filtervalueid);
      }
      else if(filterid==2)
      { 
      $("#Colorfilter").val(filterval); 
      $("#colorhiddenfilter").val(filtervalueid);
      }
      else if(filterid==3)
      {
      $("#Materialfilter").val(filterval); 
      $("#materialhiddenfilter").val(filtervalueid);
      }
}
function filteryes(filterid)
{
	  $("#ShowStylefilter").html("");
	  $("#ShowColorfilter").html("");
	  $("#ShowMaterialfilter").html("");
	  
	  if(filterid==1)
	  $("#stylehiddenfilter").val("yes");
      else if(filterid==2)
      $("#colorhiddenfilter").val("yes");
      else if(filterid==3)
      $("#materialhiddenfilter").val("yes");
      
}
function filterno(filterid)
{
	$("#ShowStylefilter").html("");
	$("#ShowColorfilter").html("");
	$("#ShowMaterialfilter").html("");

	
	if(filterid==1)
	$("#Stylefilter").val("");
	else if(filterid==2)
	$("#Colorfilter").val("");
	else if(filterid==3)
	$("#Materialfilter").val("");
	
		
}
