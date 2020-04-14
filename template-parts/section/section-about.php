<?php $tm_use_section_about = get_theme_mod( 'tm_use_section_about', '1' ); ?>

<?php if ( $tm_use_section_about ) : ?>


    <?php $tm_title_section_about = get_theme_mod( 'tm_title_section_about' ); ?>
    <?php $tm_description_section_about = get_theme_mod( 'tm_description_section_about' ); ?>

    <div id="section-sobre">
        <div class="container">
            <h2><?php echo apply_filters( 'the_title', $tm_title_section_about ); ?></h2>
            <?php echo apply_filters( 'the_content', $tm_description_section_about ); ?>
        </div>
    </div><!-- /#section-sobre -->

<?php endif; ?>