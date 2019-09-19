<?php
get_header(); ?>

<main>

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
	$sd = get_transient( 'strings_default' ); ?>
	
	<div class="container">
	
	    <?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'template-parts/products', 'archive' );
				endwhile;
				// Page navigation.
				//tm_paging_nav();
			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );
			endif;
		?>
	
	</div><!-- /.container -->

</main>

<?php get_footer();