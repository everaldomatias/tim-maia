<?php
get_header(); ?>
<main>

	<div class="container">

		<?php if (have_posts()) : ?>

			<div class="col-sm-12 entry-content loop">

				<?php while (have_posts()) : the_post(); ?>

					<div <?php tm_background_thumbnail('full'); ?> class="each">

						<a href="<?php the_permalink(); ?>">
							<div class="inner">

								<h2><?php the_title(); ?></h2>
								<div class="meta">
									<p>Especialidade</p>
								</div><!-- /.meta -->

							</div><!-- /.inner -->
						</a>

					</div><!-- /.each -->

				<?php endwhile; ?>

			</div><!-- /.loop -->

		<?php else : ?>

			<div class="col-sm-12 entry-content loop no-loop">
				<?php _e('Sinto muito, não temos nada para exibir aqui!', 'model'); ?>
			</div><!-- /.col-sm-12.entry-content.loop.no-loop -->

		<?php endif; ?>

	</div><!-- /.container -->

</main>

<?php
get_footer();
