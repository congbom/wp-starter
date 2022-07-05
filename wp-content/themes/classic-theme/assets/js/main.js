/* Vendors */
import Alert        from 'bootstrap/js/dist/alert';
import Button       from 'bootstrap/js/dist/button';
import Carousel     from 'bootstrap/js/dist/carousel';
import Collapse     from 'bootstrap/js/dist/collapse';
import Dropdown     from 'bootstrap/js/dist/dropdown';
import Modal        from 'bootstrap/js/dist/modal';
// import Offcanvas    from 'bootstrap/js/dist/offcanvas';
// import Popover      from 'bootstrap/js/dist/popover';
// import Scrollspy    from 'bootstrap/js/dist/scrollspy';
// import Tab          from 'bootstrap/js/dist/tab';
// import Toast        from 'bootstrap/js/dist/toast';
// import Tooltip      from 'bootstrap/js/dist/tooltip';

/* Custom */
(function() {
    "use strict";

    window.onload = function() {
        scroll_inview();
    };
       
    function scroll_inview() {
        let options = { threshold: [ 0, 0.5, 1 ] };
        let observer = new IntersectionObserver( scroll_inview_callback, options );

        let elements = document.querySelectorAll( '.animation' );

        elements.forEach( function( el ) {
            observer.observe( el );
        });
    }

    function scroll_inview_callback( entries, observer ) {
        entries.forEach( function( entry ) {
            /* Animation elements */
            if ( entry.target.classList.contains( 'animation' ) ) {
                if ( entry.isIntersecting ) {
                    if ( entry.intersectionRatio >= 0.5 ) {
                        entry.target.classList.add( 'animated' );
                    }
                } else {
                    entry.target.classList.remove( 'animated' );
                }
            };
        } );
    }

    /* More here */
    
})();