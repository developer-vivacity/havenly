 $(document).ready(function() 
 {
 $(".designproduct").mouseenter(function()
 {
  
   var id_get=(this.id).split('_');
   
  if($("#designproductcheck"+id_get[1]).length==0)
  {
	  $("#"+this.id).before('<div  class="addcart" style="position:absolute;float:left;width:70px;height:60px;background-color:#E8AA1A;opacity:0.7; cursor: pointer;" onclick="addcheckboxforaddcart('+id_get[1]+',\''+this.id+'\');"><img src="../../../../assets/Images/Tick-icon.png" height="25px" width="25px"/><br/><div>Add to cart</div></div>');	
  }	
}

)
$(".productimg").mouseleave(function()
{
	
	 $(".addcart").remove();

	
});
	
$("#addallproduct").click(function()
{
	
$("#shoppingcartform").submit();	
	
});

$(".designproduct").click(function()
{

	var id_get=(this.id).split('_');
	document.location=$("#basepath").val()+"index.php/Cart/site/product_details_of_design/"+id_get[1]+"";
	
})


}

)

function delete_design(user_id,design_id,room_id)
{
	$("#message_design_div").remove();
         $("body").before("<div style='z-index:100;position:absolute;background-color:#787274;width:100%;height:100%;opacity:0.9' id='message_design_div'><div style='width:450px;height:150px;margin-top:200px;margin-left:550px;background-color:white;text-align:center'><br/><br/><div>Delete Design?</div><br/><br/><div><span><input type='button' name='yes' value='yes' onclick='removedesigndiv("+user_id+","+design_id+","+room_id+")'/></span>&nbsp;&nbsp;<span><input type='button' name='no' value='no' onclick='removedesigndiv();'/></span></div></div></div>");

}
function addcheckboxforaddcart(id,appendid)
{
    $("#"+appendid).after('<input type="checkbox" onclick="removecheckbox(\'designproductcheck'+id+'\','+id+')" id="designproductcheck'+id+'" name="designproductcheck[]" value="'+id+'" checked/>');
    $.post($("#basepath").val()+"index.php/Cart/site/add_or_update_cart", {productid :id,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"insert"}, function(data){
    if(data.length>0)
    { 
       
    } 
    }) 
    
	
}
function removecheckbox(id,productid)
{
	
   $.post($("#basepath").val()+"index.php/Cart/site/add_or_update_cart", {productid :productid,roomid:$("#holdroomid").val(),designid:$("#holddesignid").val(),type:"delete"}, function(data){
    if(data.length>0)
    { 
       
    } 
    })
   $("#"+id).remove();
 
}
function submitcartvalue()
{
	 var issubmit=true;
	$(".error").remove();
         if($("#totalvalueadd").val().trim()=="")
	{
         $("#productamount").before('<div class="error" style="float:right;height:20px;">*Enter number!</div>');	
	issubmit=false;
	}
	if($("#totalvalueadd").val().trim()!="" && !$.isNumeric($("#totalvalueadd").val()))
	{
	$("#productamount").before('<div class="error" style="float:right;height:20px;">*Enter value in numeric format:</div>');	
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
