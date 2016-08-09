<?php

namespace OnaWhiteAngus;

class Controller {

	const VERSION = '1.0.0';
	const VERSION_CSS = '1.0.0';
	const VERSION_JS = '1.0.0';

	public function theme_setup()
	{
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		register_nav_menus( array(
			'main_menu'    => __( 'Main Menu', 'ona-white-angus' ),
			'secondary_menu' => __( 'Secondary Menu', 'ona-white-angus' )
		) );
	}

	public function enqueue_styles_and_scripts()
	{
		wp_enqueue_style( 'ona-white-angus-fonts', 'https://fonts.googleapis.com/css?family=PT+Serif:400,700|Open+Sans:400,400italic,700,700italic&amp;subset=latin,cyrillic', array(), true );
		wp_enqueue_style( 'ona-white-angus-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array() );
		wp_enqueue_style( 'ona-white-angus-bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array() );
		wp_enqueue_style( 'ona-white-angus-styles', get_stylesheet_uri(), array(), ( WP_DEBUG ) ? time() : self::VERSION_CSS );

		wp_enqueue_script( 'ona-white-angus-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'ona-white-angus-font-awesome', 'https://use.fontawesome.com/0753562cc9.js', array() );
	}

	public function editor_styles()
	{
		add_editor_style( 'editor-style.css' );
	}

	public function widgets_init()
	{
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'ona-white-angus' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'ona-white-angus' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<p class="wtitle">',
			'after_title'   => '</p>',
		) );
	}
}