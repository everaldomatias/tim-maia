<?php

if ( class_exists( 'CPT' ) ) {

    /**
     * @link https://github.com/jjgrainger/wp-custom-post-type-class
     */

    $arguments = [
        'show_in_rest' => true, // Enable Gutenberg
        'supports'     => [ 'title', 'editor', 'thumbnail' ],
        'has_archive'  => true
    ];

    $portfolio = new CPT( [
        'post_type_name' => 'portfolio',
        'singular'       => 'Portfólio',
        'plural'         => 'Portfólio',
        'slug'           => 'portfolio'
    ], $arguments );

    $portfolio->menu_icon( 'dashicons-portfolio' );

}