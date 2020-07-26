<?php
$tm_use_section_location = get_theme_mod( 'tm_use_section_location', '0' );
$tm_location_section_map = get_theme_mod( 'tm_location_section_map' );

if ( $tm_use_section_location && $tm_location_section_map ) : ?>

    <div id="section-location" class="section-home">

		<?php if ( $tm_location_section_map ) : ?>

			<div class="wrap-map">
				<?php echo $tm_location_section_map;; ?>
			</div><!-- /.wrap-map -->

		<?php endif; ?>

    </div><!-- /#section-location -->

<?php endif;
