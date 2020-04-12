<?php

/**
 * Include the sanitization functions
 */
require_once get_template_directory() . '/inc/customizer-sanitization.php';

function tm_customizer_sections( $wp_customize ) {
    
    /**
     * Adiciona o painel Seções da Home
     */
    $wp_customize->add_panel( 'tm_panel_home_section', array(
        'title'    => esc_html__( 'Seções da Home', 'tim-maia' ),
        'priority' => 10
    ) );

    /**
     * Adiciona um campo Hidden para guardar a ordem das seções
     */

    $wp_customize->add_section( 'tm_hidden_home_order', array(
        'title'       => esc_html__( 'Silence is golden!', 'tim-maia' ),
        'panel'       => 'tm_panel_home_section',
        'priority'    => 1
    ) );

    $wp_customize->add_setting(
        'tm_sections_order', array(
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sections_order',
            array(
                'settings' => 'tm_sections_order',
                'type'     => 'text',
                'label'    => esc_html__( 'Ordem das Seções', 'tim-maia' ),
                'section'  => 'tm_hidden_home_order',
            )
        )
    );

    /**
     * Cria um array com as seções disponíveis
     */
    
    $default_sections = array (
        'tm_section_name' => array (
            'title'       => esc_html__( 'Nome', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir o título/nome do site', 'tim-maia' ),
        ),
        'tm_section_sectionname2' => array (
            'title'       => esc_html__( 'Section 2', 'tim-maia' ),
            'description' => esc_html__( 'Section 2 Description', 'tim-maia' ),
        ),
        'tm_section_sectionname3' => array (
            'title'       => esc_html__( 'Section 3', 'tim-maia' ),
            'description' => esc_html__( 'Section 3 Description', 'tim-maia' ),
        ),
        'tm_section_sectionname4' => array (
            'title'       => esc_html__( 'Section 4', 'tim-maia' ),
            'description' => esc_html__( 'Section 4 Description', 'tim-maia' ),
        ),
    );

    $sortable_sections = get_theme_mod('tm_sections_order');
    if( !isset( $sortable_sections ) || empty( $sortable_sections ) ){
    //if( isset( $sortable_sections ) || !empty( $sortable_sections ) ){
        set_theme_mod( 'tm_sections_order', implode(',', array_keys( $default_sections ) ) );
    }
    $sortable_sections = explode(',', $sortable_sections );

    foreach( $sortable_sections as $sortable_section ){
        $wp_customize->add_section( $sortable_section, array(
            'title'       => $default_sections[$sortable_section]['title'],
            'description' => $default_sections[$sortable_section]['description'],
            'panel'       => 'tm_panel_home_section'
        ) );
    }

    /**
     * 
     * Adiciona os campos em cada seção
     * 
     * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
     * 
     */

    /**
     * Section Name
     * 
     * @todo Sanitize function to image field
     */
    $wp_customize->add_setting(
        'tm_setting_background_section_name', array(
            'default'           => 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960',
            'sanitize_callback' => ''
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'tm_background_section_name',
            array(
                'settings'  => 'tm_setting_background_section_name',
                'mime_type' => 'image',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_name'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_setting_color_section_name', array(
            'default'           => '#FFFFFF'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_name',
            array(
                'settings' => 'tm_setting_color_section_name',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_name'
            )
        )
    );

    $wp_customize->add_setting(
        'myprefix_section2_layout2', array(
            'default'           => 'classic',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'section2_layout',
            array(
                'settings' => 'myprefix_section2_layout2',
                'type'     => 'radio',
                'label'    => esc_html__( 'Section layout', 'tim-maia' ),
                'section'  => 'tm_section_sectionname2',
                'choices'  => array(
                    'classic'          => esc_html__( 'Classic', 'tim-maia' ),
                    'grid'             => esc_html__( 'Grid', 'tim-maia' ),
                    'list'             => esc_html__( 'List', 'tim-maia' ),
                )
            )
        )
    );

    $wp_customize->add_setting(
        'myprefix_section3_layout', array(
            'default'           => 'classic',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'section3_layout',
            array(
                'settings' => 'myprefix_section3_layout',
                'type'     => 'radio',
                'label'    => esc_html__( 'Section layout', 'tim-maia' ),
                'section'  => 'tm_section_sectionname3',
                'choices'  => array(
                    'classic'          => esc_html__( 'Classic', 'tim-maia' ),
                    'grid'             => esc_html__( 'Grid', 'tim-maia' ),
                    'list'             => esc_html__( 'List', 'tim-maia' ),
                )
            )
        )
    );

    $wp_customize->add_setting(
        'myprefix_section4_layout', array(
            'default'           => 'classic',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'section4_layout',
            array(
                'settings' => 'myprefix_section4_layout',
                'type'     => 'radio',
                'label'    => esc_html__( 'Section layout', 'tim-maia' ),
                'section'  => 'tm_section_sectionname4',
                'choices'  => array(
                    'classic'          => esc_html__( 'Classic', 'tim-maia' ),
                    'grid'             => esc_html__( 'Grid', 'tim-maia' ),
                    'list'             => esc_html__( 'List', 'tim-maia' ),
                )
            )
        )
    );
}

add_action( 'customize_register', 'tm_customizer_sections' );