/*--------------------------------------------------
Owl Carousel & Slider
--------------------------------------------------*/
jQuery(document).ready(function($) {

     
      $("#vcmp-owl-slider").owlCarousel({

		navigation : false, // Show next and prev buttons
		autoPlay: true,
		responsive: true,
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		  
		//Lazy load
		lazyLoad : true,
		lazyFollow : true,
		lazyEffect : "fade",
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });

});