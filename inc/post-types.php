<?php
if ( class_exists( 'TM_Post_Type' ) ) {

    /**
     * 
     * tm_post_type_portfolio
     * 
     */
    function tm_post_type_portfolio() {

        $profile = new TM_Post_Type(
            'Portfólio',
            'portfolio'
        );

        $profile->set_labels(
            [
                'name'         => __( 'Portfólio', 'tim-maia' ),
                'menu_name'    => __( 'Portfólio', 'tim-maia' ),
                'all_items'    => __( 'Todos portfólios', 'tim-maia' ),
                'add_new'      => __( 'Adicionar portfólio', 'tim-maia' ),
                'not_found'    => __( 'Nenhum portfólio encontrado. <a href="' . esc_url( admin_url() ) . '/post-new.php?post_type=portfolio">Clique aqui para criar o primeiro portfólio</a>', 'tim-maia' ),
                'add_new_item' => __( 'Adicionar novo portfólio', 'tim-maia' ),
            ]
        );
        $profile->set_arguments(
            [
                'supports'          => [ 'title', 'editor', 'thumbnail' ],
                'show_in_rest'      => true,
                'menu_icon'         => 'dashicons-portfolio',
                'show_in_nav_menus' => true
            ]
        );

    }

    add_action( 'init', 'tm_post_type_portfolio', 1 );

}