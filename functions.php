<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

if ( class_exists( 'Kirki' ) ) {
	require 'inc/kirki.php';
}
require_once get_template_directory() . '/inc/hooks.php';
require_once get_template_directory() . '/inc/strings-default.php';

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
		'footer' => __( 'Footer Menu', 'model' ),
	) );

	// Add support to Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add support to Custom Logo
	add_theme_support( 'custom-logo' );	

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

/**
 * Add custom class in the body
 *
 * @since  0.0.1
 * 
 * @param  string $clasees
 * 
 * @return string in the body HTML class
 */
function model_body_class( $classes ) {

	global $post;
 
    if ( is_page() || is_single() ) {
        $classes[] = $post->post_name;
    }

    if ( has_custom_logo() ) {
    	$classes[] = 'has-custom-logo';
    }
     
    return $classes;

}
add_filter( 'body_class', 'model_body_class' );

/**
 * 
 * Retorna o template da Sessão Social caso
 * esteja definida no Customizer para ser ebinida.
 *
 * @author 		Everaldo Matias <http://everaldomatias.github.io>
 * @version 	0.1
 * @since 		10/04/2018
 * @see 		inc/hooks.php
 * @link 		https://codex.wordpress.org/Plugin_API/Hooks_2.0.x
 * @return 		template file
 * 
 */
function get_template_section_social() {
	$use_social = get_theme_mod( 'use_social', '1' );
	if ( $use_social ) {
		get_template_part( 'template-parts/section/section', 'social' );
	}
}