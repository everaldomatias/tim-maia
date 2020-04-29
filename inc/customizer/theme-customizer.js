/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
(function ($) {

    // Hero
    wp.customize('tm_setting_background_section_hero', function (value) {
        value.bind(function (newval) {
            $('#section-hero').attr('data-image-src', newval);
        });
    });
    
    wp.customize('tm_setting_color_section_hero', function (value) {
        value.bind(function (newval) {
            $('#section-hero h1, #section-hero .description').css('color', newval);
        });
    });
    
    //
    wp.customize('tm_general_settings_over_layer_color', function (value) {
        value.bind(function (newval) {
            $('.parallax-window .overlay').css('background-color', newval);
        });
    });

})(jQuery);
