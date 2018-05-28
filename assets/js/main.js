jQuery(document).ready(function() {

	var parallax = jQuery( '.parallax-window' );
	var height = window.innerHeight;
	var isHome = jQuery( 'body.home' );
	var resizeTimer;
	var heightFinal;
	var size;
	
	if ( jQuery( isHome ).length ) {
		size = jQuery( 'img.logo' ).height();
		heightFinal = height;
	} else {
		size = jQuery( 'h1.entry-title' ).height();
		heightFinal = height - 250;
	}

	// Resto da subtração da altura da tela menos a altura do título
	var padding = heightFinal - size;
	var paddingFinal = padding * 0.5;

	jQuery( parallax ).css( 'height', heightFinal );
	jQuery( parallax ).css( 'padding-bottom', paddingFinal + 10 );
	jQuery( parallax ).css( 'padding-top', paddingFinal - 10 );

	jQuery( window ).on( 'resize', function() {

		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( function() {

			if ( jQuery( isHome ).length ) {
				size = jQuery( 'img.logo' ).height();
				heightFinal = height;
			} else {
				size = jQuery( 'h1.entry-title' ).height();
				heightFinal = height - 250;
			}

			// Resto da subtração da altura da tela menos a altura do título
			var padding = heightFinal - size;
			var paddingFinal = padding * 0.5;

			jQuery( parallax ).css( 'height', heightFinal );
			jQuery( parallax ).css( 'padding-bottom', paddingFinal + 10 );
			jQuery( parallax ).css( 'padding-top', paddingFinal - 10 );

		}, 200);
	});

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