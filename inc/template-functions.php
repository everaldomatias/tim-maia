<?php

if ( ! function_exists( 'tm_title_pages' ) ) {

    /**
     *
     * Print the heading titles
     *
     */
    function tm_title_pages() {

        // Not print the heading title on front page
        if ( ! is_front_page() ) {

            // Returns background image
            if ( has_post_thumbnail( get_the_ID() ) && is_page() || is_single() ) {

                $tm_heading_background_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );

            } else {

                $tm_heading_background_image = get_theme_mod( 'tm_heading_background_image_default' );

            }

            // Returns background color
            $tm_heading_background_color = get_theme_mod( 'tm_heading_background_color' );

            $tm_heading_use = get_theme_mod( 'tm_heading_use', '0' );

            if ( $tm_heading_background_image && ! $tm_heading_use ) {

                echo '<section class="heading-title heading-background-image parallax-window" data-parallax="scroll" data-image-src="' . esc_url( $tm_heading_background_image ) . '">';

            } elseif ( $tm_heading_background_color ) {

                echo '<section class="heading-title heading-background-color">';

            } else {

                echo '<section class="heading-title heading-default">';

            }

                echo '<div class="overlay"></div><!-- /.overlay -->';

                // Returns the text alignment
                $tm_heading_text_alignment = get_theme_mod( 'tm_heading_text_alignment', 'center' );

                echo '<div class="container container-title text-align-' . esc_attr( $tm_heading_text_alignment ) . '">';

                    echo '<h1>';

                        if ( is_page() || is_single() ) {

                            the_title();

                        } elseif ( is_home() ) {

                            /**
                             *
                             * Blog title
                             *
                             * @link https://codex.wordpress.org/Conditional_Tags#The_Blog_Page
                             *
                             */
                            $blog_title = get_the_title( get_option( 'page_for_posts', true ) );
                            echo apply_filters( 'the_title', $blog_title );

                        } elseif( is_category() ) {

                            echo single_term_title( '', false );

                        } elseif ( is_woocommerce_activated() && is_shop() ) {

                            woocommerce_page_title();

                        } elseif ( is_post_type_archive( 'team' ) ) {

							$team_title = get_theme_mod( 'tm_team_labels_singular', __( 'Equipe', 'tim-maia' ) );
							echo apply_filters( 'the_title', $team_title );

						} elseif ( is_archive() ) {

                            the_archive_title();

                        } elseif ( is_post_type_archive() ) {

                            echo 'cpt';

                        } else {

                            echo '@todo';

                        }

                    echo '</h1>';

                echo '</div><!-- /.container -->';

            echo '</section><!-- /.heading-title -->';

        }

    }

}

if ( ! function_exists( 'tm_redirect_single_team' ) ) {

	/**
	 * Redirect direct access to single team to archive
	 *
	 * @return void
	 */
	function tm_redirect_single_team($query) {

		if (is_singular('team')) {

			$singular     = get_theme_mod( 'tm_team_labels_singular', __( 'Equipe', 'tim-maia' ) );
			$tm_team_base = get_option( 'tm_team_base', sanitize_title( $singular ) );

			wp_redirect( home_url( $tm_team_base ), 301 );
			die();

		}

	}

	add_action('template_redirect', 'tm_redirect_single_team');

}
