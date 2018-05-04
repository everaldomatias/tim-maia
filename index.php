<?php
get_header(); ?>
<main>

	<div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>

				<div class="col-sm-8 loop">
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="each">

							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="entry-sumary">
								<?php the_excerpt(); ?>								
							</div><!-- /.entry-sumary -->
							
						</div><!-- /.each -->

					<?php endwhile; ?>
				</div><!-- /.loop -->

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