jQuery(window)
    .unload(function() { jQuery('#loader').fadeIn(250); })
    .load(function() { jQuery('#loader').fadeOut(250); });
jQuery(document).ready(function(){
    if ( jQuery('.owl-carousel') ) {
        jQuery('.owl-carousel').owlCarousel({
            items: 1,
            dots: false,
            nav: true
        });
    }
})