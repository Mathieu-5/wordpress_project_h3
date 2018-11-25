jQuery(document).ready(function($) {
  var pspZoom;

  $.gridSize = function() {
    var inWidth;
    inWidth = window.innerWidth;
    if (inWidth > 1200) {
      return 4;
    }
    if (inWidth > 900) {
      return 3;
    }
    if (inWidth > 600) {
      return 2;
    }
    return 1;
  };

  $.fillArray = function(len, val) {
    var arr;
    arr = [];
    while (len-- > -1) {
      arr[len] = val;
    }
    return arr;
  };

  $.resizeGrid = function(columns) {
    var shifts;
    shifts = $.fillArray($(".vcmp_gridgallery .vcmp_griditem").length, 0);
    console.log("shifts before> " + shifts);
    $(".vcmp_gridgallery .tall").each(function(_i, element) {
      var index, results;
      index = $(element).prevAll().length;
      index += columns;
      results = [];
      while (index < shifts.length) {
        shifts[index] += 1;
        results.push(index += columns);
      }
      return results;
    });
    console.log("shifts after> " + shifts);
    $(".vcmp_gridgallery .vcmp_griditem").each(function(ind, element) {
      $(element).removeClass("shift0 shift1 shift2 shift3 shift4 shift5");
      return $(element).addClass("shift" + shifts[ind]);
    });
    return console.log("Resizing to " + columns + " columns");
  };

  $(window).resize(function() {
    if ($.currentGridSize != null) {
      if ($.gridSize() !== $.currentGridSize) {
        $.resizeGrid($.gridSize());
        return $.currentGridSize = $.gridSize();
      }
    } else {
      return console.log('no current grid size');
    }
  });

  $(function() {
    $.currentGridSize = $.gridSize();
    console.log("Resizing to " + $.currentGridSize + " columns");
    $.resizeGrid($.currentGridSize);
    return true;
  });

  console.log("Reloaded");


  /*
    The rest of this document was created for previous pens:
      Description on hover:
         http://codepen.io/tholex/pen/IxALf
      "Pespective" image hover effect:
         http://codepen.io/tholex/pen/gtEeq
   */

  pspZoom = function(val, max) {
    return (val / max) * (-25) + 12.5;
  };

  if (!Modernizr.touch) {
    $(".vcmp_gridgallery .vcmp_griditem").mouseenter(function(e) {
      this.delayStamp = new Date();
      this.lastRatio = 0;
      return $(this).find('img').css({
        '-webkit-transform': "scale3D(1.5, 1.5, 1)",
        '-moz-transform': "scale3D(1.5, 1.5, 1)",
        '-ms-transform': "scale3D(1.5, 1.5, 1)",
        '-o-transform': "scale3D(1.5, 1.5, 1)",
        'transform': "scale3D(1.5, 1.5, 1)"
      });
    }).mousemove(function(e) {
      var offset, ratio, timeDiff, x, y;
      timeDiff = new Date() - this.delayStamp;
      ratio = timeDiff > 300 ? 1.0 : timeDiff / 300;
      ratio = (ratio - this.lastRatio) > 0.08 ? this.lastRatio + 0.075 : ratio;
      this.lastRatio = ratio;
      offset = $(this).offset();
      x = pspZoom(e.pageX - offset.left, $(this).width());
      y = pspZoom(e.pageY - offset.top, $(this).height());
      return $(this).find('img').css({
        'left': (ratio * x) + "%",
        'top': (ratio * 5 * y) + "px"
      });
    }).mouseleave(function() {
      return $(this).find('img').attr("data-translate-delay-stamp", "-1").css({
        '-webkit-transform': "scale3D(1, 1, 1)",
        '-moz-transform': "scale3D(1, 1, 1)",
        '-ms-transform': "scale3D(1, 1, 1)",
        '-o-transform': "scale3D(1, 1, 1)",
        'transform': "scale3D(1, 1, 1)",
        'left': "0",
        'top': "0"
      });
    });
  }


  /*
  if !Modernizr.touch
    $(".vcmp_gridgallery .vcmp_griditem")
      .mousemove (e) ->
        offset = $(@).offset();
        x = -(e.pageX - offset.left) / 4;
        y = -(e.pageY - offset.top) / 4;
  
        $(@).find('img').css({
          '-webkit-transform': "scale3D(1.5, 1.5, 1) translate3d(#{x}px, #{y}px, 0px)"
          '-moz-transform': "scale3D(1.5, 1.5, 1) translate3d(#{x}px, #{y}px, 0px)"
          '-ms-transform': "scale3D(1.5, 1.5, 1) translate3d(#{x}px, #{y}px, 0px)"
          '-o-transform': "scale3D(1.5, 1.5, 1) translate3d(#{x}px, #{y}px, 0px)"
          'transform': "scale3D(1.5, 1.5, 1) translate3d(#{x}px, #{y}px, 0px)"
        })
      .mouseleave ->
        $(@).find('img').css({
          '-webkit-transform': "scale3D(1, 1, 1)"
          '-moz-transform': "scale3D(1, 1, 1)"
          '-ms-transform': "scale3D(1, 1, 1)"
          '-o-transform': "scale3D(1, 1, 1)"
          'transform': "scale3D(1, 1, 1)"
        })
   */

});