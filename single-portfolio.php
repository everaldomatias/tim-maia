<?php
get_header(); ?>
<main>

	<div class="container">

		<?php if ( have_posts() ) : the_post(); ?>

			<div class="col-sm-12 entry-content">

				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				
				<?php
				/**
				 * 
				 * Comentários.
				 * @see  comments.php
				 * 
				 */
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div><!-- /.entry-content -->

		<?php else : ?>

			<div class="col-sm-12 entry-content">
				<?php _e( 'Nada para exibir aqui!', 'model' ); ?>
			</div><!-- /.entry-content -->

		<?php endif; ?>
		
	</div><!-- /.container -->

</main>

<?php
get_footer();