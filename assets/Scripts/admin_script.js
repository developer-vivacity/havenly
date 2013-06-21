var total=1;
var $fileupload_value=1;
var $p_value=1;
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
		
 var globalkey; 
$("#Stylefilter,#Colorfilter, #Materialfilter,#Typefilter").keyup(function(event)
{
	
	$("#"+this.id+"_error").remove();
	
	 globalkey=-1;
	
				      $("#ShowStylefilter").html("");
				      $("#ShowColorfilter").html("");
				      $("#ShowMaterialfilter").html("");
				      $("#ShowTypefilter").html("");	  
	 
	  $("#ShowStylefilter").html("");
      var filterid= (this.id=="Stylefilter" ? 1 :(this.id=="Colorfilter"?2:(this.id=="Materialfilter"?3:(this.id=="Typefilter"?4:0))));
     
      $.getJSON($("#siteurl").val()+'index.php/Admin/site/search_text_for_ajax/'+this.value+'/'+filterid, function(data) {
		
	  if(globalkey==-1)
      $.each(data, function(key, val) 
			  {
				 
			          globalkey=key;
                      if(filterid==1)    
                      $("#ShowStylefilter").append('<li id="' + val.style_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.style+'\','+filterid+','+val.style_id+')">' + val.style + '</li>');
                      else if(filterid==2)				     
                      $("#ShowColorfilter").append('<li id="' + val.color_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.color+'\','+filterid+','+val.color_id+')">' + val.color + '</li>');
                      else if(filterid==3)
                      $("#ShowMaterialfilter").append('<li id="' + val.material_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.material+'\','+filterid+','+val.material_id+')">' + val.material + '</li>');
                      else if(filterid==4)
                      $("#ShowTypefilter").append('<li id="' + val.type_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.type+'\','+filterid+','+val.type_id+')">' + val.type + '</li>');
                      
                      
		  
              
              }); 
                      if(data=="")
                      {
					 
					  $("#ShowStylefilter").html("");
				      $("#ShowColorfilter").html("");
				      $("#ShowMaterialfilter").html("");
				      $("#ShowTypefilter").html("");	 
                      if(filterid==1)    
                      $("#ShowStylefilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');		  
				      else if(filterid==2)
				      $("#ShowColorfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');		  
				      else if(filterid==3)
				      $("#ShowMaterialfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');
				      else if(filterid==4)
				      $("#ShowTypefilter").append('<li  style="list-style-type: none;"> The type does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>');
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
  $("#searchproductname").click(function()
  {
	  	 /* $("#ascproductid").val(" where product_name like '%"+$("#productsearchbyname").val()+"%'");
          $("#saveproduct").submit();
         */
 $("#hidproductsearch").val("search");
   
   var producttypeid="";
   var productprice="";
    
  $('input[name="searchproducttype[]"]:checked').each(function(i,e)
  {
	  if(producttypeid=="")
	  producttypeid=e.value;
      else
      producttypeid=producttypeid+','+e.value;
      
  });
 
  $("#searchoptionfortype").val(producttypeid);


  $('input[name="searchprice[]"]:checked').each(function(i,e)
  {
	  if(productprice=="")
	  productprice=e.value;
      else
      productprice=productprice+','+e.value;
  });
  $("#searchoptionforprice").val(productprice);
  
  $("#saveproduct").submit();
  
  })
  
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
	         $("#hidproductsearch").val("sort");         
	         $("#saveproduct").submit();
	       
           }
  
  
});

$("#savecurrentproduct").click(function(){
	
	$("#producterrormessage").html("");
    $(".showerror").remove();
	if($("#product_name").val().trim()=="")
	{
	   $("#product_name").before("<p class='showerror' id='product_name_error'>*Enter product name</p>");	
	   $p_value=0;	
	}
	if($("#Price").val().trim()=="")
	{
	   $("#Price").before("<p class='showerror' id='Price_error'>*Enter product price</p>");	
	   $p_value=0;	
	}
	if($("#ship_cost").val().trim()=="")
	{
	   $("#ship_cost").before("<p class='showerror' id='ship_cost_error'>*Enter ship cost</p>");	
	   $p_value=0;
	}
	if($("#qty_in_stock").val().trim()=="")
	{
	  $("#qty_in_stock").before("<p class='showerror' id='qty_in_stock_error'>*Enter qty in stock</p>");	
	  $p_value=0;
	}
	if($("#description").val().trim()=="")
	{
	  $("#description").before("<p class='showerror' id='description_error'>*Enter Description</p>");	
	  $p_value=0;
	}
	if($("#dimention").val().trim()=="")
	{
	   $("#dimention").before("<p class='showerror' id='dimention_error'>*Enter Dimention</p>");	
	   $p_value=0;		
	}
	
	if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()=="")
	{
	   $("#rentprise").before("<p class='showerror' id='rentprise_error'>*Enter Rent Prise</p>");	
	   $p_value=0;
	}
	if($("#selecttypefilter").html().trim()=="")
	{
	   $("#selecttypefilter").before("<p class='showerror' id='Typefilter_error'>*Enter Type</p>");		
	   $p_value=0;
	}
	if($("#selectstylefilter").html().trim()=="")
	{
	   $("#selectstylefilter").before("<p class='showerror' id='Stylefilter_error'>*Enter Style</p>");		
	   $p_value=0;
	}
	if($("#selectcolorfilter").html().trim()=="")
	{
	   $("#selectcolorfilter").before("<p class='showerror' id='Colorfilter_error'>*Enter Color</p>");		
	   $p_value=0;
	}
	if($("#selectmaterialfilter").html().trim()=="")
	{
	   $("#selectmaterialfilter").before("<p class='showerror' id='Materialfilter_error'>*Enter Material</p>");	
	   $p_value=0;	
	}
	if($("#uploadproductpic").val().trim()=="" && $("#productweblink").val().trim()=="")
	{
	   $("#productweblink").before("<p class='showerror'>*Upload picture or weblink</p>");		
	   $p_value=0;
	}
	if($("#Price").val().trim()!="" && !$.isNumeric($("#Price").val()))
    {
		$("#Price").before("<p class='showerror' id='Price_error'>*Enter price in numeric format</p>");	
		$p_value=0;	
	}
	if($("#ship_cost").val().trim()!="" && !$.isNumeric($("#ship_cost").val()))
    {
		$("#ship_cost").before("<p class='showerror' id='ship_cost_error'>*Enter ship cost in numeric format</p>");	
		$p_value=0;
	}

	if($("#qty_in_stock").val().trim()!="" && !$.isNumeric($("#qty_in_stock").val()))
	{
	   $("#qty_in_stock").before("<p class='showerror' id='qty_in_stock_error'>*Enter ship cost in numeric format</p>");	
	   $p_value=0;
    }
    if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()!="" && !$.isNumeric($("#rentprise").val()) )
	{
	    $("#rentprise").before("<p class='showerror' id='rentprise_error'>*Enter rentprise in numeric format</p>");	
	    $p_value=0;
    }
	if(($("#productweblink").val().trim()!="") && (/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#productweblink").val()))==false)
    {
        $("#productweblink").before("<p class='showerror' id='productweblink_error'>*Enter valid Url</p>");	
        $p_value=0;
    }
    if($fileupload_value==0)
    {
		
		 $p_value=0;
	}
    else if($p_value==1)
    {
		
	  $("#addproductform").submit();	
	}
	})
$("#adduploadproductpic").click(function()
{
	
	if(total<=4)
	{
	$("#appenduploadphoto").append('<p id="uploadproductpic_'+total+'" class="imageappend"><input type="file" name="uploadproductpic'+total+'" class="uploadproductpic" onchange="typechackfileupload('+total+');"/><input type="button" value="remove" onclick="removeuploadpic('+total+')"></p>');
    total++;	
    }
});


$('input[type="textbox"]').keypress(function()
{
	                  $("#ShowStylefilter").html("");
				      $("#ShowColorfilter").html("");
				      $("#ShowMaterialfilter").html("");
				      $("#ShowTypefilter").html("");	  
	
	                $("#"+this.id+"_error").remove();
}
)

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
	   if(!($("#stylehiddenfilterid").val().match(filtervalueid)))
	   {
	       $("#selectstylefilter").append('<div id="displaystyle'+filtervalueid+'" style="float:left;">'+filterval+'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removedisplay(\'displaystyle\','+filtervalueid+',\'stylehiddenfilterid\')"/></div>');
      
           if($("#stylehiddenfilterid").val().trim()=="")
           $("#stylehiddenfilterid").val(filtervalueid)
           else
           $("#stylehiddenfilterid").val($("#stylehiddenfilterid").val()+','+filtervalueid);
       }
     }
     else if(filterid==2)
      { 
         if(!($("#colorhiddenfilterid").val().match(filtervalueid)))
	     {
	       $("#selectcolorfilter").append('<div id="displaycolor'+filtervalueid+'" style="float:left;">'+filterval+'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removedisplay(\'displaycolor\','+filtervalueid+',\'colorhiddenfilterid\')"/></div>');
      
           if($("#colorhiddenfilterid").val().trim()=="")
           $("#colorhiddenfilterid").val(filtervalueid)
           else
           $("#colorhiddenfilterid").val($("#colorhiddenfilterid").val()+','+filtervalueid);
        }

      }
      else if(filterid==3)
      {
		  if(!($("#materialhiddenfilterid").val().match(filtervalueid)))
	     {
	       $("#selectmaterialfilter").append('<div id="displaymaterial'+filtervalueid+'" style="float:left;">'+filterval+'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removedisplay(\'displaymaterial\','+filtervalueid+',\'materialhiddenfilterid\')"/></div>');
      
           if($("#materialhiddenfilterid").val().trim()=="")
           $("#materialhiddenfilterid").val(filtervalueid)
           else
           $("#materialhiddenfilterid").val($("#materialhiddenfilterid").val()+','+filtervalueid);
        }
     }
      else if(filterid==4)
      {
	      if(!($("#typehiddenfilterid").val().match(filtervalueid)))
	     {
	       $("#selecttypefilter").append('<div id="displaytype'+filtervalueid+'" style="float:left;">'+filterval+'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removedisplay(\'displaytype\','+filtervalueid+',\'typehiddenfilterid\')"/></div>');
      
           if($("#typehiddenfilterid").val().trim()=="")
           $("#typehiddenfilterid").val(filtervalueid)
           else
           $("#typehiddenfilterid").val($("#typehiddenfilterid").val()+','+filtervalueid);
        }
	  
	  }
}
var filteridone=0;
var filteridtwo=0;
var filteridthree=0;
var filteridfour=0;
function filteryes(filterid)
{
	  $("#ShowStylefilter").html("");
	  $("#ShowColorfilter").html("");
	  $("#ShowMaterialfilter").html("");
	  $("#ShowTypefilter").html("");
	  if(filterid==1)
	  {
		 
		 if(!($("#stylehiddenfilter").val().match($("#Stylefilter").val())))
           {	   
	
		    filteridone=filteridone+1;
	    
	        if($("#stylehiddenfilter").val()=="")
	        $("#stylehiddenfilter").val($("#Stylefilter").val());
	        else
	        $("#stylehiddenfilter").val($("#stylehiddenfilter").val()+','+$("#Stylefilter").val());
	  
	       $("#selectstylefilter").append('<div id="newstyleadd'+filteridone+'" style="float:left;">'+$("#Stylefilter").val() +'<img src="../../../assets/Images/delicon.fw.png"  width="20px" height="20px" onclick="removenewitem(\'newstyleadd\','+filteridone+',\'stylehiddenfilter\',\''+$("#Stylefilter").val()+'\')"/></div>');
         }
      }
      else if(filterid==2)
      {
		   if(!($("#colorhiddenfilter").val().match($("#Colorfilter").val())))
           {	   
	
		    filteridtwo=filteridtwo+1;
	    
	        if($("#colorhiddenfilter").val()=="")
	        $("#colorhiddenfilter").val($("#Colorfilter").val());
	        else
	        $("#colorhiddenfilter").val($("#colorhiddenfilter").val()+','+$("#Colorfilter").val());
	  
	       $("#selectcolorfilter").append('<div id="newcoloradd'+filteridtwo+'" style="float:left;">'+$("#Colorfilter").val() +'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removenewitem(\'newcoloradd\','+filteridtwo+',\'colorhiddenfilter\',\''+$("#Colorfilter").val()+'\')"/></div>');
         }  
		  
	  }

      else if(filterid==3)
      {
		  
		if(!($("#materialhiddenfilter").val().match($("#Materialfilter").val())))
           {	   
	
		    filteridthree=filteridthree+1;
	    
	        if($("#materialhiddenfilter").val()=="")
	        $("#materialhiddenfilter").val($("#Materialfilter").val());
	        else
	        $("#materialhiddenfilter").val($("#materialhiddenfilter").val()+','+$("#Materialfilter").val());
	  
	       $("#selectmaterialfilter").append('<div id="newmaterialadd'+filteridthree+'" style="float:left;">'+$("#Materialfilter").val() +'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removenewitem(\'newmaterialadd\','+filteridthree+',\'materialhiddenfilter\',\''+$("#Materialfilter").val()+'\')"/></div>');
         }   
		  
	  }
     
      else if(filterid==4)
      {
      $("#typehiddenfilter").val("yes");
         if(!($("#typehiddenfilter").val().match($("#Typefilter").val())))
           {	   
	
		    filteridfour=filteridfour+1;
	    
	        if($("#typefilter").val()=="")
	        $("#typehiddenfilter").val($("#Typefilter").val());
	        else
	        $("#typehiddenfilter").val($("#typehiddenfilter").val()+','+$("#Typefilter").val());
	  
	       $("#selecttypefilter").append('<div id="newtypeadd'+filteridfour+'" style="float:left;">'+$("#Typefilter").val() +'<img src="../../../assets/Images/delicon.fw.png" width="20px" height="20px" onclick="removenewitem(\'newtypeadd\','+filteridfour+',\'typehiddenfilter\',\''+$("#Typefilter").val()+'\')" /></div>');
         }   
      
      
      }
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
	else if(filterid==4)
	$("#Typefilter").val("");
}
function typechackfileupload(total)
{
	    $("#producterrormessageforuploadimage").html('');
	    var exts=new Array("jpg","jpeg","gif","png","JPG");
    	var file1=$('input[name="uploadproductpic'+total+'"]').val();
        var fileextension_one = file1.substr((file1.lastIndexOf('.') +1) );
        if($.inArray (fileextension_one.toLowerCase(), exts ) < 0 )
        {
           $("#producterrormessageforuploadimage").append('<p>*Upload product pic in jpg,png,gif,jpeg format</p>');
           total=1;
           $fileupload_value=0; 
        } 
        else
        {
		   $("#adduploadproductpic").show();	
		   $fileupload_value=1;
		}
}
function removedisplay(strid,id,holdid)
{
    var IdArray = $("#"+holdid).val().split(',');
    var IdArray = jQuery.grep(IdArray, function(value) {
    return value != id;
    });
    $("#"+holdid).val(IdArray.toString());
    $("#"+strid+id).remove();
}

function removenewitem(stridforremove,id,holdvalue,matchvalue)
{
	
	 var IdArray = $("#"+holdvalue).val().split(',');
	 var IdArray = jQuery.grep(IdArray, function(value) {
    return value != matchvalue;
    });
    
	$("#"+holdvalue).val(IdArray.toString());
	$("#"+stridforremove+id).remove();
}
