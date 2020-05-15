<?php
get_header(); ?>

<main>

	<?php echo tm_get_sections( get_theme_mod( 'tm_sections_order' ) ); ?>

	<?php do_action( 'main-front-page' ); ?>

</main>

<?php get_footer();