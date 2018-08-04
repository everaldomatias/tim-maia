<?php
/**
 *
 * Retorna as strings padrões do tema no array $sd
 * 
     * @author      Everaldo Matias <http://everaldomatias.github.io>
     * @version     0.1
     * @since       09/04/2018
     * @see         https://codex.wordpress.org/Transients_API
     * 
 */
$sd = get_transient( 'strings_default' ); ?>

<nav class="navbar fixed-top navbar-dark navbar-expand-md" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
      
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapseClick" aria-expanded="false" aria-controls="collapseClick">
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
    </div><!-- /.container-fluid -->
</nav>
