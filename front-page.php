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

	<?php $use_sobre = get_theme_mod( 'use_sobre', '1' ); ?>
	<?php if ( $use_sobre ) : ?>

		<?php $titulo_section_sobre = get_theme_mod( 'titulo_section_sobre', $sd['titulo_section_sobre'] ); ?>
		<?php $editor_section_sobre = get_theme_mod( 'editor_section_sobre', $sd['editor_section_sobre'] ); ?>

		<div id="section-sobre">
			<div class="container">
				<h2><?php echo apply_filters( 'the_title', $titulo_section_sobre ); ?></h2>
				<?php echo apply_filters( 'the_content', $editor_section_sobre ); ?>
			</div>
		</div><!-- /#section-sobre -->

	<?php endif; ?>

	<?php $titulo_section_acao = get_theme_mod( 'titulo_section_acao', $sd['titulo_section_acao'] ); ?>
	<?php $editor_section_acao = get_theme_mod( 'editor_section_acao', $sd['editor_section_acao'] ); ?>
	<?php $titulo_botao_section_acao = get_theme_mod( 'titulo_botao_section_acao', $sd['titulo_botao_section_acao'] ); ?>
	<?php $link_botao_section_acao = get_theme_mod( 'link_botao_section_acao', $sd['link_botao_section_acao'] ); ?>
	<?php $image_section_acao = get_theme_mod( 'image_section_acao', $sd['image_section_acao'] ); ?>

	<?php $use_acao = get_theme_mod( 'use_acao', '1' ); ?>
	<?php if ( $use_acao ) : ?>

		<div id="section-acao" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_acao ); ?>">
			<div class="overlay"></div>
			<div class="container">
				<h2><?php echo apply_filters( 'the_title', $titulo_section_acao ); ?></h2>
				<span><?php echo apply_filters( 'the_title', $editor_section_acao ); ?></span>
				<?php if ( ! empty( $titulo_botao_section_acao ) && ! empty( $link_botao_section_acao ) ): ?>
					<div class="clearfix"></div>
					<a class="btn" href="<?php echo esc_url( $link_botao_section_acao ); ?>" target="_blank"><?php echo esc_attr( $titulo_botao_section_acao ); ?></a>
				<?php endif; ?>
			</div>
		</div><!-- /#section-acao -->

	<?php endif; ?>

	<?php $use_diferenciais = get_theme_mod( 'use_diferenciais', '1' ); ?>
	<?php if ( $use_diferenciais ) : ?>

		<?php $titulo_section_diferenciais = get_theme_mod( 'titulo_section_diferenciais', $sd['titulo_section_diferenciais'] ); ?>
		<?php $editor_section_diferenciais = get_theme_mod( 'editor_section_diferenciais', $sd['editor_section_diferenciais'] ); ?>

		<div id="section-diferenciais">
			<div class="container">
				<h2><?php echo apply_filters( 'the_title', $titulo_section_diferenciais ); ?></h2>
				<?php echo apply_filters( 'the_content', $editor_section_diferenciais ); ?>
			</div>
		</div><!-- /#section-diferenciais -->

	<?php endif; ?>

	<?php $use_blog = get_theme_mod( 'use_blog', '1' ); ?>
	<?php if ( $use_blog ) : ?>

		<?php $titulo_section_blog = get_theme_mod( 'titulo_section_blog', $sd['titulo_section_blog'] ); ?>

		<div id="section-blog">
			<div class="container">

				<h2 class="home-title"><?php echo apply_filters( 'the_title', $titulo_section_blog ); ?></h2>

				<div class="row">
				
					<?php
					$args = array(
				    	'post_type'				=> 'post',
				    	'posts_per_page'		=> '3',
				    	'ignore_sticky_posts'	=> 1
					);
					$posts = new WP_Query( $args );
					
					if ( $posts->have_posts() ) : ?>
						<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>

							<div class="col-sm-4">

								<div <?php thumbnail_bg( 'full' ); ?> class="col-sm-12 each">

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

								</div><!-- /.each -->

							</div><!-- /.col-sm-4 -->

			            <?php endwhile; ?>

			            <?php
			            /* Link para o Blog */
			            $titulo_botao_blog = get_theme_mod( 'titulo_botao_blog', __( 'Ver o Blog', 'model' ) );
			            if ( $posts->post_count >= 3 && ! empty( $titulo_botao_blog ) ) {
			            	echo '<a class="btn" href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . esc_attr( $titulo_botao_blog ) . '</a>';
			            }
			            ?>

			            <?php wp_reset_postdata(); ?>
		        	<?php endif; ?>

		        </div><!-- /.row -->

			</div><!-- /.container -->
		</div><!-- /#section-blog -->

	<?php endif; ?>

	<?php $use_doacoes = get_theme_mod( 'use_doacoes', '1' ); ?>
	<?php if ( $use_doacoes ) : ?>

		<?php $image_section_doacoes = get_theme_mod( 'image_section_doacoes', $sd['image_section_doacoes'] ); ?>
		<?php $titulo_section_doacoes = get_theme_mod( 'titulo_section_doacoes', $sd['titulo_section_doacoes'] ); ?>
		<?php $editor_section_doacoes = get_theme_mod( 'editor_section_doacoes', $sd['editor_section_doacoes'] ); ?>
		<?php $titulo_botao_section_doacoes_1 = get_theme_mod( 'titulo_botao_section_doacoes_1', $sd['titulo_botao_section_doacoes_1'] ); ?>
		<?php $link_botao_section_doacoes_1 = get_theme_mod( 'link_botao_section_doacoes_1', $sd['link_botao_section_doacoes_1'] ); ?>
		<?php $titulo_botao_section_doacoes_2 = get_theme_mod( 'titulo_botao_section_doacoes_2', $sd['titulo_botao_section_doacoes_2'] ); ?>
		<?php $link_botao_section_doacoes_2 = get_theme_mod( 'link_botao_section_doacoes_2', $sd['link_botao_section_doacoes_2'] ); ?>

		<div id="section-doacoes" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $image_section_doacoes ); ?>">

			<div class="overlay"></div>

			<div class="container">

				<h2><?php echo apply_filters( 'the_title', $titulo_section_doacoes ); ?></h2>

				<?php if ( $editor_section_doacoes ) : ?>
					<?php echo apply_filters( 'the_content', $editor_section_doacoes ); ?>
				<?php endif; ?>

				<?php if ( $titulo_botao_section_doacoes_1 && $link_botao_section_doacoes_1 ) : ?>
					<a class="btn" target="_blank" href="<?php echo esc_url( $link_botao_section_doacoes_1 ); ?>"><?php echo apply_filters( 'the_title', $titulo_botao_section_doacoes_1 ) ?></a>
				<?php endif; ?>

				<?php if ( $titulo_botao_section_doacoes_2 && $link_botao_section_doacoes_2 ) : ?>
					<a class="btn" target="_blank" href="<?php echo esc_url( $link_botao_section_doacoes_2 ); ?>"><?php echo apply_filters( 'the_title', $titulo_botao_section_doacoes_2 ) ?></a>
				<?php endif; ?>

			</div>

		</div><!-- /#section-doacoes -->

	<?php endif; ?>

	<?php do_action( 'main-front-page' ); ?>

</main>

<?php get_footer();