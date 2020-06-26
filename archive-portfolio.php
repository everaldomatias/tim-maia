<?php
get_header(); ?>
<main>

	<div class="container loop">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php if ( has_post_thumbnail() ) : ?>

                    <div <?php tm_background_thumbnail( 'full' ); ?> class="each">
                
                <?php elseif ( $bg = tm_background_first_image_attached_url( 'full' ) ) : ?>

                    <div style="background-image: url(' <?php echo $bg; ?> ')" class="each">
                
                <?php else : ?>

                    <div class="each">

                <?php endif; ?>

                    <a href="<?php the_permalink(); ?>">
                        <div class="inner">
                            
                            <span class="cat"><?php the_category( ' • ' ); ?></span><!-- /.cat -->
                            <h2><?php the_title(); ?></h2>
                            
                        </div><!-- /.inner -->
                    </a>

                </div><!-- /.each -->

            <?php endwhile; ?>

        <?php else : ?>

            <div class="col-sm-12 entry-content">
                <?php _e( 'Sinto muito, não temos nada para exibir aqui!', 'tim-maia' ); ?>
            </div><!-- /.entry-content -->

        <?php endif; ?>
	
	</div><!-- /.container.loop -->

</main>

<?php
get_footer();