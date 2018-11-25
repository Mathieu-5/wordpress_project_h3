jQuery(document).ready(function($){
   
  var formHeight = $('.vcmp_subscribe_form').outerHeight();
  var welcomeHeight = $('.vcmp_subscribe_form').height();
  // Create function to have matched heights
  function getFormHeight(){
    //$('.vcmp_subscribe_form').css("height", welcomeHeight);
    $('#vcmp_subscribe_form').css("min-height", formHeight);
  }
  
  function changeWelcomeHeight(){
    var newWelcomeHeight = $('#vcmp_subscribe_form').height();
  }
  
  // Run our function to get heights
  getFormHeight();
  
  // Fade and Show elements when 'share your ideas' button clicked
  $('.vcmp_subscribe_show').on('click', function(){
    $('.vcmp_subscribe_fade').fadeOut("slow");
    $('#vcmp_subscribe_form').delay(300).fadeIn("slow");
  });
  
  // Fade and Show elements when 'close' button clicked
  $('.vcmp_subscribe_close').on('click', function(){
    $('#vcmp_subscribe_form').fadeOut("slow");
    $('.vcmp_subscribe_fade').fadeIn("slow");
  });
  
  $( window ).resize(function() {
     if ( $('#vcmp_subscribe_form').css('display') != 'none' ) {
		changeWelcomeHeight();
     }
	});

});