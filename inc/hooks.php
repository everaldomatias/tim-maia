<?php

/* Adiciona a Sessão Social */
add_action( 'before-footer', 'get_template_section_social' );

/* Adiciona o botão flutuante do WhatsApp */
add_action( 'wp_footer', 'show_whatsapp' );