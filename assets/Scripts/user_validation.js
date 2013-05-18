
$(document).ready(function()
{
   var user_id;
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
   
   $(".edit_button").click(function()
   { 
	   
     user_id=this.id;
     
     $("#update_name").val($("#u_name_"+this.id).html());
     $("#update_last_name").val($("#u_lastname_"+this.id).html());
     $("#update_email").val($("#u_email_"+this.id).html());
     $("#update_phone").val($("#u_phone_"+this.id).html());
     $("#update_zip").val($("#u_zip_"+this.id).html());
     $("#update_address").val($("#u_address_"+this.id).html());
     $("#div_show_error_message").html("");
     $("#update_password").val("");    
     $(".div_update_table").show();
     $(".div_update_table").offset({left:400,top:250});
     
  });
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
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Name</p>'); 
        e_value=0;
    }
    if($("#update_last_name").val()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Last Name</p>'); 
        e_value=0;
	}
	if($("#update_address").val()=="")
    {
		 $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Address</p>'); 
        e_value=0;
	}
    if($("#update_email").val()=="")
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Email</p>');
        e_value=0;    
    }
   
	 if(($("#update_phone").val()==""))
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Phone Number</p>');
        e_value=0;    
	}
	if(($("#update_zip").val()=="") )
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Zip</p>');
        e_value=0;    
	}
	 if(($("#update_password").val()=="") && ischack==true)
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter Password</p>');
        e_value=0;    
	}
	if(($("#update_password").val()!="") && ischack==true)
	{
		
		if($.trim($("#update_password").val()).length<4)
        {
		
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*The User Password field must be at least 4 characters in length</p>');
        e_value=0;    
	    }
	    if($.trim($("#update_password").val()).length>32)
	    {
		$("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*The User Password field can not exceed 32 characters in length</p>');
        e_value=0;	
		}
	}
    if(($("#update_email").val()!="") && (!emailReg.test($("#update_email").val()))) 
    {
        $("#div_show_error_message").html($("#div_show_error_message").html()+'<p>*Enter valid Email address</p>');
        e_value=0;    
    }
    if(e_value==1)
    {

		$("#hold_id").val(user_id);
		$("#radio_value").val(ischack);
		
		$('#updateform').submit();
		
		//window.location.href="updatedata?name="+$("#update_name").val()+"&email="+$("#update_email").val()+"&usertype="+$("#update_user_type").val()+"&userid="+user_id+"";
    }
 });
 
}); 
