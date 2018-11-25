jQuery(document).ready(function($) {

	var card = $(".vcmp3dhoverbox");

	$(document).on("mousemove",function(e) {
	  var ax = -($(window).innerWidth()/2- e.pageX)/20;
	  var ay = ($(window).innerHeight()/2- e.pageY)/10;
	  $('.vcmp3dhoverbox').css("transform","rotateY("+ax+"deg) rotateX("+ay+"deg)");
	  $('.vcmp3dhoverbox').css("-moz-transform","rotateY("+ax+"deg) rotateX("+ay+"deg)");
	});

});