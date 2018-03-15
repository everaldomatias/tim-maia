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

		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
