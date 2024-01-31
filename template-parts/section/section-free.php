<?php

$tm_use_section_free   = get_theme_mod( 'tm_use_section_free', false );
$tm_free_page_id       = get_theme_mod( 'tm_free_page_id', false );
$tm_section_bg_color   = get_theme_mod( 'tm_free_background_color', '#444444' );
$tm_section_font_color = get_theme_mod( 'tm_free_font_color', '#EEEEEE' );
$tm_section_padding    = get_theme_mod( 'tm_free_padding', '100' );

if ( $tm_use_section_free && $tm_free_page_id ) : ?>

    <div id="section-free" style="background-color: <?php echo $tm_section_bg_color; ?>; color: <?php echo $tm_section_font_color; ?>; padding-bottom: <?php echo $tm_section_padding; ?>px; padding-top: <?php echo $tm_section_padding; ?>px">
        <div class="container container-free">
            <div class="content">
                <?php echo get_post_content( $tm_free_page_id ); ?>
            </div>
        </div><!-- /.container.container-free -->
    </div><!-- /#section-free -->

<?php endif;
