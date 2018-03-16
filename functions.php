<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

if ( class_exists( 'Kirki' ) ) {
	require 'inc/kirki.php';
}

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

function model_setup() {

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'model' ),
		'social' => __( 'Social Links Menu', 'model' ),
	) );

}
add_action( 'after_setup_theme', 'model_setup' );

/**
 * Enqueue scripts and styles.
 */
function model_scripts() {

	$template_url = get_template_directory_uri();
	
	// Theme stylesheet.
	wp_enqueue_style( 'model-style', get_stylesheet_uri() );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// Grunt main file with Bootstrap and others libs.
	wp_enqueue_script( 'model-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

}
add_action( 'wp_enqueue_scripts', 'model_scripts' );

/**
 * Model custom stylesheet URI.
 *
 * @since  0.0.1
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function model_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/model.css';
}
add_filter( 'stylesheet_uri', 'model_stylesheet_uri', 10, 2 );