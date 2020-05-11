/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

    // wp.customize('tm_setting_background_section_hero', function (value) {
    //     value.bind(function (newval) {
    //         //$('#section-hero').css('background-image', 'url( ' + newval + ')');
    //         $('#section-hero').parallax({ imageSrc: newval });
    //         $('#section-hero').attr('data-image-src', newval);
    //     });
    // });

    // Hero
    // wp.customize('tm_setting_background_section_hero', function (value) {
    //     value.bind(function (newval) {
    //         $('#section-hero').attr('data-image-src', newval);
    //     });
    // });
    
    // Body
    wp.customize('tm_general_settings_background_color', function (value) {
        value.bind(function (newval) {
            $('body').css('background-color', newval);
        });
    });

    
    // Hero
    wp.customize( 'tm_setting_color_section_hero', function ( value ) {
        value.bind( function ( newval ) {
            $( '#section-hero h1, #section-hero .description' ).css( 'color', newval );
        });
    });

    // Action
    wp.customize('tm_color_section_action', function (value) {
        value.bind(function (newval) {
            $('#section-action').css('color', newval);
        });
    });

    // Features
    wp.customize('tm_color_section_features', function (value) {
        value.bind(function (newval) {
            $('#section-features').css('color', newval);
        });
    });
    
    //
    wp.customize( 'tm_general_settings_over_layer_color', function (value) {
        value.bind(function (newval) {
            $('.parallax-window .overlay').css('background-color', newval);
        });
    });

})(jQuery);
