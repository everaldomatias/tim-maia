<?php
get_header(); ?>
<main>

	<div class="container">

		<?php if ( have_posts() ) : the_post(); ?>

			<div class="entry-content">
				<?php the_content(); ?>				
			</div><!-- /.entry-content -->

		<?php else : ?>

			<div class="entry-content">
				<?php _e( 'Nada para exibir aqui!', 'model' ); ?>
			</div><!-- /.entry-content -->

		<?php endif; ?>
		
	</div><!-- /.container -->

</main>

<?php
get_footer();