/*
Elegant Mega Addons FAQ
=================================================
*/
jQuery( document ).ready(function( $ ) {
	$(".vcmp_open").click(function() {
	  var container = $(this).parents(".vcmp_topic");
	  var answer = container.find(".vcmp_answer");
	  var trigger = container.find(".vcmp_faq-t");

	  answer.slideToggle(200);

	  if (trigger.hasClass("vcmp_faq-o")) {
		trigger.removeClass("vcmp_faq-o");
	  } else {
		trigger.addClass("vcmp_faq-o");
	  }

	  if (container.hasClass("vcmp_expanded")) {
		container.removeClass("vcmp_expanded");
	  } else {
		container.addClass("vcmp_expanded");
	  }
	});


  $('.vcmp_question').each(function() {
    $(this).attr('data-search-term', $(this).text().toLowerCase() + $(this).find("ptag").text().toLowerCase());

  });

  $('.vcmp-live-search-box').on('keyup', function() {

    var searchTerm = $(this).val().toLowerCase();

    $('.vcmp_question').each(function() {

      if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
        $(this).parent().parent().show();
      } else {
        $(this).parent().parent().hide();
      }

    });

  });

});