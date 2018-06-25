<?php

/**
 *
 * Retorna as strings padrões do tema no array $sd
 * 
	 * @author 		Everaldo Matias <http://everaldomatias.github.io>
	 * @version 	0.1
	 * @since 		09/04/2018
	 * @see 		https://codex.wordpress.org/Transients_API
	 * 
 */
$sd = get_transient( 'strings_default' );

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
Kirki::add_section( 'diferenciais', array(
    'title'          => __( 'Diferenciais' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'blog', array(
    'title'          => __( 'Blog' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'doacoes', array(
    'title'          => __( 'Doações' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'social', array(
    'title'          => __( 'Redes Sociais' ),
    'panel'          => 'sessoes', // Not typically needed.
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'rodape', array(
    'title'          => __( 'Rodapé' ),
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
	'default'		=> esc_url( 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960' ),
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
	'type'			=> 'custom',
	'settings'		=> 'section_sobre',
	'label'			=> '',
	'section'		=> 'sobre',
	'default'		=> '<h1 style="text-align: center">Sessão Sobre</h1><hr>',
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_sobre',
	'label'		=> __( 'Usar sessão Sobre', 'model' ),
	'section'	=> 'sobre',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'menu_section_sobre',
	'label'			=> __( 'Título para o menu', 'model' ),
	'section'		=> 'sobre',
	'default'		=> esc_attr__( 'Sobre', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_section_sobre',
	'label'			=> __( 'Título', 'model' ),
	'description'	=> esc_attr__( 'Título para a sessão Sobre.', 'model' ),
	'section'		=> 'sobre',
	'default'		=> esc_attr__( 'Seja bem vindo ao Tema Model', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        	=> 'editor',
	'settings'    	=> 'editor_section_sobre',
	'label'       	=> __( 'Sobre', 'model' ),
	'description' 	=> esc_attr__( 'Descreva em poucos parágrafos quem é você, o que deseja e outras informações que julgar necessário.', 'model' ),
	'section'     	=> 'sobre',
	'default'     	=> esc_attr__( 'Com ele, artistas, modelos, figuras públicas e muitas outras pessoas poderão criar um site simples e direto para se apresentarem ao mundo através da internet. Altere todos os textos e imagens que tem no menu à esquerda e clique em <strong>Publicar</strong>', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/* Ação */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_acao',
	'label'			=> '',
	'section'		=> 'acao',
	'default'		=> '<h1 style="text-align: center">Sessão Call to Action</h1><hr>',
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'switch',
	'settings'    => 'use_acao',
	'label'       => __( 'Usar sessão Call to Action', 'model' ),
	'section'     => 'acao',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'menu_section_acao',
	'label'			=> __( 'Título para o menu', 'model' ),
	'section'		=> 'acao',
	'default'		=> esc_attr__( 'Ação', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_section_acao',
	'label'			=> __( 'Título', 'model' ),
	'description'	=> esc_attr__( 'Título para a sessão Call to Action.', 'model' ),
	'section'		=> 'acao',
	'default'		=> esc_attr__( 'Call to Action', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'editor',
	'settings'		=> 'editor_section_acao',
	'label'			=> __( 'Texto', 'model' ),
	'description' 	=> esc_attr__( 'Faça uma chamada para o botão de ação.', 'model' ),
	'section'		=> 'acao',
	'default'		=> esc_attr__( 'Aqui é um espaço para você criar uma chamada para o seu serviço/produto ou para outro objetivo em que deseja obter resultados.', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_botao_section_acao',
	'label'			=> __( 'Título do Botão de Ação', 'model' ),
	'description'	=> esc_attr__( 'Título para o botão da sessão Call to Action.', 'model' ),
	'section'		=> 'acao',
	'default'		=> esc_attr__( 'Veja o repositório do Tema Model no Github!', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'link',
	'settings'		=> 'link_botao_section_acao',
	'label'			=> __( 'Link do Botão de Ação', 'model' ),
	'description'	=> esc_attr__( 'Link para o botão da sessão Call to Action.', 'model' ),
	'section'		=> 'acao',
	'default'		=> esc_url( 'https://github.com/everaldomatias/model/' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_acao',
	'label'			=> __( 'Imagem para a sessão "Ação"', 'model' ),
	'section'		=> 'acao',
	'description'	=> esc_attr__( 'Imagem de fundo para a sessão Ação.', 'model' ),
	'priority'		=> 10,
	'default'		=> esc_url( 'https://images.pexels.com/photos/373076/pexels-photo-373076.jpeg?auto=compress&cs=tinysrgb&h=960&w=1960' ),
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'color',
	'settings'		=> 'color_section_acao',
	'label'			=> __( 'Cor', 'model' ),
	'description'	=> esc_attr__( 'Cores para os textos da sessão Ação.', 'model' ),
	'section'		=> 'acao',
	'default'		=> '#333333',
	'transport'		=> 'refresh',
	'output'		=> array(
		array(
			'element'  => '#section-acao',
			'property' => 'color'
		),
		array(
			'element'  => '#section-acao .btn',
			'property' => 'color'
		),
		array(
			'element'  => '#section-acao .btn',
			'property' => 'border-color'
		),
	),
) );
/* Diferenciais */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_diferenciais',
	'label'			=> '',
	'section'		=> 'diferenciais',
	'default'		=> '<h1 style="text-align: center">Sessão Diferenciais</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_diferenciais',
	'label'		=> __( 'Usar sessão Diferenciais', 'model' ),
	'section'	=> 'diferenciais',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'menu_section_diferenciais',
	'label'			=> __( 'Título para o menu', 'model' ),
	'section'		=> 'diferenciais',
	'default'		=> esc_attr__( 'Diferenciais', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'text',
	'settings'    => 'titulo_section_diferenciais',
	'label'       => __( 'Título da Sessão Diferenciais', 'model' ),
	'description' => esc_attr__( 'Título para a sessão Diferenciais.', 'model' ),
	'section'     => 'diferenciais',
	'default'     => esc_attr__( 'Simples, direto e elegante.', 'model' ),
	'priority'    => 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'editor',
	'settings'		=> 'editor_section_diferenciais',
	'label'			=> __( 'Texto', 'model' ),
	'description'	=> esc_attr__( 'Esse tema foi desenvolvido com o objetivo de apresentar as informações mais importantes de forma simples, elegante e de fácil manutenção. Tudo ao seu controle, edite em poucos minutos, pelo celular, de onde estiver.', 'model' ),
	'section'		=> 'diferenciais',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
/* Blog */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_blog',
	'label'			=> '',
	'section'		=> 'blog',
	'default'		=> '<h1 style="text-align: center">Sessão Blog</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_blog',
	'label'		=> __( 'Usar sessão Blog', 'model' ),
	'section'	=> 'blog',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'menu_section_blog',
	'label'			=> __( 'Título para o menu', 'model' ),
	'section'		=> 'blog',
	'default'		=> esc_attr__( 'Blog', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_section_blog',
	'label'			=> __( 'Título para a sessão', 'model' ),
	'section'		=> 'blog',
	'default'		=> esc_attr__( 'Blog', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'background_section_blog',
	'label'       => __( 'Cor de fundo da sessão Blog', 'model' ),
	'section'     => 'blog',
	'default'     => '#000000',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-blog',
			'property' => 'background-color'
		),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'color_section_blog',
	'label'       => __( 'Cor das fontes', 'model' ),
	'description' => esc_attr__( 'Cores para os textos da sessão Blog.', 'model' ),
	'section'     => 'blog',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-blog h2.home-title',
			'property' => 'color'
		),
		array(
			'element'  => '#section-blog a.more',
			'property' => 'color'
		)
	),
) );

/* Doações */
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'custom',
	'settings'	=> 'section_doacoes',
	'label'		=> '',
	'section'	=> 'doacoes',
	'default'	=> '<h1 style="text-align: center">Sessão Doações</h1><hr>',
	'priority'	=> 10,
	'transport'	=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_doacoes',
	'label'		=> __( 'Usar sessão Doações', 'model' ),
	'section'	=> 'doacoes',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'menu_section_doacoes',
	'label'			=> __( 'Título para o menu', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_attr__( 'Colabore', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_doacoes',
	'label'			=> __( 'Imagem para a sessão "Doações"', 'model' ),
	'section'		=> 'doacoes',
	'description'	=> esc_attr__( 'Imagem de fundo para a sessão Doações.', 'model' ),
	'default'		=> esc_url( 'https://images.pexels.com/photos/259209/pexels-photo-259209.jpeg?auto=compress&cs=tinysrgb&h=960&w=1960' ),
	'priority'		=> 10,
	'transport'	=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'color',
	'settings'		=> 'color_section_doacoes',
	'label'			=> __( 'Cor', 'model' ),
	'description'	=> esc_attr__( 'Cores para os textos da sessão Doações.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> '#ffffff',
	'transport'		=> 'refresh',
	'output'		=> array(
		array(
			'element'  => '#section-doacoes',
			'property' => 'color'
		),
		array(
			'element'  => '#section-doacoes a.btn',
			'property' => 'color'
		),
		array(
			'element'  => '#section-doacoes a.btn',
			'property' => 'border-color'
		),
		array(
			'element'  => '#section-doacoes a.btn:hover',
			'property' => 'color'
		),
		array(
			'element'  => '#section-doacoes a.btn:hover',
			'property' => 'border-color'
		),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_section_doacoes',
	'label'			=> __( 'Título da Sessão Doações', 'model' ),
	'description' 	=> esc_attr__( 'Título para a sessão Doações.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_attr__( 'Ajude o Tema Model a continuar!', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'editor',
	'settings'		=> 'editor_section_doacoes',
	'label'			=> __( 'Texto', 'model' ),
	'description'	=> esc_attr__( 'Texto para a sessão Doações.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_attr__( 'O Tema Model é desenvolvido por voluntários e qualquer ajuda é bem vinda, seja com valore$, críticas construtivas, issues de melhorias e divulgação.', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_botao_section_doacoes_1',
	'label'			=> __( 'Título do Botão de Ação das Doações 1', 'model' ),
	'description'	=> esc_attr__( 'Título para o botão da sessão Doações 1.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_attr__( 'Doar qualquer quantia', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'link',
	'settings'		=> 'link_botao_section_doacoes_1',
	'label'			=> __( 'Link do Botão de Ação das Doações 1', 'model' ),
	'description'	=> esc_attr__( 'Link para o botão da sessão Doações 1.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=48LLGK4VPXMBJ' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_botao_section_doacoes_2',
	'label'			=> __( 'Título do Botão de Ação das Doações 2', 'model' ),
	'description'	=> esc_attr__( 'Título para o botão da sessão Doações 2.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_attr__( 'Propor melhorias', 'model' ),
	'priority' 		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'link',
	'settings'		=> 'link_botao_section_doacoes_2',
	'label'			=> __( 'Link do Botão de Ação das Doações 2', 'model' ),
	'description'	=> esc_attr__( 'Link para o botão da sessão Doações 2.', 'model' ),
	'section'		=> 'doacoes',
	'default'		=> esc_url( 'https://github.com/everaldomatias/model/issues' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/* Redes Sociais */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_social',
	'label'			=> '',
	'section'		=> 'social',
	'default'		=> '<h1 style="text-align: center">Sessão Redes Sociais</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_social',
	'label'		=> __( 'Usar sessão Social', 'model' ),
	'section'	=> 'social',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'background_section_social',
	'label'       => __( 'Cor de fundo da sessão Social', 'model' ),
	'section'     => 'social',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-social',
			'property' => 'background-color'
		),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'facebook',
	'label'			=> __( 'Facebook', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Facebook.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'instagram',
	'label'			=> __( 'Instagram', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Instagram.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'twitter',
	'label'			=> __( 'Twitter', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Twitter.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'tumblr',
	'label'			=> __( 'Tumblr', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Tumblr.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'flickr',
	'label'			=> __( 'Flickr', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Flickr.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'snapchat',
	'label'			=> __( 'Snapchat', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Snapchat.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'site',
	'label'			=> __( 'Site/Link externo', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu Site/Link externo.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'email',
	'label'			=> __( 'E-mail', 'model' ),
	'description'	=> esc_attr__( 'Adicione o seu e-mail.', 'model' ),
	'section'		=> 'social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/* Rodapé */
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'background_color_section_rodape',
	'label'       => __( 'Cor de fundo', 'model' ),
	'description' => esc_attr__( 'Cor de fundo do Rodapé.', 'model' ),
	'section'     => 'rodape',
	'default'     => '#000000',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => 'footer.site-footer',
			'property' => 'background-color'
		),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'color_section_rodape',
	'label'       => __( 'Cor das fontes', 'model' ),
	'description' => esc_attr__( 'Cores para os textos do Rodapé.', 'model' ),
	'section'     => 'rodape',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => 'footer.site-footer',
			'property' => 'color'
		),
		array(
			'element'  => 'footer.site-footer a',
			'property' => 'color'
		),
	),
) );