$(function(){
		var btnUpload=$('#imageUpload');
		var mestatus=$('#mestatus');
		var files=$('#files');

		new AjaxUpload(btnUpload, {
		action: $("#siteurl").val()+'index.php/Admin/site/upload_image_for_concept_board/'+'imageUpload'+'/'+$("#userroomid").val(),
		name: 'imageUpload',
		onSubmit: function(file, ext){
		    
		      if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext)))
		      { 
		      mestatus.text('Only JPG, PNG or GIF files are allowed');
		      return false;
		      }
		        mestatus.html('<img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" height="16" width="16">');
		  },
			onComplete: function(file, response)
			{
				 
				
				  var obj=$.parseJSON(response);
				
			           if(obj.success==="success")
                                	  {
					  
				   mestatus.text('');
				   $("#displayconceptimg").append('<tr id="conceptrow'+obj.insertid+'"><td><img src="'+obj.imagespath+'"  width="200px"></td><td id="conceptcol'+obj.insertid+'"><input class = "button2 pink white_text" type="button" value="Archive" onclick="concept_confirmation(-1,'+$("#userroomid").val()+','+obj.insertid+');"/><input class = "button2 pink white_text" type="button" value="Delete &nbsp;" onclick="concept_confirmation(0,'+$("#userroomid").val()+','+obj.insertid+');"/></td><td>&nbsp;</td></tr>');		      
		                    } 
				  else
				  {
					mestatus.text('File upload failed!')
				  }
			
				
				
			}
		});
		
	});
	
	function concept_confirmation(conf,roomid,for_div)
	{
                  conf=-1;
		$("#confirmation_div").remove();
		var dismessage=(conf==1?"Sure?":"Sure?");

	
		$("#conceptcol"+for_div).append("<div class = 'white_text padding' style='position:absolute;z-index:100; background-color:lightgray;' id='confirmation_div'><div>"+dismessage+"</div><div><input class = 'button2 pink white_text' type='button' value='Yes' onclick='update_confirmation("+roomid+","+for_div+","+conf+");'/><input class = 'button2 white_text pink' type='button' value='No &nbsp;' onclick='remove_confirmation_box();'/></div></div>");
		
	}
	
        function remove_confirmation_box()
        {
	
	      $("#confirmation_div").remove();
	
        }
        function update_confirmation(roomid,conceptid,status)
        {

           $.post($("#siteurl").val()+"index.php/Admin/site/update_concept_board", {roomid :roomid,conceptid:conceptid,status:status}, function(data){
           if(data.length>0)
          {  
		
              $("#confirmation_div").remove();
              if(status==0)
              {
              $("#conceptrow"+conceptid).remove();
			   $("#conceptcomment"+conceptid).remove();
              }
          } 
    }) 
	        
    }
    
  
     
