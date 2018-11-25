jQuery(document).ready(function($) {
	var bgColor;
	var effect = 'animated bounceInLeft'; /* bounceIn, bounceInUp, bounceInDown, bounceInLeft,
											 bounceInRight, rotateIn, rotateInUpLeft, rotateInDownLeft,
											 rotateInUpRight, rotateInDownRight  */

	$('.vc_flipgrid_all_content').hide();

	$('.vc_flipgrid_content li').click(function(){
		$('.vc_flipgrid_cardfront, .vc_flipgrid_cardback').hide();
		$('.vc_flipgrid_content li').removeClass('active').hide().css('border','none');
		$(this).addClass('active').show();
		bgColor = $('.active .vc_flipgrid_cardback').css('background-color');
		$('.vc_flipgrid_content').css('background-color',bgColor);
		$('.vc_flipgrid_close, .vc_flipgrid_all_content').show();
		$('.vcmp_flipgrid').append('<span class="vc_flipgrid_close">close</span>').addClass(effect);
	});


	$('.vcmp_flipgrid').on('click', '.vc_flipgrid_close', function(){

		$('.vc_flipgrid_close').remove();
		bgColor = $('.active .vc_flipgrid_cardfront').css('background-color');
		$('.vcmp_flipgrid').removeClass(effect);
		$('.vc_flipgrid_all_content').hide();
		$('.vc_flipgrid_content li').removeClass('active').show().css({ 'border-bottom':'1px solid #2c2c2c',
															'border-left':'1px solid #2c2c2c' });
		$('.vc_flipgrid_cardfront, .vc_flipgrid_cardback').show();
		$('.vc_flipgrid_content').css('background-color',bgColor);
	});
});