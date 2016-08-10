<?php

namespace OnaWhiteAngus;

class Controller {

	const VERSION = '1.0.0';
	const VERSION_CSS = '1.0.1';
	const VERSION_JS = '1.0.0';

	const APP_NAME = 'ona_white_angus';
	const THEME_URI = 'http://www.onawhiteangus.com';
	const OPTION_NAME = 'ona_theme_options_ona_white_angus';

	const MENU_MAIN = 'ona_main_menu';
	const MENU_SECONDARY = 'ona_secondary_menu';

	public function theme_setup()
	{
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		register_nav_menus( array(
			self::MENU_MAIN => __( 'ONA Main Menu', 'ona-white-angus' ),
			self::MENU_SECONDARY => __( 'ONA Secondary Menu', 'ona-white-angus' )
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
		wp_enqueue_script( 'spokane-white-angus-js', get_template_directory_uri() . '/js/ona-white-angus.js', array( 'jquery' ), ( WP_DEBUG ) ? time() : self::VERSION_JS, TRUE );
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

	/**
	 * @param \WP_Customize_Manager $wp_customize
	 */
	public function customizer( $wp_customize )
	{
		$wp_customize->get_section( 'header_image' )->title    = __( 'Header', 'ona-white-angus' );
		$wp_customize->get_section( 'header_image' )->priority = 30;

		$wp_customize->add_control( 'layout_home_control',
			array(
				'settings'        => self::OPTION_NAME . '[layout_home]',
				'label'           => __( "Layout on Home", 'ona-white-angus' ),
				'section'         => 'layout',
				'active_callback' => 'is_home',
				'type'            => 'select',
				'choices'         => array(
					'rightbar' => __( "Rightbar", 'ona-white-angus' ),
					'leftbar'  => __( "Leftbar", 'ona-white-angus' ),
					'full'     => __( "Fullwidth Content", 'ona-white-angus' ),
					'center'   => __( "Centered Content", 'ona-white-angus' ),
					'lala'   => __( "lala Content", 'ona-white-angus' )
				),
			)
		);
	}

	public function page_layout_box()
	{
		add_meta_box( 'ona-page-layout', __( 'Select Layout', 'ona-white-angus' ), array( $this, 'ona_page_layout' ), 'page', 'side', 'default' );
	}

	public function ona_page_layout()
	{
		global $post;

		$page_layout = $this->get_default_page_layouts();

		wp_nonce_field( basename( __FILE__ ), 'ona_meta_box_nonce' );

		foreach ( $page_layout as $field )
		{
			$layout_meta = get_post_meta( $post->ID, $field['id'], TRUE );

			if ( empty( $layout_meta ) )
			{
				$layout_meta = 'default';
			}

			echo '
				<label>
					<input type="radio" name="' . $field['id'] . '" value="' . $field['value'] . '" ' . checked( $field['value'], $layout_meta, FALSE ) . '>
					' . $field['label'] . '
				</label><br>';
		}
	}

	public function get_default_page_layouts()
	{
		return array(
			'default-layout' => array(
				'id'    => 'ona_page_layout',
				'value' => 'default',
				'label' => __( 'Default', 'ona-white-angus' )
			),
			'rightbar'       => array(
				'id'    => 'ona_page_layout',
				'value' => 'rightbar',
				'label' => __( 'Rightbar', 'ona-white-angus' )
			),
			'leftbar'        => array(
				'id'    => 'ona_page_layout',
				'value' => 'leftbar',
				'label' => __( 'Leftbar', 'ona-white-angus' )
			),
			'full'           => array(
				'id'    => 'ona_page_layout',
				'value' => 'full',
				'label' => __( 'Fullwidth Content', 'ona-white-angus' )
			)
		);
	}

	public function save_custom_page_meta( $post_id )
	{
		$page_layout = $this->get_default_page_layouts();

		// Verify the nonce before proceeding.
		if ( ! isset( $_POST['ona_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ona_meta_box_nonce'], basename( __FILE__ ) ) )
		{
			return FALSE;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		{
			return FALSE;
		}

		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		elseif ( ! current_user_can( 'edit_post', $post_id ) )
		{
			return $post_id;
		}

		foreach ( $page_layout as $field )
		{
			$old = get_post_meta( $post_id, $field['id'], TRUE );
			$new = isset( $_POST[ $field['id'] ] ) ? $_POST[ $field['id'] ] : 'default';
			if ( $new && $new != $old )
			{
				update_post_meta( $post_id, $field['id'], $new );
			}
			elseif ( '' == $new && $old )
			{
				delete_post_meta( $post_id, $field['id'], $old );
			}
		}

		return TRUE;
	}

	public function get_theme_option( $key )
	{
		$cache = wp_cache_get( self::OPTION_NAME );
		if ( $cache )
		{
			return ( isset( $cache[ $key ] ) ) ? $cache[ $key ] : FALSE;
		}

		$opt = get_option( self::OPTION_NAME );

		wp_cache_add( self::OPTION_NAME, $opt );

		return ( isset( $opt[ $key ] ) ) ? $opt[ $key ] : FALSE;
	}

	public function has_left_side_bar()
	{
		/** @var \WP_Post $post */
		global $post;

		$layout = get_post_meta( $post->ID, 'ona_page_layout', FALSE );

		if ( $layout[0] == 'leftbar' )
		{
			return TRUE;
		}

		return FALSE;
	}

	public function has_right_side_bar()
	{
		/** @var \WP_Post $post */
		global $post;

		$layout = get_post_meta( $post->ID, 'ona_page_layout', FALSE );

		if ( $layout[0] == 'rightbar' )
		{
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * @param $menu
	 *
	 * @return \WP_Post[]
	 */
	public function get_menu_items( $menu )
	{
		$menu_locations = get_nav_menu_locations();
		$menu = $menu_locations[ $menu ];
		$menu = wp_get_nav_menu_items( $menu );

		return ( $menu === FALSE ) ? array() : $menu;
	}
}