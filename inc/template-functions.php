<?php

if ( ! function_exists( 'tm_title_pages' ) ) {

    /**
     * 
     * 
     * 
     */
    function tm_title_pages() {

        // Not print the heading title on front page
        if ( ! is_front_page() ) {

            // Returns background image
            if ( is_page() || is_single() && has_post_thumbnail() ) {

                $tm_heading_background_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );

            } else {

                $tm_heading_background_image = get_theme_mod( 'tm_heading_background_image_default' );

            }

            // Returns background color
            $tm_heading_background_color = get_theme_mod( 'tm_heading_background_color' );

            if ( $tm_heading_background_image ) {

                echo '<section class="heading-title heading-background-image parallax-window" data-parallax="scroll" data-image-src="' . esc_url( $tm_heading_background_image ) . '">';

            } elseif ( $tm_heading_background_color ) {

                echo '<section class="heading-title heading-background-color">';

            } else {

                echo '<section class="heading-title heading-default">';

            }

                echo '<div class="overlay"></div><!-- /.overlay -->';

                // Returns the text alignment
                $tm_heading_text_alignment = get_theme_mod( 'tm_heading_text_alignment' );
                
                echo '<div class="container text-align-' . esc_attr( $tm_heading_text_alignment ) . '">';

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

                        } elseif ( is_archive() ) {

                            the_archive_title();

                        } else {

                            echo '@todo';

                        }

                    echo '</h1>';

                echo '</div><!-- /.container -->';

            echo '</section><!-- /.heading-title -->';

        }

    }

}