<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Model
 * @since 10.1
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
		<?php endif; ?>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">

		<?php if ( is_home() || is_front_page() ) : ?>

			<?php $image_section_nome = get_theme_mod( 'image_section_nome', 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960' ); ?>

			<div id="section-nome" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_nome ); ?>">
				<div class="container text-center">
					<?php
					if ( has_custom_logo() ) {
						$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
					    echo '<img class="logo" src="'. esc_url( $logo[0] ) .'">';
					} elseif( is_home() ) {
					    echo '<h1>'. __( 'Blog', 'model' ) .'</h1>';
					} else {
						echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
					}
					?>
				</div>
			</div><!-- /#section-nome -->

		<?php elseif( has_post_thumbnail() ) : ?>

			<?php $image_section_nome = get_the_post_thumbnail_url(); ?>

			<div id="section-nome" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_nome ); ?>">
				<div class="container text-center">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</div>
			</div><!-- /#section-nome -->
			
		<?php else : ?>

			<?php $image_section_nome = 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960'; ?>

			<div id="section-nome" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_nome ); ?>">
				<div class="container text-center">
					<?php if ( is_page() || is_single() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else: ?>
						<h1><?php bloginfo( 'name' ); ?></h1>
					<?php endif; ?>
					
				</div>
			</div><!-- /#section-nome -->

		<?php endif; ?>
