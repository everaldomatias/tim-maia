<?php
get_header(); ?>

<main>

<?php $editor_section_sobre = get_theme_mod( 'editor_section_sobre' ); ?>
<?php $titulo_section_sobre = get_theme_mod( 'titulo_section_sobre', 'About us..' ); ?>
<div id="section-sobre">
	<h2><?php echo apply_filters( 'the_title', $titulo_section_sobre ); ?></h2>
	<?php echo apply_filters( 'the_title', $editor_section_sobre ); ?>
</div><!-- /#section-sobre -->

<?php $titulo_section_acao = get_theme_mod( 'titulo_section_acao', 'Call to Action' ); ?>
<?php $editor_section_acao = get_theme_mod( 'editor_section_acao' ); ?>
<?php $titulo_botao_section_acao = get_theme_mod( 'titulo_botao_section_acao' ); ?>
<?php $link_botao_section_acao = get_theme_mod( 'link_botao_section_acao' ); ?>
<?php $image_section_acao = get_theme_mod( 'image_section_acao' ); ?>

<div id="section-acao" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_acao ); ?>">
	<h2><?php echo apply_filters( 'the_title', $titulo_section_acao ); ?></h2>
	<span><?php echo apply_filters( 'the_title', $editor_section_acao ); ?></span>
	<?php if ( ! empty( $titulo_botao_section_acao ) && ! empty( $link_botao_section_acao ) ): ?>
		<a class="btn" href="<?php echo esc_url( $link_botao_section_acao ); ?>" target="_blank"><?php echo esc_attr( $titulo_botao_section_acao ); ?></a>
	<?php endif; ?>
</div><!-- /#section-acao -->

<div class="clearfix"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm">
				One of three columns
			</div>
			<div class="col-sm">
				One of three columns
			</div>
			<div class="col-sm">
				One of three columns
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</div><!-- /.container -->
	<div class="parallax-window" data-parallax="scroll" data-image-src="http://pixelcog.github.io/parallax.js/img/helix-nebula-1400x1400.jpg"></div>
</main>

<?php get_footer();