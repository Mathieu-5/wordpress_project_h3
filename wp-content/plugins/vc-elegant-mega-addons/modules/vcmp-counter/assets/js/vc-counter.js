/*--------------------------------------------------
Counter
--------------------------------------------------*/
jQuery(document).ready(function($) {
function counter() {
    if ($('.vcmpcounter .count').size()) {
        $c = $('.vcmpcounter .count');

        $c.each(function () {
            var $this = $(this);
            $this.data('target', parseInt($this.html()));
            $this.data('counted', false);
            $this.html('0');
        });

        $(window).bind('scroll', function () {
            var speed = 3000;
            
            $c.each(function (i) {
                var $t = $(this);
                if (!$t.data('counted') && $(window).scrollTop() + $(window).height() >= $t.offset().top) {
                    $t.data('counted', true);
                    
                    $t.animate({
                        dummy: 1
                    }, {
                        duration: speed,
                        step: function (now) {
                            var $this = $(this);
                            var val = Math.round($this.data('target') * now);
                            $this.html(val);
                        },
                        easing: 'easeInOutQuart'
                    });

                    // easy pie
                    $('.pie').easyPieChart({
                        barColor: '#777777',
                        trackColor: '#a7a7a7',
                        scaleColor: false,
                        lineWidth: 10,
                        size: 200,
                        lineCap: 'square',
                        animate: { duration: speed, enabled: true }
                    });
                }
            });
        }).triggerHandler('scroll');
    }
}


/*--------------------------------------------------
DOC READY
--------------------------------------------------*/

    counter();
});