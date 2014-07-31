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

	add_action( 'after_setup_theme', 'icebox_setup' );
}


/**
 * -----------------------------------------------------------------------------------------------
 * 5.0 Display meta information for a specific post
 * -----------------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'icebox_post_meta' ) ) {
	function icebox_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'icebox' ) . '</li>';
			}

			// Get post author
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// Get the date
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

			// The categories
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// The tags
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
			}

			// Comments link
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a comment', 'icebox' ), __( 'One comment so far', 'icebox' ), __( 'View all % comments', 'icebox') );
				echo '</span';
				echo '</li>';
			endif;

			// Edit link
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'icebox' ), '<span class="meta-edit">', '</span>');
				echo '</li>';
			}
		}
	}
}
/**
 * -----------------------------------------------------------------------------------------------
 * 6.0 Display navigation to the next/previous set of posts.
 * -----------------------------------------------------------------------------------------------
 */
if (! function_exists( 'icebox_paging_nav' ) ) {
	function icebox_paging_nav() { ?>
		<ul>
			<?php 
				if ( get_previous_posts_link() ) : ?>
				<li class="next">
					<?php previous_posts_link( __( 'Newer Posts &rarr;', 'icebox' ) ) ?>
				</li>
				<?php endif;
			 ?>
			 <?php 
				if ( get_next_posts_link() ) : ?>
				<li class="previous">
					<?php next_posts_link( __( '&larr; Older Posts', 'icebox' ) ) ?>
				</li>
				<?php endif;
			 ?>
		</ul> <?php
	}
}
?>