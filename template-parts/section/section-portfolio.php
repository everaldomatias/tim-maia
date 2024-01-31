<?php $tm_use_section_portfolio = get_theme_mod( 'tm_use_section_portfolio', '0' ); ?>

<?php if ( $tm_use_section_portfolio ) : ?>

    <?php $tm_title_section_portfolio = get_theme_mod( 'tm_portfolio_labels_plural', __( 'Portfólios', 'tim-maia' ) ); ?>

    <div id="section-portfolio" class="section-home">
        <div class="overlay"></div>

        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_portfolio ); ?></h2>
        </div><!-- .container -->

        <div class="container container-portfolio">
            <div class="container loop">

                <?php
                // Get terms
                $terms = get_terms( 'portfolio_type' );

                $per_page = 16;

                $args = array(
                    'post_type'      => 'portfolio',
                    'posts_per_page' => $per_page
                );

                // Get posts from post type `portfolio`
                $portfolio = new WP_Query( $args );

                $count = 0;

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
                    <div id="types" class="filter clearfix">
                        <a href="#" class="active" data-filter="*"><span>Todos</span></a>
                        <?php foreach( $terms as $term ) : ?>
                           <a href='#' data-filter='.<?php echo $term->slug; ?>'><span><?php echo $term->name; ?></span></a>
                        <?php endforeach; ?>
                    </div><!-- #types -->
                <?php endif; ?>

                <?php if ( $portfolio->have_posts() ) : ?>

                <div id="cpt-wrap" class="clearfix filterable-cpt  grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                    <div class="cpt-content">
                        <div class="grid-sizer"></div>

                        <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
                            <?php
                                $count++;
                                $class = '';

                                if ( $count == 2 ) {
                                    $class = 'each grid-item grid-item--width2 cpt-item ';
                                } elseif( $count == 4 ) {
                                    $class = 'each grid-item grid-item--width2 cpt-item ';
                                    $count == 0;
                                } else {
                                    $class = 'each grid-item cpt-item ';
                                }

                                $terms = get_the_terms( get_the_ID(), 'portfolio_type' );
                                $term_names = join( ' ', wp_list_pluck( $terms, 'name' ) );
                                $term_slugs = join( ' ', wp_list_pluck( $terms, 'slug' ) ); ?>

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div <?php tm_background_thumbnail( 'full' ); ?> class="<?php echo $class . ' ' . $term_slugs; ?>">
                                <?php elseif ( $bg = tm_background_first_image_attached_url( 'full' ) ) : ?>
                                    <div style="background-image: url(' <?php echo $bg; ?> ')" class="<?php echo $class . ' ' . $term_slugs; ?>">
                                <?php else : ?>
                                    <div class="<?php echo $class . ' ' . $term_slugs; ?>">
                                <?php endif; ?>

                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                    <div class="inner">
                                        <span class="cat"><?php echo $term_names; ?></span><!-- /.cat -->
                                        <h2><?php the_title(); ?></h2>
                                    </div><!-- .inner -->
                                </a>
                            </div><!-- .each -->
                        <?php endwhile; ?>

                    </div><!-- .cpt-content -->
                </div><!-- #cpt-wrap -->

                <?php else : ?>
                    <div class="col-sm-12 entry-content">
                        <?php _e( 'Sinto muito, não temos nada para exibir aqui!', 'tim-maia' ); ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>

            </div><!-- .container.loop -->
        </div><!-- .container.container-portfolio -->

        <div class="buttons">
            <div class="container text-center">

                <?php
                $tm_portfolio_button = get_theme_mod( 'tm_portfolio_button', __( 'Veja mais!', 'tim-maia' ) );
                if ( $portfolio->post_count >= $per_page && ! empty( $tm_portfolio_button ) ) {
                    echo '<a class="btn" href="' . esc_url( get_post_type_archive_link( 'portfolio' ) ) . '">' . esc_attr( $tm_portfolio_button ) . '</a>';
                } ?>

            </div><!-- container.text-center -->
        </div><!-- .buttons -->
    </div><!-- #section-portfolio -->

<?php endif;
