<?php

/* Adiciona a Sessão Social */
add_action( 'before-footer', 'get_template_section_social' );

/* Adiciona o botão flutuante do WhatsApp */
add_action( 'wp_footer', 'show_whatsapp' );

/**
 * Add register custom post type Products
 * @todo add verification for WooCommerce is active
 */
add_action( 'init', 'tm_cpt_products', 1 );