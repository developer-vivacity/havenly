 $(document).ready(function() 
 {

  
	$(".renderfull").hide();
	$(".overlay").hide();
	$("#overlaymsg").hide();
	
 $(".checkimg").click(function()
 {

   var checkbox = $(this).parent().find('.productcheck');
   
   var image = $(this).parent().find('.designproduct');
   
   var id = image.attr('id');
   

   
   if(checkbox.is(':checked'))
   {
	checkbox.prop('checked',!checkbox.prop('checked'));
	
	$(this).css({opacity:0});
 	
 	removecheckbox(id);

  }
  else
  { 
   addcheckboxforaddcart(id);
   
   $(this).css({opacity:0.8});
  
  checkbox.prop("checked",!checkbox.prop("checked"));}
 
  
});

	
$("#addallproduct").click(function()
{
		$("#shoppingcartform").submit();	
	
});



$("#cart_details").mouseout(function()
{
	$("#productdetails").remove();
});

$(".design_image").click(function(){

	var image = $(this).find('img').attr('src');
	$(".renderfull").html('<a class = "closebutton black_text large sanslight" onclick="close_box();">X</a><img src ="'+image+'" width = "100%">');
	$(".renderfull, .overlay").show();
});

$(".overlay").click(function(){
	close_box();
	});

$(".smallimage").click(function(){

	var currimg = $(this).find('img').attr('src');
	var oldimg = $(".imageholder").find('img').attr('src');
	
	$(this).html('<img src ="'+oldimg+'"  height = "100%">');
	$(".imageholder").html('<img src = "'+currimg+'" height = "100%">');
	
});

$('#checkoutbutton').click(function(){

var designid = $("#designidhold").val();

    $.ajax({
        url: $('#siteurl').val()+'index.php/Cart/site/confirm_order',
        type: 'POST',
        data: {design_id: designid},
       success : function(data){
			$('#overlaymsg').fadeIn();
		  	   }
    });
	


});

$("#overlaymsg").click(function(){

$("#overlaymsg").fadeOut();
});
	
});

//----This function add product to shopify card--------//

function add_to_cart()
{	 $('#shoppingcartform').attr('action', 'https://leemayer.myshopify.com/cart/add');
	 $('#shoppingcartform').submit();
}
//---------------------------------------------------------------------------------------

function close_box(){
$(".renderfull").fadeOut();
$(".overlay").fadeOut();
}

function delete_design(user_id,design_id,room_id)
{
	$("#message_design_div").remove();
         $("body").before("<div style='z-index:100;position:absolute;background-color:#787274;width:100%;height:100%;opacity:0.9' id='message_design_div'><div style='width:450px;height:150px;margin-top:200px;margin-left:550px;background-color:white;text-align:center'><br/><br/><div>Delete Design?</div><br/><br/><div><span><input type='button' name='yes' value='yes' onclick='removedesigndiv("+user_id+","+design_id+","+room_id+")'/></span>&nbsp;&nbsp;<span><input type='button' name='no' value='no' onclick='removedesigndiv();'/></span></div></div></div>");
}
function addcheckboxforaddcart(id)
{
	
	$(".checkimg .gray_text .serif .small").show();
	
		$.ajax({
        url: $('#basepath').val()+'index.php/Cart/site/add_or_update_cart',
        type: 'POST',
		data: {productid:id,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"insert"},
        success : function(data) {
			$("#total_items_in_cart").html(data);
			$("#clicktoadd"+id).html('<p>C L I C K  T O  R E M O V E</p>');
		}
	   
   
    });
    
	
}
function removecheckbox(productid)
{

	$.ajax({
        url: $('#basepath').val()+'index.php/Cart/site/add_or_update_cart',
        type: 'POST',
		data: {productid:productid,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"delete"},
        success : function(data) {
			$("#total_items_in_cart").html(data);
			$("#clicktoadd"+productid).html('<p>C L I C K  T O  A D D</p>');
}
      });
  
}
function submitcartvalue()
{
	 var issubmit=true;
	 $(".alert").hide();
     if($("#totalvalueadd").val().trim()=="")
	 {
	 
          $("#productamount").before('<div class="alert alert-error" style="float:right;height:20px;margin-top:20px;">Enter Quantity</div>');	
			issubmit=false;
	 }
	 if($("#totalvalueadd").val().trim()!="" && !$.isNumeric($("#totalvalueadd").val()))
	 {
		$("#productamount").before('<div class="alert alert-error">Enter Count in Numeric Value</div>');	
		issubmit=false;
	 }
	 if(issubmit==true)
	 {
          $("#productdetails").submit();
	 }
	
}
function removedesigndiv(user_id,design_id,room_id)
{
	
	$("#message_design_div").remove();
	if((user_id!=null) && (design_id!=null) && (room_id!=null))
	location.href=$("#sitepath").val()+'index.php/Cart/site/delete_assign_design/'+user_id+'/'+room_id+'/'+design_id+''
	
	
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

