 jQuery(document).ready(function ($) {

	$('.hexagon-title a').magnificPopup({
	  disableOn: 700,
	  type: 'iframe',
	  fixedContentPos: true,
	  fixedBgPos: true,
	  overflowY: 'hidden',
	  closeBtnInside: true,
	  preloader: true,
	  midClick: true,
	  removalDelay: 300,
	  mainClass: 'my-mfp-slide-bottom'
	});
});
