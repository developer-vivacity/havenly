$(document).ready(function()
{

	 $(".adminmain").hide();
	 $("#CurrentUser").show();
	 
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
				
			    });
			   $("#itemsbuy").val(buyarea);
			   $("#updateform").submit();
	      }
		 
})
});
