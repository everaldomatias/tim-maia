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
 * @version 0.1
 */

?>

	<?php do_action( 'before-footer' ); ?>

		</div><!-- #content -->

		<?php
		if ( has_nav_menu( 'footer' ) ) : ?>

		<div class="footer-menu">
			<div class="container">
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'model' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1
						) );
					?>
				</nav><!-- .social-navigation -->
			</div>
		</div>
			
		<?php endif; ?>

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="container">
				<div class="info">

					<?php $frase_rodape = get_theme_mod( 'frase_rodape' ); ?>

					<?php if ( $frase_rodape ) : ?>
						<?php echo apply_filters( 'the_content', $frase_rodape ); ?>
					<?php else : ?>
						<?php bloginfo('name'); ?> • Copyright © <?php echo date( 'Y' ); ?> • Desenvolvido por <a href="https://everaldomatias.github.io/" target="_blank" title="Desenvolvido por Everaldo Matias">Everaldo Matias</a>
					<?php endif ?>

				</div><!-- info -->
			</div><!-- .container -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
