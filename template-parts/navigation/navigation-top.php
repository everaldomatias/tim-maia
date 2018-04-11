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
      
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <span class="navbar-toggler-icon"></span>
        </button>


        <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
        <ul class="nav navbar-nav float-left anchor-menu">
            <?php
            $use_sobre = get_theme_mod( 'use_sobre', '1' );
            $menu_section_sobre = get_theme_mod( 'menu_section_sobre', $sd['menu_section_sobre'] );
            if ( $use_sobre && ! empty( $menu_section_sobre ) ) : ?>
                <li class="menu-item nav-item"><a class="nav-link" href="<?php echo home_url( '#section-sobre' ); ?>"><?php echo apply_filters( 'the_title', $menu_section_sobre ); ?></a></li>
            <?php endif; ?>

            <?php
            $use_acao = get_theme_mod( 'use_acao', '1' );
            $menu_section_acao = get_theme_mod( 'menu_section_acao', $sd['menu_section_acao'] );
            if ( $use_acao && ! empty( $menu_section_acao ) ) : ?>
                <li class="menu-item nav-item"><a class="nav-link" href="<?php echo home_url( '#section-acao' ); ?>"><?php echo apply_filters( 'the_title', $menu_section_acao ); ?></a></li>
            <?php endif; ?>

            <?php
            $use_diferenciais = get_theme_mod( 'use_diferenciais', '1' );
            $menu_section_diferenciais = get_theme_mod( 'menu_section_diferenciais', $sd['menu_section_diferenciais'] );
            if ( $use_diferenciais && ! empty( $menu_section_diferenciais ) ) : ?>
                <li class="menu-item nav-item"><a class="nav-link" href="<?php echo home_url( '#section-diferenciais' ); ?>"><?php echo apply_filters( 'the_title', $menu_section_diferenciais ); ?></a></li>
            <?php endif; ?>

            <?php
            $use_doacoes = get_theme_mod( 'use_doacoes', '1' );
            $menu_section_doacoes = get_theme_mod( 'menu_section_doacoes', $sd['menu_section_doacoes'] );
            if ( $use_doacoes && ! empty( $menu_section_doacoes ) ) : ?>
                <li class="menu-item nav-item"><a class="nav-link" href="<?php echo home_url( '#section-doacoes' ); ?>"><?php echo apply_filters( 'the_title', $menu_section_doacoes ); ?></a></li>
            <?php endif; ?>
        </ul>

        <?php
        wp_nav_menu(
            array(
                'theme_location'    => 'top',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse float-right',
                'container_id'      => 'collapseExample',
                'menu_class'        => 'nav navbar-nav float-right',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker()
            )
        );
        ?>
    </div><!-- /.container-fluid -->
</nav>
