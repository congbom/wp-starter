(function($) {
    'use strict';

    /* Carousel */
    $('.slick-carousel').each(function(index, el) {
        var config = new Array();

        var layout = $(this).data('layout');
        var autoplay = $(this).data('autoplay');

        if (layout) {
            layout = layout.split(',');
            config = {
                slidesToShow: parseInt(layout[0]),
                slidesToScroll: parseInt(layout[0]),
                infinite: false,
                responsive: [{
                    breakpoint: 840,
                    settings: {
                        slidesToShow: parseInt(layout[1]),
                        slidesToScroll: parseInt(layout[1])
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: parseInt(layout[2]),
                        slidesToScroll: parseInt(layout[2])
                    }
                }]
            };
        }

        if (autoplay) {
            config['autoplay'] = autoplay;
        }

        $(this).slick(config);
    });
}(jQuery));