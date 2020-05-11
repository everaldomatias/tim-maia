<?php 
/**
 * 
 * Output CSS generate from customizer on the wp_head hook
 * 
 */
function tm_customizer_output_css() {
    ?>

        <style type="text/css">

            /* Body */
            body {
                background-color: <?php echo get_theme_mod( 'tm_general_settings_background_color', '#DDDDDD    ' ); ?>;
            }

            /* Section About */
            #section-about {
                color: <?php echo get_theme_mod( 'tm_color_section_about', '#FFFFFF' ); ?>;
            }

            /* Section Action */
            #section-action {
                color: <?php echo get_theme_mod( 'tm_color_section_action', '#FFFFFF' ); ?>;
            }

            /* Section Features */
            #section-features {
                color: <?php echo get_theme_mod( 'tm_color_section_features', '#FFFFFF' ); ?>;
            }

            /* Section Blog */
            #section-blog {
                background-color: <?php echo get_theme_mod( 'tm_background_color_section_blog', '#333333' ); ?>;
                color: <?php echo get_theme_mod( 'tm_color_section_blog', '#FFFFFF' ); ?>;
            }

            /* Over layer */
            .parallax-window .overlay {
                background-color: <?php echo get_theme_mod( 'tm_general_settings_over_layer_color', 'rgba(50,50,50,0.7)' ); ?>;
            }

            #section-hero h1, #section-hero .description { color: <?php echo get_theme_mod( 'tm_setting_color_section_hero', '#FFFFFF' ); ?>; }
        
        </style>

    <?php
}
add_action( 'wp_head', 'tm_customizer_output_css' );