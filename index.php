<?php
get_header(); ?>
<main>

	<div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php $count == 0; ?>

				<div class="col-sm-8 loop">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php $count++; ?>

						<?php if ( $count == 1 ) : ?>

							<div <?php thumbnail_bg( 'full' ); ?> class="each each-1">

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								
							</div><!-- /.each-1 -->

						<?php else: ?>

							<div class="each">

								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="entry-sumary">
									<?php the_excerpt(); ?>								
								</div><!-- /.entry-sumary -->
								
							</div><!-- /.each -->

						<?php endif; ?>

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