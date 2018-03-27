<?php

/**
 * Sessão Social
 */

$social 				= array();
$social['facebook'] 	= get_theme_mod( 'facebook' );
$social['instagram'] 	= get_theme_mod( 'instagram' );
$social['twitter'] 		= get_theme_mod( 'twitter' );
$social['tumblr'] 		= get_theme_mod( 'tumblr' );
$social['snapchat'] 	= get_theme_mod( 'snapchat' );
$social['flickr'] 		= get_theme_mod( 'flickr' );
$social['site'] 		= get_theme_mod( 'site' );
$social['email'] 		= get_theme_mod( 'email' );
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