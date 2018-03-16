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

