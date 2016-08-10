<?php

require_once ( 'classes/OnaWhiteAngus/Controller.php' );

$ona_controller = new \OnaWhiteAngus\Controller;

add_action( 'after_setup_theme', array( $ona_controller, 'theme_setup' ) );
add_action( 'wp_enqueue_scripts', array( $ona_controller, 'enqueue_styles_and_scripts' ) );
add_action( 'admin_init', array( $ona_controller, 'editor_styles' ) );
add_action( 'widgets_init', array( $ona_controller, 'widgets_init' ) );
add_action( 'customize_register', array( $ona_controller, 'customizer' ) );
add_action( 'pre_post_update', array( $ona_controller, 'save_custom_page_meta' ) );

if ( is_admin() )
{
	add_action( 'add_meta_boxes', array( $ona_controller, 'page_layout_box' ) );
}