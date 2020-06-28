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

    // Body
    wp.customize('tm_general_settings_sections_background_color', function (value) {
        value.bind(function (newval) {
            $('body.home').css('background-color', newval);
        });
    });

    // Menu Fixed & Menu Footer
    wp.customize('tm_fixed_background_color', function (value) {
        value.bind(function (newval) {
            $('.fixed-top').css('background-color', newval);
            $('.fixed-top .dropdown-menu').css('background-color', newval);
            $('.footer-menu').css('background-color', newval);
        });
    });
    wp.customize('tm_fixed_color', function (value) {
        value.bind(function (newval) {
            $('.fixed-top').css('color', newval);
            $('.fixed-top a').css('color', newval);
            $('.fixed-top .dropdown-menu a.dropdown-item').css('color', newval);
            $('.footer-menu a').css('color', newval);
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

    // Portfolio
    wp.customize('tm_color_section_portfolio', function (value) {
        value.bind(function (newval) {
            $('#section-portfolio').css('color', newval);
        });
    });
    wp.customize('tm_background_color_section_portfolio', function (value) {
        value.bind(function (newval) {
            $('#section-portfolio').css('background-color', newval);
        });
    });

    // Blog
    wp.customize('tm_color_section_blog', function (value) {
        value.bind(function (newval) {
            $('#section-blog').css('color', newval);
        });
    });
    wp.customize('tm_background_color_section_blog', function (value) {
        value.bind(function (newval) {
            $('#section-blog').css('background-color', newval);
        });
    });

    // Social
    wp.customize('tm_social_background_color', function (value) {
        value.bind(function (newval) {
            $('#section-social').css('background-color', newval);
        });
    });

    // Donate
    wp.customize('tm_color_section_donate', function (value) {
        value.bind(function (newval) {
            $('#section-donate').css('color', newval);
        });
    });

    // Heading Title
    wp.customize('tm_heading_background_color', function (value) {
        value.bind(function (newval) {
            $('.heading-title.heading-background-color').css('background-color', newval);
        });
    });
    wp.customize('tm_heading_color', function (value) {
        value.bind(function (newval) {
            $('.heading-title').css('color', newval);
        });
    });
    wp.customize('tm_heading_text_alignment', function (value) {
        value.bind(function (newval) {
            $('.heading-title .container').css('text-align', newval);
        });
    });

    // Footer
    wp.customize('tm_footer_background_color', function (value) {
        value.bind(function (newval) {
            $('footer.site-footer').css('background-color', newval);
        });
    });
    wp.customize('tm_footer_color', function (value) {
        value.bind(function (newval) {
            $('footer.site-footer').css('color', newval);
            $('footer.site-footer a').css('color', newval);
        });
    });
    wp.customize('tm_footer_hover_control', function (value) {
        value.bind(function (newval) {
            $('footer.site-footer a:hover').css('color', newval);
        });
    });

    

    //
    wp.customize( 'tm_general_settings_over_layer_color', function (value) {
        value.bind(function (newval) {
            $('.parallax-window .overlay').css('background-color', newval);
        });
    });

})(jQuery);
