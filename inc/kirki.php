<?php

/**
 * Kirki Framework.
 * ==============================================================================
 */

Kirki::add_config( 'kirki_custom_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Painel
 * ==============================================================================
 */
Kirki::add_panel( 'sessoes', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Sessões', 'odin' ),
    'description' => esc_attr__( 'Configurações das Sessões.', 'odin' ),
    'capability'  => 'edit_theme_options'
) );


/**
 * Sessões
 * ==============================================================================
 */
Kirki::add_section( 'nome', array(
    'title'          => __( 'Nome' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'sobre', array(
    'title'          => __( 'Sobre' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'acao', array(
    'title'          => __( 'Ação' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
/**
 * Campos (separados por Sessões)
 * ==============================================================================
 */

/* Nome */
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'custom',
	'settings'    => 'section_nome',
	'label'       => '',
	'section'     => 'nome',
	'default'		=> '<h1 style="text-align: center">Sessão Nome</h1><hr>',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_nome',
	'label'			=> __( 'Imagem para a sessão "Nome"', 'model' ),
	'section'		=> 'nome',
	'description'	=> esc_attr__( 'Imagem de fundo para a sessão Nome.', 'model' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'color_section_nome',
	'label'       => __( 'Cor', 'model' ),
	'description' => esc_attr__( 'Cores para o título da sessão Nome.', 'model' ),
	'section'     => 'nome',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-nome .container h1',
			'property' => 'color'
		),
	),
) );

/* Sobre */
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'custom',
	'settings'    => 'section_sobre',
	'label'       => '',
	'section'     => 'sobre',
	'default'		=> '<h1 style="text-align: center">Sessão Sobre</h1><hr>',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'text',
	'settings'    => 'titulo_section_sobre',
	'label'       => __( 'Título', 'model' ),
	'description' => esc_attr__( 'Título para a sessão Sobre.', 'model' ),
	'section'     => 'sobre',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'editor',
	'settings'    => 'editor_section_sobre',
	'label'       => __( 'Sobre', 'model' ),
	'description' => esc_attr__( 'Descreva em poucos parágrafos quem é você, o que deseja e outras informações que julgar necessário.', 'model' ),
	'section'     => 'sobre',
	'default'     => '',
	'priority'    => 10,
) );

/* Ação */
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'custom',
	'settings'    => 'section_acao',
	'label'       => '',
	'section'     => 'acao',
	'default'		=> '<h1 style="text-align: center">Sessão Call to Action</h1><hr>',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'text',
	'settings'    => 'titulo_section_acao',
	'label'       => __( 'Título', 'model' ),
	'description' => esc_attr__( 'Título para a sessão Call to Action.', 'model' ),
	'section'     => 'acao',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'editor',
	'settings'    => 'editor_section_acao',
	'label'       => __( 'Texto', 'model' ),
	'description' => esc_attr__( 'Faça uma chamada para o botão de ação.', 'model' ),
	'section'     => 'acao',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'text',
	'settings'    => 'titulo_botao_section_acao',
	'label'       => __( 'Título do Botão de Ação', 'model' ),
	'description' => esc_attr__( 'Título para o botão da sessão Call to Action.', 'model' ),
	'section'     => 'acao',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'link',
	'settings'    => 'link_botao_section_acao',
	'label'       => __( 'Link do Botão de Ação', 'model' ),
	'description' => esc_attr__( 'Link para o botão da sessão Call to Action.', 'model' ),
	'section'     => 'acao',
	'default'     => '',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_acao',
	'label'			=> __( 'Imagem para a sessão "Ação"', 'model' ),
	'section'		=> 'acao',
	'description'	=> esc_attr__( 'Imagem de fundo para a sessão Ação.', 'model' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'color_section_acao',
	'label'       => __( 'Cor', 'model' ),
	'description' => esc_attr__( 'Cores para os textos da sessão Ação.', 'model' ),
	'section'     => 'acao',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-acao',
			'property' => 'color'
		),
	),
) );