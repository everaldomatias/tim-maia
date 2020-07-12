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
 * Include the Range control file.
 */
require_once( dirname( __FILE__ ) . '/class-customizer-range-value-control/class-customizer-range-value-control.php' );

/**
 * Include the Customizer Repeater control
 */
require dirname( __FILE__ ) . '/customizer-repeater/functions.php';

/**
 * Inlcude the CSS function print by customizer.
 */
require_once( dirname( __FILE__ ) . '/customizer-css.php' );

/**
 * 
 * 
 * 
 */
function tm_customize_register( $wp_customize ) {
    
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
        'tm_section_portfolio' => array (
            'title'       => esc_html__( 'Portfólio', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir o portfólio.', 'tim-maia' ),
        ),
        'tm_section_blog' => array (
            'title'       => esc_html__( 'Blog', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir os últimos posts do blog.', 'tim-maia' ),
        ),
        'tm_section_social' => array (
            'title'       => esc_html__( 'Social', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir os ícones das redes sociais.', 'tim-maia' ),
        ),
        'tm_section_donate' => array (
            'title'       => esc_html__( 'Doações', 'tim-maia' ),
            'description' => esc_html__( 'Seção para exibir pedir apoio e doações.', 'tim-maia' ),
        ),
    );

    $sortable_sections = get_theme_mod( 'tm_sections_order' );
    if ( ! isset( $sortable_sections ) || empty( $sortable_sections ) ) {
    //if ( isset( $sortable_sections ) || ! empty( $sortable_sections ) ) {
        set_theme_mod( 'tm_sections_order', implode( ',', array_keys( $default_sections ) ) );
    }
    $sortable_sections = explode( ',', $sortable_sections );

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
            'default'           => get_stylesheet_directory_uri() . '/assets/images/default/photo-of-person-holding-black-tablet-3740162.jpg',
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


    $wp_customize->add_setting( 'customizer_repeater_example', array(
            'sanitize_callback' => 'customizer_repeater_sanitize'
    ));
    $wp_customize->add_control( new Customizer_Repeater( $wp_customize, 'customizer_repeater_example', array(
        'label'   => esc_html__('Example','customizer-repeater'),
        'section' => 'tm_section_hero',
        'priority' => 1,
        'customizer_repeater_image_control' => true,
        'customizer_repeater_icon_control' => true,
        'customizer_repeater_title_control' => true,
        'customizer_repeater_subtitle_control' => true,
        'customizer_repeater_text_control' => true,
        'customizer_repeater_link_control' => true,
        'customizer_repeater_shortcode_control' => true,
        'customizer_repeater_repeater_control' => true
    ) ) );
























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
            'default'           => get_stylesheet_directory_uri() . '/assets/images/default/woman-in-white-tank-top-using-black-laptop-computer-with-vr-3861458.jpg',
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
     * Section Portfolio
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_portfolio', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_portfolio_control',
            array(
                'settings' => 'tm_use_section_portfolio',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção Portfólio?', 'tim-maia' ),
                'section'  => 'tm_section_portfolio'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_portfolio', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_portfolio_control',
            array(
                'settings' => 'tm_color_section_portfolio',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_portfolio'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_background_color_section_portfolio', array(
            'default'   => '#222222',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_background_color_section_portfolio_control',
            array(
                'settings' => 'tm_background_color_section_portfolio',
                'label'    => esc_html__( 'Cor de fundo da seção', 'tim-maia' ),
                'section'  => 'tm_section_portfolio'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_portfolio_button', array(
            'default'           => esc_html__( 'Veja mais!', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_portfolio_button_control',
            array(
                'settings'    => 'tm_portfolio_button',
                'type'        => 'text',
                'label'       => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Título do botão para acessar o Portfólio.', 'tim-maia' ),
                'section'     => 'tm_section_portfolio'
            )
        )
    );

    /**
     * 
     * Translations for labels Portfólio
     * 
     */

    $wp_customize->add_setting(
        'tm_portfolio_labels_singular', array(
            'default'           => esc_html__( 'Portfólio', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_portfolio_labels_singular_control',
            array(
                'settings'    => 'tm_portfolio_labels_singular',
                'type'        => 'text',
                'label'       => esc_html__( 'Título da seção (Singular)', 'tim-maia' ),
                'section'     => 'tm_section_portfolio'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_portfolio_labels_plural', array(
            'default'           => esc_html__( 'Portfólio', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_portfolio_labels_plural_control',
            array(
                'settings'    => 'tm_portfolio_labels_plural',
                'type'        => 'text',
                'label'       => esc_html__( 'Título da seção (Plural)', 'tim-maia' ),
                'section'     => 'tm_section_portfolio'
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
     * Section Donate
     * 
     */
    $wp_customize->add_setting(
        'tm_use_section_donate', array(
            'default'           => '1',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_use_section_donate_control',
            array(
                'settings' => 'tm_use_section_donate',
                'type'     => 'checkbox',
                'label'    => esc_html__( 'Usar a seção de Doações?', 'tim-maia' ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_background_section_donate', array(
            'default'           => get_stylesheet_directory_uri() . '/assets/images/default/silver-macbook-on-white-table-3740694.jpg',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_background_section_donate_control',
            array(
                'settings'  => 'tm_background_section_donate',
                'label'     => esc_html__( 'Background da seção', 'tim-maia' ),
                'section'   => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_color_section_donate', array(
            'default'   => '#FFFFFF',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_color_section_donate_control',
            array(
                'settings' => 'tm_color_section_donate',
                'label'    => esc_html__( 'Cor do texto da seção', 'tim-maia' ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_title_section_donate', array(
            'default'           => esc_attr__( 'Doações', 'tim-maia' ),
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_title_section_donate_control',
            array(
                'settings' => 'tm_title_section_donate',
                'type'     => 'text',
                'label'    => esc_html__( 'Título para a seção Doações', 'tim-maia' ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_description_section_donate', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_description_section_donate',
            array(
                'settings' => 'tm_description_section_donate',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Descrição para a seção Doações', 'tim-maia' ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_donate_button_1', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_donate_button_1_control',
            array(
                'settings' => 'tm_donate_button_1',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Doe pelo PicPay', 'tim-maia' ),
                ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_donate_button_url_1', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_donate_button_url_1_control',
            array(
                'settings' => 'tm_donate_button_url_1',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/example' ),
                ),
                'section'  => 'tm_section_donate',
            )
        )
    );

    $wp_customize->add_setting(
        'tm_donate_button_2', array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_donate_button_2_control',
            array(
                'settings' => 'tm_donate_button_2',
                'type'     => 'text',
                'label'    => esc_html__( 'Botão (secundário)', 'tim-maia' ),
                'description' => esc_html__( 'Caso precise utilizar um segundo botão na seção, preencha os campos abaixo.', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => esc_html__( 'Patreon', 'tim-maia' ),
                ),
                'section'  => 'tm_section_donate'
            )
        )
    );

    $wp_customize->add_setting(
        'tm_donate_button_url_2', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_donate_button_url_2_control',
            array(
                'settings' => 'tm_donate_button_url_2',
                'type'     => 'url',
                'label'    => esc_html__( 'URL do botão (secundário)', 'tim-maia' ),
                'input_attrs' => array(
                    'placeholder' => __( home_url() . '/second-example' ),
                ),
                'section'  => 'tm_section_donate',
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

    /**
     * Background color
     */
    $wp_customize->add_setting(
        'tm_social_background_color', array(
            'default'   => '#444444',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_social_background_color_control',
            array(
                'settings' => 'tm_social_background_color',
                'label'    => esc_html__( 'Cor de fundo da seção', 'tim-maia' ),
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

    /**
     * Adiciona o painel Configurações Gerais
     */
    $wp_customize->add_panel( 'tm_panel_general_settings', array(
        'title'    => esc_html__( 'Configurações Gerais', 'tim-maia' ),
        'priority' => 10
    ) );

    /**
     * Adiciona a seção Espaçamento das Seções no painel Configurações Gerais
     */
    $wp_customize->add_section( 'tm_section_general_settings_padding', array(
        'title'       => esc_html__( 'Espaçamento das seções da Home', 'tim-maia' ),
        'panel'       => 'tm_panel_general_settings',
        'priority'    => 1
    ) );

    /**
     * 
     */
    $wp_customize->add_setting(
        'tm_general_settings_padding', array(
            'default'   => '100',
        )
    );

    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'tm_general_settings_padding_control', array(
        'type'     => 'range-value',
        'section'  => 'tm_section_general_settings_padding',
        'settings' => 'tm_general_settings_padding',
        'label' => __( 'Margem das seções na Home', 'tim-maia' ),
        'input_attrs' => array(
            'min'    => 30,
            'max'    => 200,
            'step'   => 5,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

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
     * Background color to sections home
     */
    $wp_customize->add_setting(
        'tm_general_settings_sections_background_color', array(
            'default'   => '#508991',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_general_settings_sections_background_color_control',
            array(
                'settings' => 'tm_general_settings_sections_background_color',
                'label'    => esc_html__( 'Cor de fundo das seções da home', 'tim-maia' ),
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

    /*
     * Menu Fixed
     */

    $wp_customize->add_section( 'tm_fixed', array(
        'title'       => esc_html__( 'Menu\'s', 'tim-maia' ),
        'panel'       => 'tm_panel_general_settings',
        'priority'    => 1
    ) );

    /**
     * Menu Fixed > Background color
     */
    $wp_customize->add_setting(
        'tm_fixed_background_color', array(
            'default'   => '#111111',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_fixed_background_color_control',
            array(
                'settings' => 'tm_fixed_background_color',
                'label'    => esc_html__( 'Cor de fundo dos menus', 'tim-maia' ),
                'section'  => 'tm_fixed'
            )
        )
    );

    /**
     * Menu Fixed > Color
     */
    $wp_customize->add_setting(
        'tm_fixed_color', array(
            'default'   => '#888888',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_fixed_color_control',
            array(
                'settings' => 'tm_fixed_color',
                'label'    => esc_html__( 'Cor das fontes', 'tim-maia' ),
                'section'  => 'tm_fixed'
            )
        )
    );

    /*
     * Heading Title
     */
    $wp_customize->add_section( 'tm_heading_title', array(
        'title'       => esc_html__( 'Cabeçalhos de Título', 'tim-maia' ),
        'panel'       => 'tm_panel_general_settings',
        'priority'    => 1
    ) );

    $wp_customize->add_setting(
        'tm_heading_use', array(
            'default'           => '0',
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_heading_use_control',
            array(
                'settings'    => 'tm_heading_use',
                'type'        => 'checkbox',
                'label'       => esc_html__( 'Não usar imagem no cabeçalho de título?', 'tim-maia' ),
                'description' => esc_html__( 'Mesmo sem definir a imagem (padrão) para o cabeçalho dos títulos abaixo, ela pode ser servida pelas imagens destacadas das páginas, então, caso queira bloquear definitivamente o uso de imagem em todas as páginas internas, marque essa opção.', 'tim-maia' ),
                'section'     => 'tm_heading_title'
            )
        )
    );

    /**
     * Heading Title > Background Image Default
     */
    $wp_customize->add_setting(
        'tm_heading_background_image_default', array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'       => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tm_heading_background_image_default_control',
            array(
                'settings'  => 'tm_heading_background_image_default',
                'label'     => esc_html__( 'Imagem de fundo dos cabeçalhos de título', 'tim-maia' ),
                'description' => esc_html__( 'Essa imagem será usada nas páginas de listagens ou quando a página ou post não possuir uma imagem destacada definida.', 'tim-maia' ),
                'section'   => 'tm_heading_title'
            )
        )
    );

    /**
     * Heading Title -> Padding of the Headings Title
     */
    $wp_customize->add_setting(
        'tm_heading_padding', array(
            'default'   => '100',
        )
    );

    $wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'tm_heading_padding_control', array(
        'type'     => 'range-value',
        'section'  => 'tm_heading_title',
        'settings' => 'tm_heading_padding',
        'label' => __( 'Margem dos cabeçalhos de título nas páginas internas', 'tim-maia' ),
        'input_attrs' => array(
            'min'    => 30,
            'max'    => 200,
            'step'   => 5,
            'suffix' => 'px', //optional suffix
        ),
    ) ) );

    /**
     * Heading Title > Background Color
     */
    $wp_customize->add_setting(
        'tm_heading_background_color', array(
            'default'   => '',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_heading_background_color_control',
            array(
                'settings' => 'tm_heading_background_color',
                'label'    => esc_html__( 'Cor de fundo do cabeçalho de título', 'tim-maia' ),
                'section'  => 'tm_heading_title'
            )
        )
    );

    /**
     * Heading Title > Color
     */
    $wp_customize->add_setting(
        'tm_heading_color', array(
            'default'   => '#888888'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_heading_color_control',
            array(
                'settings' => 'tm_heading_color',
                'label'    => esc_html__( 'Cor dos títulos', 'tim-maia' ),
                'section'  => 'tm_heading_title'
            )
        )
    );

    /**
     * Heading Title > Alignment
     */
    $wp_customize->add_setting(
        'tm_heading_text_alignment', array(
            'sanitize_callback' => '',
            'default'           => 'center',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_heading_text_alignment_control',
            array(
                'label'          => __( 'Alinhamento do texto', 'tim-maia' ),
                'section'        => 'tm_heading_title',
                'settings'       => 'tm_heading_text_alignment',
                'type'           => 'select',
                'choices'  => array(
                    'center' => __( 'Centralizado', 'tim-maia' ),
                    'left'   => __( 'Esquerdo', 'tim-maia' ),
                    'right'  => __( 'Direito', 'tim-maia' ),
                )
            )
        )
    );

    /*
     * Footer
     */
    $wp_customize->add_section( 'tm_footer', array(
        'title'       => esc_html__( 'Rodapé', 'tim-maia' ),
        'panel'       => 'tm_panel_general_settings',
        'priority'    => 1
    ) );

    /**
     * Footer > Background color
     */
    $wp_customize->add_setting(
        'tm_footer_background_color', array(
            'default'   => '#111111',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_footer_background_color_control',
            array(
                'settings' => 'tm_footer_background_color',
                'label'    => esc_html__( 'Cor de fundo do rodapé', 'tim-maia' ),
                'section'  => 'tm_footer'
            )
        )
    );

    /**
     * Footer > Color
     */
    $wp_customize->add_setting(
        'tm_footer_color', array(
            'default'   => '#888888',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_footer_color_control',
            array(
                'settings' => 'tm_footer_color',
                'label'    => esc_html__( 'Cor das fontes', 'tim-maia' ),
                'section'  => 'tm_footer'
            )
        )
    );

    /**
     * Footer > Hover Color Link
     */
    $wp_customize->add_setting(
        'tm_footer_hover', array(
            'default'   => '#DDDDDD',
            'transport' => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tm_footer_hover_control',
            array(
                'settings' => 'tm_footer_hover',
                'label'    => esc_html__( 'Cor dos links ao passar o mouse', 'tim-maia' ),
                'section'  => 'tm_footer'
            )
        )
    );

    /**
     * Footer > Credit text
     */
    $wp_customize->add_setting(
        'tm_footer_text', array(
            'sanitize_callback' => 'wp_kses_post'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'tm_footer_text_control',
            array(
                'settings' => 'tm_footer_text',
                'type'     => 'textarea',
                'label'    => esc_html__( 'Texto de crédito para o Rodapé.', 'tim-maia' ),
                'section'  => 'tm_footer'
            )
        )
    );

}

add_action( 'customize_register', 'tm_customize_register' );


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