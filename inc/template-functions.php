<?php

function tm_title_pages() {

    /**
     * 
     * @todo create models to Heading Title: 
     * @todo background image (image default or customizable by pages and singles)
     * @todo align text
     * 
     */

    // Returns background image
    $heading_background_image = get_theme_mod( 'heading_background_image' );

    // Returns background color
    $tm_heading_background_color = get_theme_mod( 'tm_heading_background_color' );

    if ( $heading_background_image ) {

        echo '<section class="heading-title heading-background-image parallax-window" data-image-src="' . esc_url( $heading_background_image ) . '">';

    } elseif ( $tm_heading_background_color ) {

        echo '<section class="heading-title heading-background-color">';

    } else {

        echo '<section class="heading-title heading-default">';

    }

        echo '<div class="overlay"></div><!-- /.overlay -->';

        // Returns the text alignment
        $heading_text_alignment = get_theme_mod( 'heading_text_alignment', 'center' );
        
        echo '<div class="container text-align-' . esc_attr( $heading_text_alignment ) . '">';

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

                } else {

                    echo 'Todo';

                }

            echo '</h1>';

        echo '</div><!-- /.container -->';

    echo '</section><!-- /.heading-title -->';

}