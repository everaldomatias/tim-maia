<?php

/**
 *
 * Add custom post type Products
 * @author 		Everaldo Matias <http://everaldomatias.github.io>
 * @version 	0.1
 * @since 		1.0.3
 * @see 		https://codex.wordpress.org/Function_Reference/register_post_type
 *
 */

function tm_cpt_products() {
    $products = new TM_Post_Type(
        'Produto',
        'products'
    );

    $products->set_labels(
        array(
            'menu_name' => __( 'Produtos', 'odin' )
        )
    );

    $products->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon' => 'dashicons-cart'
        )
    );
}