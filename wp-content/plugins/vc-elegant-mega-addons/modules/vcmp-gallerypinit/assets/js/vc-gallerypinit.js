/*--------------------------------------------------
Gallery With Pin Button
--------------------------------------------------*/
/**
* @license lyradesigns.com v1
* Updated: Dec 17, 2014
* Add pin buttons to images
* Copyright (c) 2014 Jonas Goslow - LYRA
* Released under the MIT license
* https://github.com/timmywil/jquery.panzoom/blob/master/MIT-License.txt
*/
(function( $ ){
  $.fn.imgPin = function( options ) {


    // Extend our default options with those provided.
    // Note that the first argument to extend is an empty
    // object � this is to keep from overriding our "defaults" object.
    var defaults = {
      pinImg : '//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_32.png',
      position: 1, // Display default header
    };
    var options = $.extend( {}, defaults, options );

    var url = encodeURIComponent(document.URL),
        pinImg = options.pinImg,
        position = '';

    switch (options.position) {
      case 1:
        position = 'vcmp_top vcmp_left'; break;
      case 2:
        position = 'vcmp_top vcmp_right'; break;
      case 3:
        position = 'vcmp_bottom vcmp_right'; break;
      case 4:
        position = 'vcmp_bottom vcmp_left'; break;
      case 5:
        position = 'center'; break;
    }

    this.each(function(){ // add Pin buttons to all images
      var src = $(this).attr('src'),
          shareURL = url;

      // get image dimensions - if < 500 then return
      var img = new Image();
      img.src = src;

      // Get Title and img to pin - encode them
      var description = encodeURIComponent(document.title),
          imgURL = encodeURIComponent(src);

      // Generate link
      var link = 'https://www.pinterest.com/pin/create/button/';
          link += '?url='+shareURL;
          link += '&media='+imgURL;
          link += '&description='+description;

      //add wrappers
      $(this).wrap('<div class="vcmp_imgPinWrap">').after('<a href="'+link+'" class="vcmp_pin '+position+'"><img src="'+pinImg+'" alt="Pin this!"></a>');

      //position center
      if (options.position == 5) {
        var img = new Image();
        img.onload = function() {
          var w = this.width;
          h = this.height;
          $('.vcmp_imgPinWrap .vcmp_pin.center').css('margin-left', -w/2).css('margin-top', -h/2);
        }
        img.src = pinImg;
      }


      //set click events
      $('.vcmp_imgPinWrap .vcmp_pin').click(function(){
        var w = 700,
          h = 400;
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var imgPinWindow = window.open(this.href,'imgPngWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=400');
        imgPinWindow.moveTo(left, top);
        return false;
      });

    });


  }


})( jQuery );
