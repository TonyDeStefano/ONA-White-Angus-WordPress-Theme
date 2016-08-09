<?php

require_once ( 'classes/OnaWhiteAngus/Controller.php' );

$controller = new \OnaWhiteAngus\Controller;

add_action( 'after_setup_theme', array( $controller, 'theme_setup' ) );
add_action( 'wp_enqueue_scripts', array( $controller, 'enqueue_styles_and_scripts' ) );
add_action( 'admin_init', array( $controller, 'editor_styles' ) );
add_action( 'widgets_init', array( $controller, 'widgets_init' ) );
add_action( 'customize_register', array( $controller, 'customizer' ) );
add_action( 'pre_post_update', array( $controller, 'save_custom_page_meta' ) );

if ( is_admin() )
{
	add_action( 'add_meta_boxes', array( $controller, 'page_layout_box' ) );
}

/* ==========================================================================
 *  Include libs
 * ========================================================================== */

// hooks
require_once( 'inc/hooks.php' );

// Schema.org markup
require_once( 'inc/schemaorg.php' );