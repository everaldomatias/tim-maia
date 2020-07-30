<?php

// Get image background
$tm_setting_background_section_hero = get_theme_mod( 'tm_setting_background_section_hero' );

if ( $tm_setting_background_section_hero ) : ?>

    <div id="section-hero" class="parallax-window section-home" data-parallax="scroll" data-image-src="<?php echo esc_url( $tm_setting_background_section_hero ); ?>">

        <div class="overlay"></div><!-- /.overlay -->

<?php else : ?>

    <div id="section-hero section-home">

<?php endif; ?>

    <div class="container text-center">

        <?php

        // Logo or site title
        if ( has_custom_logo() ) {

            $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
            echo '<img class="logo" src="' . esc_url( $logo[0] ) . '">';

        } else {

            // The site title
            echo '<h1>' . apply_filters( 'the_title', get_bloginfo( 'name' ) ) . '</h1>';

		}

		// Description by hero
		$tm_hero_description = get_theme_mod( 'tm_hero_description' );

        if ( ! empty( $tm_hero_description ) ) {

            echo '<div class="description">';
                echo apply_filters( 'the_content', $tm_hero_description );
            echo '</div><!-- /.description -->';

        } ?>

    </div><!-- /.container -->

</div><!-- /#section-hero -->
