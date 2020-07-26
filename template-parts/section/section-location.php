<?php $tm_use_section_location = get_theme_mod( 'tm_use_section_location', '0' );

if ( $tm_use_section_location ) :

    $tm_title_section_location = get_theme_mod( 'tm_title_section_location', 'Localização' );
    $tm_description_section_location = get_theme_mod( 'tm_description_section_location' );

    // Get image background
    $tm_background_section_location = get_theme_mod( 'tm_background_section_location' );

    if ( $tm_background_section_location ) : ?>

        <div id="section-location" class="parallax-window section-home" data-parallax="scroll" data-image-src="<?php echo esc_url( $tm_background_section_location ); ?>">

            <div class="overlay"></div><!-- /.overlay -->

    <?php else : ?>

        <div id="section-location" class="section-home">

    <?php endif; ?>

	<?php $tm_description_section_map = get_theme_mod( 'tm_description_section_map' ); ?>

	<?php if ( $tm_description_section_map ) : ?>

	<div class="wrap-map">

		<?php echo $tm_description_section_map;; ?>

	</div><!-- /.wrap-map -->

	<?php endif; ?>

        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_location ); ?></h2>
            <?php echo apply_filters( 'the_content', $tm_description_section_location ); ?>
        </div><!-- /.container -->

        <?php

        $tm_about_button_1     = get_theme_mod( 'tm_about_button_1' );
        $tm_about_button_url_1 = get_theme_mod( 'tm_about_button_url_1' );
        $tm_about_button_2     = get_theme_mod( 'tm_about_button_2' );
        $tm_about_button_url_2 = get_theme_mod( 'tm_about_button_url_2' );

        if ( $tm_about_button_1 || $tm_about_button_2 ) : ?>

            <div class="buttons">
                <div class="container text-center">

                    <?php echo tm_print_button( 'tm_about_button_1', 'tm_about_button_url_1' ); ?>
                    <?php echo tm_print_button( 'tm_about_button_2', 'tm_about_button_url_2' ); ?>

                </div><!-- /.container -->
            </div><!-- /.buttons -->

        <?php endif; ?>

    </div><!-- /#section-location -->

<?php endif;
