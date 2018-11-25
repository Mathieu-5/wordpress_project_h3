/*--------------------------------------------------
Gallery With Blury Popup
--------------------------------------------------*/
jQuery(document).ready(function($) {

	popup = {
	  init: function(){
		$('figure').click(function(){
		  popup.open($(this));
		});
		
		$(document).on('click', '.bullrypopup img', function(){
		  return false;
		}).on('click', '.bullrypopup', function(){
		  popup.close();
		})
	  },
	  open: function($figure) {
		$('.gallerybullry').addClass('bullrypop');
		$popup = $('<div class="bullrypopup" />').appendTo($('body'));
		$fig = $figure.clone().appendTo($('.bullrypopup'));
		$bg = $('<div class="bg" />').appendTo($('.bullrypopup'));
		$close = $('<div class="bullryclose"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
		$shadow = $('<div class="bullryshadow" />').appendTo($fig);
		src = $('img', $fig).attr('src');
		$shadow.css({backgroundImage: 'url(' + src + ')'});
		$bg.css({backgroundImage: 'url(' + src + ')'});
		setTimeout(function(){
		  $('.bullrypopup').addClass('bullrypop');
		}, 10);
	  },
	  close: function(){
		$('.gallerybullry, .bullrypopup').removeClass('bullrypop');
		setTimeout(function(){
		  $('.bullrypopup').remove()
		}, 100);
	  }
	}

	popup.init()

});