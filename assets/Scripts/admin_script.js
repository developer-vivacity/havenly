var total=1;
var fileupload_value=0;

$(document).ready(function()
{
 
     $start_display=($('#CurrentUser').css('display')=='block'?1:2);


    $(".adminmain").hide();
    
    
       var d_check= ($start_display==1?$("#CurrentUser").show():$("#CurrentRoom").show()); 
		 
		 $("#bstabs a").click(function()
		 {
			
			$('#bstabs a').removeClass('pink_text');
			$(this).addClass('pink_text');
		         $(".adminmain").hide();
		         $("#"+(this.rel)).show();
	
      
		 }
		 )
		 
		 
		 
		 $("#addroominfo").click(function()
		  {
			
			
			 $("#div_show_error_message").html(""); 	
			 e_value=1;
			 
             
			if(e_value==1)
			 {
	            var buyarea ="";
	            $('input[name="buy[]"]:checked').each(function(i,e)
	            {
                        if(buyarea=="")
                        {
		             buyarea= 1 ;
		    
	               }
	              else
	              {
		           buyarea=buyarea+","+e.value;
	               }
		                 if(e.value==14)
	                          {  
					   if($("#othervalue").val().trim()=="")
					   {
					      
					         $(".alert,.alert-error").remove();
			                         $("#othervalue").before('<p class="alert alert-error">*Enter value in other:</p>');
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
			      $("#addaditionnotesform").submit();
		      }
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

  
});
//Add a product to the database on Admin/display products - opens a new window
$("#AddProduct").click(
  function()
  {
  
 window.open($("#siteurl").val()+"index.php/Admin/site/add_product?r="+$('#currentroomid').val()+"&u="+$('#currentuserid').val()+"&d="+$('#userdesign').val(),"popupWindow", "width=1300 height=800,scrollbars=yes");
  
  });

 // Save a new design on Admin/displayproducts
  $("#SaveSelected").click(function()
  {  
  
	
	  var productimage="";
	  $("#div_show_error_message").html('');
           var designid=$("#holddesignidforroom").val();
           
           var value_length=$("#designproductid_"+designid).length;
          
          if((value_length==0)||($("#designproductid_"+designid).val().trim()==""))
	  {
	         $("#div_show_error_message").html('<div class = "alert alert-error medium">Select at least one product</div>');
	  }
	  else if($("#displaydesignimages").html().trim()=="")
	  {
		  
		$("#div_show_error_message").html('<div class = "alert alert-error medium">Upload at least one design image</div>');  
		  
	  }
	  else 
	  {
	  
	   $("#hidproductsearch").val("SaveSelected");
	   $("#productid").val(productimage);
		$(".popup_design").show();
          }
  });
  
 
   
  //Search product database by product name
  $("#searchproductname").click(function()
  {
     var productimage = "";
	 var productname = "";
	var designid = $("#holddesignidforroom").val();
	
  $('.selectedprod').each(function()
  {
  
	if(productimage=="")
	productimage = this.value;
	else
		productimage = productimage+','+this.value;
});

	productname = $("#productsearchbyname").val();

	$.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/text_search',
        type: 'POST',
		data: {productimage: productimage, productname: productname},
        success : function(data) {
				$("#productlist").html(data);
				$(".cbox").hide();
				}
	   
    });
		
		});
	 
	 
  
  //Filter prodcuts by selection
  
  $("#filterproduct").click(function()
  {
	

    var is_filter=false;
    var producttypeid="";
    var productprice="";
    var productcolor="";
    var productstyle="";
    var productmaterial=""; 
	var productimage = "";
	
	
	var designid = $("#holddesignidforroom").val();
	
  $('.selectedprod').each(function()
  {
  
	if(productimage=="")
		productimage = this.value;
	else
		productimage = productimage+','+this.value;
		
  
		});

		
		
  $('input[name="searchproducttype[]"]:checked').each(function(i,e)
  {
	  if(producttypeid=="")
	  producttypeid=e.value;
           else
           producttypeid=producttypeid+','+e.value;
           
  });
 
  
  $('input[name="searchprice[]"]:checked').each(function(i,e)
  {
	  if(productprice=="")
	  productprice=e.value;
      else
      productprice=productprice+','+e.value;
      
  });
 
  $('input[name="searchproductstyle[]"]:checked').each(function(i,e)
  {
	  if(productstyle=="")
	  productstyle=e.value;
      else
      productstyle=productstyle+','+e.value;
     
  });
  
  $('input[name="searchproductmaterial[]"]:checked').each(function(i,e)
  {
	  if(productmaterial=="")
	  productmaterial=e.value;
      else
      productmaterial=productmaterial+','+e.value;
    
  });
  
  $('input[name="searchproductcolor[]"]:checked').each(function(i,e)
  {
	  if(productcolor=="")
	  productcolor=e.value;
      else
      productcolor=productcolor+','+e.value;
     
  });
    

	$.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/filter_products',
        type: 'POST',
        data: {typeid: producttypeid, styleid: productstyle, colorid: productcolor, materialid: productmaterial, productimage: productimage },
       success : function(data) {
				$("#productlist").html(data);
				$(".cbox").hide();
				$(".dropdown-menu").hide();
				}
	   
    });
		
		

});

//Clear all searches and filters of the product db
$("#clearfilter").click(function(){

var productimage = "";
var designid = $("#holddesignidforroom").val();
	
  $('.selectedprod').each(function()
  {
  
	if(productimage=="")
	productimage = this.value;
	else
		productimage = productimage+','+this.value;
});

	$.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/clear_filter',
        type: 'POST',
		data: {productimage: productimage},
        success : function(data) {
				$("#productlist").html(data);
				$(".cbox").hide();
				$(".dropdown-menu").hide();
				}
	   
    });
		
		});
	

	

  
  //Save a product to the database
$("#savecurrentproduct").click(function()
{

	
	var p_value=1;
	$("#producterrormessage").html("");
    $(".alert").remove();
	if($("#product_name").val().trim()=="")
	{

	   $("#productnamerow").before("<p class='alert alert-error' id='product_name_error'>Enter Product Name");	
	   p_value=0;	
	}
	if($("#Price").val().trim()=="")
	{
	   $("#pricerow").before("<p class='alert alert-error' id='Price_error'>Enter product price</p>");	
	   p_value=0;	
	}

	if($("#dimention").val().trim()=="")
	{
	   $("#dimensionrow").before("<p class='alert alert-error' id='dimension_error'>Please Enter Dimensions</p>");	
	   p_value=0;		
	}
	if($("#selecttypefilter").html().trim()=="")
	{
	   $("#selecttypefilter").before("<p class='alert alert-error' id='Typefilter_error'>Enter Type</p>");		
	   p_value=0;
	}
	if($("#selectstylefilter").html().trim()=="")
	{
	   $("#selectstylefilter").before("<p class='alert alert-error' id='Stylefilter_error'>Enter Style</p>");		
	   p_value=0;
	}
	if($("#selectcolorfilter").html().trim()=="")
	{
	   $("#selectcolorfilter").before("<p class='alert alert-error' id='Colorfilter_error'>Enter Color</p>");		
	   p_value=0;
	}
	if($("#selectmaterialfilter").html().trim()=="")
	{
	   $("#selectmaterialfilter").before("<p class='alert alert-error' id='Materialfilter_error'>Enter Material</p>");	
	   p_value=0;	
	}
	if($("#uploadproductpic").val().trim()=="" && $("#productweblink0").val().trim()=="")
	{
	   $("#productweblink").before("<p class='alert alert-error'>Upload picture or weblink</p>");		
	   p_value=0;
	}
	if($("#Price").val().trim()!="" && !$.isNumeric($("#Price").val()))
       {
		$("#Price").before("<p class='alert alert-error' id='Price_error'>Please enter price in numeric format</p>");	
		p_value=0;	
	}
	if($("#ship_cost").val().trim()!="" && !$.isNumeric($("#ship_cost").val()))
        {
		$("#ship_cost").before("<p class='alert alert-error' id='ship_cost_error'>Enter ship cost in numeric format</p>");	
		p_value=0;
	}


   // if(($("#productweblink0").val().trim()!="") && (/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#productweblink").val()))==false)
    // {
        // $("#productweblink0").before("<p class='alert alert-error' id='productweblink_error'>Please enter valid URL</p>");	
        // p_value=0;
    // }
	   // if(($("#productweblink1").val().trim()!="") && (/^(http|https|ftp):\/\/[a-z0-9]+([-.]{1}[a-z0-9]+)*.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test($("#productweblink").val()))==false)
    // {
        // $("#productweblink1").before("<p class='alert alert-error' id='productweblink_error'>Please enter valid URL</p>");	
        // p_value=0;
    // }

	
    else if(p_value==1)
    {
		
	  $("#addproductform").submit();	
     }
	});

	
//Add product pictures to the product
$("#adduploadproductpic").click(function()
{
	
	if(total<=5)
	{
	$("#appenduploadphoto").append('<p id="uploadproductpic_'+total+'" class="imageappend"><input type="file" name="uploadproductpic'+total+'" class="uploadproductpic" onchange="typechackfileupload('+total+');"/><input type="button" value="remove" onclick="removeuploadpic('+total+')"></p>');
    total++;	
        }
        
       
});

//add an input to add a weblink for an additional image in the add products screen
$("#addimagelink").click(function()
{
	
	if(total<=5)
	{
		$('#productlinkdiv'+total).show();
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

  $(".btn.dropdown-toggle").click(function()
  {return false;
  })

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

    $('<div id="productdetailsdiv_'+id+'" class="productdetailsdiv"><img src="'+$("#siteurl").val()+'assets/Images/ajax-loader.gif" width="20px" height="20px"/></div>').insertBefore("#productimage_"+id);
     
    $.getJSON($("#siteurl").val()+'index.php/Admin/site/product_details_on_hover/'+id, function(data,val) 
     {
	  
	   if(globalkey=="yes")
           {	  
               $.each(data, function(key, val) 
			   {
				   
                $("#productdetailsdiv_"+id+"").html(" ");
			    
			    $("#productdetailsdiv_"+id+"").append('<div class = "condensed small">'+val.product_name+'<br>Price:&nbsp;'+val.price+'<BR>Dimensions:&nbsp;'+val.dimensions+"</div>" );	  
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
function save_comment(input_id,conceptid,roomid,form_id)
        {
	     
	        $(".alert,.alert-error").remove();
	        if($("#"+input_id).val().trim()=="")
	        {
		        
		       $("#"+input_id).after("<div class='alert alert-error'>Enter some feedback.</div>");    
		       $("#"+input_id).focus();
	        }
	        else
	        {
                        $("#holdcomment").val($("#"+input_id).val());
                        $("#holdconceptid").val(conceptid);        
						$("#holdroomid").val(roomid);
						$("#"+form_id).submit();
	        }
	        
        }
		
	
		
function removetext(id,isreset)
{
         $(".alert,.alert-error").remove();
         if(isreset==1)
	$("#"+id).html(" ")

}
function resettest(id)
{
	$(".alert,.alert-error").remove();
         if($("#"+id).val().trim()=="")
	$("#"+id).html("Provide Some feedback for your designer");
	
}
var nav_start=1;

function slide_nav(total,direction)
{

  

	if((direction=='prev')&&(nav_start>1))
	{
	$("#room_des_"+nav_start+"" ).removeClass( "item active" ).addClass( "item");
         nav_start=nav_start-1;
         $("#room_des_"+nav_start+"" ).removeClass( "item" ).addClass( "item active");
         }
         else if((direction=='next')&&(nav_start<total))
         {
		
	$("#room_des_"+nav_start+"" ).removeClass( "item active" ).addClass( "item");
         nav_start=nav_start+1;
         $("#room_des_"+nav_start+"" ).removeClass( "item" ).addClass( "item active");
	}
         
}

function add_product_concept(){
	
	var weblink = $('.weblink').val();
	var price = $('.price').val();
	if (weblink!="Image Link"&&weblink!=""&&price!=""&&price!="")
	{
	
		$("#addproducts").submit();
	

	}
	
	else {alert('need more information');}

}

function assign_designer(user_id)
{
	var user_id = user_id;
	var designer_name = $("#select_"+user_id).val();
	$.ajax({
        url: $('#siteurl').val()+'index.php/Admin/site/assign_designer',
        type: 'POST',
		data: {user_id: user_id, designer_name: designer_name},
        success : function(data) {
				$('#designer_'+user_id).html(designer_name);
				}
	   
    });
	
	
	}

	// Add comment for concept products from user
function add_prod_comment(id){

var comment = $('#prod_comment_'+id).val();
var pcid = id;

if (comment !=""&&comment!="Type Feedback Here..."){
$.ajax({
        url: $('#siteurl').val()+'index.php/Concept/site/save_prod_comments',
        type: 'POST',
		data: {comment: comment, pcid: pcid},
        success : function(data) {
				$('#this').parent().html('<p class = "alert">Saved</p>');
				}
	   
    });
	
	}
	else {$('#prod_comment_'+id).prepend('<div class = "alert alert-error">Please Enter Feedback</div>');}
	
	}
	
	
	function clearContents(element) {
  element.value = '';
}

// $("#ascproduct").click(function(){
  // var is_sort=false;
  // var ascproducttypecheck="";
  // var ascproductcolortypecheck="";
  // var ascproductmaterialtypecheck="";
  // var ascproductstylecheck="";
  // var ascproductpricecheck="";
           // $('input[name="producttypecheck[]"]:checked').each(function(i,e)
           // {
			  // is_sort=true;
			  // if(ascproducttypecheck=="")
			   // ascproducttypecheck=e.value;
			   // else
			   // ascproducttypecheck=ascproducttypecheck+','+e.value;
			   
		   // })
           // $('input[name="productcolortypecheck[]"]:checked').each(function(i,e)
           // {
                            // is_sort=true;
                            // if(ascproductcolortypecheck=="")
			    // ascproductcolortypecheck=e.value;
			    // else
			    // ascproductcolortypecheck=ascproductcolortypecheck+','+e.value;
			   
			   
			   
		   // })
	 // $('input[name="productmaterialtypecheck[]"]:checked').each(function(i,e)
           // {
			   // is_sort=true;
               // if(ascproductmaterialtypecheck=="")
			   // ascproductmaterialtypecheck=e.value;
			   // else
			   // ascproductmaterialtypecheck=ascproductmaterialtypecheck+','+e.value;
		 // })
	// $('input[name="productstylecheck[]"]:checked').each(function(i,e)
           // {
			   // is_sort=true;
			   // if(ascproductstylecheck=="")
			   // ascproductstylecheck=e.value;
			   // else
			   // ascproductstylecheck=ascproductstylecheck+','+e.value;
			   
			   
		   // })
              // $('input[name="ascprice[]"]:checked').each(function(i,e)
                   // {
			   // is_sort=true;
			   // if(ascproductpricecheck=="")
			   // ascproductpricecheck=e.value;
			   // else
			   // ascproductpricecheck=ascproductpricecheck+','+e.value;
			   
			   
		   // })
		   
		// $("#searchoptionforprice").val(ascproductpricecheck);
		// $("#hidproducttypecheck").val(ascproducttypecheck);
		// $("#hidproductcolortypecheck").val(ascproductcolortypecheck);
		// $("#hidproductmaterialtypecheck").val(ascproductmaterialtypecheck);
		// $("#hidproductstylecheck").val(ascproductstylecheck);
		
		  // if(is_sort)
		  // { 
		  // $("#hidproductsearch").val("sort");
                 
                    // $("#saveproduct").submit();
                    // }
  
// });
