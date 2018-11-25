/*--------------------------------------------------
WIN LOAD GET POSTS ANIMATION
--------------------------------------------------*/
jQuery(document).ready(function($) {
	
	
	$(".vcwoolargeGrid").click(function(){											
    $(this).find('a').addClass('active');
    $('.vcwoosmallGrid a').removeClass('active');
    
    $('.vcwooproduct').addClass('large').each(function(){											
		});						
		setTimeout(function(){
			$('.vcwooinfo-large').show();	
		}, 200);
		setTimeout(function(){

			$('.vcwooview_gallery').trigger("click");	
		}, 400);								
		
		return false;				
	});
	
	$(".vcwoosmallGrid").click(function(){		        
    $(this).find('a').addClass('active');
    $('.vcwoolargeGrid a').removeClass('active');
    
		$('div.vcwooproduct').removeClass('large');
		$(".vcwooProduct3D").removeClass('animate');	
    $('.vcwooinfo-large').fadeOut("fast");
		setTimeout(function(){								
				$('div.vcwooflipback').trigger("click");
		}, 400);
		return false;
	});		
	
	$(".vcwoosmallGrid").click(function(){
		$('.vcwooproduct').removeClass('large');			
		return false;
	});
  
  $('.vcwoocolors-large a').click(function(){return false;});
	
	
	$('.vcwooproduct').each(function(i, el){					

		// Lift card and show stats on Mouseover
		$(el).find('.vcwooProduct3D').hover(function(){
				$(this).parent().css('z-index', "20");
				$(this).addClass('animate');
				$(this).find('div.vcwoocarouselNext, div.vcwoocarouselPrev').addClass('visible');			
			 }, function(){
				$(this).removeClass('animate');			
				$(this).parent().css('z-index', "1");
				$(this).find('div.vcwoocarouselNext, div.vcwoocarouselPrev').removeClass('visible');
		});	
		
		// Flip card to the back side
		$(el).find('.vcwooview_gallery').click(function(){	
			
			$(el).find('div.vcwoocarouselNext, div.vcwoocarouselPrev').removeClass('visible');
			$(el).find('.vcwooProduct3D').addClass('flip-10');			
			setTimeout(function(){					
			$(el).find('.vcwooProduct3D').removeClass('flip-10').addClass('flip90').find('div.vcwooshadow').show().fadeTo( 80 , 1, function(){
					$(el).find('.vcwooproduct-front, .vcwooproduct-front div.vcwooshadow').hide();															
				});
			}, 50);
			
			setTimeout(function(){
				$(el).find('.vcwooProduct3D').removeClass('flip90').addClass('flip190');
				$(el).find('.vcwooproduct-back').show().find('div.vcwooshadow').show().fadeTo( 90 , 0);
				setTimeout(function(){				
					$(el).find('.vcwooProduct3D').removeClass('flip190').addClass('flip180').find('div.vcwooshadow').hide();						
					setTimeout(function(){
						$(el).find('.vcwooProduct3D').css('transition', '100ms ease-out');			
						$(el).find('.cx, .cy').addClass('s1');
						setTimeout(function(){$(el).find('.cx, .cy').addClass('s2');}, 100);
						setTimeout(function(){$(el).find('.cx, .cy').addClass('s3');}, 200);				
						$(el).find('div.vcwoocarouselNext, div.vcwoocarouselPrev').addClass('visible');				
					}, 100);
				}, 100);			
			}, 150);			
		});			
		
		// Flip card back to the front side
		$(el).find('.vcwooflipback').click(function(){		
			
			$(el).find('.vcwooProduct3D').removeClass('flip180').addClass('flip190');
			setTimeout(function(){
				$(el).find('.vcwooProduct3D').removeClass('flip190').addClass('flip90');
		
				$(el).find('.vcwooproduct-back div.vcwooshadow').css('opacity', 0).fadeTo( 100 , 1, function(){
					$(el).find('.vcwooproduct-back, .vcwooproduct-back div.vcwooshadow').hide();
					$(el).find('.vcwooproduct-front, .vcwooproduct-front div.vcwooshadow').show();
				});
			}, 50);
			
			setTimeout(function(){
				$(el).find('.vcwooProduct3D').removeClass('flip90').addClass('flip-10');
				$(el).find('.vcwooproduct-front div.vcwooshadow').show().fadeTo( 100 , 0);
				setTimeout(function(){						
					$(el).find('.vcwooproduct-front div.vcwooshadow').hide();
					$(el).find('.vcwooProduct3D').removeClass('flip-10').css('transition', '100ms ease-out');		
					$(el).find('.cx, .cy').removeClass('s1 s2 s3');			
				}, 100);			
			}, 150);			
			
		});				
	
		makeCarousel(el);
	});
	
	/* ----  Image Gallery Carousel   ---- */
	function makeCarousel(el){
	
		
		var carousel = $(el).find('.vcwoocarousel ul');
		var carouselSlideWidth = 315;
		var carouselWidth = 0;	
		var isAnimating = false;
		var currSlide = 0;
		$(carousel).attr('rel', currSlide);
		
		// building the width of the casousel
		$(carousel).find('li').each(function(){
			carouselWidth += carouselSlideWidth;
		});
		$(carousel).css('width', carouselWidth);
		
		// Load Next Image
		$(el).find('div.vcwoocarouselNext').on('click', function(){
			var currentLeft = Math.abs(parseInt($(carousel).css("left")));
			var newLeft = currentLeft + carouselSlideWidth;
			if(newLeft == carouselWidth || isAnimating === true){return;}
			$(carousel).css({'left': "-" + newLeft + "px",
								   "transition": "300ms ease-out"
								 });
			isAnimating = true;
			currSlide++;
			$(carousel).attr('rel', currSlide);
			setTimeout(function(){isAnimating = false;}, 300);			
		});
		
		// Load Previous Image
		$(el).find('div.vcwoocarouselPrev').on('click', function(){
			var currentLeft = Math.abs(parseInt($(carousel).css("left")));
			var newLeft = currentLeft - carouselSlideWidth;
			if(newLeft < 0  || isAnimating === true){return;}
			$(carousel).css({'left': "-" + newLeft + "px",
								   "transition": "300ms ease-out"
								 });
			isAnimating = true;
			currSlide--;
			$(carousel).attr('rel', currSlide);
			setTimeout(function(){isAnimating = false;}, 300);						
		});
	}
	
});