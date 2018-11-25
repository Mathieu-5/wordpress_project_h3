/*--------------------------------------------------
Gallery
--------------------------------------------------*/
jQuery(document).ready(function($) {
function gallery() {
    if ($('.gallery .flexslider').size()) {
        $('.gallery .flexslider').flexslider({
            animation: 'fade',
			touch: true, 
            slideshow: true,
			slideshowSpeed: 7000,
			animationSpeed: 600
        });
    }
}


/*--------------------------------------------------
WIN LOAD
--------------------------------------------------*/

	$(window).load(function () {
		gallery();
	});
});