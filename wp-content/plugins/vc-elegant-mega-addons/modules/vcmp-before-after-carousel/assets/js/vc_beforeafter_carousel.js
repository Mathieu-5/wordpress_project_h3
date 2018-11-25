 jQuery(document).ready(function ($) {
	 $('.owl-carousel').owlCarousel({
        items:1, 
        loop:true,
        margin:10,
		autoplay:true,
        responsive:{
            480:{
                items:2
            },
            600:{
                items:4
            }
        }
    });
});
