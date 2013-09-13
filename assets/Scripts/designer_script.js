
function availability_with_time(h_id)
{
     var starthour= ($("#timeformat").html()=="PM"?(parseInt($("#starthour").html())+12):(parseInt($("#starthour").html())==12?(parseInt($("#starthour").html())+12):parseInt($("#starthour").html())));
     
     var savedesigntime=parseInt(d_year)+"-"+parseInt(d_month)+"-"+parseInt(d_day)+" "+starthour+":"+$("#designtime").val()+":"+00;
    
     var displaydesigntime=$("#starthour").html()+":"+$("#designtime").val()+":"+"00"+"&nbsp;"+$("#timeformat").html();
     
     $.post($("#baseurl").val()+"index.php/Admin/site/assign_date_time_user", {designtime :savedesigntime,designerid:$("#designerid").val()}, 
	
	function(data)
	{
	
            if(data=="success")
            {

		$("#"+havetimeid).html(displaydesigntime);
		if($('#haveimg'+h_id).length>0)
                $('#haveimg'+h_id).remove();	

$("#"+havetimeid).before('<img src="'+$("#baseurl").val()+'assets/Images/l.png" height="30px;" width="30px;" id="haveimg'+$("#starthour").html()+'" />');        
		$("#updatetime").remove();
		
             }
         }) 
     
      
         
	
}

function remove_check(userid,designerid,udate,uday,uyear,umonth)
{
	  
      $.post($("#baseurl").val()+"index.php/Admin/site/assign_date_time_user", {userid :userid,designerid:designerid,udate :udate,uday :uday,uyear:uyear,umonth:umonth,type:'delete'}, 
	function(data)
	{       if(data.length>0)
            {
	          var checkid=udate.toString()+uday.toString()+uyear.toString()+umonth.toString();
                   $("#showcheck"+checkid+"").parent().css("background-color","#ffffff");
                   $("#showcheck"+checkid+"").remove();
		 var displaytimeid=udate.toString()+umonth.toString()+uyear.toString();
	          $("#di_ti"+displaytimeid+"").remove();
            }
         })
	  
	
}

function hide_div(id)
{
	
	$("#"+id).hide();
	
}

function check_date(curyear,curmonth,curday)
{
	
   curyear=parseInt(curyear);
   curmonth=parseInt(curmonth);
   curday=parseInt(curday);
   	
  if($("#presentyear").val()==curyear)
   {
	   
      if($("#monthofyear").val()<curmonth)
      {
            return true;
	    
      }
      else if($("#monthofyear").val()==curmonth)
      {
	    
	 if($("#dayofmonth").val()<=curday)
       	    return true;
       	    else
       	    return false;
      }
      else
      {
      return false;	  
      }  
  }
  else if($("#presentyear").val()<curyear)
  {
       return true;
  }
  else
  {
       return false;	
   }
}
function display_circle(id)
	{
		
	  $("#radiocircle").remove();
	
	  $("#"+id).before('<div style="position:absolute;" id="radiocircle"><img src="'+$("#baseurl").val()+'assets/Images/l.png" height="30px;" width="30px;"/></div>');
	
	}
function booktime()
{
              var selected = $("input[type='radio']:checked");
              if (selected.length == 0)
              {
				$(".error").html("Select at lest on time!");
	       }
		         else
		         {
				
			       $("#datepick").val(selected.val());	
			       $("#designercall").submit();
			}
		
}
var havetimeid;
 
var d_day;
var d_year;
var d_month;
var d_week_day;
var dayofweek=new Array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
var month= new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');


function designer_call(time,timeformat,id,in_id)
{
	d_day=$("#d_"+in_id).html();
	d_year=$("#y_"+in_id).html();
	d_month=(month.indexOf($("#m_"+in_id).html())+1);
	
	d_week_day=(dayofweek.indexOf($("#w_"+in_id).html())+1);
	
	havetimeid=id;
	$("#updatetime").remove();
	var starthour=time;
	
	var starttime=time+timeformat;
	
	if(time==12)
	{
	time=1;
	timeformat=(timeformat=="AM"?"PM":"AM");	
	}
	else
	{
	time=++time;	
	}
	
	var endtime=time+timeformat;
	
	var minute='<select style="width:80px;" name="designtime" id="designtime">';
	for(var t=1;t<60;t++)
	{
		minute+='<option value='+t+'>'+t+'</option>';
		
	}
	minute+='</select>';
	$("#designercall").before("<div id='updatetime' style='position:absolute;width:300px;background-color:#65ABAA;color:white;border:solid 2px white;'><div style='width:300px;'><b>&nbsp;Enter Time Between "+starttime+" to "+endtime+"</b></div><div><div style='float:left;width:20px' id='starthour'>"+starthour+"</div><div style='float:left;width:80px'>"+minute+"</div><div style='float:left;width:110px;' id='timeformat'>"+timeformat+"</div></div><div style='width:100px;float:right;'><input type='button' value='submit' onclick='availability_with_time("+in_id+");'/></div></div>");
	
	
}
