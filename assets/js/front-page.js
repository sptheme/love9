(function($)
{

	/*--------------------------------------------------------------------------------------*/
	/* 	Primary navigation on front-page
	/*--------------------------------------------------------------------------------------*/
	/*$('#primary li').click(function(event) {
		event.preventDefault();
		$('#primary li').removeClass('current');
		$(this).addClass('current');
	});*/

    /*--------------------------------------------------------------------------------------*/
	/* 	Smooth scroll init
	/*--------------------------------------------------------------------------------------*/
	/*var wow = new WOW(
	    {
	        boxClass:     'wow',      // animated element css class (default is wow)
	        animateClass: 'animated', // animation css class (default is animated)
	        offset:       250,          // distance to the element when triggering the animation (default is 0)
	        mobile:       false        // trigger animations on mobile devices (true is default)
	    }
	);
	wow.init();*/
	new WOW().init();

    smoothScroll.init({
        speed: 1000, // Integer. How fast to complete the scroll in milliseconds
        easing: 'easeInOutCubic', // Easing pattern to use
        updateURL: false, // Boolean. Whether or not to update the URL with the anchor hash on scroll
        offset: 50, // Integer. How far to offset the scrolling anchor location in pixels
        callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
        callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
    });
	
	/*--------------------------------------------------------------------------------------*/
	/* 	Page loading
	/*--------------------------------------------------------------------------------------*/
	$(window).bind('load',function () {   // makes sure the whole site is loaded
	    "use strict";
	    $('#status').fadeOut(); // will first fade out the loading animation
	    $('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
	    $('body').delay(100).css({'overflow':'visible'});
	})

	
	/*--------------------------------------------------------------------------------------*/
	/* 	Scroll the background layers
	/*--------------------------------------------------------------------------------------*/
	$(window).bind('scroll',function(e){
    	//parallaxScroll();
    	//actorScroll();
    });

	function parallaxScroll(){
		var scrolled = $(window).scrollTop();
		$('#parallax-1').css('top',(0-(scrolled*1))+'px');
	}

	/*function actorScroll(){
		var scrolled = $(window).scrollTop();
		if ( scrolled > $('#intro').offset().top + 250 ) {
			$('#love9-intro').removeClass();
			$('#love9-intro').removeAttr('style');
			$('#love9-intro').addClass('animated fadeOut')
		}
		else if ( scrolled > $('#intro').offset().top ) {
			$('#love9-intro').removeClass();
			$('#love9-intro').addClass('wow zoomIn')
		}
	}*/

	/*--------------------------------------------------------------------------------------*/
	/* 	sub navigation section
	/*--------------------------------------------------------------------------------------*/
	/*$('.next-prev a').click(function(event) {
		$sub_nav = $(this).attr('href');
		$('#primary a[href="'+ $sub_nav +'"]').parent().addClass('current').siblings().removeClass('current');
	});*/
																																  
}(jQuery));



