<?php

if ( class_exists( 'CPT' ) ) {

    /**
     * @link https://github.com/jjgrainger/wp-custom-post-type-class
     */

    $arguments = [
        'show_in_rest' => true, // Enable Gutenberg
        'supports'     => [ 'title', 'editor', 'thumbnail' ],
        'has_archive'  => true,
        'labels' => [
            'add_new'       => __( 'Adicionar novo', 'tim-maia' ),
            'search_items'  => __( 'Pesquisar portfólio', 'tim-maia' )
        ]
    ];

    $portfolio = new CPT( [
        'post_type_name' => 'portfolio',
        'singular'       => 'Portfólio',
        'plural'         => 'Portfólio',
        'slug'           => 'portfolio'
    ], $arguments );

    $portfolio->menu_icon( 'dashicons-portfolio' );

    /**
     * Register taxonomy Types
     */
    $arguments = [
        'labels' => [
            'add_new_item' => __( 'Adicionar novo', 'tim-maia' ),
            'all_items'    => __( 'Exibir todos', 'tim-maia' ),
            'search_items' => __( 'Pesquisar tipos', 'tim-maia' ),
            'parent_item'  => __( 'Tipo superior', 'tim-maia' ),
            'not_found'    => __( 'Nenhum tipo', 'tim-maia' ),
        ],
        'show_in_rest' => true
    ];
    $portfolio->register_taxonomy( [
        'taxonomy_name'      => 'portfolio_type',
        'singular'           => 'Tipo',
        'plural'             => 'Tipos',
        'slug'               => 'tipo'
    ], $arguments );

}