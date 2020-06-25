<?php $tm_use_section_action = get_theme_mod( 'tm_use_section_action', '1' );

if ( $tm_use_section_action ) :

    $tm_title_section_action = get_theme_mod( 'tm_title_section_action' );
    $tm_description_section_action = get_theme_mod( 'tm_description_section_action' );

    // Get image background
    $tm_background_section_action = get_theme_mod( 'tm_background_section_action' );
    
    if ( $tm_background_section_action ) : ?>

    <div id="section-action" class="parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $tm_background_section_action ); ?>">
        
        <div class="overlay"></div><!-- /.overlay -->

    <?php else : ?>

        <div id="section-action">

    <?php endif; ?>
        
        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_action ); ?></h2>
            <?php echo apply_filters( 'the_content', $tm_description_section_action ); ?>
        </div><!-- /.container -->

        <?php
        
        $tm_action_button_1     = get_theme_mod( 'tm_action_button_1' );
        $tm_action_button_url_1 = get_theme_mod( 'tm_action_button_url_1' );
        $tm_action_button_2     = get_theme_mod( 'tm_action_button_2' );
        $tm_action_button_url_2 = get_theme_mod( 'tm_action_button_url_2' );
        
        if ( $tm_action_button_1 || $tm_action_button_2 ) : ?>

            <div class="buttons">
                <div class="container text-center">

                    <?php echo tm_print_button( 'tm_action_button_1', 'tm_action_button_url_1' ); ?>
                    <?php echo tm_print_button( 'tm_action_button_2', 'tm_action_button_url_2' ); ?>

                </div><!-- /.container -->
            </div><!-- /.buttons -->

        <?php endif; ?>

    </div><!-- /#section-action -->

<?php endif;