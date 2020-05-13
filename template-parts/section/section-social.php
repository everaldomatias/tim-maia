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

if ( is_array( $social ) ) : ?>

	<div id="section-social">
		<div class="container"></div>

			<?php foreach ( $social as $key => $value ) : ?>
				<a href="<?php echo esc_url( $value ); ?>" class="<?php echo esc_attr( $key ) ?>"></a>
			<?php endforeach; ?>

		</div><!-- /.container -->
	</div><!-- /#section-social -->
	
<?php endif; ?>