<?php $tm_use_section_blog = get_theme_mod( 'tm_use_section_blog', '1' ); ?>

<?php if ( $tm_use_section_blog ) : ?>

    <?php $tm_title_section_blog = get_theme_mod( 'tm_title_section_blog', __( 'Blog!', 'tim-maia' ) ); ?>

    <div id="section-blog">

        <div class="overlay"></div>

        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_blog ); ?></h2>
        </div><!-- /.container -->

        <div class="container container-blog">

            <?php

            $args = array(
                'post_type'           => 'post',
                'posts_per_page'      => '3',
                'ignore_sticky_posts' => 1
            );
            $posts = new WP_Query( $args );
            
            if ( $posts->have_posts() ) :
                while ( $posts->have_posts() ) : $posts->the_post(); ?>

                    <div <?php tm_background_thumbnail( 'full' ); ?> class="each">

                        <a href="<?php the_permalink(); ?>">
                            <div class="inner">
                                
                                <span class="cat"><?php the_category( ' • ' ); ?></span><!-- /.cat -->
                                <h2><?php the_title(); ?></h2>

                                <div class="meta">
                                    <?php tm_print_comments_counter(); ?>
                                </div><!-- /.meta -->
                                
                            </div><!-- /.inner -->
                        </a>

                    </div><!-- /.each -->

                <?php endwhile;

                wp_reset_postdata();

            endif; ?>

        </div><!-- /.container.container-blog -->

        <div class="buttons">
            <div class="container text-center">

                <?php
                $tm_blog_button = get_theme_mod( 'tm_blog_button', __( 'Veja mais!', 'tim-maia' ) );
                if ( $posts->post_count >= 3 && ! empty( $tm_blog_button ) ) {
                    echo '<a class="btn" href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . esc_attr( $tm_blog_button ) . '</a>';
                } ?>

            </div><!-- /.container.text-center -->
        </div><!-- /.buttons -->

    </div><!-- /#section-blog -->

<?php endif; ?>