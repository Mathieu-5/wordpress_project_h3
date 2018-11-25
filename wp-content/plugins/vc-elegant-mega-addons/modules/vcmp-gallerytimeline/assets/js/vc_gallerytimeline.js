jQuery(document).ready(function ($) {

/*--------------------------------------------------
Gallery Timeline
--------------------------------------------------*/
	function galleryTimeline() {
		if ($('.vcmp-gallery-timeline .flexslider').size()) {
			$t = $('.vcmp-gallery-timeline .flexslider');
			$t.flexslider({
				animation: 'slide',
				slideshow: false,
				slideshowSpeed: 7000,
				animationSpeed: 600,
				controlNav: true,
				directionNav: false,
				start: function (slider) {
					// label in nav
					$('.flex-control-nav a', $t).each(function (i) {
						$(this).html('<span class="vcmp_year_dot"></span><span class="label-text">' + $('.label-text', $t).eq(i + 1).html() + '</span>');
					});
				}
			});
		}
	}


/*--------------------------------------------------
WIN LOAD
--------------------------------------------------*/
	$(window).load(function () {
		galleryTimeline();
	});
	
});
