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

add_action( 'widgets_init', 'model_widgets_init' );
function model_widgets_init() {
    register_sidebar( array(
        'name'			=> __( 'Main Sidebar', 'model' ),
        'id'			=> 'sidebar-main',
        'description'	=> __( 'Widgets in this area will be shown on all posts.', 'model' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Bar', 'model' ),
        'id'            => 'footerbar',
        'description'   => __( 'Widgets in this area will be shown on footer website.', 'model' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s ' . get_widgets_class_by_qtd( 'footerbar' ) . ' ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1100;
}

/**
 * Enqueue scripts and styles.
 */
function model_scripts() {

	$template_url = get_template_directory_uri();

    // Font Awesome
    // https://fontawesome.com/get-started
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );

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
 */

/**
 * 
 * Retorna quantidade de colunas nos widgets com Bootstrap grid
 * de acordo com a quantidade de widgets ativos.
 *
 * @author      Everaldo Matias <http://everaldomatias.github.io>
 * @version     1.0.2
 * @since       20/08/2018
 * @return      sting class
 * 
 */
function get_widgets_class_by_qtd( $sidebar_name ) {
    
    global $sidebars_widgets;
    $count = count ( $sidebars_widgets[$sidebar_name] );
    
    switch ( $count ) {
        case '1':
            $class = 'col-sm-12';
            break;
        case '2':
            $class = 'col-sm-6';
            break;
        case '3':
            $class = 'col-sm-4';
            break;
        case '4':
            $class = 'col-sm-3';
            break;
        default:
            $class = '';
            break;
    }
    if ( $class )
        return $class;
}

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

function thumbnail_bg( $tamanho = 'thumbnail' ) {
	global $post;
	$get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
	echo 'style="background-image: url(' . esc_url( $get_post_thumbnail[0] ) . ' )"';
}

/**
 *
 * Define valores e configurações iniciais ao ativar o tema.
 * 
 * @author 		Everaldo Matias <http://everaldomatias.github.io>
 * @version 	0.1
 * @since 		15/05/2018
 *
 */
function initial_config_theme() {
    
    $initial_config_theme = get_option( 'initial_config_theme', false );

    if ( $initial_config_theme == false ) {
        
        /* Home */
        $page_title = 'Home';
        $page_check = get_page_by_title( $page_title );
        $page = array(
            'post_type'     => 'page',
            'post_title'    => $page_title,
            'post_status'   => 'publish',
            'post_author'   => 1,
        );

        if ( ! isset( $page_check->ID ) ) {
            $page_id = wp_insert_post( $page );
            update_option( 'page_on_front', $page_id );
            update_option( 'show_on_front', 'page' );
            update_option( 'initial_config_theme', true );
        } elseif( get_post_status( $page_check->ID ) != false ) {
            update_option( 'page_on_front', $page_check->ID );
            update_option( 'show_on_front', 'page' );
            update_option( 'initial_config_theme', true );
        }

        /* Blog */
        $page_blog_title = 'Blog';
        $page_blog_check = get_page_by_title( $page_blog_title );
        $page_blog = array(
            'post_type'     => 'page',
            'post_title'    => $page_blog_title,
            'post_status'   => 'publish',
            'post_author'   => 1,
        );

        if ( ! isset( $page_blog_check->ID ) ) {
            $page_blog_id = wp_insert_post( $page_blog );
            update_option( '', $page_blog_id );
        } elseif( get_post_status( $page_blog_check->ID ) != false ) {
            update_option( 'page_for_posts', $page_blog_check->ID );
        }

    }
}
add_action( 'after_switch_theme', 'initial_config_theme' );

/**
 *
 * Remove valores e configurações iniciais ao desativar o tema.
 * 
 * @author 		Everaldo Matias <http://everaldomatias.github.io>
 * @version 	0.1
 * @since 		15/05/2018
 *
 */
function remove_config_theme () {
    delete_option( 'page_on_front' );
    delete_option( 'page_for_posts' );
    update_option( 'show_on_front', 'posts' );
    update_option( 'initial_config_theme', false );
}
add_action( 'switch_theme', 'remove_config_theme' );


/**
 *
 * Imprime o botão flutuante do WhatsApp
 * com as informações configuradas no Customizer.
 *
 * @author      Everaldo Matias <http://everaldomatias.github.io>
 * @version     1.1.2
 * @since       20/08/2018
 * @see         inc/hooks.php
 * @link        https://codex.wordpress.org/Plugin_API/Hooks_2.0.x
 * @return      HTML
 *
 */
function show_whatsapp() {
    $use_whatsapp = get_theme_mod( 'use_whatsapp', '1' );
    $whatsapp = get_theme_mod( 'whatsapp' );

    if ( $use_whatsapp && ! empty ( $whatsapp ) ) {
        $titulo_whatsapp = get_theme_mod( 'titulo_whatsapp', 'WhatsApp' );
        $frase_whatsapp = get_theme_mod( 'frase_whatsapp' );
        if ( ! empty( $frase_whatsapp ) ) {
            echo '<a target="_blank" href="https://wa.me/' . esc_html( $whatsapp ) . '?text=' . urlencode( $frase_whatsapp ) . '" class="float-whatsapp title-whatsapp-active" title=" ' . esc_html( $titulo_whatsapp ) . '">';         
            echo esc_html( $titulo_whatsapp );
            
        } else {
            echo '<a target="_blank" href="https://wa.me/' . esc_html( $whatsapp ) . '" class="float-whatsapp" title="WhatsApp">';
        }

        echo '</a><!-- .float-whatsapp -->';

    }
}