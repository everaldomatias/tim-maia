<?php
/**
 *
 */

add_action( 'after_switch_theme', 'string_default' );

function string_default() {
	if ( false === ( $strings_default = get_transient( 'strings_default' ) ) ) {
		$default = array();
		$default['titulo_section_acao'] = 'Call to Action';
		$default['titulo_section_sobre'] = 'Seja bem vindo ao Tema Model';
		$default['editor_section_sobre'] = 'Com ele, artistas, modelos, figuras públicas e muitas outras pessoas poderão criar um site simples e direto para se apresentarem ao mundo através da internet. Altere todos os textos e imagens que tem no menu à esquerda e clique em <strong>Publicar</strong>';
		$strings_default = $default;
		set_transient( 'strings_default', $strings_default, WEEK_IN_SECONDS );
	}
}