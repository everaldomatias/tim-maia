<?php
get_header(); ?>

<main>

<?php $editor_section_sobre = get_theme_mod( 'editor_section_sobre' ); ?>
<?php $titulo_section_sobre = get_theme_mod( 'titulo_section_sobre', 'About us..' ); ?>

<div id="section-sobre">
	<h2><?php echo apply_filters( 'the_title', $titulo_section_sobre ); ?></h2>
	<?php echo apply_filters( 'the_title', $editor_section_sobre ); ?>
</div><!-- /#section-sobre -->

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