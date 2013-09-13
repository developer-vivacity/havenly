 $(document).ready(function() 
 {
 jQuery.noConflict();
 
 (':checkbox:checked').each(function(){
	var image = $(this).parent().find('.designproduct');
	var id = image.attr('id');
	var id_get =id.split("_");
	
	alert ($(this).attr('checked'));
	
	});
 
	
 $(".checkimg").click(function()
 {
   
   var checkbox = $(this).parent().find('.productcheck');
   var image = $(this).parent().find('.designproduct');
   var id = image.attr('id');
   var id_get =id.split("_");
   
   if(checkbox.is(':checked'))
   {
	checkbox.prop('checked',!checkbox.prop('checked'));
	$(this).css({opacity:0});
 	removecheckbox(id_get[1]);
	   
	   }
   
   else{ 
   addcheckboxforaddcart(id_get[1]);
   $(this).css({opacity:0.8});
  checkbox.prop("checked",!checkbox.prop("checked"));}
});

	
$("#addallproduct").click(function()
{
		$("#shoppingcartform").submit();	
	
});

$(".productname").click(function()
{

   var image = $(this).parent().parent().find('.designproduct');
   var id = image.attr('id');
   var id_get =id.split("_");
document.location=$("#basepath").val()+"index.php/Cart/site/product_details_of_design/"+id_get[1]+"/"+$("#holddesignid").val()+"";
})


$("#cart_details").mouseout(function()
          {
	$("#productdetails").remove();
	});
}

)

function delete_design(user_id,design_id,room_id)
{
	$("#message_design_div").remove();
         $("body").before("<div style='z-index:100;position:absolute;background-color:#787274;width:100%;height:100%;opacity:0.9' id='message_design_div'><div style='width:450px;height:150px;margin-top:200px;margin-left:550px;background-color:white;text-align:center'><br/><br/><div>Delete Design?</div><br/><br/><div><span><input type='button' name='yes' value='yes' onclick='removedesigndiv("+user_id+","+design_id+","+room_id+")'/></span>&nbsp;&nbsp;<span><input type='button' name='no' value='no' onclick='removedesigndiv();'/></span></div></div></div>");

}
function addcheckboxforaddcart(id)
{
    
    $.post($("#basepath").val()+"index.php/Cart/site/add_or_update_cart", {productid :id,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"insert"}, function(data){
    if(data.length>0)
    { 
		       $("#total_items_in_cart").html(data);
      } 
    }) 
    
	
}
function removecheckbox(productid)
{

   $.post($("#basepath").val()+"index.php/Cart/site/add_or_update_cart", {productid :productid,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"delete"}, function(data){
    if(data.length>0)
    { 
        $("#total_items_in_cart").html(data);
    } 
    })
  
}
function submitcartvalue()
{
	 var issubmit=true;
	 $(".error").remove();
          if($("#totalvalueadd").val().trim()=="")
	 {
          $("#productamount").before('<div class="error" style="float:right;height:20px;margin-top:20px;">*Enter number!</div>');	
	 issubmit=false;
	 }
	 if($("#totalvalueadd").val().trim()!="" && !$.isNumeric($("#totalvalueadd").val()))
	 {
	 $("#productamount").before('<div class="error" style="float:right;height:20px;margin-top:20px;">*Enter value in numeric format:</div>');	
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


