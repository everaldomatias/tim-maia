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
                background-color: <?php echo get_theme_mod( 'tm_general_settings_background_color', '#f1f1f1' ); ?>;
            }

            /* Body -> Home */
            body.home {
                background-color: <?php echo get_theme_mod( 'tm_general_settings_sections_background_color', '#508991' ); ?>;
            }

            /* Sections on Home, with class body.home .section-home */
            body.home .section-home {
                padding-bottom: <?php echo get_theme_mod( 'tm_general_settings_padding', '100' ); ?>px;
                padding-top: <?php echo get_theme_mod( 'tm_general_settings_padding', '100' ); ?>px;
            }

            /* Menu Fixed & Menu Footer */
            .fixed-top,
            .fixed-top .dropdown-menu,
            .footer-menu {
                background-color: <?php echo get_theme_mod( 'tm_fixed_background_color', '#111111' ); ?>;
            }
            .fixed-top,
            .fixed-top a,
            .fixed-top .dropdown-menu a.dropdown-item,
            .footer-menu,
            .footer-menu a {
                color: <?php echo get_theme_mod( 'tm_fixed_color', '#888888' ); ?>;
            }

			/* Hamburguer Menu */
			.navbar-toggler .navbar-toggler-icon {
				background-color: <?php echo get_theme_mod( 'tm_fixed_color', '#888888' ); ?> !important;
			}

            /* Section About */
            #section-about {
                color: <?php echo get_theme_mod( 'tm_color_section_about', '#FFFFFF' ); ?>;
            }
            #section-about .buttons a.btn,
            #section-about .buttons a.btn:hover {
                color: <?php echo get_theme_mod( 'tm_color_section_about', '#FFFFFF' ); ?>;
                border-color: <?php echo get_theme_mod( 'tm_color_section_about', '#FFFFFF' ); ?>;
            }

            /* Section Action */
            #section-action {
                color: <?php echo get_theme_mod( 'tm_color_section_action', '#FFFFFF' ); ?>;
            }
			#section-action a.btn,
			#section-action a.btn:hover {
				color: <?php echo get_theme_mod( 'tm_color_section_action', '#FFFFFF' ); ?>;
				border-color: <?php echo get_theme_mod( 'tm_color_section_action', '#FFFFFF' ); ?>;
			}

            /* Section Features */
            #section-features {
                color: <?php echo get_theme_mod( 'tm_color_section_features', '#FFFFFF' ); ?>;
            }

            #section-features .buttons a.btn,
            #section-features .buttons a.btn:hover {
                color: <?php echo get_theme_mod( 'tm_color_section_features', '#FFFFFF' ); ?>;
            }

            /* Section Portfolio */
            #section-portfolio {
                background-color: <?php echo get_theme_mod( 'tm_background_color_section_portfolio', '#222222' ); ?>;
                color: <?php echo get_theme_mod( 'tm_color_section_portfolio', '#FFFFFF' ); ?>;
            }
            #section-portfolio ul#types li a,
            #section-portfolio ul#types li a:hover {
                color: <?php echo get_theme_mod( 'tm_color_section_portfolio', '#FFFFFF' ); ?>;
            }
            #section-portfolio .buttons a.btn,
            #section-portfolio .buttons a.btn:hover {
                color: <?php echo get_theme_mod( 'tm_color_section_portfolio', '#FFFFFF' ); ?>;
                border-color: <?php echo get_theme_mod( 'tm_color_section_portfolio', '#FFFFFF' ); ?>
            }

            /* Section Blog */
            #section-blog {
                background-color: <?php echo get_theme_mod( 'tm_background_color_section_blog', '#333333' ); ?>;
                color: <?php echo get_theme_mod( 'tm_color_section_blog', '#FFFFFF' ); ?>;
            }
            #section-blog .buttons a.btn,
            #section-blog .buttons a.btn:hover {
                color: <?php echo get_theme_mod( 'tm_color_section_blog', '#FFFFFF' ); ?>;
            }

            /* Section Donate */
            #section-donate {
                color: <?php echo get_theme_mod( 'tm_color_section_donate', '#FFFFFF' ); ?>;
            }
			#section-donate .buttons a.btn {
                border-color: <?php echo get_theme_mod( 'tm_color_section_donate', '#FFFFFF' ); ?>;
                color: <?php echo get_theme_mod( 'tm_color_section_donate', '#FFFFFF' ); ?>;
			}

            /* Section Social */
            #section-social {
                background-color: <?php echo get_theme_mod( 'tm_social_background_color', '#444444' ); ?>;
            }

            /* Over layer */
            .parallax-window .overlay {
                background-color: <?php echo get_theme_mod( 'tm_general_settings_over_layer_color', 'rgba(50,50,50,0.7)' ); ?>;
            }

            /* Heading Title */
            .heading-title {
                padding-bottom: <?php echo get_theme_mod( 'tm_heading_padding', '100' ); ?>px;
                padding-top: <?php echo get_theme_mod( 'tm_heading_padding', '100' ); ?>px;
            }
            .heading-title h1 {
                color: <?php echo get_theme_mod( 'tm_heading_color' ); ?>;
            }
            .heading-title.heading-background-color {
                background-color: <?php echo get_theme_mod( 'tm_heading_background_color' ); ?>;
            }

            /* Footer */
            footer.site-footer {
                background-color: <?php echo get_theme_mod( 'tm_footer_background_color', '#111111' ); ?>;
                color: <?php echo get_theme_mod( 'tm_footer_color', '#888888' ); ?>;
            }
            footer.site-footer a:hover {
                color: <?php echo get_theme_mod( 'tm_footer_hover_control', '#DDDDDD' ); ?>;
            }

            #section-hero h1, #section-hero .description { color: <?php echo get_theme_mod( 'tm_setting_color_section_hero', '#FFFFFF' ); ?>; }

        </style>

    <?php
}
add_action( 'wp_head', 'tm_customizer_output_css' );
