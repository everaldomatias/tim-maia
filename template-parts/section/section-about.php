<?php $tm_use_section_about = get_theme_mod( 'tm_use_section_about', '1' ); ?>

<?php if ( $tm_use_section_about ) : ?>

    <?php $tm_title_section_about = get_theme_mod( 'tm_title_section_about' ); ?>
    <?php $tm_description_section_about = get_theme_mod( 'tm_description_section_about' ); ?>

    <?php
        // Get image background
        $tm_background_section_about = get_theme_mod( 'tm_background_section_about' );     
    ?>

    <div id="section-about" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $tm_background_section_about ); ?>">
        
        <div class="overlay"></div>
        
        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_about ); ?></h2>
            <?php echo apply_filters( 'the_content', $tm_description_section_about ); ?>
        </div><!-- /.container -->

        <?php
        
        $tm_about_button_1     = get_theme_mod( 'tm_about_button_1' );
        $tm_about_button_url_1 = get_theme_mod( 'tm_about_button_url_1' );
        $tm_about_button_2     = get_theme_mod( 'tm_about_button_2' );
        $tm_about_button_url_2 = get_theme_mod( 'tm_about_button_url_2' );
        
        if ( $tm_about_button_1 || $tm_about_button_2 ) : ?>

            <div class="buttons">
                <div class="container">

                    <?php echo tm_print_button( 'tm_about_button_1', 'tm_about_button_url_1' ); ?>
                    <?php echo tm_print_button( 'tm_about_button_2', 'tm_about_button_url_2' ); ?>

                </div><!-- /.container -->
            </div><!-- /.buttons -->

        <?php endif; ?>

    </div><!-- /#section-about -->

<?php endif; ?>