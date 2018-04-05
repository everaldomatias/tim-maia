jQuery(document).ready(function() {
	var parallax = jQuery( '.parallax-window' );
	if ( jQuery( parallax ).length ) {
		var height = window.innerHeight;
		var result = height * 0.5 - ( 260 * 0.5 );
		
		jQuery( parallax ).css( 'height', height );
		jQuery( parallax ).css( 'padding-top', result );
		//jQuery( parallax ).css( 'padding-bottom', result );
		//jQuery( '#content' ).css( 'margin-top', height );
		//jQuery( '#footer' ).css( 'margin-bottom', result );
	}
});