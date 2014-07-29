<?php 
/**
 * functions.php
 *
 * Theme's functions and defintions
 */

/**
 * -----------------------------------------------------------------------------------------------
 * 1.0 - Define constants.
 * -----------------------------------------------------------------------------------------------
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js');
define( 'FRAMEWORK', get_template_directory() . '/framework');

/**
 * -----------------------------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * -----------------------------------------------------------------------------------------------
 */

require_once( FRAMEWORK . '/init.php');

/**
 * -----------------------------------------------------------------------------------------------
 * 3.0 Setting up the content width value based on the theme's design.
 * -----------------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ){
	$content_width = 800;
}


/**
 * -----------------------------------------------------------------------------------------------
 * 4.0 Setting up theme default and register supported features.
 * -----------------------------------------------------------------------------------------------
 */
if (! function_exists( 'icebox_setup ') ) {
	function icebox_setup() {
		/** 
		 * Make the theme available for translation.
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'icebox', $lang_dir );

		/** 
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats', 
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * Add support for feed links such as RSS
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		/** 
		 * Register nav menus
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'icebox' )
				)
		);
	}

	add_action( 'after_theme_setup', 'icebox_setup' );
}



  ?>