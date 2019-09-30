<?php

function tm_remove_woo_actions() {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}
add_action( 'init', 'tm_remove_woo_actions' );



add_action( 'woocommerce_share', 'woocommerce_output_product_data_tabs', 99 );
add_action( 'woocommerce_share', 'woocommerce_output_related_products', 99 );