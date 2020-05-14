<?php

/**
 * Include the sanitization functions
 */
require_once( dirname( __FILE__ ) . '/customizer-sanitization.php' );

/**
 * Inlcude the Alpha Color Picker control file.
 */
require_once( dirname( __FILE__ ) . '/alpha-color-picker/alpha-color-picker.php' );

/**
 * Inlcude the CSS function print by customizer.
 */
require_once( dirname( __FILE__ ) . '/customizer-css.php' );

/**
 * 
 * 
 * 
 */
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
            'description' => esc_html__( 'Seção para detalhar e explicar melhor do que se trata o site.', 'tim-maia' ),
        ),
        'tm_section_action' => array (
            'title'       => esc_html__( 'Ação', 'tim-maia' ),
            'description' => esc_html__( 'Seção para adicionar uma chamada de ação.', 'tim-maia' ),
        ),
        'tm_section_features' => array (
            'title'       => esc_html__( 'Recursos', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir recursos do seu produto/serviço na Home do site.', 'tim-maia' ),
        ),
        'tm_section_blog' => array (
            'title'       => esc_html__( 'Blog', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir os últimos posts do blog.', 'tim-maia' ),
        ),
        'tm_section_social' => array (
            'title'       => esc_html__( 'Social', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir os ícones das redes sociais.', 'tim-maia' ),
        ),
        'tm_section_sectionname4' => array (
            'title'       => esc_html__( 'Section 4', 'tim-maia' ),
            'description' => esc_html__( 'Section 4 Description', 'tim-maia' ),
        ),
    );

    $sortable_sections = get_theme_mod( 'tm_sections_order' );
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
     * 
     * Section Hero
     * 
     */
    $wp_customize->add_setting(
        'tm_setting_background_section_hero', array(
            'default'           => get_stylesheet_directory_uri() . '/assets/images/default/tim-maia-1.jpg',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_background_section_hero',
            array(
                'settings'  => 'tm_setting_background_section_hero',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_hero'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_setting_color_section_hero', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
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
     * 
     * Section About
     * 
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
        'tm_background_section_about', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_background_section_about_control',
            array(
                'settings'  => 'tm_background_section_about',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_about'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_about', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_about_control',
            array(
                'settings' => 'tm_color_section_about',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
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
        'tm_about_button_1', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_about_button_1_control',
            array(
                'settings' => 'tm_about_button_1',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Saiba mais', 'tim-maia' ),
                ),
                'section'  => 'tm_section_about'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_about_button_url_1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_about_button_url_1_control',
            array(
                'settings' => 'tm_about_button_url_1',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/example' ),
                ),
                'section'  => 'tm_section_about',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_about_button_2', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_about_button_2_control',
            array(
                'settings' => 'tm_about_button_2',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão (secundário)', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um segundo botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Saiba mais', 'tim-maia' ),
                ),
                'section'  => 'tm_section_about'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_about_button_url_2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_about_button_url_2_control',
            array(
                'settings' => 'tm_about_button_url_2',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão (secundário)', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/second-example' ),
                ),
                'section'  => 'tm_section_about',
            )
        )
    );

    /**
     * 
     * Section Call to Action
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_action', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_action',
            array(
                'settings' => 'tm_use_section_action',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Call to Action?', 'tim-maia' ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_background_section_action', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_background_section_action_control',
            array(
                'settings'  => 'tm_background_section_action',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_action', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_action_control',
            array(
                'settings' => 'tm_color_section_action',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_title_section_action', array(
            'default'           => esc_attr__( 'Call to Action, o passo final!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_title_section_action_control',
            array(
                'settings' => 'tm_title_section_action',
                'type'     => 'text',
                'label'    => esc_html__( 'Título para a seção Call to Action', 'tim-maia' ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_description_section_action', array(
            'default' 	=> esc_attr__( 'Depois de apresentar todos os benefícios do seu produto/serviço, chegou a hora da oferta incrível para o fechamento da venda. Este é o Call to Action (CTA).', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_description_section_action',
            array(
                'settings' => 'tm_description_section_action',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição para a seção Call to Action', 'tim-maia' ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_action_button_1', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_action_button_1_control',
            array(
                'settings' => 'tm_action_button_1',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Baixe nosso E-book', 'tim-maia' ),
                ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_action_button_url_1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_action_button_url_1_control',
            array(
                'settings' => 'tm_action_button_url_1',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/example' ),
                ),
                'section'  => 'tm_section_action',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_action_button_2', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_action_button_2_control',
            array(
                'settings' => 'tm_action_button_2',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão (secundário)', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um segundo botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Cadastre-se e receba novidades!', 'tim-maia' ),
                ),
                'section'  => 'tm_section_action'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_action_button_url_2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_action_button_url_2_control',
            array(
                'settings' => 'tm_action_button_url_2',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão (secundário)', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/second-example' ),
                ),
                'section'  => 'tm_section_action',
            )
        )
    );

    /**
     * 
     * Section Features
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_features', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_features_control',
            array(
                'settings' => 'tm_use_section_features',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Features (Recursos)?', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_features', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_features_control',
            array(
                'settings' => 'tm_color_section_features',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_title_section_features', array(
            'default'           => esc_attr__( 'Recursos, apresente seus diferenciais!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_title_section_features_control',
            array(
                'settings' => 'tm_title_section_features',
                'type'     => 'text',
                'label'    => esc_html__( 'Título para a seção Features (Recursos)', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    /**
     * 
     * Section Features
     * Column 1
     * 
     */
    $wp_customize->add_setting(
        'tm_features_icon_1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_features_icon_1_control',
            array(
                'settings'  => 'tm_features_icon_1',
                'label'     => esc_html__( 'Ícone da coluna 1', 'tim-maia' ),
                'section'   => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_title_1', array(
            'default'           => esc_attr__( 'Gratuito!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_title_1_control',
            array(
                'settings' => 'tm_features_title_1',
                'type'     => 'text',
                'label'    => esc_html__( 'Título da coluna 1', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_description_1', array(
            'default'           => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae dui ligula. Curabitur condimentum semper urna. Duis lacinia fermentum convallis. In dignissim dapibus nunc, id porta lorem. Praesent eget fermentum justo. Ut pharetra aliquam massa, quis dignissim nisi aliquet non. Pellentesque id nisl mattis, pretium purus efficitur, ullamcorper dolor. Vestibulum at ultrices nisi. Vestibulum enim ante, consequat sed eros ut, ultricies tincidunt risus.', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_description_1_control',
            array(
                'settings' => 'tm_features_description_1',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição da coluna 1', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    /**
     * 
     * Section Features
     * Column 2
     * 
     */
    $wp_customize->add_setting(
        'tm_features_icon_2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_features_icon_2_control',
            array(
                'settings'  => 'tm_features_icon_2',
                'label'     => esc_html__( 'Ícone da coluna 2', 'tim-maia' ),
                'section'   => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_title_2', array(
            'default'           => esc_attr__( 'Leve e rápido!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_title_2_control',
            array(
                'settings' => 'tm_features_title_2',
                'type'     => 'text',
                'label'    => esc_html__( 'Título da coluna 2', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_description_2', array(
            'default'           => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae dui ligula. Curabitur condimentum semper urna. Duis lacinia fermentum convallis. In dignissim dapibus nunc, id porta lorem. Praesent eget fermentum justo. Ut pharetra aliquam massa, quis dignissim nisi aliquet non. Pellentesque id nisl mattis, pretium purus efficitur, ullamcorper dolor. Vestibulum at ultrices nisi. Vestibulum enim ante, consequat sed eros ut, ultricies tincidunt risus.', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_description_2_control',
            array(
                'settings' => 'tm_features_description_2',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição da coluna 2', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    /**
     * 
     * Section Features
     * Column 3
     * 
     */
    $wp_customize->add_setting(
        'tm_features_icon_3', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_features_icon_3_control',
            array(
                'settings'  => 'tm_features_icon_3',
                'label'     => esc_html__( 'Ícone da coluna 3', 'tim-maia' ),
                'section'   => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_title_3', array(
            'default'           => esc_attr__( 'Objetivo!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_title_3_control',
            array(
                'settings' => 'tm_features_title_3',
                'type'     => 'text',
                'label'    => esc_html__( 'Título da coluna 3', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_description_3', array(
            'default'           => esc_attr__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae dui ligula. Curabitur condimentum semper urna. Duis lacinia fermentum convallis. In dignissim dapibus nunc, id porta lorem. Praesent eget fermentum justo. Ut pharetra aliquam massa, quis dignissim nisi aliquet non. Pellentesque id nisl mattis, pretium purus efficitur, ullamcorper dolor. Vestibulum at ultrices nisi. Vestibulum enim ante, consequat sed eros ut, ultricies tincidunt risus.', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_description_3_control',
            array(
                'settings' => 'tm_features_description_3',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição da coluna 3', 'tim-maia' ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_button', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_button_control',
            array(
                'settings'    => 'tm_features_button',
                'type'        => 'text',
                'label'       => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Veja todos nossos Recursos!', 'tim-maia' ),
                ),
                'section'  => 'tm_section_features'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_features_button_url', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_features_button_url_control',
            array(
                'settings' => 'tm_features_button_url',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/features' ),
                ),
                'section'  => 'tm_section_features',
            )
        )
    );

    /**
     * 
     * Section Blog
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_blog', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_blog_control',
            array(
                'settings' => 'tm_use_section_blog',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Blog?', 'tim-maia' ),
                'section'  => 'tm_section_blog'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_blog', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_blog_control',
            array(
                'settings' => 'tm_color_section_blog',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_blog'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_background_color_section_blog', array(
            'default'   => '#333333',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_background_color_section_blog_control',
            array(
                'settings' => 'tm_background_color_section_blog',
                'label'    => esc_html__( 'Cor de fundo da seção', 'tim-maia' ),
                'section'  => 'tm_section_blog'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_title_section_blog', array(
            'default'           => esc_attr__( 'Blog!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_title_section_blog_control',
            array(
                'settings' => 'tm_title_section_blog',
                'type'     => 'text',
                'label'    => esc_html__( 'Título para a seção Blog.', 'tim-maia' ),
                'section'  => 'tm_section_blog'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_blog_button', array(
            'default'           => esc_html__( 'Veja mais!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_blog_button_control',
            array(
                'settings'    => 'tm_blog_button',
                'type'        => 'text',
                'label'       => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Título do botão para acessar o blog.', 'tim-maia' ),
                'section'     => 'tm_section_blog'
            )
        )
    );

    /**
     * 
     * Social
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_social', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_social_control',
            array(
                'settings' => 'tm_use_section_social',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Social?', 'tim-maia' ),
                'section'  => 'tm_section_social'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_facebook', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_facebook_control',
            array(
                'settings' => 'tm_social_facebook',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Facebook', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://facebook.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_instagram', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_instagram_control',
            array(
                'settings' => 'tm_social_instagram',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Instagram', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://instagram.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_twitter', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_twitter_control',
            array(
                'settings' => 'tm_social_twitter',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Twitter', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://twitter.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_tumblr', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_tumblr_control',
            array(
                'settings' => 'tm_social_tumblr',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Tumblr', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://tumblr.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_flickr', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_flickr_control',
            array(
                'settings' => 'tm_social_flickr',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Flickr', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://flickr.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_snapchat', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_snapchat_control',
            array(
                'settings' => 'tm_social_snapchat',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Snapchat', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://snapchat.com/yourID', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_site', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_site_control',
            array(
                'settings' => 'tm_social_site',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do Site', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'https://site.com/', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_social_email', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_social_email_control',
            array(
                'settings' => 'tm_social_email',
                'type'     => 'url',
                'label'    => esc_html__( 'Email', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( 'yourmail@host.com', 'tim-maia' ),
                ),
                'section'  => 'tm_section_social',
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
     * Background color
     */
    $wp_customize->add_setting(
        'tm_general_settings_background_color', array(
            'default'   => '#DDDDDD',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_background_color_control',
            array(
                'settings' => 'tm_general_settings_background_color',
                'label'    => esc_html__( 'Cor de fundo do site', 'tim-maia' ),
                'section'  => 'tm_section_general_settings_colors'
            )
        )
    );

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
                'settings'     => 'tm_general_settings_over_layer_color',
                'label'        => esc_html__( 'Cor do over layer', 'tim-maia' ),
                'description'  => esc_html__( 'Cor utilizada para a camada transparente das seções', 'tim-maia' ),
                'section'      => 'tm_section_general_settings_colors',
                'show_opacity' => false, // Optional.
                'palette'      => array(
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


/**
 * 
 * EnqueueJS to customizer live preview
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action( 'customize_preview_init', $func )
 * 
 */
function tm_customizer_live_preview() {
	wp_enqueue_script( 
		  'tm-customizer',			//Give the script an ID
		  get_template_directory_uri() . '/inc/customizer/theme-customizer.js', //Point to file
		  array( 'jquery', 'customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'tm_customizer_live_preview' );