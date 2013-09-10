/* custom script */

//nav-right background
var scrollTopNavRight;

$(window).scroll(function () {
  scrollTopNavRight = $(window).scrollTop();
  setNavBackground();
});

function setNavBackground() {
  if(scrollTopNavRight > 73){
    $(".nav-right").addClass("nav-background");
  }else{
    $(".nav-right").removeClass("nav-background");
  }
}


//accordion menu
$(function(){
  $('#list-pages-accordion').dcAccordion({
		eventType: 'click',
		autoClose: false,
		saveState: false,
		disableLink: true,
		speed: 'fast'
	});
});