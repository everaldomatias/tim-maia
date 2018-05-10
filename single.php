<?php
get_header(); ?>
<main>

	<div class="container">

		<div class="row">

			<?php if ( have_posts() ) : the_post(); ?>

				<div class="col-sm-8 entry-content">

					<?php the_content(); ?>
					
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

				<div class="col-sm-8 entry-content">
					<?php _e( 'Nada para exibir aqui!', 'model' ); ?>
				</div><!-- /.entry-content -->

			<?php endif; ?>

			<div class="col-sm-4" id="sidebar">
				<?php dynamic_sidebar( 'sidebar-main' ); ?>
			</div><!-- /#sidebar -->

		</div><!-- /.row -->
		
	</div><!-- /.container -->

</main>

<?php
get_footer();