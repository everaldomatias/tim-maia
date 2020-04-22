<?php

/**
 * Include the sanitization functions
 */
require_once get_template_directory() . '/inc/customizer-sanitization.php';

/**
 * Inlcude the Alpha Color Picker control file.
 */
require_once( dirname( __FILE__ ) . '/alpha-color-picker/alpha-color-picker.php' );

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
        'tm_section_hero' => array (
            'title'       => esc_html__( 'Hero', 'tim-maia' ),
            'description' => esc_html__( 'Seção hero para exibir o título/nome do site com uma imagem de fundo.', 'tim-maia' ),
        ),
        'tm_section_about' => array (
            'title'       => esc_html__( 'Sobre', 'tim-maia' ),
            'description' => esc_html__( 'Seção para detalhar e explicar melhor do que se trata o site', 'tim-maia' ),
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
    if( ! isset( $sortable_sections ) || empty( $sortable_sections ) ){
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
     * Section Hero
     * 
     * @todo Sanitize function to image field
     */
    $wp_customize->add_setting(
        'tm_setting_background_section_hero', array(
            'default'           => 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960',
            'sanitize_callback' => ''
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'tm_background_section_hero',
            array(
                'settings'  => 'tm_setting_background_section_hero',
                'mime_type' => 'image',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_hero'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_setting_color_section_hero', array(
            'default'           => '#FFFFFF'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_hero',
            array(
                'settings' => 'tm_setting_color_section_hero',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_hero'
            )
        )
    );

    /**
     * Section About
     */
    $wp_customize->add_setting(
        'tm_use_section_about', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_about',
            array(
                'settings' => 'tm_use_section_about',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Sobre?', 'tim-maia' ),
                'section'  => 'tm_section_about'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_title_section_about', array(
            'default'           => esc_html__( 'Sobre', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_title_section_about',
            array(
                'settings' => 'tm_title_section_about',
                'type'     => 'text',
                'label'    => esc_html__( 'Título para a seção Sobre', 'tim-maia' ),
                'section'  => 'tm_section_about'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_description_section_about', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_description_section_about',
            array(
                'settings' => 'tm_description_section_about',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição para a seção Sobre', 'tim-maia' ),
                'description' 	=> esc_attr__( 'Descreva em poucos parágrafos quem é você, o que deseja e outras informações que julgar necessário.', 'model' ),
                'section'  => 'tm_section_about'
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







    /**
     * Adiciona o painel Configurações Gerais
     */
    $wp_customize->add_panel( 'tm_panel_general_settings', array(
        'title'    => esc_html__( 'Configurações Gerais', 'tim-maia' ),
        'priority' => 10
    ) );

    /**
     * Adiciona a seção Cores no painel Configurações Gerais
     */
    $wp_customize->add_section( 'tm_section_general_settings_colors', array(
        'title'       => esc_html__( 'Cores do Site', 'tim-maia' ),
        'panel'       => 'tm_panel_general_settings',
        'priority'    => 1
    ) );

    /**
     * Cor primária
     */
    $wp_customize->add_setting(
        'tm_general_settings_primary_color', array(
            'default' => '#D56C37'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_primary_color',
            array(
                'settings' => 'tm_general_settings_primary_color',
                'label'    => esc_html__( 'Cor primária', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors'
            )
        )
    );

    /**
     * Cor secundária
     */
    $wp_customize->add_setting(
        'tm_general_settings_secondary_color', array(
            'default' => '#A43628'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_secondary_color',
            array(
                'settings' => 'tm_general_settings_secondary_color',
                'label'    => esc_html__( 'Cor secundária', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors'
            )
        )
    );

    /**
     * Cor terciária
     */
    $wp_customize->add_setting(
        'tm_general_settings_tertiary_color', array(
            'default' => '#221D1C'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_tertiary_color',
            array(
                'settings' => 'tm_general_settings_tertiary_color',
                'label'    => esc_html__( 'Cor terciária', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors'
            )
        )
    );

    /**
     * Cor quaternária
     */
    $wp_customize->add_setting(
        'tm_general_settings_quaternary_color', array(
            'default' => '#CACE88'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_quaternary_color',
            array(
                'settings' => 'tm_general_settings_quaternary_color',
                'label'    => esc_html__( 'Cor quaternária', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors'
            )
        )
    );

    /**
     * Cor de over layer
     */
    $wp_customize->add_setting(
        'tm_general_settings_over_layer_color', 
        array(
            'default'     => 'rgba(50,50,50,0.7)',
            'type'        => 'theme_mod',
            'capability'  => 'edit_theme_options',
            'transport'   => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new Customize_Alpha_Color_Control(
            $wp_customize,
            'tm_general_over_layer_color_control',
            array(
                'settings' => 'tm_general_settings_over_layer_color',
                'label'    => esc_html__( 'Cor do over layer', 'tim-maia' ),
                'description' => esc_html__( 'Cor utilizada para a camada transparente das seções', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors',
                'show_opacity'  => false, // Optional.
                'palette'	=> array(
					'rgba(10,10,10,0.5)',
                    'rgba(10,10,10,0.7)',
                    'rgba(10,10,10,0.9)',
                    'rgba(213,108,55,0.7)',
					'rgba(164,54,40,0.7)',
				)
            )
        )
    );

}

add_action( 'customize_register', 'tm_customizer_sections' );