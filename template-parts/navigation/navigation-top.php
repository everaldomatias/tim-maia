<nav class="navbar fixed-top navbar-expand-md" role="navigation">
    <div class="container">
      
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapseClick" aria-expanded="false" aria-controls="collapseClick">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>

        <?php if ( has_nav_menu( 'top' ) ) : ?>
            <?php
            wp_nav_menu(
                array(
                    'theme_location'    => 'top',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse float-left',
                    'container_id'      => 'collapseClick',
                    'menu_class'        => 'nav navbar-nav float-left',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker()
                )
            );
            ?>
        <?php endif; ?>

    </div><!-- /.container -->
</nav>
