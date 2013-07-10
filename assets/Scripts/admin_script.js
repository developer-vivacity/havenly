var total=1;
var fileupload_value=0;

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


$("#Stylefilter,#Colorfilter, #Materialfilter,#Typefilter").keypress(function(event)
{
                                      $("#ShowStylefilter").html("");
				      $("#ShowColorfilter").html("");
				      $("#ShowMaterialfilter").html("");
				      $("#ShowTypefilter").html("");	 
});

		
 var globalkey; 
$("#Stylefilter,#Colorfilter, #Materialfilter,#Typefilter").keyup(function(event)
{
	
	   $("#"+this.id+"_error").remove();
	   $("#ShowStylefilter").html("");
     
     
 var filterid= (this.id=="Stylefilter" ? 1 :(this.id=="Colorfilter"?2:(this.id=="Materialfilter"?3:(this.id=="Typefilter"?4:0))));

if(this.value.trim()!="")
var flage= (filterid==1?$("#ShowStylefilter").append('<li style="list-style-type: none;" id="styleimgajax"><img src="../../../assets/Images/ajax-loader.gif"/></li>'):(filterid==2? $("#ShowColorfilter").append('<li style="list-style-type: none;" id="colorimgajax"><img src="../../../assets/Images/ajax-loader.gif"/></li>'):(filterid==3?$("#ShowMaterialfilter").append('<li style="list-style-type: none;" id="materialimgajax"><img src="../../../assets/Images/ajax-loader.gif"/></li>'):(filterid==4?$("#ShowTypefilter").append('<li style="list-style-type: none;" id="typeimgajax"><img src="../../../assets/Images/ajax-loader.gif"/></li>'):"")))); 

 if(this.value.trim()!="")
 $.getJSON($("#siteurl").val()+'index.php/Admin/site/search_text_for_ajax/'+this.value+'/'+filterid, function(data) {
		

				      $("#ShowStylefilter").html("");
				      $("#ShowColorfilter").html("");
				      $("#ShowMaterialfilter").html("");
				      $("#ShowTypefilter").html("");	 

   
	 
      $.each(data, function(key, val) 
			  {
			 
		       globalkey=key;
                    
var flage= (filterid==1?$("#ShowStylefilter").append('<li id="' + val.style_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.style+'\','+filterid+','+val.style_id+')">' + val.style + '</li>'):(filterid==2? $("#ShowColorfilter").append('<li id="' + val.color_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.color+'\','+filterid+','+val.color_id+')">' + val.color + '</li>'):(filterid==3?$("#ShowMaterialfilter").append('<li id="' + val.material_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.material+'\','+filterid+','+val.material_id+')">' + val.material + '</li>'):(filterid==4?$("#ShowTypefilter").append('<li id="' + val.type_id + '"  style="list-style-type: none;" onclick="filtercheck(\''+val.type+'\','+filterid+','+val.type_id+')">' + val.type + '</li>'):"")))); 
              
              }); 
                      if(data=="")
                      {
			   
var flage= (filterid==1?$("#ShowStylefilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>'):(filterid==2? $("#ShowColorfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>'):(filterid==3?$("#ShowMaterialfilter").append('<li  style="list-style-type: none;"> The style does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>'):(filterid==4?$("#ShowTypefilter").append('<li  style="list-style-type: none;"> The type does not exist. Do you want add it in db <lable style="cursor:pointer" onclick="filteryes('+filterid+');">Yes</lable>|<lable style="cursor:pointer" onclick="filterno('+filterid+');">No</lable></li>'):""))));                       

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
          var designid=$("#holddesignidforroom").val();
          if($("#designproductid_"+designid).val().trim()=="")
	  {
	         $("#div_show_error_message").html('<p>*Select at least one product:</p>');
	  }  
	  else
	  {
		   $("#hidproductsearch").val("SaveSelected");
		   $("#productid").val(productimage);
	           $("#saveproduct").submit();
          }
  });
  $("#searchproductname").click(function()
  {
   $("#hidproductsearch").val("search");
   
   var producttypeid="";
   var productprice="";
   var productcolor="";
   var productstyle="";
   var productmaterial=""; 

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
  $('input[name="searchproductstyle[]"]:checked').each(function(i,e)
  {
	  if(productstyle=="")
	  productstyle=e.value;
      else
      productstyle=productstyle+','+e.value;
  });
  $("#searchoptionforstyle").val(productstyle);
  $('input[name="searchproductmaterial[]"]:checked').each(function(i,e)
  {
	  if(productmaterial=="")
	  productmaterial=e.value;
      else
      productmaterial=productmaterial+','+e.value;
  });
  $("#searchoptionformaterial").val(productmaterial);
  $('input[name="searchproductcolor[]"]:checked').each(function(i,e)
  {
	  if(productcolor=="")
	  productcolor=e.value;
      else
      productcolor=productcolor+','+e.value;
  });
  $("#searchoptionforcolor").val(productcolor);

  $("#saveproduct").submit();
  
  })
  
  $("#ascproduct").click(function(){
  var is_sort=false;
  var ascproducttypecheck="";
  var ascproductcolortypecheck="";
  var ascproductmaterialtypecheck="";
  var ascproductstylecheck="";
  var ascproductpricecheck="";
           $('input[name="producttypecheck[]"]:checked').each(function(i,e)
           {
			  is_sort=true;
			  if(ascproducttypecheck=="")
			   ascproducttypecheck=e.value;
			   else
			   ascproducttypecheck=ascproducttypecheck+','+e.value;
			   
		   })
           $('input[name="productcolortypecheck[]"]:checked').each(function(i,e)
           {
                            is_sort=true;
                            if(ascproductcolortypecheck=="")
			    ascproductcolortypecheck=e.value;
			    else
			    ascproductcolortypecheck=ascproductcolortypecheck+','+e.value;
			   
			   
			   
		   })
	 $('input[name="productmaterialtypecheck[]"]:checked').each(function(i,e)
           {
			   is_sort=true;
               if(ascproductmaterialtypecheck=="")
			   ascproductmaterialtypecheck=e.value;
			   else
			   ascproductmaterialtypecheck=ascproductmaterialtypecheck+','+e.value;
		 })
	$('input[name="productstylecheck[]"]:checked').each(function(i,e)
           {
			   is_sort=true;
			   if(ascproductstylecheck=="")
			   ascproductstylecheck=e.value;
			   else
			   ascproductstylecheck=ascproductstylecheck+','+e.value;
			   
			   
		   })
              $('input[name="ascprice[]"]:checked').each(function(i,e)
                   {
			   is_sort=true;
			   if(ascproductpricecheck=="")
			   ascproductpricecheck=e.value;
			   else
			   ascproductpricecheck=ascproductpricecheck+','+e.value;
			   
			   
		   })
		   
		$("#searchoptionforprice").val(ascproductpricecheck);
		$("#hidproducttypecheck").val(ascproducttypecheck);
		$("#hidproductcolortypecheck").val(ascproductcolortypecheck);
		$("#hidproductmaterialtypecheck").val(ascproductmaterialtypecheck);
		$("#hidproductstylecheck").val(ascproductstylecheck);
		
		  if(is_sort)
		  { 
		  $("#hidproductsearch").val("sort");
          $("#saveproduct").submit();
          }
  
});
$("#savecurrentproduct").click(function()
{
	var p_value=1;
	$("#producterrormessage").html("");
        $(".showerror").remove();
	if($("#product_name").val().trim()=="")
	{
	   $("#product_name").before("<p class='showerror' id='product_name_error'>*Enter product name</p>");	
	   p_value=0;	
	}
	if($("#Price").val().trim()=="")
	{
	   $("#Price").before("<p class='showerror' id='Price_error'>*Enter product price</p>");	
	   p_value=0;	
	}
	if($("#ship_cost").val().trim()=="")
	{
	   $("#ship_cost").before("<p class='showerror' id='ship_cost_error'>*Enter ship cost</p>");	
	   p_value=0;
	}
	if($("#qty_in_stock").val().trim()=="")
	{
	  $("#qty_in_stock").before("<p class='showerror' id='qty_in_stock_error'>*Enter qty in stock</p>");	
	  p_value=0;
	}
	if($("#description").val().trim()=="")
	{
	  $("#description").before("<p class='showerror' id='description_error'>*Enter Description</p>");	
	  p_value=0;
	}
	if($("#dimention").val().trim()=="")
	{
	   $("#dimention").before("<p class='showerror' id='dimention_error'>*Enter Dimention</p>");	
	   p_value=0;		
	}
	
	if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()=="")
	{
	   $("#rentprise").before("<p class='showerror' id='rentprise_error'>*Enter Rent Prise</p>");	
	   p_value=0;
	}
	if($("#selecttypefilter").html().trim()=="")
	{
	   $("#selecttypefilter").before("<p class='showerror' id='Typefilter_error'>*Enter Type</p>");		
	   p_value=0;
	}
	if($("#selectstylefilter").html().trim()=="")
	{
	   $("#selectstylefilter").before("<p class='showerror' id='Stylefilter_error'>*Enter Style</p>");		
	   p_value=0;
	}
	if($("#selectcolorfilter").html().trim()=="")
	{
	   $("#selectcolorfilter").before("<p class='showerror' id='Colorfilter_error'>*Enter Color</p>");		
	   p_value=0;
	}
	if($("#selectmaterialfilter").html().trim()=="")
	{
	   $("#selectmaterialfilter").before("<p class='showerror' id='Materialfilter_error'>*Enter Material</p>");	
	   p_value=0;	
	}
	if($("#uploadproductpic").val().trim()=="" && $("#productweblink").val().trim()=="")
	{
	   $("#productweblink").before("<p class='showerror'>*Upload picture or weblink</p>");		
	   p_value=0;
	}
	if($("#Price").val().trim()!="" && !$.isNumeric($("#Price").val()))
       {
		$("#Price").before("<p class='showerror' id='Price_error'>*Enter price in numeric format</p>");	
		p_value=0;	
	}
	if($("#ship_cost").val().trim()!="" && !$.isNumeric($("#ship_cost").val()))
        {
		$("#ship_cost").before("<p class='showerror' id='ship_cost_error'>*Enter ship cost in numeric format</p>");	
		p_value=0;
	}

	if($("#qty_in_stock").val().trim()!="" && !$.isNumeric($("#qty_in_stock").val()))
	{
	   $("#qty_in_stock").before("<p class='showerror' id='qty_in_stock_error'>*Enter ship cost in numeric format</p>");	
	   p_value=0;
    }
    if($('input[name$="retail_option"]:checked ').val()=="on" && $("#rentprise").val().trim()!="" && !$.isNumeric($("#rentprise").val()) )
	{
	    $("#rentprise").before("<p class='showerror' id='rentprise_error'>*Enter rentprise in numeric format</p>");	
	    p_value=0;
    }
   if(($("#productweblink").val().trim()!="") && (/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#productweblink").val()))==false)
    {
        $("#productweblink").before("<p class='showerror' id='productweblink_error'>*Enter valid Url</p>");	
        p_value=0;
    }
    if(fileupload_value==0)
    {
		
		 p_value=0;
	}
     else if(p_value==1)
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
           fileupload_value=0; 
        } 
        else
        {
		   $("#adduploadproductpic").show();	
		   fileupload_value=1;
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
function display_div(id)
{
	
	var globalkey="yes";
	
	$(".productdetailsdiv").html(" ");
	
	$(".productdetailsdiv").remove();

	$('<div id="productdetailsdiv_'+id+'" class="productdetailsdiv" style="background:white;border-radius: 5px;content: attr(title);padding: 5px 5px;position: absolute;z-index: 98;width: 120px;font-size:10px !important;height:50px;font-family:airal,Georgia,Serif;"><img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" width="20px" height="20px"/></div>').insertBefore("#productimage_"+id)

 $.getJSON($("#siteurl").val()+'index.php/Admin/site/product_details_on_hover/'+id, function(data,val) 
  {
	  
	   if(globalkey=="yes")
           {	  
               $.each(data, function(key, val) 
			   {
				   
                             $("#productdetailsdiv_"+id+"").html(" ");
			    
			    $("#productdetailsdiv_"+id+"").append('<p>Name:'+val.product_name+'</p><p>Price:'+val.price+'</p><p>Dimensions:'+val.dimensions+'</p>');	  
				globalkey="no";	  
			   })
                  $(".productdetailsdiv").show();
     }
   })
	
}

function remove_display_div()
{
	$(".productdetailsdiv").html(" ");
	$(".productdetailsdiv").hide();
	$(".productdetailsdiv").remove();
	
	
}
