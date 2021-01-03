<?php
get_header(); ?>

<main>

	<div class="container loop">

        <?php $terms = get_terms( 'portfolio_type' ); ?>
            <?php if( $terms ) {
            ?>

            <ul id="types" class="filter clearfix">
                <li><a href="#" class="active" data-filter="*"><span>Todos</span></a></li>
                <?php foreach( $terms as $term ){
                    echo "<li><a href='#' data-filter='.$term->slug'><span>$term->name</span></a></li>";
                } ?>
            </ul><!-- /types -->

            <?php } ?>

        <?php if ( have_posts() ) : ?>

        <div id="cpt-wrap" class="clearfix filterable-cpt  grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
        <div class="cpt-content">

            <div class="grid-sizer"></div>

            <?php $count = 0; ?>

            <?php while ( have_posts() ) : the_post(); ?>

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
                } ?>

                <?php $terms = get_the_terms( get_the_ID(), 'portfolio_type' ); ?>

                <?php if ( has_post_thumbnail() ) : ?>

                    <div <?php tm_background_thumbnail( 'full' ); ?> class="<?php echo $class; ?> <?php if( $terms ) foreach ( $terms as $term ) { echo $term->slug .' '; }; ?>">

                <?php elseif ( $bg = tm_background_first_image_attached_url( 'full' ) ) : ?>

                    <div style="background-image: url(' <?php echo $bg; ?> ')" class="<?php echo $class; ?> <?php if( $terms ) foreach ( $terms as $term ) { echo $term->slug .' '; }; ?>">

                <?php else : ?>

                    <div class="<?php echo $class; ?> <?php if( $terms ) foreach ( $terms as $term ) { echo $term->slug .' '; }; ?>">

                <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <div class="inner">

                            <span class="cat"><?php the_category( ' • ' ); ?></span><!-- /.cat -->
                            <h2><?php the_title(); ?></h2>

                        </div><!-- /.inner -->
                    </a>

                </div><!-- /.each -->

            <?php endwhile; ?>

            </div><!-- /.cpt-content -->
        </div><!-- /.cpt-wrap -->

        <?php else : ?>

            <div class="col-sm-12 entry-content">
                <?php _e( 'Sinto muito, não temos nada para exibir aqui!', 'tim-maia' ); ?>
            </div><!-- /.entry-content -->

        <?php endif; ?>

	</div><!-- /.container.loop -->

</main>

<?php
get_footer();
