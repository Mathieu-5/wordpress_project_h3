/*--------------------------------------------------
WIN LOAD GET POSTS ANIMATION
--------------------------------------------------*/
jQuery(document).ready(function ($) {
  
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
	$(".vcmpzoomme img").css({
		width: (50 + scroll/5)  + "%",

		"-webkit-filter": "blur(" + (scroll/200) + "px)",
		filter: "blur(" + (scroll/200) + "px)"
	});
});

});