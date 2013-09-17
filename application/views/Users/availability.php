<?php 
	include(APPPATH.'/views/templates/header.php');
?>
 
	  <div class = "white">
	  	  <BR><BR><BR>
		  
		  <div class = "container">
		  <div class = "span10 text-center"><br><BR><Br><Br>
		  <p class = "large blue_text sanslight">
		  When can we call you?
		  </p>
		  <p class = "condensed medium black_text">
		  Your decorator will call you to chat further.
		  <BR><BR><br>
		  <div id = "datefields">
		  <p class = "condensed medium">
	  Select a Day that Works: &nbsp;<input type="text" id="datepicker" /></p>
	  
	  <a id = "check" class = "button3 pink white_text sanslight midsmall">SEE AVAILABILITY</a></div>
	  </div>
	  <div class = "span4 offset4">
	  <div id = "list"><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
	  </div>
	  </div>
	  <div class = "span12"><BR><BR><BR><BR><BR><BR>
	  </div>
	  
	   <script>
  $(function() {
    $('#datepicker').datepicker({  
            inline: true,  
            showOtherMonths: true,  
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],  
        });  
  });
  
  
  
$("#check").click(function(){
var datecheck = $("#datepicker").val();
$.ajax({
    type: "POST",
    url: "../site/check",
    data: {datecheck: datecheck},
    success: function(data) {
	$("#list").html(data);
 $("#select").click(function(){
		
		var selected=$("input[type='radio']:checked");
		if(selected.length>0)
		{
		
		var datepick=selected.val();
		
		}
			$.ajax({
				type: "POST",
				url: "../site/book_time",
				data: {datepick: datepick},
				success: function(data) {
				$("#datefields").html(data);
				$("#list").hide();
			}
 

 
			});

			});
			}

    });
	});



  
  
  </script>
