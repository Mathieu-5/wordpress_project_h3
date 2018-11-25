jQuery(document).ready(function ($) {

	function slabTextHeadlines() {
        $("h1.slabtextdone").slabText({
            // Don't slabtext the headers if the viewport is under 380px
            //"viewportBreakpoint":320
        });
    };
	
	$(window).load(function () {
		setTimeout(slabTextHeadlines, 1000);
	});
	
});
