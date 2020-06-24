<?php

/**
 * 
 * Add title on internal pages
 * 
 * @see /inc/template-functions.php
 * 
 */
add_action( 'after-header', 'tm_title_pages' );

/* Adiciona a Sessão Social */
add_action( 'before-footer', 'get_template_section_social' );

/* Adiciona o botão flutuante do WhatsApp */
add_action( 'wp_footer', 'show_whatsapp' );