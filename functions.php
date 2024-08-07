<?php

$get_template_directory = get_template_directory();

// Register Custom Navigation Walker
require_once $get_template_directory . '/inc/class-wp-bootstrap-navwalker.php';

// Class Custom Post Type
require_once $get_template_directory . '/inc/CPT.php';

// Custom Post Types
require_once $get_template_directory . '/inc/post-types.php';

// Metaboxes
require_once $get_template_directory . '/inc/meta-boxes.php';

// Template Functions
require_once $get_template_directory . '/inc/template-functions.php';

// Customizer
require_once $get_template_directory . '/inc/customizer/customizer.php';

require_once $get_template_directory . '/inc/strings-default.php';
require_once $get_template_directory . '/inc/hooks.php';

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

function tm_setup() {

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'model' ),
		'footer' => __( 'Footer Menu', 'model' ),
	) );

	// Add support to Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add support to Custom Logo
    add_theme_support( 'custom-logo' );

	// Add supports to WooCommerce
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 400,
		'single_image_width'    => 800,

		'product_grid'          => array(
			'default_rows'    => 4,
			'min_rows'        => 2,
			'max_rows'        => 8,
			'default_columns' => 4,
			'min_columns'     => 2,
			'max_columns'     => 4,
		),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Responsive embeds
	add_theme_support( 'responsive-embeds' );

    // Add wide size blocks
    add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'tm_setup' );

/**
 * Register Widgets
 */
function tm_widgets_init() {
    register_sidebar( array(
        'name'			=> __( 'Main Sidebar', 'tim-maia' ),
        'id'			=> 'sidebar-main',
        'description'	=> __( 'Widgets in this area will be shown on all posts.', 'tim-maia' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Bar', 'tim-maia' ),
        'id'            => 'footer-bar',
        'description'   => __( 'Widgets in this area will be shown on footer website.', 'tim-maia' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'tm_widgets_init' );


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
	wp_enqueue_script( 'model-main-min', $template_url . '/assets/js/main.min.js', ['jquery', 'isotope', 'imagesloaded'], null, true );

    // wp_enqueue_script( 'model-main-min', $template_url . '/assets/js/team.js', array(), null, true );

    $tm_use_section_portfolio = get_theme_mod( 'tm_use_section_portfolio', '0' );

    if ( $tm_use_section_portfolio || is_post_type_archive( 'portfolio' ) ) {
        wp_enqueue_script( 'isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', ['jquery', 'imagesloaded', 'model-main-min'], '3.0.6', true );
    }

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
 * @author      Everaldo Matias <http://everaldo.dev>
 * @version     2.0.0
 * @since       20/08/2018
 * @return      sting class
 *
 */
function get_widgets_class_by_qtd( $sidebar_name ) {

    if ( $sidebar_name ) {

        global $sidebars_widgets;
        $count = count( $sidebars_widgets[$sidebar_name] );

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
	$use_social = get_theme_mod( 'tm_use_section_social', '1' );
	if ( $use_social ) {
		get_template_part( 'template-parts/section/section', 'social' );
	}
}

function tm_background_thumbnail( $size = 'thumbnail' ) {

    global $post;

    if ( has_post_thumbnail( $post->ID ) ) {

        $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size, false, '' );
	    echo 'style="background-image: url(' . esc_url( $get_post_thumbnail[0] ) . ' )"';

    }

}

function tm_background_first_image_attached_url( $size = 'thumbnail' ) {

    global $post;

    $image = get_posts( [
        'numberposts'    => 1,
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_parent'    => $post->ID,
    ] );

    if ( count( $image ) == 1 ) {

        $image = $image[0];

        $image = wp_get_attachment_image_src( $image->ID, $size );

        return esc_url( $image[0] );

    } else {

        return null;

    }

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

	/**
	 * Init sections by theme
	 */
	tm_init_sections();

}
add_action( 'after_switch_theme', 'initial_config_theme' );

/**
 *
 * Add WooCommerce support
 * @todo Enviar essas informações para um arquivo externo, que será iniciado apenas quando o WooCommerce estiver ativo.
 *
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'tm_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'tm_wc_wrapper_end', 10 );

function tm_wc_wrapper_start() {
    echo '<section id="main" class="tm-wc-main">';
    echo '<div class="container">';
}

function tm_wc_wrapper_end() {
    echo '</div><!-- /.container -->';
    echo '</section><!-- /.tm-wc-main -->';
}

/**
 *
 * Check if WooCommerce is activated
 *
 * @see https://docs.woocommerce.com/document/query-whether-woocommerce-is-activated/
 *
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

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

//

function my_customizer_scripts() {
    wp_enqueue_script( 'tm_customizer_js', trailingslashit( get_template_directory_uri() ) . 'assets/js/my-customizer.js', array(), '1.0', 'all' );
}
add_action('customize_controls_print_scripts', 'my_customizer_scripts');

function my_customizer_styles() {
    wp_enqueue_style( 'tm_customizer_css', trailingslashit( get_template_directory_uri() ) . 'assets/css/my-customizer.css', array(), '1.0', 'all' );
}
add_action('customize_controls_print_styles', 'my_customizer_styles');

if ( ! function_exists( 'tm_get_sections' ) ):
    function tm_get_sections( $sections ) {

        $sections = explode( ',', $sections );

        $output = '';

        if ( empty( $sections ) ) {
            return $output;
        }

        foreach( $sections as $section ) {

            switch ( $section ) {

            case 'tm_section_hero':

                $output .= tm_load_template_part( 'template-parts/section/section-hero' );
                break;

            case 'tm_section_about':
                $output .= tm_load_template_part( 'template-parts/section/section-about' );
                break;

            case 'tm_section_action':
                $output .= tm_load_template_part( 'template-parts/section/section-action' );
                break;

            case 'tm_section_portfolio':
                $output .= tm_load_template_part( 'template-parts/section/section-portfolio' );
                break;

            case 'tm_section_features':
                $output .= tm_load_template_part( 'template-parts/section/section-features' );
                break;

            case 'tm_section_blog':
                $output .= tm_load_template_part( 'template-parts/section/section-blog' );
                break;

            case 'tm_section_donate':
                $output .= tm_load_template_part( 'template-parts/section/section-donate' );
				break;

			case 'tm_section_location':
                $output .= tm_load_template_part( 'template-parts/section/section-location' );
                break;

            case 'tm_section_free':
                $output .= tm_load_template_part( 'template-parts/section/section-free' );
                break;

            default:
                break;
            }

        }

        return $output;

    }
endif;

function tm_load_template_part( $template_name, $part_name = null ) {

    ob_start();
        get_template_part( $template_name, $part_name );
        $var = ob_get_contents();
    ob_end_clean();
    return $var;

}

/**
 *
 * Print buttons by customizer
 *
 * @author      Everaldo Matias <https://everaldo.dev>
 * @version     1.0.0
 * @since       03/05/2020
 * @see         inc/customizer.php
 *
 * @todo        Add filter hook
 *
 * @param       string $button
 * @param       string $link
 *
 * @return      HTML
 *
 */

function tm_print_button( $button, $link = '' ) {

    $html = '';

    $button = get_theme_mod( $button );

    if ( ! empty( $button ) ) {

        if ( ! empty( $link ) ) {
            $link = get_theme_mod( $link );
        }

        if ( $link ) {
            $html = '<a class="btn" href="' . esc_url( $link ) . '">' . apply_filters( 'the_title', $button ) . '</a>';
        } else {
            $html = '<button class="btn">' . apply_filters( 'the_title', $button ) . '</button>';
        }

    }

    return $html;

}


/**
 *
 * Print comments counter
 *
 * @author      Everaldo Matias <https://everaldo.dev>
 * @version     1.0.0
 * @since       10/05/2020
 *
 * @return      HTML
 *
 */

function tm_print_comments_counter() {

    $comments_number = get_comments_number();

    if ( '1' === $comments_number ) : ?>

        <span class="comments">
            <i class="far fa-comment-dots"></i>
            <?php _e( 'One reply', 'model' ); ?>
        </span><!-- /.comments -->

    <?php elseif( $comments_number >= 2 ) : ?>

        <span class="comments">
            <i class="far fa-comment-dots"></i>
            <?php echo $comments_number . ' ' . _e( 'replys', 'model' ); ?>
        </span><!-- /.comments -->

    <?php endif;

}

if ( ! function_exists( 'tm_archive_title_filter' ) ) {

    /**
     *
     * Filter archive titles
     *
     * @see https://developer.wordpress.org/reference/functions/get_the_archive_title/
     *
     */
    function tm_archive_title_filter( $title ) {

        if ( is_post_type_archive( 'portfolio' ) ) {

            $portfolio = get_post_type_object( 'portfolio' );
            $title = $portfolio->labels->name;

		}

		if (is_post_type_archive('team')) {

			$team = get_post_type_object('team');
			$title = $team->labels->name;
		}

        return $title;

    }
    add_filter( 'get_the_archive_title', 'tm_archive_title_filter' );

}

/**
 * Alter URL base from CPT Portfolio in admin setting
 */
add_action( 'load-options-permalink.php', 'tm_portfolio_load_permalinks' );
function tm_portfolio_load_permalinks() {

	if( isset( $_POST['tm_portfolio_base'] ) ) {
		update_option( 'tm_portfolio_base', sanitize_title_with_dashes( $_POST['tm_portfolio_base'] ) );
    }

    $tm_title_section_portfolio = get_theme_mod( 'tm_portfolio_labels_singular', __( 'Portfólio', 'tim-maia' ) );
    $tm_title_section_portfolio = __( 'Base para', 'tim-maia' ) . ' ' . $tm_title_section_portfolio;

	// Add a settings field to the permalink page
    add_settings_field( 'tm_portfolio_base', $tm_title_section_portfolio, 'tm_portfolio_field_callback', 'permalink', 'optional' );

}

function tm_portfolio_field_callback() {

    $tm_title_section_portfolio = get_theme_mod( 'tm_portfolio_labels_singular', __( 'Portfólio', 'tim-maia' ) );
    $tm_title_section_portfolio = sanitize_title( $tm_title_section_portfolio );

	$value = get_option( 'tm_portfolio_base', $tm_title_section_portfolio );
	echo '<code>' . get_option( 'home' ) . '/</code>';
	echo '<input type="text" value="' . esc_attr( $value ) . '" name="tm_portfolio_base" id="tm_portfolio_base" class="regular-text" />';

}

/**
 * Alter URL base from CPT Team in admin setting
 */
add_action('load-options-permalink.php', 'tm_team_load_permalinks');
function tm_team_load_permalinks()
{

	if (isset($_POST['tm_team_base'])) {
		update_option('tm_team_base', sanitize_title_with_dashes($_POST['tm_team_base']));
	}

	$tm_title_section_team = get_theme_mod('tm_team_labels_singular', __('Equipe', 'tim-maia'));
	$tm_title_section_team = __('Base para', 'tim-maia') . ' ' . $tm_title_section_team;

	// Add a settings field to the permalink page
	add_settings_field('tm_team_base', $tm_title_section_team, 'tm_team_field_callback', 'permalink', 'optional');

}

function tm_team_field_callback()
{

	$tm_title_section_team = get_theme_mod('tm_team_labels_singular', __('Equipe', 'tim-maia'));
	$tm_title_section_team = sanitize_title($tm_title_section_team);

	$value = get_option('tm_team_base', $tm_title_section_team);
	echo '<code>' . get_option('home') . '/</code>';
	echo '<input type="text" value="' . esc_attr($value) . '" name="tm_team_base" id="tm_team_base" class="regular-text" />';

}


add_action('wp_enqueue_scripts', 'team_scripts');
function team_scripts() {
	wp_register_script('team', get_template_directory_uri() . '/assets/js/team.js', ['jquery'], '', true);

	$data = [
		'ajaxurl'  => admin_url('admin-ajax.php'),
		'security' => wp_create_nonce('get_member')
	];

	wp_localize_script('team', 'team_object', $data);

	wp_enqueue_script('team');
}





function get_member()
{

	check_ajax_referer( 'get_member', 'security' );
	$post_id = $_POST['post_id'];
	$specialty = get_post_meta($post_id, 'team_specialty', true);

	$post = get_post($post_id, 'ARRAY_A');

	if ( has_post_thumbnail( $post['ID'] ) ) {
		echo '<div class="thumb">';
		echo get_the_post_thumbnail( $post['ID'] );
		echo '</div>';
	}

	echo '<div class="content">';
	echo '<h2>' . $post['post_title'] . '</h2>';

	echo '<span class="meta">';
	echo apply_filters('the_title', $specialty);
	echo '</span>';

	echo get_the_content('', true, $post['ID'] );
	echo '</div>';

	die();

}

add_action("wp_ajax_get_member", "get_member");
add_action("wp_ajax_nopriv_get_member", "get_member");

if ( ! function_exists( 'get_post_content' ) ) {
    function get_post_content( $post = 0 ) {
        $post = get_post( $post );
        return apply_filters( 'the_content', $post->post_content );
    }
}
