<aside id="sidebar" class="col-sm-3" role="complementary">
    <?php
        if ( ! dynamic_sidebar( 'main-sidebar' ) ) {
            the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
        }
    ?>
</aside><!-- /#sidebar -->