<?php

$tm_use_section_free = get_theme_mod( 'tm_use_section_free', '0' );
$tm_free_page_id = get_theme_mod( 'tm_free_page_id', false );

if ( $tm_use_section_free && $tm_free_page_id ) : ?>

    <div id="section-free">
        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', get_the_title( esc_attr( $tm_free_page_id ) ) ); ?></h2>
        </div><!-- /.container -->
        <div class="container container-free">
            <div class="content">
                <?php echo apply_filters( 'the_content', get_the_content( '', false, esc_attr( $tm_free_page_id ) ) ); ?>
            </div>
        </div><!-- /.container.container-free -->
    </div><!-- /#section-free -->

<?php endif;
