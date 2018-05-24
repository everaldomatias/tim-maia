<?php
get_header(); ?>
<main>

	<div class="container">

		<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php $count = 0; ?>

				<div class="col-sm-9 loop">

					<div class="row">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php $count++; ?>

							<?php if ( has_post_thumbnail() ) : ?>
							
								<?php if ( $count == 1 ) : ?>

									<div class="col-sm-12">

										<div <?php thumbnail_bg( 'full' ); ?> class="col-sm-12 each each-1">

											<a href="<?php the_permalink(); ?>">
												<div class="inner">
													<span class="cat"><?php the_category( '•' ); ?></span><!-- /.cat -->
													<h2><?php the_title(); ?></h2>
													<div class="meta">
														Add comments here with icon
													</div><!-- /.meta -->
												</div><!-- /.inner -->
											</a>
											
										</div><!-- /.each-1 -->

									</div>

								<?php elseif( $count == 2 || $count == 3 ) : ?>

									<div class="col-sm-6">

										<div <?php thumbnail_bg( 'full' ); ?> class="col-sm-12 each each-<?php echo $count; ?>">

											<a href="<?php the_permalink(); ?>">
												<div class="inner">
													<span class="cat"><?php the_category( '•' ); ?></span><!-- /.cat -->
													<h2><?php the_title(); ?></h2>
													<div class="meta">
														Add comments here with icon
													</div><!-- /.meta -->
												</div><!-- /.inner -->
											</a>
											
										</div><!-- /.each-<?php echo $count; ?> -->

									</div>

								<?php else: ?>

									<div class="col-sm-12">

										<div <?php thumbnail_bg( 'full' ); ?> class="col-sm-12 each each-<?php echo $count; ?>">

											<a href="<?php the_permalink(); ?>">
												<div class="inner">
													<span class="cat"><?php the_category( '•' ); ?></span><!-- /.cat -->
													<h2><?php the_title(); ?></h2>
													<div class="meta">
														Add comments here with icon
													</div><!-- /.meta -->
												</div><!-- /.inner -->
											</a>
											
										</div><!-- /.each-<?php echo $count; ?> -->

									</div>

								<?php endif; ?>

							<?php endif; ?>

						<?php endwhile; ?>
					</div><!-- /.row -->
				</div><!-- /.loop -->

			<?php else : ?>

				<div class="col-sm-9 entry-content">
					<?php _e( 'Sinto muito, não temos nada para exibir aqui!', 'model' ); ?>
				</div><!-- /.entry-content -->

			<?php endif; ?>

			<div class="col-sm-3" id="sidebar">
				<?php dynamic_sidebar( 'sidebar-main' ); ?>
			</div><!-- /#sidebar -->

		</div><!-- /.row -->
		
	</div><!-- /.container -->

</main>

<?php
get_footer();