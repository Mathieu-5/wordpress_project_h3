jQuery(document).ready(function ($) {

    $(".vcmp-olmenu-btn a").click(function () {
        $(".vcmp-overlay").fadeToggle(200);
        $(this).toggleClass('vcmp-btn-open').toggleClass('vcmp-btn-close');
    });

    $('.vcmp-overlay').on('click', function () {
        $(".vcmp-overlay").fadeToggle(200);
        $(".vcmp-olmenu-btn a").toggleClass('vcmp-btn-open').toggleClass('vcmp-btn-close');
    });

    $('.vcmp-olmenu a').on('click', function () {
        $(".vcmp-overlay").fadeToggle(200);
        $(".vcmp-olmenu-btn a").toggleClass('vcmp-btn-open').toggleClass('vcmp-btn-close');
    });
	
	//OPEN MENU IN ANY CONTENT
	 $("a.vcmp-overlay-open").click(function () {
        $(".vcmp-overlay").fadeToggle(200);
    });

    $('.vcmp-overlay').on('click', function () {
        $(".vcmp-overlay").fadeOut(200);
    });


});