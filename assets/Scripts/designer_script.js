 var array_week_day=new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
 
 $(document).ready(function() 
 {
   $("#Prev_dis").click(function(){
    var hold_day=new Array();
var	hold_week_day=new Array();
var hold_start_time=new Array();
var hold_end_time=new Array();
    var cur_year=($("#currentmonth").val()==1?$("#currentyear").val()-1:$("#currentyear").val())
    var cur_month=($("#currentmonth").val()==1?12:$("#currentmonth").val()-1);	
    var dd=0;
   $.post($("#baseurl").val()+"index.php/Admin/site/assign_date_time_user", {userid :$("#userid").val(),designerid:$("#designerid").val(),uyear:cur_year,umonth:cur_month,type:'select'}, function(data)
	{
           
            if(data.length>0)
            { 
		        var h_data=$.parseJSON(data);
               
			   $.each(h_data, function(key, val) 
			   {
				  	hold_day[val.day]=val.day;
					hold_week_day[val.day]=val.week_day;
					hold_start_time[val.day]=val.start_time;
					hold_end_time[val.day]=val.end_time;
                              
				})
       
            
            }
		 var start_month= ($("#start_month").val()==1?7:$("#start_month").val()-1);
		 if((cur_year)%4)
		  {
		  array_num_in_month=new Array(31,28,31,30,31,30,31,31,30,31,30,31);	  
		  }
		  else
		  {  
		  array_num_in_month=new Array(31,29,31,30,31,30,31,31,30,31,30,31);
		  }
		 var week_day=new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
		 var start_for=array_num_in_month[cur_month-1]%7;
		 while(start_for>1)
		 {
		       if(start_month==1)
		       start_month=7;
		       else
		       start_month=start_month-1;
		       start_for=start_for-1;
		  }
		var cal_table="<table width='100%' height='100%'>";
		 var displaytime="";
		 var timesave=new Array();
		 var rowidsave=new Array();
		for(z=1;z<=(31+start_month);z++)
		   {
                        num=z-(start_month-1); 
						
	var time_flage=(hold_start_time[num]==null?false:true);
			if(time_flage)
	                      {
                           
					displaytimeid=num.toString()+cur_month.toString()+cur_year.toString();
							
				        displaytime=(displaytime==""?'<div id=di_ti'+displaytimeid+' style="font-size:12px;">'+hold_start_time[num]+'&nbsp;to&nbsp;'+hold_end_time[num]+'</div>':displaytime+'<div id=di_ti'+displaytimeid+'>'+hold_start_time[num]+'to'+hold_end_time[num]+'</div>');
							
						  }		
						
						
						if(z%7==1)
                          {
                           dd=0;
                           var a_z=z;
						   cal_table= cal_table +'<tr><td width="75px" valing="top"><div style="width:5px;font-size:15px;" id="designertime'+a_z+'">&nbsp;</div></td>';
						   
						 
	                      }
                          if(z>=start_month)
                          {
			               
                           
						    var flage=(num==hold_day[num]?true:false);
						   
		 if(num<=array_num_in_month[cur_month-1])
                            {
			     
                     dd=dd+1;
                         
                 var makeid=num.toString()+dd.toString()+cur_year.toString()+cur_month.toString();
                    
                               if(flage)
                               {
			         if(check_date(cur_year,cur_month,num))         
                                    cal_table=cal_table+'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'+makeid+'" onclick="remove_check('+$("#userid").val()+','+$("#designerid").val()+','+num+','+dd+','+cur_year+','+cur_month+')"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div><a onclick="insertTime('+num+','+dd+','+cur_year+','+cur_month+','+makeid+','+a_z+');" id="checkdate'+makeid+'">'+num+'</a></td>';
                                    else
                                    cal_table=cal_table+'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'+makeid+'"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div><span id="checkdate'+makeid+'">'+num+'</span></td>'; 	                      
	                       }
	                           else
	                           {
			             if(check_date(cur_year,cur_month,num))
			             cal_table=cal_table+'<td><a onclick="insertTime('+num+','+dd+','+cur_year+','+cur_month+','+makeid+','+a_z+');" id="checkdate'+makeid+'">'+num+'</a></td>'; 
		                      else
		                      cal_table=cal_table+'<td><span  id="checkdate'+makeid+'">'+num+'</span></td>';             
		                   }
	                   }
                            else
                            cal_table=cal_table+'<td></td>';
	                 }
                          else
                          {
                          cal_table=cal_table+'<td></td>';
	                 }
                          if(z%7==0)
						 {
                                                      cal_table=cal_table+'</tr>';
						 
						if(displaytime!="")
						{
						 rowidsave[rowidsave.length]=a_z;
						 timesave[a_z]=displaytime;
						}
						 displaytime="";
						 }
		
		}
		cal_table=cal_table+'</table>';
		
		$("#design_day").html("");
		
		
		$("#design_day").html(cal_table);
		$("#forNextday").val(dd);
		 $("#start_month").val(start_month);
		 $("#currentyear").val(cur_year);
		 $("#currentmonth").val(cur_month);
		$("#curyear").html(cur_year);
		$("#curmonth").html(cur_month);

		for(ik=0;ik<rowidsave.length;ik++)
		{
			$("#designertime"+rowidsave[ik]).append(timesave[rowidsave[ik]]);
			
		}
		 }) 
		 
     }) 
		
		$("#Next_dis").click(function(){

    var hold_day=new Array();
    var hold_week_day=new Array();
    var hold_start_time=new Array();
    var hold_end_time=new Array();
 
    
	         var dd=0;
		 var cur_year=($("#currentmonth").val()==12?parseInt($("#currentyear").val())+1:$("#currentyear").val())
		 var cur_month=($("#currentmonth").val()==12?1:parseInt($("#currentmonth").val())+1);
		 
         $.post($("#baseurl").val()+"index.php/Admin/site/assign_date_time_user", {userid :$("#userid").val(),designerid:$("#designerid").val(),uyear:cur_year,umonth:cur_month,type:'select'}, 
	function(data)
	{
	   if(data.length>0)
            { 		   var h_data=$.parseJSON(data);
               
			   $.each(h_data, function(key, val) 
			   {
				  
					hold_day[val.day]=val.day;
					hold_week_day[val.day]=val.week_day;
					hold_start_time[val.day]=val.start_time;
					hold_end_time[val.day]=val.end_time;
                   
                              
				})
       
            }
			
			 var start_month= ($("#forNextday").val()==7?1:parseInt($("#forNextday").val())+1);
		
		 if((cur_year)%4)
		  {
		  array_num_in_month=new Array(31,28,31,30,31,30,31,31,30,31,30,31);	  
		  }
		  else
		  {  
		  array_num_in_month=new Array(31,29,31,30,31,30,31,31,30,31,30,31);
		  }
		 
		 var week_day=new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
		 var start_for=array_num_in_month[cur_month-1]%7;
		
		
		 var cal_table="<table width='100%' height='100%'>";
                   var displaytime="";
		 var timesave=new Array();
		 var rowidsave=new Array();
		
		for(z=1;z<=(31+start_month);z++)
		   {
                          
						  num=z-(start_month-1); 
						
						
						
						var time_flage=(hold_start_time[num]==null?false:true);
			if(time_flage)
	                      {
                           
					displaytimeid=num.toString()+cur_month.toString()+cur_year.toString();
							
	
	 displaytime=(displaytime==""?'<div id=di_ti'+displaytimeid+' style="font-size:12px;">'+hold_start_time[num]+'&nbsp;to&nbsp;'+hold_end_time[num]+'</div>':displaytime+'<div id=di_ti'+displaytimeid+'>'+hold_start_time[num]+'to'+hold_end_time[num]+'</div>');
							
						  }		
						

						  
						  if(z%7==1)
                          {
		        dd=0;var a_z=z;
                          cal_table= cal_table +'<tr><td width="75px" valing="top"><div style="width:5px;font-size:15px;" id="designertime'+a_z+'">&nbsp;</div></td>';
						  
	                 }
                          if(z>=start_month)
                          {
		                 
           var flage=(num==hold_day[num]?true:false);
						
		if(num<=array_num_in_month[cur_month-1])
        { dd=dd+1;
        var makeid=num.toString()+dd.toString()+cur_year.toString()+cur_month.toString();
        if(flage)
        { 
	        
	         if(check_date(cur_year,cur_month,num))
	          cal_table=cal_table+'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'+makeid+'" onclick="remove_check('+$("#userid").val()+','+$("#designerid").val()+','+num+','+dd+','+cur_year+','+cur_month+')"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div><a onclick="insertTime('+num+','+dd+','+cur_year+','+cur_month+','+makeid+','+a_z+');" id="checkdate'+makeid+'">'+num+'</a></td>';
		else
		cal_table=cal_table+'<td style="background-color:#5AC92E;"><div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'+makeid+'" ><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div><span  id="checkdate'+makeid+'">'+num+'</span></td>';					  
							  }else
							  {
								
								if(check_date(cur_year,cur_month,num))  
							         cal_table=cal_table+'<td><a onclick="insertTime('+num+','+dd+','+cur_year+','+cur_month+','+makeid+','+a_z+');" id="checkdate'+makeid+'">'+num+'</a></td>';
							         else
							         cal_table=cal_table+'<td><span  id="checkdate'+makeid+'">'+num+'</span></td>';
							  }
					
					}
                          else
                          cal_table=cal_table+'<td></td>';
	                 }
                          else
                          {
                          cal_table=cal_table+'<td></td>';
	                 }
                          if(z%7==0)
                          {
			 cal_table=cal_table+'</tr>';
					if(displaytime!="")
						{
						 rowidsave[rowidsave.length]=a_z;
						 timesave[a_z]=displaytime;
						}
					displaytime="";

			}
		        }
		        cal_table=cal_table+'</table>';
		
		        $("#design_day").html("");
		        $("#design_day").html(cal_table);
		        $("#start_month").val(start_month);
		        $("#currentyear").val(cur_year);
		        $("#currentmonth").val(cur_month);
                  
                  $("#forNextday").val(dd);
		$("#curyear").html(cur_year);
		$("#curmonth").html(cur_month);
		for(ik=0;ik<rowidsave.length;ik++)
		{
			$("#designertime"+rowidsave[ik]).append(timesave[rowidsave[ik]]);
			
		}
			
			 });
	})
	
 });
var udate;
var uday;
var uyear;
var umonth;
var globalid;
var urowid;
var weekrow;
function insertTime(date,day,currentyear,currentmonth,makeid,rowid)
{	
	
	$("#date_time_error").html("");
         weekrow=Math.floor(rowid/7)+1;
         udate=date;
	uday=day;
	uyear=currentyear;
	umonth=currentmonth;
	globalid=makeid;
	urowid=rowid;
	$("#availability_time").show();
}
function availability_with_time(userid,designerid)
{
   $("#date_time_error").html("");

  
   var flage= (parseInt($("#startdesignerhour").val())<parseInt($("#enddesignerhour").val())?true:(parseInt($("#startdesignerhour").val())==parseInt($("#enddesignerhour").val())?(parseInt($("#startdesignerminute").val())<=parseInt($("#enddesignerminute").val())?true:false):false));


if(flage==false)
{
   $("#date_time_error").html("Start date should less than end time!");	
  
}
if(flage==true)
{
     $.post($("#baseurl").val()+"index.php/Admin/site/assign_date_time_user", {userid :userid,designerid:designerid,udate :udate,uday :uday,uyear:uyear,umonth:umonth,ushour:$("#startdesignerhour").val(),usminute:$("#startdesignerminute").val(),uehour:$("#enddesignerhour").val(),ueminute:$("#enddesignerminute").val(),weekrow: weekrow,type:'insert'}, 
	function(data)
	{
     
            if(data.length>0)
            {
		         
		
	   var weektime=$.parseJSON(data);
	   
	                   $.each(weektime, function(key, val) 
			   {
				  	
			var checkid=val.day.toString()+val.week_day.toString()+val.year.toString()+val.month.toString();
                   
                           var dispalytimeid= val.day.toString()+val.month.toString()+val.year.toString();
    
		          $("#showcheck"+checkid+"").parent().css("background-color","#ffffff");
                            $("#showcheck"+checkid+"").remove();
                            $("#di_ti"+dispalytimeid+"").remove();
		              })
	   
		   
	   
	   
	   $("#availability_time").hide();
            $("#checkdate"+globalid).parent().css("background-color","#5AC92E");
            
            $("#checkdate"+globalid).before('<div style="width:60px;height:33px;position:absolute;margin-top:-8px;" id="showcheck'+globalid+'" onclick="remove_check('+userid+','+designerid+','+udate+','+uday+','+uyear+','+umonth+')"><img src="../../../../../assets/Images/l.png" height="30px;" width="30px;"/></div>');
            var startdisplaytime=$("#startdesignerhour").val()+":"+$("#startdesignerminute").val()+":"+"00";
            var enddisplaytime=$("#enddesignerhour").val()+":"+$("#enddesignerminute").val()+":"+"00";
            var displaytimeid=udate.toString()+umonth.toString()+uyear.toString();
            
            $("#designertime"+urowid).append('<div id=di_ti'+displaytimeid+' style="font-size:12px">'+startdisplaytime+'&nbsp;to&nbsp;'+enddisplaytime+'</div>');
         }
         }) 
  }       
	
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

