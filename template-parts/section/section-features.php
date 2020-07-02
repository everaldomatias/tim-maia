<?php $tm_use_section_features = get_theme_mod( 'tm_use_section_features', '1' ); ?>

<?php if ( $tm_use_section_features ) : ?>

    <?php $tm_title_section_features = get_theme_mod( 'tm_title_section_features' ); ?>

    <div id="section-features" class="section-home">
        
        <div class="container text-center">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_features ); ?></h2>
        </div><!-- /.container -->

        <div class="container container-features">

            <?php

            for ( $i=1; $i <= 3; $i++ ) {
                
                // Get features infos
                $tm_features_icon = get_theme_mod( 'tm_features_icon_' . $i );
                $tm_features_title = get_theme_mod( 'tm_features_title_' . $i );
                $tm_features_description = get_theme_mod( 'tm_features_description_' . $i );

                if ( $tm_features_icon || $tm_features_title || $tm_features_description ) {

                    echo '<div class="each-feature">';

                        if ( $tm_features_icon ) {
                            echo '<img src=' . esc_url( $tm_features_icon ) . '>';
                        }

                        if ( $tm_features_title ) {
                            echo '<h3>' . apply_filters( 'the_title', $tm_features_title ) . '</h3>';
                        }

                        if ( $tm_features_description ) {
                            echo '<div class="description">';
                                echo apply_filters( 'the_title', $tm_features_description );
                            echo '</div><!-- /.description -->';
                        }

                    echo '</div><!-- /.each-feature -->';

                }            

            } ?>

        </div><!-- /.container.container-features -->

        <?php
        $tm_features_button = get_theme_mod( 'tm_features_button' );
        
        if ( $tm_features_button ) : ?>

            <div class="buttons">
                <div class="container text-center">

                    <?php echo tm_print_button( 'tm_features_button', 'tm_features_button_url' ); ?>

                </div><!-- /.container -->
            </div><!-- /.buttons -->

        <?php endif; ?>

    </div><!-- /#section-features -->

<?php endif;