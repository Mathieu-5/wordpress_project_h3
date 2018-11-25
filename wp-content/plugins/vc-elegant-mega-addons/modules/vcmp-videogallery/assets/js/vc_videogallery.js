 jQuery(document).ready(function ($) {
 
	$(".vcmp-video-iframe").fitVids();
 
	$(".vcmp-video-thumb").click(function() {
	  $('.vcmp-video-thumb > img').removeClass("active");
	  $(this).children('img').addClass("active");
	});

	$('div.vcmp-video-thumb, .vcmp-video-thumb .fluidvids').click(function() {

	  var target = $(this).children('iframe').attr('src');
	  var target2 = $(this).children('.fluid-width-video-wrapper').children('iframe').attr('src');
	  var target3 = $(this).children('.vcmp-video-wrapper .fluidvids').children('iframe').attr('src');
	  
	  if(target){
		$('.vcmp-video-iframe iframe').attr('src', (target));
	  } else if(target2){
		$('.vcmp-video-iframe .fluidvids iframe').attr('src', (target2));
	  } else if(target3){
		$('.vcmp-video-iframe .fluidvids iframe ').attr('src', (target3));
	  }
		
	  
	});
	
	$(".vcmp-video-thumb").click(function(){
		$('body').scrollTo($('.vcmp-video-wrapper'), 1000, {offset: -110});
	});
});
