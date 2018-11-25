/*--------------------------------------------------
Gallery
--------------------------------------------------*/
jQuery(document).ready(function($) {
$('#demo-paddings').glide({
	paddings: '20%',
	autoheight: true
});
;(function() {

	function widthChanged(mq) {
		if (mq.matches) slider.glide($.extend(options, { paddings: '18%' }));
		else slider.glide(options);
	}

	function coverflow(data) {
		data.current.removeClass('pre following')
			.nextAll()
				.removeClass('pre following')
				.addClass('following')
			.end()
			.prevAll()
				.removeClass('pre following')
				.addClass('pre');
	}

	var slider = $('#Glide');
	var options = {
		type: 'slider',
		startAt: 3,
		autoplay: 3000,
		hoverpause: false,
		animationDuration: 500,
		paddings: '25%',
		afterInit: function (data) {
			coverflow(data);
		},
		afterTransition: function (data) {
			coverflow(data);
		}
	};

	// media query event handler
	if (matchMedia) {
		var mq = window.matchMedia("(max-width: 768px)");
		mq.addListener(widthChanged);
		widthChanged(mq);
	} else {
		slider.glide(options);
	}

	$(window).load(function() {
		setTimeout(function () {
			slider.removeClass('is-loading')
				.find('.glide__wrapper')
				.removeClass('is-hidden')
				.addClass('is-visible');
		}, 100);
	});


})();
});