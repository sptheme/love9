(function($)
{

	/*--------------------------------------------------------------------------------------*/
	/* 	Primary navigation on left
	/*--------------------------------------------------------------------------------------*/
	var $primary_nav = [];
	$('#primary li a').each(function() {
		$primary_nav.push($(this).attr('href'));
	});

	$('#primary li a').click(function(event) {
		event.preventDefault();
		$(this).parent().addClass('current').siblings().removeClass('current');
		$('.primary-nav a[href="'+ $(this).attr('href') +'"]').parent().addClass('current-menu-item').siblings().removeClass('current-menu-item');
	});

	/*--------------------------------------------------------------------------------------*/
	/* 	Top navigation and sub navigation section
	/*--------------------------------------------------------------------------------------*/
	$('.primary-nav > li').each(function(index) {
		$anchor = $primary_nav[index];
		$(this).children('ul').remove();
		$(this).removeClass('current-menu-item');
		$(this).children('a').attr('href', $anchor);
	});

	$('.primary-nav li a[href*=#]:not([href=#])').click(function() {
		
		$('#primary a[href="'+ $(this).attr('href') +'"]').parent().addClass('current').siblings().removeClass('current');
		$(this).parent().addClass('current-menu-item').siblings().removeClass('current-menu-item');

	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top - 82
	        }, 1000);
	        return false;
	      }
	    }
	});
	$('.next-prev a').click(function(event) {
		$anchor = $(this).attr('href');
		$('#primary a[href="'+ $anchor +'"]').parent().addClass('current').siblings().removeClass('current');
		$('.primary-nav a[href="'+ $anchor +'"]').parent().addClass('current-menu-item').siblings().removeClass('current-menu-item');
	});

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
	/* 	Magnific Popup
	/*--------------------------------------------------------------------------------------*/
	$('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'sp-mfp-zoom-in'
	});

	$('.popup-soundcloud').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'sp-mfp-zoom-in',
		removalDelay: 300,
		preloader: false,

		fixedBgPos: true,
		fixedContentPos: false,

		overflowY: 'auto',
	});

	$('.popup-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'sp-mfp-zoom-in',
		removalDelay: 300,
		preloader: false,

		fixedBgPos: true,
		fixedContentPos: false,

		overflowY: 'auto',
		iframe: {
		  patterns: {
		    youtube: {
		      index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

		      id: 'v=', // String that splits URL in a two parts, second part should be %id%
		      // Or null - full URL will be returned
		      // Or a function that should return %id%, for example:
		      // id: function(url) { return 'parsed id'; } 

		      src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0' // URL that will be set as a source for iframe. 
		    }

		  },

		  srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
		}

	});

	/*--------------------------------------------------------------------------------------*/
	/* 	Scroll the background layers
	/*--------------------------------------------------------------------------------------*/
	$(window).bind('scroll',function(e){
    	//parallaxScroll();
    });

	function parallaxScroll(){
		var scrolled = $(window).scrollTop();
		$('#parallax-1').css('top',(0-(scrolled*1))+'px');
	}
																																  
}(jQuery));



