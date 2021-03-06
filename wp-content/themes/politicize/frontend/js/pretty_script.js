jQuery(document).ready(function($) {
    $("area[rel^='prettyPhoto']").prettyPhoto();

    $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        slideshow: 10000,
        autoplay_slideshow: true
    });
    $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });

    $(".gallery_widget:first a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        slideshow: 10000,
        autoplay_slideshow: true
    });
    $(".gallery_widget:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });
	
    $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });

    $(".shortcode_pop:first a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        slideshow: 10000,
        autoplay_slideshow: true
    });
    $(".shortcode_pop:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
    });
	
});
