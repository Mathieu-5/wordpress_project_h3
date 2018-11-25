jQuery(document).ready(function($) {

	$('body').mousemove(function(event) {

	  var 
	  $perspectivecard = $('.perspectivecard'),
	  $perspectivecardTitle = $('.perspectivecard-title'),
	  $perspectivecardSubtitle = $('.perspectivecard-subtitle'),
	  $perspectivecardShine = $('.perspectivecard-shine'),
	  $perspectivecardShadow = $('.perspectivecard-shadow'),
	  windowWidth = $(window).width(),
	  windowHeight = $(window).height(),
	  degreesW = windowWidth / 15,
	  degreesH = windowHeight / 15,
	  mousePos = {
		x: 0,
		y: 0
	  },
	  mouseFromCenter = {
		x: 0,
		y: 0
	  };
	  
	  
		mousePos.x = event.pageX;
		mouseFromCenter.x = mousePos.x - (windowWidth / 2);
		mousePos.y = event.pageY;
		mouseFromCenter.y = mousePos.y - (windowHeight / 2);
		 
		var containerWidth = $(this).innerWidth(),
		containerHeight = $(this).innerHeight(),
		mousePositionX = (event.pageX / containerWidth) * 100,
		mousePositionY = 50+(event.pageY /containerHeight)*10,
		dy = event.pageY - containerHeight / 2, //@h/2 = center of poster
		dx = event.pageX - containerWidth / 2, //@w/2 = center of poster
		theta = Math.atan2(dy, dx), // angle between cursor and center of poster in RAD
		angle = theta * 180 / Math.PI - 90;
	 
		// gradient angle and opacity for perspectivecard shine effect
		$perspectivecardShine.css('background', 'linear-gradient(' + angle + 'deg, rgba(255,255,255,' + (event.pageY / containerHeight) * .7 + ') 0%,rgba(255,255,255, 0) 80%)');
		
		// perspectivecard shadow pos
		$perspectivecardShadow.css({"transform": "translateX(" + ((mouseFromCenter.x / degreesW) * -3.25) + "px) translateY(" + ((mouseFromCenter.y / degreesH) * -3.25) + "px) rotateY(" + (mouseFromCenter.x / degreesW) + "deg) rotateX(" + ((mouseFromCenter.y / degreesH) * -1) + "deg)", 'background': 'linear-gradient(' + angle + 'deg, rgba(255,255,255,.6) 0%,rgba(55,55,55,.4) 80%)' });
		
		// background image movement
		$perspectivecard.css({"transform": "rotateY(" + (mouseFromCenter.x / degreesW) + "deg) rotateX(" + ((mouseFromCenter.y / degreesH) * -1) + "deg)",'background-position': mousePositionX + '%' + ' ' + (event.pageY / containerHeight) * 50  + '%'});

		$perspectivecardTitle.css({
		  "transform": "translateX(" + ((mouseFromCenter.x / degreesW) * 1.5) + "px) translateY(" + ((mouseFromCenter.y / degreesH) * 1.75) + "px) "
		});

		$perspectivecardSubtitle.css({
		  "transform": "translateX(" + ((mouseFromCenter.x / degreesW) * 0.8) + "px) translateY(" + ((mouseFromCenter.y / degreesH) * 1.15) + "px) "
		});
		
	});
	
});