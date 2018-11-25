/*--------------------------------------------------
GUMMY SLIDER
--------------------------------------------------*/
jQuery(document).ready(function($) {
	var slide = $(".gummyslide");
	var viewWidth = $(window).width();
	var sliderInner = $(".gummy_slider_inner");
	var childrenNo = sliderInner.children().length;
	
	sliderInner.width( viewWidth * childrenNo );
	
	$(window).resize(function(){
		viewWidth = $(window).width();
	});
	
	function setWidth(){
		slide.each(function(){
			$(this).width(viewWidth);
			$(this).css("left", viewWidth * $(this).index());
		});	
	}
	
	function setActive(element){
		var clickedIndex = element.index();
		
		$(".gummy_slider_nav .active").removeClass("active");
		element.addClass("active");
		
		sliderInner.css("transform", "translateX(-" + clickedIndex * viewWidth + "px) translateZ(0)");
		
		$(".gummy_slider_inner .active").removeClass("active");
		$(".gummy_slider_inner .gummyslide").eq(clickedIndex).addClass("active");
	}
	
	setWidth();
	
	$(".gummy_slider_nav > div").on("click", function(){
		setActive($(this));
	});
	
	$(window).resize(function(){
		setWidth();
	});
	
	setTimeout(function(){
		$(".gummy_slider").fadeIn(500);
	}, 2000);
});