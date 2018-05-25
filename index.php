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

		<div class="row">

			<?php if ( have_posts() ) : ?>

				<?php $count = 0; ?>

				<div class="col-sm-9 loop">

					<div class="row">

						<?php $titulo_section_blog = get_theme_mod( 'titulo_section_blog', $sd['titulo_section_blog'] ); ?>

						<h1 class="entry-title"><?php echo apply_filters( 'the_title', $titulo_section_blog ); ?></h1>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php if ( has_post_thumbnail() ) : ?>

								<?php $count++; ?>
								<?php $class = ''; ?>
							
								<?php if ( $count == 1 ) : ?>
									<?php $class = 'col-sm-12'; ?>
								<?php elseif ( $count == 2 || $count == 3 ) : ?>
									<?php $class = 'col-sm-6'; ?>
								<?php else: ?>
									<?php $class = 'col-sm-12'; ?>
								<?php endif; ?>

								<div class="<?php echo $class; ?>">

									<div <?php thumbnail_bg( 'full' ); ?> class="col-sm-12 each each-<?php echo $count; ?>">

										<a href="<?php the_permalink(); ?>">
											<div class="inner">
												<span class="cat"><?php the_category( ' • ' ); ?></span><!-- /.cat -->
												<h2><?php the_title(); ?></h2>

												<?php $comments_number = get_comments_number(); ?>

												<div class="meta">
													<?php if ( '1' === $comments_number ) : ?>
														<span class="comments">
															<i class="far fa-comment-dots"></i>
															<?php _e( 'One reply', 'model' ); ?>
														</span><!-- /.comments -->
													<?php elseif( $comments_number >= 2 ) : ?>
														<span class="comments">
															<i class="far fa-comment-dots"></i>
															<?php echo $comments_number . ' ' . _e( 'replys', 'model' ); ?>
														</span><!-- /.comments -->
													<?php endif; ?>
												</div><!-- /.meta -->
											</div><!-- /.inner -->
										</a>
										
									</div><!-- /.each-<?php echo $count; ?> -->

								</div><!-- /.<?php echo $class; ?> -->

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