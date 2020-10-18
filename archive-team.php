<?php
get_header();
$id = get_the_ID(); ?>
<main>

	<div class="container">

		<?php if (have_posts()) : ?>

			<div class="col-sm-12 entry-content loop">

				<?php while (have_posts()) : the_post(); ?>

					<div <?php tm_background_thumbnail('full'); ?> class="each" id="<?php echo $id; ?>">

						<a href="<?php the_permalink(); ?>" data-post-id="<?php echo $id; ?>">
							<div class="inner">

								<h2><?php the_title(); ?></h2>

								<?php $specialty = get_post_meta($id, 'team_specialty', true); ?>

								<div class="meta">
									<p><?php echo apply_filters('the_title', $specialty); ?></p>
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

<div class="overlay-modal">
	<div class="overlay-content">
		<div class="response-content"></div>
		<button class="close">
			<span></span>
			<span></span>
		</button>
	</div>
</div>

<?php
get_footer();
