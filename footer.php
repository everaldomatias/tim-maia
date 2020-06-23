<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Model
 * @since 0.1
 * @version 0.2
 */

?>

	<?php do_action( 'before-footer' ); ?>

		</div><!-- #content -->

		<?php
		if ( has_nav_menu( 'footer' ) ) : ?>

			<div class="footer-menu">
				<div class="container">
					<nav class="footer-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'tim-maia' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_class'     => 'footer-menu',
								'depth'          => 1
							) );
						?>
					</nav><!-- /.footer-navigation -->
				</div>
			</div><!-- .footer-menu -->

		<?php endif; ?>
		
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">

				<?php if ( is_active_sidebar( 'footer-bar' ) ): ?>

					<div class="footer-widgets">
						<?php dynamic_sidebar( 'footer-bar' ); ?>
					</div><!-- .footer-widgets -->
					
				<?php endif; ?>

				<div class="info">

					<?php $tm_footer_text = get_theme_mod( 'tm_footer_text' ); ?>

					<?php if ( $tm_footer_text ) : ?>

						<?php echo apply_filters( 'the_content', $tm_footer_text ); ?>

					<?php else : ?>

						<?php bloginfo( 'name' ); ?> • Copyright © <?php echo date( 'Y' ); ?> • Desenvolvido por <a href="https://everald.dev/" target="_blank" title="Desenvolvido por Everaldo Matias">Everaldo Matias</a>
						
					<?php endif; ?>

				</div><!-- info -->
				
			</div><!-- .container -->

		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>