jQuery(document).ready(function($){

		// show the close overlay button
		$(".ioclose-overlay").removeClass("iohidden");
		// handle the adding of hover class when clicked
		$(".ioimg").click(function(e){
			if (!$(this).hasClass("iohover")) {
				$(this).addClass("iohover");
			}
		});
		// handle the closing of the overlay
		$(".ioclose-overlay").click(function(e){
			e.preventDefault();
			e.stopPropagation();
			if ($(this).closest(".ioimg").hasClass("iohover")) {
				$(this).closest(".ioimg").removeClass("iohover");
			}
		});

		// handle the mouseenter functionality
		$(".ioimg").mouseenter(function(){
			$(this).addClass("iohover");
		})
		// handle the mouseleave functionality
		.mouseleave(function(){
			$(this).removeClass("iohover");
		});

});