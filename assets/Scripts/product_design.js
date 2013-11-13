$(".cbox").hide();
$(function(){
	
		var btnUpload=$('#me');
		var mestatus=$('#mestatus');
		var files=$('#files');

		new AjaxUpload(btnUpload, {
			
			action: $("#siteurl").val()+'index.php/Admin/site/upload_design_pic_by_admin/'+'uploadfile/'+$("#currentroomid").val()+'/'+$("#currentuserid").val()+'/'+$("#userdesign").val(),
			name: 'uploadfile',
			roomid:$("#currentroomid").val(),
			userid:$("#currentuserid").val(),
            designid:$("#userdesign").val(),
		      onSubmit: function(file, ext){
		      $("#me").hide();
		      if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
		      { 
			      
                        mestatus.html('<div class = "alert alert-error small">Only JPG, PNG or GIF files are allowed</div>');
                        
                        $("#me").show()
		      return false;
		      }
		        mestatus.html('<img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" height="16" width="16">');
		  },
			onComplete: function(file, response)
			{
				  files.html('');	
			           var obj=$.parseJSON(response);	
			           if(obj.success==="success")
                                	  {
				       mestatus.html('<p class = "alert">Photo Uploaded Sucessfully!</p>');
				       
				       $("#mestatus").after('<div id="uploadmoreimg"><a class = "button1 pink small" href="#" id="Uploadimg" onclick="show_upload_more_img();">Upload another one.</a></div>');
				       
				       if($("#displaydesignimages").length!=0)
				       {
					       //$("#messagefordesign").remove();	   
					       $("#displaydesignimages").append('<div class = "design_image_holder"><img src="'+obj.images+'" height ="150px"/></div>');
					       
				       }
				       if($("#designimageassignproduct").length!=0)
				       {
				       $("#messagefordesign").remove();	   
					   $("#designimageassignproduct").append('<div style="float:left;width:110px;"><img src="'+obj.images+'" height = "150px"/></div>');
			                }
				  } 
				  else
				  {
					mestatus.text('File upload failed!')
				  }
			
				
				
			}
		});
		
	});

$(".inactive, .active").click(function()
{
	        $(this).toggleClass('active');
                 var checkbox = $(this).parent().find('.cbox');
	        checkbox.prop('checked',!checkbox[0].checked);
});
function show_upload_more_img()
{
        $("#uploadmoreimg").remove();	
	    $("#me").show();
	    $("#me").focus();
	    $("#mestatus").text('');
}

var global_prodct_id;
var global_image_path;
var object;
function selectedproductimage(productid,productimagepath,refobject)
{
   	
		var designid=$("#holddesignidforroom").val();
		global_prodct_id=productid;
		global_image_path=productimagepath;
		object=refobject;
  if($("#productimage_"+productid+"").is(':checked')==false)
  {      
		$(".productdetailsdiv").hide();
		$("#productlistimg_"+productid+"").prepend("<div id='popup'><div class = 'addimageholder'><div><img src='"+$("#siteurl").val()+"assets/Images/delicon.fw.png' width='20px' height='20px' style='float:right;cursor:pointer;' onclick='destroy_popup();'/></div><div><a class = 'button2 white_text small' onclick='addselectimg();'>Add To Design</a></div></div></div>");   
		
  }       
  else
  {
         var hold_id_in_string=$("#designproductid_"+designid).val();
         var hold_productid= hold_id_in_string.split(",");
         hold_productid = jQuery.grep(hold_productid, function(value) {
         return value != productid;
  });
       var afterreplace = [];
       $.each(hold_productid, function(idx2,val2) {                    
       var str = val2;
       afterreplace.push(str);
});
$("#designproductid_"+designid).val(afterreplace.join(", "));
$("#select_img_"+designid+"_"+productid).remove();
}
}
function destroy_popup()
{
	$("#productlist").css('overflow-y', 'scroll');
	$("#popup").remove();
	$("#productimage_"+global_prodct_id).removeAttr('checked');
	$(object).toggleClass('active');

}
function addselectimg()
{
     
      var designid=$("#holddesignidforroom").val();
      var forappend= (designid=="7u7"?"":designid);

      if($("#designproductid_"+designid).length==0)
      {
      $("#showselectedproductimage").append('<input type="hidden" id="designproductid_'+designid+'" name="designproductid_'+designid+'"/><div style="width:100%" id="showselectedproductimage'+designid+'" class="designname"></div>');
      }
      if($("#designproductid_"+designid).val()!="")
      $("#designproductid_"+designid).val($("#designproductid_"+designid).val()+","+global_prodct_id);
      else
      $("#designproductid_"+designid).val(global_prodct_id);
      
     $("#showselectedproductimage"+forappend).append('<div id="select_img_'+designid+'_'+global_prodct_id+'" class ="selectedproductimagediv"><img src="'+global_image_path+' "height="100px;"/><input type="hidden" class = "selectedprod" name="assign_'+designid+'[]" value="'+global_prodct_id+'" class="cbox"/></div>');
     $("#popup").remove();

}
function show_product_details()
{
             $("#select_products_for_room").hide();
  	    $("#allproductdisplay").show();
	
}
function display_design()
{
       
        $(".cbox").removeAttr('checked');
        var str_id=$("#userdesign").val();
        $('img').removeClass('active');

   if($("#designproductid_"+str_id).length>0)
   {
        var id_in_array= $("#designproductid_"+str_id).val().split(",");
          for(var i=0; i<(id_in_array.length);i++)
          {	
          $("#product_img"+id_in_array[i]).addClass('active');
          $("#productimage_"+id_in_array[i]).prop('checked', true);
         }
   }
  else
  {
        $("#showselectedproductimage").append('<input type="hidden" id="designproductid_'+str_id+'"  name="designproductid_'+designid+'"/><div style="width:100%" id="showselectedproductimage'+str_id+'" class="designname"></div>');
  }
         $(".designname").hide();
         $("#showselectedproductimage"+$("#userdesign").val()).show();

}
function saveproductdetailsofdesign()
{
	
	     $("#product_status").val($("#design_status").val());

         $("#saveproduct").submit();	
}
function display_child(id)
{
	$(".dropdown-menu").hide();
	$("#"+id).show();
	return false;
}




function save_comment()
{

if($("#designer_notes").val()!="")
		{
		var designid = $('#holddesignidforroom').val();
		var designer_notes = $('#designer_notes').val();
		
    $.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/add_design_comment',
        type: 'POST',
        data: {design_id: designid, designer_notes: designer_notes},
       success : alert('Saved!') 
    });
	
}
else { alert('please enter comment');}
}


