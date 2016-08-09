<?php

require_once ( 'classes/OnaWhiteAngus/Controller.php' );

$controller = new \OnaWhiteAngus\Controller;

add_action( 'after_setup_theme', array( $controller, 'theme_setup' ) );
add_action( 'wp_enqueue_scripts', array( $controller, 'enqueue_styles_and_scripts' ) );
add_action( 'admin_init', array( $controller, 'editor_styles' ) );
add_action( 'widgets_init', array( $controller, 'widgets_init' ) );

/* ==========================================================================
 *  Include libs
 * ========================================================================== */

// functions what display some page parts
require_once( 'inc/html-blocks.php' );

// layout functions and filters
require_once( 'inc/layout.php' );

// hooks
require_once( 'inc/hooks.php' );

// Schema.org markup
require_once( 'inc/schemaorg.php' );

// theme options with Customizer API
require_once( 'inc/admin/options.php' );
require_once( 'inc/customizer/customizer-controls.php' );
require_once( 'inc/customizer/customizer-settings.php' );
require_once( 'inc/customizer/customizer.php' );

if ( is_admin() )
{
	// meta-box for layout control
	require_once( 'inc/admin/meta-boxes.php' );
}