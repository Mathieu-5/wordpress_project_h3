/*--------------------------------------------------
Gallery Quote
--------------------------------------------------*/
jQuery(document).ready(function($) {

	function galleryQuote() {
		if ($('.gallery-quote .flexslider').size()) {
			$('.gallery-quote .flexslider').flexslider({
				animation: 'slide',
				controlNav: false,
				smoothHeight: true,
				slideshow: true
			});
		}
	}


/*--------------------------------------------------
WIN LOAD
--------------------------------------------------*/
	$(window).load(function () {
		galleryQuote();
	});
});