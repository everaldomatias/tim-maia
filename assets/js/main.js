jQuery(document).ready(function() {

	var parallax = jQuery('.parallax-window');
	var height = window.innerHeight;
	var resizeTimer;

	if ( jQuery( 'body.home' ).length ) {

		jQuery(parallax).css('height', height);

		jQuery(window).on('resize', function () {

			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function () {

				jQuery(parallax).css('height', height);

			}, 200);
		});

	} else {

		height = height / 2;
		
		if ( height <= 450 ) {
			height = 450;
		}

		jQuery(parallax).css('height', height);

		jQuery(window).on('resize', function () {

			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(function () {

				jQuery(parallax).css('height', height);

			}, 200);
		});

	}

	jQuery(function() {
	  jQuery('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace( /^\//,'' ) === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
	      var target = jQuery(this.hash);
	      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        jQuery('html,body').animate({
	          scrollTop: target.offset().top-82
	        }, 800);
	        return false;
	      }
	    }
	  });
	});

});

jQuery(document).ready(function ($) {

	var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		layoutMode: 'fitRows'
	});

	// Layout Isotope after each image loads
	$grid.imagesLoaded().progress(function () {
		$grid.isotope('layout');
	});

	// Filter items on button click
	$('#types').on('click', 'a', function () {
		var filterValue = $(this).attr('data-filter');

		$('#cpt-wrap').isotope({ filter: filterValue });

		$(this).parent('div').find('a').removeClass('active');
		$(this).addClass('active');
	});

});