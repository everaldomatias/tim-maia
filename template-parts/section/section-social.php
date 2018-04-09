<?php
/**
 *
 * Retorna as strings padrões do tema no array $sd
 * 
	 * @author 		Everaldo Matias <http://everaldomatias.github.io>
	 * @version 	0.1
	 * @since 		09/04/2018
	 * @see 		https://codex.wordpress.org/Transients_API
	 * 
 */
$sd = get_transient( 'strings_default' );

/**
 * Sessão Social
 */

$social 				= array();
$social['facebook'] 	= get_theme_mod( 'facebook', $sd['facebook'] );
$social['instagram'] 	= get_theme_mod( 'instagram', $sd['instagram'] );
$social['twitter'] 		= get_theme_mod( 'twitter', $sd['twitter'] );
$social['tumblr'] 		= get_theme_mod( 'tumblr', $sdtumblr );
$social['snapchat'] 	= get_theme_mod( 'snapchat', $sd['snapchat'] );
$social['flickr'] 		= get_theme_mod( 'flickr', $sd['flickr'] );
$social['site'] 		= get_theme_mod( 'site', $sd['site'] );
$social['email'] 		= get_theme_mod( 'email', $sd['email'] );
$social 				= array_filter( $social );

if ( is_array( $social ) ) : ?>

	<div id="section-social">
		<div class="container"></div>

			<?php foreach ( $social as $key => $value ) : ?>
				<a href="<?php echo esc_url( $value ); ?>" class="<?php echo esc_attr( $key ) ?>"></a>
			<?php endforeach; ?>

		</div><!-- /.container -->
	</div><!-- /#section-social -->
	
<?php endif; ?>