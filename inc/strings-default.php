<?php
/**
 * 
 * Organiza as strings padrões usadas no Tema com Transients API
 * 
 * @author 		Everaldo Matias <http://everaldomatias.github.io>
 * @version 	0.1
 * @since 		05/04/2018
 * @see 		https://codex.wordpress.org/Transients_API
 * @return 		string
 * 
 */

add_action( 'after_switch_theme', 'string_default' );

function string_default() {
	if ( false === ( $strings_default = get_transient( 'strings_default' ) ) ) {
		
		$default = array();
		
		/* Sessão Nome */
		$default['image_section_nome']		= 'https://images.pexels.com/photos/830858/pexels-photo-830858.png?auto=compress&cs=tinysrgb&h=960&w=1960';

		/* Sessão Sobre */
		$default['titulo_section_sobre']	= 'Seja bem vindo ao Tema Model';
		$default['editor_section_sobre']	= 'Com ele, artistas, modelos, profissionais autônomos, figuras públicas e muitas outras pessoas poderão criar um site simples e direto para se apresentarem ao mundo através da internet. Altere todos os textos e imagens que tem no menu à esquerda e clique em <strong>Publicar</strong>';

		/* Sessão Ação */
		$default['titulo_section_acao']			= 'Call to Action';
		$default['editor_section_acao']			= 'Aqui é um espaço para você criar uma chamada para o seu serviço/produto ou para outro objetivo em que deseja obter resultados.';
		$default['titulo_botao_section_acao']	= 'Veja o repositório do Tema Model no Github!';
		$default['link_botao_section_acao']		= 'https://github.com/everaldomatias/model/';
		$default['image_section_acao']			= 'https://images.pexels.com/photos/373076/pexels-photo-373076.jpeg?auto=compress&cs=tinysrgb&h=960&w=1960';

		/* Sessão Diferenciais */
		$default['titulo_section_diferenciais']	= 'Simples, direto e elegante.';
		$default['editor_section_diferenciais']	= 'Esse tema foi desenvolvido com o objetivo de apresentar as informações mais importantes de forma simples, elegante e de fácil manutenção. Tudo ao seu controle, edite em poucos minutos, pelo celular, de onde estiver.';

		/* Sessão Doações */
		$default['titulo_section_doacoes'] = 'Ajude o Tema Model a continuar!';

		/* Sessão Social */
		$default['facebook']	= 'https://facebook.com';
		$default['instagram']	= 'https://instagram.com/eve14_osli';
		$default['twitter']		= 'https://twiter.com/matiaseveraldo';
		$default['tumblr'] 		= 'https://tumblr.com';
		$default['snapchat']	= 'https://snapchat.com';
		$default['flickr']		= 'https://flickr.com';
		$default['site']		= 'http://everaldomatias.github.io';
		$default['email']		= '';
		
		$strings_default = $default;
		set_transient( 'strings_default', $strings_default, WEEK_IN_SECONDS );
	}
}