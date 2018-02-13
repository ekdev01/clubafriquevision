jQuery(document).ready(function($) {
	
	"use strict";
	
	 //Masonry Gallery 
    // if ($('#container').length) {
        // $('#container').BlocksIt({
            // numOfCol: 4,
            // offsetX: 15,
            // offsetY: 15
        // });
    // }
	
	
	//Sticky Navigation
   if ($('#cp-causes-header').length) {
       // grab the initial top offset of the navigation
       var stickyNavTop = $('#cp-causes-header').offset().top;
       // our function that decides weather the navigation bar should have "fixed" css position or not.
       var stickyNav = function() {
           var scrollTop = $(window).scrollTop(); // our current vertical position from the top
           // if we've scrolled more than the navigation, change its position to fixed to stick to top,
           // otherwise change it back to relative
           if (scrollTop > stickyNavTop) {
               $('#cp-causes-header').addClass('cp_sticky');
           } else {
               $('#cp-causes-header').removeClass('cp_sticky');
           }
       };
       stickyNav();
       // and run it again every time you scroll
       $(window).scroll(function() {
           stickyNav();
       });
   }
	
	
	
	
	$( "input.radio" ).focus(function() {
		$('.radio').attr('name','amount');
		$('.donate-input').attr('name',' ');
	});
	$( "input.donate-input" ).focus(function() {
		$('.radio').attr('name',' ');
		$('.donate-input').attr('name','amount');
		$('.radio').removeAttr('checked');
	});
	
	
	
	//Flexslider for Upcoming Evente
	$('a.accordion-toggle').click(function(e) {
        e.preventDefault();
        if(!$(this).parent().hasClass('active')) {
            $('.accordion-heading').removeClass('active');
            $('.accordion-body').removeClass('active');
            $(this).parent().addClass('active').next().addClass('active');
        } else {
            $('.accordion-heading').removeClass('active');
            $('.accordion-body').removeClass('active');
        }
    });

	 //Header Search Area Function
    $('.navigation-area a.search').click(function() {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.search-box').animate({
                top: '-300px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.search-box').animate({
                top: '53px',

            });
        }
    });
	
	
	 //Sidebar  Demo Function
    $('.demo-box').click(function() {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.demo-box').animate({
                bottom: '0px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.demo-box').animate({
                bottom: '-570px',

            });
        }
    });
   
   //Header Search Area Function
    $('.navigation-area_6 a.search').click(function() {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.search-box').animate({
                top: '-1000px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.search-box').animate({
                top: '53px',

            });
        }
    });
	
	$('#search-box-form').hide();
    //Search Area Function on Header
    $('a.btn-search').click(function () {
        $('#search-box-form').toggle('slide');
    });
    $('a.crose').click(function () {
        $('#search-box-form').toggle('slide');
    });
	
	//Header Search Area Function
    // $('.navigation-area a.search').click(function () {
        // if ($(this).attr('id') == 'active-btn') {
            // $(this).attr('id', 'no-active-btn');
            // $('.search-box').animate({
                // top: '-600px',

            // });
        // } else {
            // $(this).attr('id', 'active-btn');
            // $('.search-box').animate({
                // top: '53px',

            // });
        // }
    // });
	
	$('.single-sermon-playlist').slideUp();
	 //Header Search Area Function
    $('.play').click(function () {
        if ($(this).attr('id') == 'active-btn-play') {
            $(this).attr('id', 'no-active-btn-play');
            $(this).parent().siblings('.single-sermon-playlist').slideUp();
        } else {
            $(this).attr('id', 'active-btn-play');
			$(this).parent().siblings('.single-sermon-playlist').slideDown();
        }
    });
	
	$('.widget_shopping_cart_content').slideUp();
	 //Header Search Area Function
    $('.cart-item a').click(function () {
        if ($(this).attr('id') == 'active-btn-shopping') {
            $(this).attr('id', 'no-active-btn-shopping');
            $(this).siblings('.widget_shopping_cart_content').slideUp();
        } else {
            $(this).attr('id', 'active-btn-shopping');
			$(this).siblings('.widget_shopping_cart_content').slideDown();
        }
    });
	
	$('.soundcloud-sermon').slideUp();
	 //Header Search Area Function
    $('.cp-play-soundrock').click(function () {
        if ($(this).attr('id') == 'active-sound-play') {
            $(this).attr('id', 'no-active-sound-play');
            $(this).parent().parent().parent().parent().parent().parent().parent().siblings('.soundcloud-sermon').slideUp();
			
        } else {
            $(this).attr('id', 'active-sound-play');
			$(this).parent().parent().parent().parent().parent().parent().parent().siblings('.soundcloud-sermon').slideDown();
        }
    });
	
	$('.soundcloud-sermon-box').slideUp();
	 //Header Search Area Function
    $('.cp-play-box-soundrock').click(function () {
        if ($(this).attr('id') == 'active-sound-box-play') {
            $(this).attr('id', 'no-active-sound-box-play');
            $(this).parent().siblings('.soundcloud-sermon-box').slideUp();
        } else {
            $(this).attr('id', 'active-sound-box-play');
			$(this).parent().siblings('.soundcloud-sermon-box').slideDown();
        }
    });
	
	$('.jp-playlist').slideUp();
	 //Header Search Area Function
    $('.show-playlist').click(function () {
        if ($(this).attr('id') == 'active-playlist-play') {
            $(this).attr('id', 'no-active-playlist-play');
            $(this).parent().parent().parent().parent().parent().siblings('.jp-playlist').slideUp();
			
        } else {
            $(this).attr('id', 'active-playlist-play');
			 $(this).parent().parent().parent().parent().parent().siblings('.jp-playlist').slideDown();
        }
    });
	
	
	$('.soundcloud-sermon-detail').slideUp();
	//Header Search Area Function
    $('.cp-detail-soundrock').click(function () {
        if ($(this).attr('id') == 'active-detail-play') {
            $(this).attr('id', 'no-active-detail-play');
            $(this).parent().parent().parent().siblings('.soundcloud-sermon-detail').slideUp();
			
        } else {
            $(this).attr('id', 'active-detail-play');
			$(this).parent().parent().parent().siblings('.soundcloud-sermon-detail').slideDown();
        }
    });
	
	
	$('.share-btn .topbar-social-cp').slideUp();
	 //Header Search Area Function
    $('.share').click(function () {
        if ($(this).attr('id') == 'active-share-play') {
            $(this).attr('id', 'no-active-share-play');
            $(this).siblings('.topbar-social-cp').slideUp();
			
        } else {
            $(this).attr('id', 'active-share-play');
			$(this).siblings('.topbar-social-cp').slideDown();
        }
    });
	
	
	
	
	$('.sermons-box-grid-cp').slideUp();
	 //Header Search Area Function
    $('.cp-sermon-box-play').click(function () {
        if ($(this).attr('id') == 'active-sound-box-play') {
            $(this).attr('id', 'no-active-sound-box-play');
            $(this).parent().siblings('.sermons-box-grid-cp').slideUp();
			
        } else {
            $(this).attr('id', 'active-sound-box-play');
			$(this).parent().siblings('.sermons-box-grid-cp').slideDown();
        }
    });
	
	
	
	$('.cp-gallery-slider-list').slideUp();
	 //Header Search Area Function
    $('.cp-play').click(function () {
        if ($(this).attr('id') == 'active-btn-play-cp') {
            $(this).attr('id', 'no-active-btn-play-cp');
            //$(this).parent().parent().siblings('.cp-gallery-slider-list').slideUp();
			$(this).parent().parent().parent().parent().parent().parent().parent().siblings('.cp-gallery-slider-list').slideUp();
        } else {
            $(this).attr('id', 'active-btn-play-cp');
			$(this).parent().parent().parent().parent().parent().parent().parent().siblings('.cp-gallery-slider-list').slideDown();
        }
    });
	
	 //Header Search Area Function
    $('.cp-search-box a.search').click(function () {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.search-box').animate({
                top: '-300px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.search-box').animate({
                top: '53px',

            });
        }
    });
	
	 $('.cp-header-f-13 .cp-search-f-13 a.search-cp').click(function () {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.search-box').animate({
                top: '-300px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.search-box').animate({
                top: '28px',

            });
        }
    });

	
	//$('nav#menu').mmenu();  
	
    //Header 4 Search Area Function
    $('.head-topbar a.search').click(function () {
        if ($(this).attr('id') == 'active-btn') {
            $(this).attr('id', 'no-active-btn');
            $('.search-box').animate({
                top: '-100px',

            });
        } else {
            $(this).attr('id', 'active-btn');
            $('.search-box').animate({
                top: '41px',

            });
        }
    });

    //Search Click Function For Footer Menu
    $('.header-nav').click(function () {
        if ($(this).attr('id') == 'bottom-active-btn') {
            $(this).attr('id', 'no-bottom-active-btn');
            $('.footer-menu').animate({
                left: '416px',
            });
        } else {
            $(this).attr('id', 'bottom-active-btn');
            $('.footer-menu').animate({
                left: '0px',

            });
        }
    });
	
	
	//Gallery Validation
	$('a[data-rel]').each(function () {
		$(this).attr('rel', $(this).data('rel'));
	});
	
	$(".navbar-inner ul >li").hover(
		function() {
			$(this).addClass('open');
		},
		function() {
			$(this).removeClass('open');
		}
	);
	if($('#custom_menu_cp').length){
		$('#custom_menu_cp').find('ul.children').addClass('sub-menu');
		$('#custom_menu_cp').find('ul.children');
		//$('#custom_menu_cp > ul').find('ul.children').addClass('sub-menu');
	}
	
	$('.toggle-view li').click(function () {
        var text = $(this).children('div.panel');
        if (text.is(':hidden')) {
            text.slideDown('200');
            $(this).children('span').html('-');
        } else {
            text.slideUp('200');
            $(this).children('span').html('+');
        }
    });
	
	
	//Tool tip Script
	$("[data-toggle='tooltip']").tooltip();
	
	$("[data-rel='tooltip']").tooltip();

	if($('#custom_menu_cp').length){
		$('div.nav > ul').unwrap();
		$('#custom_menu_cp').children('ul').addClass('nav');
	}

	// $('.footer_3_col .span4:nth-child(3n)').after('<hr />');
	// $('.footer_4_col .span3:nth-child(4n)').after('<hr />');
	
	// $(".bx-controls-direction .bx-prev").empty();
	// $(".bx-controls-direction .bx-next").empty();
	// $(".bx-controls-direction .bx-next").append('<span class="font_aw"><i class="icon-chevron-right"></i></span>');
	// $(".bx-controls-direction .bx-prev").append('<span class="font_aw"><i class="icon-chevron-left"></i></span>');
	
	// $(".banner_slider .bx-controls-direction .bx-prev").empty();
	// $(".banner_slider .bx-controls-direction .bx-next").empty();
	// $(".banner_slider .bx-controls-direction .bx-next").append('<span class="font_aw"><i class="icon-chevron-sign-right"></i></span>');
	// $(".banner_slider .bx-controls-direction .bx-prev").append('<span class="font_aw"><i class="icon-chevron-sign-left"></i></span>');
	
	// $(".containter_slider .bx-controls-direction .bx-prev").empty();
	// $(".containter_slider .bx-controls-direction .bx-next").empty();
	// $(".containter_slider .bx-controls-direction .bx-next").append('<span class="font_aw"><i class="icon-chevron-sign-right"></i></span>');
	// $(".containter_slider .bx-controls-direction .bx-prev").append('<span class="font_aw"><i class="icon-chevron-sign-left"></i></span>');
	
	//var articleBodyWidth = $('.content').width(),
});