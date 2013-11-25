
$(document).ready(function()
{	 

	 $('.pwd').click(function(){
				$(this).get(0).type='password';
		
				});


  var ischack=false;
   
  $("#cancle_update").click(function()
   {
       $(".div_update_table").hide();
  });
  
  
  $("#update_update").click(function()
   {
   var siteurl = $("#siteurl").val();
	$("#buttonhold").prepend('<div class = "button2" id = "ajaxloader"><img src = "'+siteurl+'assets/Images/ajax-whitepink.gif" height = "50px"></div>');
  
		var pass = 0;
        var e_value=1;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    $("#div_show_error_message").html("");
    if($("#update_name").val()=="")
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter first name <span class="close" data-dismiss="alert">&times;</span></p>'); 
        e_value=0;
    }
	else { var first_name= $("#update_name").val();}
    if($("#update_last_name").val().trim()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter last name <span class="close" data-dismiss="alert">&times;</span></p>'); 
        e_value=0;
	}  else {var last_name= $("#update_last_name").val();}
	if($("#update_address").val().trim()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter address <span class="close" data-dismiss="alert">&times;</span></p>'); 
        e_value=0;
	} else {var address= $("#update_address").val();}
    if($("#update_email").val().trim()=="")
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter email address <span class="close" data-dismiss="alert">&times;</span></p>');
        e_value=0;    
    } else {var email= $("#update_email").val();}
   
	 if(($("#update_phone").val().trim()==""))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter phone number <span class="close" data-dismiss="alert">&times;</span></p>');
        e_value=0;    
	} else {var phone= $("#update_phone").val();}
	if(($("#update_zip").val().trim()=="") )
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter zipcode <span class="close" data-dismiss="alert">&times;</span></p>');
        e_value=0;    
	} else {var zip= $("#update_zip").val().trim();}
	
	if($("#update_password").length>0&&$("#update_password").val()!="")
		{
	
		pass = 1;
         
	  if($("#update_password").val().trim()!=""&& $("#update_password").val()!="Update Password") 
	  {
		if($("#update_password").val()!=$("#update_password2").val())
		{
		  $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Your passwords do not match.  Please check.<span class="close" data-dismiss="alert">&times;</span></p>');
            e_value=0;   
			pass = 0;
		}
		
        if($("#update_password").val().trim().length<6)
            {
		
            $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Your password should be at least 6 characters <span class="close" data-dismiss="alert">&times;</span></p>');
            e_value=0;    
			pass = 0;
	    }
	    if(($("#update_password").val().trim().length>32))
	    {
	      $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Your password should be less than 32 characters <span class="close" data-dismiss="alert">&times;</span></p>');
               e_value=0;
				pass = 0;			   
	   }
	   
	   var password = $("#update_password").val().trim();
	   
           }
		   
		   else {
				pass = 0;		
		   
 
		   }
 }
    if(($("#update_email").val().trim()!="") && (!emailReg.test($("#update_email").val()))) 
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>Enter valid email address <span class="close" data-dismiss="alert">&times;</span></p>');
        e_value=0;    
    }
	
	var pinterest = $("#update_pinterest").val();
	var facebook = $("#update_facebook").val();
	var instagram = $("#update_instagram").val();

    if(e_value==1)
    {

		var designid = $("#designidhold").val();
    $.ajax({
        url: $('#siteurl').val()+'index.php/Users/site/updatedata',
        type: 'POST',
        data: {pass:pass, update_password: password, update_last_name: last_name, update_name: first_name, update_email: email, update_phone: phone, update_zip: zip,update_address:address, update_pinterest: pinterest, update_facebook: facebook, update_instagram: instagram},
       success : function(data){
			$('#div_show_error_message').html('<p>Saved <span class="close" data-dismiss="alert">&times;</span></p>');
			$('#div_show_error_message').show();
			$("#ajaxloader").hide();
		  	   }
    });
	
				
    }
    else
    {
	  $("#div_show_error_message").focus();	
	  $("#div_show_error_message").show();
	  $("#ajaxloader").hide();
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
  // if($("#update_budget").val().trim()=="")
    // {
     // $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room budget:</p>'); 
        // e_value=0;
    // }
    if($("#update_width").val().trim()=="")
    {
    $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room width:</p>');
    e_value=0; 
    }
   if($("#update_height").val().trim()=="")
    {
    $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room height:</p>');
    e_value=0;
    }
   
    if($("#update_photo1").val().trim()!="")
    {
        var file1=$("#update_photo1").val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
    if ($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
         $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room photo1 in correct format:</p>');
         e_value=0;
        } 
    }
    if($("#update_photo2").val().trim()!="")
    {
         var file2=$("#update_photo2").val();
         
         var fileextension_two = file2.substr((file2.lastIndexOf('.') +1) );
         
        if($.inArray (fileextension_two.toLowerCase(), exts ) < 0 )
        {
         $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room photo2 in correct format:</p>');
         e_value=0;
        } 
    }
    if($("#update_height").val().trim()!="" && !$.isNumeric($("#update_height").val()))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room height in numeric format:</p>');
        e_value=0;
    }
    if($("#update_width").val().trim()!="" && !$.isNumeric($("#update_width").val()))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter room width in numeric format:</p>');
        e_value=0;
    }
    // if($("#update_budget").val().trim()!="" && !$.isNumeric($("#update_budget").val()))
    // {
        // $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter budget in numeric format:</p>');
        // e_value=0;
    // }
   if(e_value==1)
   { 
    
    if($('input[name="color[]"]:checked').length<=0)
	{
	 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one color pic:</p>');
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
	$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one style pic:</p>');
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

	$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Select at lest one style pic:</p>');
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
   else
    {
	
	    $("#div_show_error_message").focus();	
		$("#div_show_error_message").show();
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
function isValidUrl(url){
    if(/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(url)) {
      return 1;
    } else {
      return -1;
    }


function updateuserdata(){


}	
}

