jQuery(document).ready(function() {

	var parallax = jQuery( '.parallax-window' );
	var body = jQuery( '.has-custom-logo' );
	var height = window.innerHeight;

	if ( jQuery( body ).length ) {

		var logo = jQuery( 'img.logo' ).height();
		var result = height * 0.5 - ( 160 * 0.5 );
		var result_logo = height * 0.5 - ( logo * 0.5 + 56 );

		jQuery( parallax ).css( 'height', height );
		jQuery( parallax ).css( 'padding-top', result );
		jQuery( '#section-nome' ).css( 'padding-top', result_logo );

	} else if ( jQuery( parallax ).length ) {

		var result_parallax = height * 0.5 - ( 160 * 0.5 );
		
		jQuery( parallax ).css( 'height', height );
		jQuery( parallax ).css( 'padding-top', result_parallax );
		//jQuery( parallax ).css( 'padding-bottom', result );
		//jQuery( '#content' ).css( 'margin-top', height );
		//jQuery( '#footer' ).css( 'margin-bottom', result );
	}
});