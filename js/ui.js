// JavaScript Document



$('body').scrollTop(1);




// var jPM = $.jPanelMenu({
//    menu: '#nav_menu',
//    trigger: '#menu_button'
//});

//jPM.on();
//jPM.trigger(true);

// $("#menu_button").click(function () {
 // $("#page").toggleClass("menu_open",500);
	//$("#menu_close").show();
//});



$('#menu_button').click(function() {
  $('#page').animate({
    left: ['+=150', 'swing'],
  }, 150, function() {
      $("#page").addClass("menu_open");
	    $("#menu_close").show();
  });
});


$('#menu_close').click(function() {
	if ( $("#page").hasClass("menu_open") ) {
  $('#page').animate({
    left: ['-=150', 'swing'],
  }, 150, function() {
      $("#page").removeClass("menu_open");
	    $("#menu_close").hide();
  });
	}
});









window.onload = function () {
    var windowWidth = $(window).width();
    $('#page_box').css({'width':windowWidth});
};

window.onresize = function () {
    var windowWidth = $(window).width();
    $('#page_box').css({'width':windowWidth});
};



//$("#menu_close").mousedown(function () {
	
	//if ( $("#page").hasClass("menu_open") ) {
//$("#page").removeClass("menu_open");
//$("#menu_close").hide();
//}
//});





