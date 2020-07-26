<?php $tm_use_section_social = get_theme_mod( 'tm_use_section_social', '1' );

if ( $tm_use_section_social ) :

	/**
	 * Get the social URLs
	 */
	$icons = [];
	$icons['facebook']  = get_theme_mod( 'tm_social_facebook' );
	$icons['instagram'] = get_theme_mod( 'tm_social_instagram' );
	$icons['twitter']   = get_theme_mod( 'tm_social_twitter' );
	$icons['tumblr']    = get_theme_mod( 'tm_social_tumblr' );
	$icons['flickr']    = get_theme_mod( 'tm_social_flickr' );
	$icons['snapchat']  = get_theme_mod( 'tm_social_snapchat' );
	$icons['site']      = get_theme_mod( 'tm_social_site' );
	$icons['email']     = get_theme_mod( 'tm_social_email' );
	$icons = array_filter( $icons ); ?>

    <div id="section-social">
        <div class="container container-icons">

			<?php if ( is_array( $icons ) ) :

				foreach( $icons as $key => $value ) :

					if ( 'email' == $key ) : ?>
						<a rel="nofollow noopener" target="_blank" href="mailto:<?php echo antispambot( sanitize_email( $value ) ); ?>" class="<?php echo esc_attr( $key ) ?>"></a>
					<?php else : ?>
						<a rel="nofollow noopener" target="_blank" href="<?php echo esc_url( $value ); ?>" class="<?php echo esc_attr( $key ); ?>"></a>
					<?php endif;

				endforeach;

			endif; ?>

        </div><!-- /.container.container-icons -->
    </div><!-- /#section-social -->

<?php endif;
