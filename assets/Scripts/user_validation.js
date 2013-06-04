
$(document).ready(function()
{
   var ischack=false;
   $("#radioyes").click(function()
   {
	   
	$("#update_row_password").show();   
	ischack=true;
	}
   )
    $("#radiono").click(function()
   {
	   
	$("#update_row_password").hide();   
	   ischack=false;
	}
   )
  $("#cancle_update").click(function()
   {
       $(".div_update_table").hide();
  });
  $("#update_update").click(function()
   {
        var e_value=1;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        $("#div_show_error_message").html("");
    if($("#update_name").val()=="")
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter name</p>'); 
        e_value=0;
    }
    if($("#update_last_name").val()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter last name</p>'); 
        e_value=0;
	}
	if($("#update_address").val()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter address</p>'); 
        e_value=0;
	}
    if($("#update_email").val()=="")
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter email</p>');
        e_value=0;    
    }
   
	 if(($("#update_phone").val()==""))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter phone number</p>');
        e_value=0;    
	}
	if(($("#update_zip").val()=="") )
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter zip</p>');
        e_value=0;    
	}
	 if(($("#update_password").val()=="") && ischack==true)
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter password</p>');
        e_value=0;    
	}
	if(($("#update_password").val()!="") && ischack==true)
	{
		
		if($.trim($("#update_password").val()).length<4)
        {
		
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*The User password field must be at least 4 characters in length</p>');
        e_value=0;    
	    }
	    if($.trim($("#update_password").val()).length>32)
	    {
		$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*The User password field can not exceed 32 characters in length</p>');
        e_value=0;	
		}
	}
    if(($("#update_email").val()!="") && (!emailReg.test($("#update_email").val()))) 
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter valid email address</p>');
        e_value=0;    
    }
    if(e_value==1)
    {

		
		$("#radio_value").val(ischack);
		$('#updateform').submit();
				
    }

 });

$("#update_room").click(function()
{

    var colorarea ="";
	var area ="";
 
    var file2=$("#update_photo2").val();
    var fileextension_two = file2.substr( (file2.lastIndexOf('.') +1) );
    var exts=new Array('jpg','png','gif','jpeg','pjpeg');
   $("#div_show_error_message").html(''); 
   e_value=1;
  if($("#update_budget").val()=="")
    {
     $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room budget</p>'); 
        e_value=0;
    }
    if($("#update_width").val()=="")
    {
    $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room width</p>');
    e_value=0; 
    }
   if($("#update_height").val()=="")
    {
    $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room height</p>');
    e_value=0;
    }
   
    if($("#update_photo1").val().trim()!="")
    {
        var file1=$("#update_photo1").val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
    if ($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
         $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room photo1 in correct format</p>');
         e_value=0;
        } 
    }
    if($("#update_photo2").val().trim()!="")
    {
         var file2=$("#update_photo2").val();
         
         var fileextension_two = file2.substr((file2.lastIndexOf('.') +1) );
         
        if($.inArray (fileextension_two.toLowerCase(), exts ) < 0 )
        {
         $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room photo2 in correct format</p>');
         e_value=0;
        } 
    }
    if($("#update_height").val().trim()!="" && !$.isNumeric($("#update_height").val()))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room height in numeric format</p>');
        e_value=0;
    }
    if($("#update_width").val().trim()!="" && !$.isNumeric($("#update_width").val()))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room width in numeric format</p>');
        e_value=0;
    }
    if($("#update_budget").val()!="" && !$.isNumeric($("#update_budget").val()))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter budget in numeric format</p>');
        e_value=0;
    }
   if(e_value==1)
   { 
    
    if($('input[name="color[]"]:checked').length<=0)
	{
	 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one color pic</p>');
	 e_value=0;
	}
	else 
	{
		var colorarea ="";
	   $('input[name="color[]"]:checked').each(function(i,e) {
       if(colorarea=="")
       {
		colorarea=e.value;
	   }
	   else
	   {
		colorarea=colorarea+","+e.value;
	   }
	   
    });	
    
    }

	if($('input[name="style[]"]:checked').length<=0 && $("#select_room").is(':visible'))
	{
	$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one style pic</p>');
	e_value=0;
	}else if($("#select_room").is(':visible'))
	{
	   var area ="";
       $('input[name="style[]"]:checked').each(function(i,e) {
       if(area=="")
       {
		area=e.value;
	   }
	   else
	   {
		area=area+","+e.value;
	   }
	
      });		
	}
	
	if($('input[name="optionstyle[]"]:checked').length<=0 && $("#option_room").is(':visible'))
	{

	$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one style pic</p>');
	e_value=0;
	}else if($("#option_room").is(':visible'))
	{
		
	   var area ="";
       $('input[name="optionstyle[]"]:checked').each(function(i,e) {
       
       if(area=="")
       {
		area=e.value;
	   }
	   else
	   {
		area=area+","+e.value;
	   }
	   
	   
      });		
	}

if(e_value==1)
{
     $("#holdstyle").val(area);
     $("#holdcolor").val(colorarea);
    
     $("#updateform").submit();
 }
   }
}

);
$("#update_room_type").change(function() 
{
if($("#select_room").is(':visible'))
{
    $("#select_room").hide();
    $("#option_room").show();
}
else 
{
	$("#select_room").show();
	$("#option_room").hide();
}
});
}); 


