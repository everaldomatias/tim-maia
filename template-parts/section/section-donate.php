<?php $tm_use_section_donate = get_theme_mod( 'tm_use_section_donate', '0' );

if ( $tm_use_section_donate ) :

    $tm_title_section_donate = get_theme_mod( 'tm_title_section_donate' );
    $tm_description_section_donate = get_theme_mod( 'tm_description_section_donate' );

    // Get image background
    $tm_background_section_donate = get_theme_mod( 'tm_background_section_donate' );

    if ( $tm_background_section_donate ) : ?>

    <div id="section-donate" class="parallax-window section-home" data-parallax="scroll" data-image-src="<?php echo esc_url( $tm_background_section_donate ); ?>">

        <div class="overlay"></div><!-- /.overlay -->

    <?php else : ?>

        <div id="section-donate section-home">

    <?php endif; ?>

        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_donate ); ?></h2>
            <?php echo apply_filters( 'the_content', $tm_description_section_donate ); ?>
        </div><!-- /.container -->

        <?php

        $tm_donate_button_1     = get_theme_mod( 'tm_donate_button_1' );
        $tm_donate_button_url_1 = get_theme_mod( 'tm_donate_button_url_1' );
        $tm_donate_button_2     = get_theme_mod( 'tm_donate_button_2' );
        $tm_donate_button_url_2 = get_theme_mod( 'tm_donate_button_url_2' );

        if ( $tm_donate_button_1 || $tm_donate_button_2 ) : ?>

            <div class="buttons">
                <div class="container text-center">

                    <?php echo tm_print_button( 'tm_donate_button_1', 'tm_donate_button_url_1' ); ?>
                    <?php echo tm_print_button( 'tm_donate_button_2', 'tm_donate_button_url_2' ); ?>

                </div><!-- /.container -->
            </div><!-- /.buttons -->

        <?php endif; ?>

    </div><!-- /#section-donate -->

<?php endif;
