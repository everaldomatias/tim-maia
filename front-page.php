<?php
get_header(); ?>

<main>

	<?php echo tm_get_sections( get_theme_mod( 'tm_sections_order' ) ); ?>

	<?php $use_doacoes = get_theme_mod( 'use_doacoes', '1' ); ?>
	<?php if ( $use_doacoes ) : ?>

		<?php $image_section_doacoes = get_theme_mod( 'image_section_doacoes', $sd['image_section_doacoes'] ); ?>
		<?php $titulo_section_doacoes = get_theme_mod( 'titulo_section_doacoes', $sd['titulo_section_doacoes'] ); ?>
		<?php $editor_section_doacoes = get_theme_mod( 'editor_section_doacoes', $sd['editor_section_doacoes'] ); ?>
		<?php $titulo_botao_section_doacoes_1 = get_theme_mod( 'titulo_botao_section_doacoes_1', $sd['titulo_botao_section_doacoes_1'] ); ?>
		<?php $link_botao_section_doacoes_1 = get_theme_mod( 'link_botao_section_doacoes_1', $sd['link_botao_section_doacoes_1'] ); ?>
		<?php $titulo_botao_section_doacoes_2 = get_theme_mod( 'titulo_botao_section_doacoes_2', $sd['titulo_botao_section_doacoes_2'] ); ?>
		<?php $link_botao_section_doacoes_2 = get_theme_mod( 'link_botao_section_doacoes_2', $sd['link_botao_section_doacoes_2'] ); ?>

		<div id="section-doacoes" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_doacoes ); ?>">

			<div class="overlay"></div>

			<div class="container">

				<h2><?php echo apply_filters( 'the_title', $titulo_section_doacoes ); ?></h2>

				<?php if ( $editor_section_doacoes ) : ?>
					<?php echo apply_filters( 'the_content', $editor_section_doacoes ); ?>
				<?php endif; ?>

				<?php if ( $titulo_botao_section_doacoes_1 && $link_botao_section_doacoes_1 ) : ?>
					<a class="btn" target="_blank" href="<?php echo esc_url( $link_botao_section_doacoes_1 ); ?>"><?php echo apply_filters( 'the_title', $titulo_botao_section_doacoes_1 ) ?></a>
				<?php endif; ?>

				<?php if ( $titulo_botao_section_doacoes_2 && $link_botao_section_doacoes_2 ) : ?>
					<a class="btn" target="_blank" href="<?php echo esc_url( $link_botao_section_doacoes_2 ); ?>"><?php echo apply_filters( 'the_title', $titulo_botao_section_doacoes_2 ) ?></a>
				<?php endif; ?>

			</div>

		</div><!-- /#section-doacoes -->

	<?php endif; ?>

	<?php do_action( 'main-front-page' ); ?>

</main>

<?php get_footer();