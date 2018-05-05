<?php
get_header(); ?>
<main>

	<div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php $count = 0; ?>

				<div class="col-sm-8 loop">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php $count++; ?>

						<?php if ( $count == 1 ) : ?>

							<a href="<?php the_permalink(); ?>">

								<div <?php thumbnail_bg( 'full' ); ?> class="each each-1">

									<div class="inner">
										<span>cat</span>
										<h2><?php the_title(); ?></h2>
										<div class="meta">
											Add comments here with icon
										</div>
									</div>									
									
								</div><!-- /.each-1 -->

							</a>

						<?php else: ?>

							<a href="<?php the_permalink(); ?>">

								<div <?php thumbnail_bg( 'full' ); ?> class="each each-<?php echo $count; ?>">

									<div class="inner">
										<span>cat</span>
										<h2><?php the_title(); ?></h2>
										<div class="meta">
											Add comments here with icon
										</div>
									</div>									
									
								</div><!-- /.each-1 -->

							</a>

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