<?php 
	include(APPPATH.'/views/templates/header.php');
?>

<noscript>
<style type="text/css">
        .form_container {display:none;}
</style>

<div class = "well"><p class = "large serif">You Should Enable Javascript.  It is, after all, 2013!</p>
		
	<p class = "sanslight medium">Don't know how?<br>
			Click here for <a class = "black_text" href = "https://support.mozilla.org/en-US/home">Mozilla.</a><br>
			Click here for <a class = "black_text"  href= "https://support.microsoft.com/ph/807">Internet Explorer</a><br>
			Click here for <a class = "black_text"  href= "http://support.google.com/adsense/bin/answer.py?hl=en&answer=12654">Google Chrome</a>
	</p>
</div>
</noscript>


<script type="text/javascript" src="https://js.stripe.com/v2/stripe-debug.js">
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/">
</script>



<script type="text/javascript">

 // This identifies your website in the createToken call below
// var flag_sub=0; 

// This identifies your website in the createToken call below
//this plublish key of kbs.php@gmail.com test account. 
 //Stripe.setPublishableKey('pk_test_HRnP8vucwckyxOntuSL0MSC5');
//this plublish key of lee.m.mayer@gmail.com test account. 

//Stripe.setPublishableKey('pk_test_9yS0nvRQ3OHGX0SMmXZ2jDAG');

//this plublish key of lee.m.mayer@gmail.com live account. 

 Stripe.setPublishableKey('pk_test_9yS0nvRQ3OHGX0SMmXZ2jDAG');

// ...// ...
var str_amount;
function get_token()
{
	  str_amount=$("#show_design_fee").html();
      str_amount=str_amount.replace('$','');

     //if(($("#CVC").val().length>=3)&&($("#cardnumber").val().length<=16))    
     if(($("#CVC").val().length>=3))    
      {
        $('#submit_but').hide();
		// $('.continue2').append("<div class ='ajax_load button4'> <img src='"+$("#basepath").val()+"assets/Images/ajaxwhiteblack.gif' width='105px' height='105px'></div>");    
         Stripe.card.createToken({
              
         name: $('#card-name').val(),
         number: $('#cardnumber').val(),
         cvc: $('#CVC').val(),
         exp_month: $('#cart_month').val(),
         exp_year: $("#cart_year").val()
        }, stripeResponseHandler);
       
       }

}

var stripeResponseHandler = function(status, response) 
  {
  
  var $form = $('#payment-form');

  if(response.error) 
  {
    alert(response.error.message);
	$form.find('#payment-errors').html(response.error.message);
	$('#payment-errors').show();
	$('#submit_but').show();
	$('.ajax_load').hide();
    flag_sub=0;
  } 
  else if(status==200) 
  {
   // token contains id, last4, and card type
    var token = response.id;
    $("#tokencode").val(token);
    flag_sub=1;
	var email = $("#email").val();
    $.post($("#siteurl").val()+"index.php/Cart/site/use_token", {stripeToken:token,amount:str_amount,description:$("#email").val()},function(data)
    {
	
       
    if(data==1)
    {
        $(".ajax_load").html('<div class = "button4">Thank You!</div>');
		$("#user_payment_form").submit();
     }
    else
    {

      $form.find('#payment-errors').text(data);
	  $('#payment_errors').show();
	  $(".ajax_load").hide();
	  $('#submit_but').show();
    }    
})   

   }
};

</script>

<?php 

$totalfee =intval($fee)*$roomcount;
?>

<div class = "white">

<div class = "container white text-center form_container">
<div class = "logo">
<a href = "<?php echo base_url(); ?>"><img src = "<?php echo base_url('assets/Images/Blue_dalle.png');?>" height = "120px"></a>
</div><BR>
				
<div class = "border padding half">
<div id = "designlabel" class = "inline serif middle midlarge">Design Fee&nbsp;&nbsp; </div>
<span id="show_design_fee" class = "inline middle midlarge condensed pink_text"> $<?php echo $totalfee;?></span>
<br>.
<div class = "sanslight medium" >For the design of <?php echo $roomcount;?> rooms.</div>
</div>
		<BR><Br>
		
		
		<form id="user_payment_form" name="user_payment_form" method="post" action="<?php echo base_url('index.php/Cart/site/pay_submit');?>" enctype="multipart/form-data">
			
			<input type = "hidden" value = "<?php echo base_url();?>" id = "siteurl" name = "siteurl">
				<input type = "hidden" value = "<?php echo $roomcount;?>" id = "roomcount" name = "roomcount">
				<input type = "hidden" value = "<?php echo $totalfee;?>" id = "amount" name = "amount">
				<input type = "hidden" value = "<?php echo $userid;?>" id = "userid" name = "userid">
				<input type = "hidden" value = "Design Fee" id = "description" name = "description">
				<input type="hidden"  name="tokencode" id="tokencode"/>
			
			<div id="codepromotion" class = "row text-left">
			<label class = "span2 formlabel" for="promotioncode">Promotion Code:</label>
			<input type="text" name="promotioncode" value="Promotion Code" id="promotioncode" class = "span5 forminput middle"  maxlength="6"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
			<input type="button" class = "button4 white_text condensed small" name="Apply" value="Apply" id="designApply"/>
		<div id = "promoerror" class="alert alert-error sanslight small"></div>
		</div>
		
		<div id="payment-form" class = "text-center">
		  <span class="span10 alert-error alert" id="payment-errors"></span>
		  
		<div class="row text-left">
		
		  <label class = "span2 formlabel" for="cardtype">Card Type: </label>
			<div class = "inline"> 
            <select id="card-name" style= "width:100%" class = "span5 forminput">
		    <option value="Visa">
			 Visa
		     </option>
		     <option value="Mastercard">
			Mastercard
		     </option>
		     <option value="AmericanExpress">
		     American Express
		     </option>
		    
		    </select>
		</div>
		</div>
		<div class="row text-left">
			<div class = "payment-error alert alert-error"></div>
			<label class = "span2 formlabel" for="cardnumber">Card Number:</label>
			<input type="text" data-stripe="cardnumber" value="Card Number" id="cardnumber" class = "span4 forminput"  maxlength="16"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
			<input type="text" data-stripe="CVC" id="CVC" value="CVC" class = "span2 forminput" onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" style="width:9%" maxlength="4"/>
		</div>
		<div class="row text-left">
		<div for="cardnumber"  class = "span2 formlabel">Expiration Date: </div>
	<select data-stripe="exp-month" class = "span2 forminput" id="cart_month">
		 <?php

		   for($i=1;$i<=12;$i++)
		   {
			   echo '<option value='.$i.'>'.$i.'</option>';	
		   }
		 ?>	
	</select>
	<select data-stripe="exp-year" class = "forminput span2" id="cart_year">
		  <?php
		   for($year=2013;$year<=2020;$year++)
		   {
			echo '<option value='.$year.'>'.$year.'</option>';	
			}
		?>	
	</select> 
	</div>
	<div class="row text-left">
	<div for="card-name"  class = "span2 formlabel">Cardholder Name: </div>
	<input type="text" name="card-name" value="Cardholder Name" id="card-name" class = "span5 forminput middle"    onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
	</div>
	<div class="row text-left">
	<div for="email"  class = "span2 formlabel">Email Address: </div>
	<input type="text" name="email" value="<?php if(isset($email)){echo $email;} else {echo 'Email Address';}?>" id="email" class = "span5 forminput middle"    onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
	</div>
	<div class="row text-left">
	<div for="zipcode"  class = "span2 formlabel">Billing Zipcode: </div>
	<input type="text" name="zipcode" value="Billing Zipcode" id="zipcode" class = "span2 forminput middle"  maxlength="6"  onfocus="if(this.value==this.defaultValue){this.value=''}; return false;" onblur="if(this.value ==''){this.value =this.defaultValue};" />
	</div>	</div></div><BR><BR>
	<div class = "continue2 horizontal text-center"><a id = "submit_but" class = "button4 sanslight">Submit Payment</a></div>
	
	</div>
	</form>
	<script>
	
$(document).ready(function(){	 
	var siteurl=$("#siteurl").val();
	$(".alert").hide();  
	$(".continue2").hide()
		});
		
		
$("#user_payment_form input:text, #information input:password").keyup(function(){

$(this).css("color","gray");
if (
$("#CVC").val()==''||
$("#CVC").val()=="CVC"||
$("#CVC").val().length<3||
$("#cardnumber").val()==''||
$("#cardnumber").val()=="Card Number" ||
$("#zipcode").val()=='Billing Zipcode'||
$("#zipcode").val()==''||
$("#card-name").val()=='Cardholder Name'||
$("#card-name").val()==''
)
{
   $(".continue2").hide();
}
else 
{
	 $(".continue2").show();
}
});	 
		
	
	   $(function() 
       {
	   $('#expiration_date').datepicker({  
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
            });  
      });
	  
	  
	  
	  var $promotion_code=0;
     $("#designfeeid").val(0);
     $("#designApply").click(function()
     {
	 
	

         var designtype="incomplete";
		var roomcount = $("#roomcount").val();
	 
      var str="Promotion Code";
		if($("#promotioncode").val()==str||$("#promotioncode").val()=="")	 
        {
               
                $("#promoerror").html('Enter Promotion Code');
                 $("#promoerror").show();
				 return false;
          }
     

           $("#designApply").val('Searching');
          $.post($("#siteurl").val()+"index.php/Cart/site/promotion_code", {promotioncode :$("#promotioncode").val(),type:designtype}, 
          function(data)
          {
		    if(data.length>0)
            { 
			var data= data.split('-@-');
			$promotion_code=data[0];
	   
                   
                  
                   if($promotion_code==1)
                   {
                  var fee = data[2];
				   $("#designApply").val('Apply');
				  
                   $("#show_design_fee").html("$"+fee*roomcount); 
                   $("#amount").val(fee*roomcount); 
				   $(".alert,#imgspan").hide();
                   }                 
                   else
                   {
				  $("#designApply").val('Apply');
                   $("#promoerror").html('Invalid Code');
				   $("#promoerror").show();
                   $("#designfeeid").val(0);                     
                   }                    
                   return false; 
           }
           else
           {
		    $("#designApply").val('Apply');
		   $promotion_code=0;
	            $("#promoerror").html('Invalid Code')
				 $("#promoerror").show();
            } 
          })
	
	
	});
	

	
	
	$("#submit_but").click(function(){
	

	 $('#submit_but').hide();
	 $('.continue2').append("<div class ='ajax_load button4'> <img src='"+$("#siteurl").val()+"assets/Images/ajaxwhiteblack.gif' width='105px' height='105px'></div>");    
	
	
	       flag_sub=0;
	      var d = new Date();
          var curr_date = d.getDate();
          var curr_month = d.getMonth()+1 ; //Months are zero based
          var curr_year = d.getFullYear();
          var nowdate=curr_month+"/"+curr_date+"/"+curr_year;
	 
         
       
	
	    
	    get_token();
	    
	});
	
	  
	  </script>
	