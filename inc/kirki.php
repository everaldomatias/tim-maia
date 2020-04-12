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
Kirki::add_panel( 'whatsapp', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'WhatsApp', 'odin' ),
    'description' => esc_attr__( 'Configurações do WhatsApp.', 'odin' ),
    'capability'  => 'edit_theme_options'
) );
Kirki::add_panel( 'rodape', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Rodapé', 'odin' ),
    'description' => esc_attr__( 'Configurações do Rodapé.', 'odin' ),
    'capability'  => 'edit_theme_options'
) );

/**
 * Sessões
 * ==============================================================================
 */

Kirki::add_section( 'tm_hidden', array(
    'title'          => __( 'Hidden' ),
    'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'panel'			=> 'sessoes',
    'theme_supports' => '', // Rarely needed.
) );

/**
 * Hidden
 */

Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'tm_sections_order',
	'label'			=> __( 'Hidden Values', 'model' ),
	'section'		=> 'tm_hidden',
	'priority'		=> 10,
	'transport'		=> 'postMessage'
) );






/**
 * 
 */

function tm_customizer_sortable( ) {

	$default_sections = array (

		'tm_menu' => array (
			'title'       => esc_html__( 'Menu', 'textdomain' ),
			'description' => esc_html__( 'Menu Description', 'textdomain' ),
		),
		'tm_nome' => array (
			'title'       => esc_html__( 'Nome', 'textdomain' ),
			'description' => esc_html__( 'Nome Description', 'textdomain' ),
		),
		'tm_sobre' => array (
			'title'       => esc_html__( 'Sobre', 'textdomain' ),
			'description' => esc_html__( 'Sobre Description', 'textdomain' ),
		),
		'tm_acao' => array (
			'title'       => esc_html__( 'Ação', 'textdomain' ),
			'description' => esc_html__( 'Ação Description', 'textdomain' ),
		),
		'tm_diferenciais' => array (
			'title'       => esc_html__( 'Diferenciais', 'textdomain' ),
			'description' => esc_html__( 'Diferenciais Description', 'textdomain' ),
		),
		'tm_blog' => array (
			'title'       => esc_html__( 'Blog', 'textdomain' ),
			'description' => esc_html__( 'Blog Description', 'textdomain' ),
		),
		'tm_doacoes' => array (
			'title'       => esc_html__( 'Doações', 'textdomain' ),
			'description' => esc_html__( 'Doações Description', 'textdomain' ),
		),
		'tm_social' => array (
			'title'       => esc_html__( 'Social', 'textdomain' ),
			'description' => esc_html__( 'Social Description', 'textdomain' ),
		)

	);


	/**
	 * The magic shortable!
	 */
	$sortable_sections = get_theme_mod( 'tm_sections_order' );

	if ( ! isset( $sortable_sections ) || empty( $sortable_sections ) ){
		set_theme_mod( 'tm_sections_order', implode( ',', array_keys( $default_sections ) ) );
	}

	$sortable_sections = explode( ',', $sortable_sections );

	foreach( $sortable_sections as $sortable_section ) {

		Kirki::add_section( $sortable_section, array(
			'title'       => $default_sections[$sortable_section]['title'],
			'description' => $default_sections[$sortable_section]['description'],
			'priority'		=> 10,
			'panel'       => 'sessoes'
		) );

	}

	/* Menu */
	Kirki::add_field( 'kirki_custom_config', array(
		'type'        => 'color',
		'settings'    => 'color_section_menu',
		'label'       => __( 'Cor de fundo', 'model' ),
		'description' => esc_attr__( 'Cor para fundo do menu superior.', 'model' ),
		'section'     => 'tm_menu',
		'default'     => 'rgba(34,34,34,0.85)',
		'transport'   => 'auto',
		'choices'     => array(
			'alpha' => true,
		),
		'output'    	=> array(
			array(
				'element'  => 'header.site-header .navbar.fixed-top',
				'property' => 'background-color'
			),
			array(
				'element'  => 'header.site-header .navbar.fixed-top .dropdown-menu',
				'property' => 'background-color'
			),
			array(
				'element'  => 'header.site-header .navbar.fixed-top .dropdown-menu .dropdown-item:hover',
				'property' => 'background-color'
			),
		),
	) );
	Kirki::add_field( 'kirki_custom_config', array(
		'type'        => 'color',
		'settings'    => 'color_section_menu_fonts',
		'label'       => __( 'Cor das fontes', 'model' ),
		'description' => esc_attr__( 'Cor das fontes do menu superior.', 'model' ),
		'section'     => 'tm_menu',
		'default'     => '#FFFFFF',
		'transport'   => 'auto',
		'output'    	=> array(
			array(
				'element'  => 'header.site-header .navbar-dark .navbar-nav .nav-link',
				'property' => 'color'
			),
		),
	) );







}
add_action( 'init', 'tm_customizer_sortable', 999 );








Kirki::add_section( 'whatsapp', array(
    'title'          => __( 'WhatsApp' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );
Kirki::add_section( 'rodape', array(
    'title'          => __( 'Rodapé' ),
    'priority'       => 150,
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
	'section'     => 'tm_nome',
	'default'		=> '<h1 style="text-align: center">Sessão Nome</h1><hr>',
	'priority'    => 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_nome',
	'label'			=> __( 'Imagem para a sessão "Nome"', 'model' ),
	'section'		=> 'tm_nome',
	'description'	=> esc_attr__( 'Imagem de fundo para a sessão Nome.', 'model' ),
	'default'		=> esc_url( 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'color_section_nome',
	'label'       => __( 'Cor', 'model' ),
	'description' => esc_attr__( 'Cores para o título da sessão Nome.', 'model' ),
	'section'     => 'tm_nome',
	'default'     => '#ffffff',
	'transport'   => 'auto',
	'output'    	=> array(
		array(
			'element'  => '#section-nome .container h1',
			'property' => 'color'
		),
		array(
			'element'  => '#section-nome .container .description p',
			'property' => 'color'
		),
	),
) );

/* Sobre */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_sobre',
	'label'			=> '',
	'section'		=> 'tm_sobre',
	'default'		=> '<h1 style="text-align: center">Sessão Sobre</h1><hr>',
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_sobre',
	'label'		=> __( 'Usar sessão Sobre', 'model' ),
	'section'	=> 'tm_sobre',
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
	'settings'		=> 'titulo_section_sobre',
	'label'			=> __( 'Título', 'model' ),
	'description'	=> esc_attr__( 'Título para a sessão Sobre.', 'model' ),
	'section'		=> 'tm_sobre',
	'default'		=> esc_attr__( 'Seja bem vindo ao Tema Model', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        	=> 'editor',
	'settings'    	=> 'editor_section_sobre',
	'label'       	=> __( 'Sobre', 'model' ),
	'description' 	=> esc_attr__( 'Descreva em poucos parágrafos quem é você, o que deseja e outras informações que julgar necessário.', 'model' ),
	'section'     	=> 'tm_sobre',
	'default'     	=> esc_attr__( 'Com ele, artistas, modelos, figuras públicas e muitas outras pessoas poderão criar um site simples e direto para se apresentarem ao mundo através da internet. Altere todos os textos e imagens que tem no 
	 à esquerda e clique em <strong>Publicar</strong>', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/* Ação */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_acao',
	'label'			=> '',
	'section'		=> 'tm_acao',
	'default'		=> '<h1 style="text-align: center">Sessão Call to Action</h1><hr>',
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'switch',
	'settings'    => 'use_acao',
	'label'       => __( 'Usar sessão Call to Action', 'model' ),
	'section'     => 'tm_acao',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_section_acao',
	'label'			=> __( 'Título', 'model' ),
	'description'	=> esc_attr__( 'Título para a sessão Call to Action.', 'model' ),
	'section'		=> 'tm_acao',
	'default'		=> esc_attr__( 'Call to Action', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'editor',
	'settings'		=> 'editor_section_acao',
	'label'			=> __( 'Texto', 'model' ),
	'description' 	=> esc_attr__( 'Faça uma chamada para o botão de ação.', 'model' ),
	'section'		=> 'tm_acao',
	'default'		=> esc_attr__( 'Aqui é um espaço para você criar uma chamada para o seu serviço/produto ou para outro objetivo em que deseja obter resultados.', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_botao_section_acao',
	'label'			=> __( 'Título do Botão de Ação', 'model' ),
	'description'	=> esc_attr__( 'Título para o botão da sessão Call to Action.', 'model' ),
	'section'		=> 'tm_acao',
	'default'		=> esc_attr__( 'Veja o repositório do Tema Model no Github!', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'link',
	'settings'		=> 'link_botao_section_acao',
	'label'			=> __( 'Link do Botão de Ação', 'model' ),
	'description'	=> esc_attr__( 'Link para o botão da sessão Call to Action.', 'model' ),
	'section'		=> 'tm_acao',
	'default'		=> esc_url( 'https://github.com/everaldomatias/model/' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_acao',
	'label'			=> __( 'Imagem para a sessão "Ação"', 'model' ),
	'section'		=> 'tm_acao',
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
	'section'		=> 'tm_acao',
	'default'		=> '#FFFFFF',
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
	'section'		=> 'tm_diferenciais',
	'default'		=> '<h1 style="text-align: center">Sessão Diferenciais</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_diferenciais',
	'label'		=> __( 'Usar sessão Diferenciais', 'model' ),
	'section'	=> 'tm_diferenciais',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'text',
	'settings'    => 'titulo_section_diferenciais',
	'label'       => __( 'Título da Sessão Diferenciais', 'model' ),
	'description' => esc_attr__( 'Título para a sessão Diferenciais.', 'model' ),
	'section'     => 'tm_diferenciais',
	'default'     => esc_attr__( 'Simples, direto e elegante.', 'model' ),
	'priority'    => 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'editor',
	'settings'		=> 'editor_section_diferenciais',
	'label'			=> __( 'Texto', 'model' ),
	'description'	=> esc_attr__( 'Esse tema foi desenvolvido com o objetivo de apresentar as informações mais importantes de forma simples, elegante e de fácil manutenção. Tudo ao seu controle, edite em poucos minutos, pelo celular, de onde estiver.', 'model' ),
	'section'		=> 'tm_diferenciais',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
/* Blog */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'custom',
	'settings'		=> 'section_blog',
	'label'			=> '',
	'section'		=> 'tm_blog',
	'default'		=> '<h1 style="text-align: center">Sessão Blog</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_blog',
	'label'		=> __( 'Usar sessão Blog', 'model' ),
	'section'	=> 'tm_blog',
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
	'settings'		=> 'titulo_section_blog',
	'label'			=> __( 'Título para a sessão', 'model' ),
	'section'		=> 'tm_blog',
	'default'		=> esc_attr__( 'Blog', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'background_section_blog',
	'label'       => __( 'Cor de fundo da sessão Blog', 'model' ),
	'section'     => 'tm_blog',
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
	'section'     => 'tm_blog',
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
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_botao_blog',
	'label'			=> __( 'Título para o botao de acesso ao Blog', 'model' ),
	'section'		=> 'tm_blog',
	'default'		=> esc_attr__( 'Ver o Blog', 'model' ),
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/* Doações */
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'custom',
	'settings'	=> 'section_doacoes',
	'label'		=> '',
	'section'	=> 'tm_doacoes',
	'default'	=> '<h1 style="text-align: center">Sessão Doações</h1><hr>',
	'priority'	=> 10,
	'transport'	=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_doacoes',
	'label'		=> __( 'Usar sessão Doações', 'model' ),
	'section'	=> 'tm_doacoes',
	'default'	=> '1',
	'priority'	=> 10,
	'transport'	=> 'refresh',
	'choices'	=> array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_section_doacoes',
	'label'			=> __( 'Imagem para a sessão "Doações"', 'model' ),
	'section'		=> 'tm_doacoes',
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
	'section'		=> 'tm_doacoes',
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
	'section'		=> 'tm_social',
	'default'		=> '<h1 style="text-align: center">Sessão Redes Sociais</h1><hr>',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'		=> 'switch',
	'settings'	=> 'use_social',
	'label'		=> __( 'Usar sessão Social', 'model' ),
	'section'	=> 'tm_social',
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
	'section'     => 'tm_social',
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
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'instagram',
	'label'			=> __( 'Instagram', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Instagram.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'twitter',
	'label'			=> __( 'Twitter', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Twitter.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'tumblr',
	'label'			=> __( 'Tumblr', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Tumblr.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'flickr',
	'label'			=> __( 'Flickr', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Flickr.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'snapchat',
	'label'			=> __( 'Snapchat', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu perfil no Snapchat.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'site',
	'label'			=> __( 'Site/Link externo', 'model' ),
	'description'	=> esc_attr__( 'Adicione o link para o seu Site/Link externo.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'email',
	'label'			=> __( 'E-mail', 'model' ),
	'description'	=> esc_attr__( 'Adicione o seu e-mail.', 'model' ),
	'section'		=> 'tm_social',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );

/**
 * WhatsApp >> Campos (separados por Sessões)
 * ==============================================================================
 */

Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'switch',
	'settings'    => 'use_whatsapp',
	'label'       => __( 'Usar o balão flutuante do WhatsApp', 'model' ),
	'section'     => 'whatsapp',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Sim', 'model' ),
		'off' => esc_attr__( 'Não', 'model' ),
	),
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'whatsapp',
	'label'			=> __( 'Nº do WhatsApp (Cód. País + DDD + Número)', 'model' ),
	'description'	=> esc_attr__( 'Adicione o número do WhatsApp.', 'model' ),
	'section'		=> 'whatsapp',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'text',
	'settings'		=> 'titulo_whatsapp',
	'label'			=> __( 'Botão', 'model' ),
	'description'	=> esc_attr__( 'Título para o botão do WhatsApp. Deixem em branco para usar apenas o ícone.', 'model' ),
	'section'		=> 'whatsapp',
	'default'		=> 'WhatsApp',
	'priority'		=> 10,
	'transport'		=> 'refresh'
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'textarea',
	'settings'		=> 'frase_whatsapp',
	'label'			=> __( 'Frase personalizada para a mensagem inicial do WhatsApp', 'model' ),
	'section'		=> 'whatsapp',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'auto'
) );


/**
 * Campos (separados por Sessões)
 * ==============================================================================
 */

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
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'textarea',
	'settings'		=> 'frase_rodape',
	'label'			=> __( 'Frase personalizada do Rodapé', 'model' ),
	'section'		=> 'rodape',
	'default'		=> '',
	'priority'		=> 10,
	'transport'		=> 'auto'
) );

/* Outros */
Kirki::add_field( 'kirki_custom_config', array(
	'type'			=> 'image',
	'settings'		=> 'image_parallax_default',
	'label'			=> __( 'Imagem padrão para o Parallax', 'model' ),
	'section'		=> 'outros',
	'description'	=> esc_attr__( 'Imagem padrão de fundo para o Parallax.', 'model' ),
	'default'		=> esc_url( 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960' ),
	'priority'		=> 10,
) );
Kirki::add_field( 'kirki_custom_config', array(
	'type'        => 'color',
	'settings'    => 'background_color_overlay',
	'label'       => __( 'Cor das camadas de transparência', 'model' ),
	'section'     => 'outros',
	'default'     => 'rgba(0,0,0,0.25)',
	'transport'   => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output'    	=> array(
		array(
			'element'  => '.parallax-window .overlay',
			'property' => 'background-color'
		),
	),
) );



//
function tm_customizer_sections_panel( $wp_customize ){
	$wp_customize->add_panel( 'tm_panel_panelname1', array(
		'title'    => esc_html__( 'My Panel', 'textdomain' ),
		'priority' => 10
	) );

	$wp_customize->add_section( 'tm_hidden_sectionname1', array(
		'title'       => esc_html__( 'Section hidden', 'textdomain' ),
		'panel'       => 'tm_panel_panelname1',
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
				'label'    => esc_html__( 'Section layout', 'textdomain' ),
				'section'  => 'tm_hidden_sectionname1',
			)
		)
	);

	$default_sections = array (
		'tm_menu' => array (
			'title'       => esc_html__( 'Menu Novo', 'textdomain' ),
			'description' => esc_html__( 'Section 1 Description', 'textdomain' ),
		),
		'tm_nome' => array (
			'title'       => esc_html__( 'Nome Novo', 'textdomain' ),
			'description' => esc_html__( 'Section 2 Description', 'textdomain' ),
		)
	);

	$sortable_sections = get_theme_mod('tm_sections_order');
	if( !isset( $sortable_sections ) || empty( $sortable_sections ) ){
		set_theme_mod( 'tm_sections_order', implode(',', array_keys( $default_sections ) ) );
	}
	$sortable_sections = explode(',', $sortable_sections );

	foreach( $sortable_sections as $sortable_section ){
		$wp_customize->add_section( $sortable_section, array(
			'title'       => $default_sections[$sortable_section]['title'],
			'description' => $default_sections[$sortable_section]['description'],
			'panel'       => 'tm_panel_panelname1'
		) );
	}

	$wp_customize->add_setting(
		'myprefix_section1_layout', array(
			'default'           => 'classic',
			'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'section1_layout',
			array(
				'settings' => 'myprefix_section1_layout',
				'type'     => 'radio',
				'label'    => esc_html__( 'Section layout', 'textdomain' ),
				'section'  => 'tm_section_sectionname1',
				'choices'  => array(
					'classic'          => esc_html__( 'Classic', 'textdomain' ),
					'grid'             => esc_html__( 'Grid', 'textdomain' ),
					'list'             => esc_html__( 'List', 'textdomain' ),
				)
			)
		)
	);

	$wp_customize->add_setting(
		'myprefix_section2_layout', array(
			'default'           => 'classic',
			'sanitize_callback' => 'wp_kses_post'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'section2_layout',
			array(
				'settings' => 'myprefix_section2_layout',
				'type'     => 'radio',
				'label'    => esc_html__( 'Section layout', 'textdomain' ),
				'section'  => 'tm_section_sectionname2',
				'choices'  => array(
					'classic'          => esc_html__( 'Classic', 'textdomain' ),
					'grid'             => esc_html__( 'Grid', 'textdomain' ),
					'list'             => esc_html__( 'List', 'textdomain' ),
				)
			)
		)
	);

	
}

//add_action( 'customize_register', 'tm_customizer_sections_panel' );

