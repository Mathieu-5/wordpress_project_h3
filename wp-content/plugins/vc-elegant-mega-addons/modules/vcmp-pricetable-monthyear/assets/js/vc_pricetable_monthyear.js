jQuery(document).ready(function($){
	//hide the subtle gradient layer (.vcmp_my_pricing-list > li::after) when vcmp_my_pricing table has been scrolled to the end (mobile version only)
	checkScrolling($('.vcmp_my_pricing-body'));
	$(window).on('resize', function(){
		window.requestAnimationFrame(function(){checkScrolling($('.vcmp_my_pricing-body'))});
	});
	$('.vcmp_my_pricing-body').on('scroll', function(){ 
		var selected = $(this);
		window.requestAnimationFrame(function(){checkScrolling(selected)});
	});

	function checkScrolling(tables){
		tables.each(function(){
			var table= $(this),
				totalTableWidth = parseInt(table.children('.vcmp_my_pricing-features').width()),
		 		tableViewport = parseInt(table.width());
			if( table.scrollLeft() >= totalTableWidth - tableViewport -1 ) {
				table.parent('li').addClass('is-ended');
			} else {
				table.parent('li').removeClass('is-ended');
			}
		});
	}

	//switch from monthly to annual vcmp_my_pricing tables
	bouncy_filter($('.vcmp_my_pricing-container'));

	function bouncy_filter(container) {
		container.each(function(){
			var vcmp_my_pricing_table = $(this);
			var filter_list_container = vcmp_my_pricing_table.children('.vcmp_my_pricing-switcher'),
				filter_radios = filter_list_container.find('input[type="radio"]'),
				vcmp_my_pricing_table_wrapper = vcmp_my_pricing_table.find('.vcmp_my_pricing-wrapper');

			//store vcmp_my_pricing table items
			var table_elements = {};
			filter_radios.each(function(){
				var filter_type = $(this).val();
				table_elements[filter_type] = vcmp_my_pricing_table_wrapper.find('li[data-type="'+filter_type+'"]');
			});

			//detect input change event
			filter_radios.on('change', function(event){
				event.preventDefault();
				//detect which radio input item was checked
				var selected_filter = $(event.target).val();

				//give higher z-index to the vcmp_my_pricing table items selected by the radio input
				show_selected_items(table_elements[selected_filter]);

				//rotate each vcmp_my_pricing-wrapper 
				//at the end of the animation hide the not-selected vcmp_my_pricing tables and rotate back the .vcmp_my_pricing-wrapper
				
				if( !Modernizr.cssanimations ) {
					hide_not_selected_items(table_elements, selected_filter);
					vcmp_my_pricing_table_wrapper.removeClass('is-switched');
				} else {
					vcmp_my_pricing_table_wrapper.addClass('is-switched').eq(0).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {		
						hide_not_selected_items(table_elements, selected_filter);
						vcmp_my_pricing_table_wrapper.removeClass('is-switched');
						//change rotation direction if .vcmp_my_pricing-list has the .bounce-invert class
						if(vcmp_my_pricing_table.find('.vcmp_my_pricing-list').hasClass('bounce-invert')) vcmp_my_pricing_table_wrapper.toggleClass('reverse-animation');
					});
				}
			});
		});
	}
	function show_selected_items(selected_elements) {
		selected_elements.addClass('is-selected');
	}

	function hide_not_selected_items(table_containers, filter) {
		$.each(table_containers, function(key, value){
	  		if ( key != filter ) {	
				$(this).removeClass('is-visible is-selected').addClass('is-hidden');

			} else {
				$(this).addClass('is-visible').removeClass('is-hidden is-selected');
			}
		});
	}
});