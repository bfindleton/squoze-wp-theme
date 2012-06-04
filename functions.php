<?php
/**
 * squoze functions and definitions
 *
 * @package squoze
 * @since squoze 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since squoze 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'squoze_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since squoze 1.0
 */
function squoze_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	// Get About widget.
	require( get_template_directory() . '/inc/widgets.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'squoze' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'squoze', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 280, 210, true ); // default thumbnail size
	add_image_size( 'screen-shot', 720, 540 ); // full size screen

	/**
	 * Add custom background support
	 */
	add_theme_support( 'custom-background' );

	/**
	 * Add custom header support
	 */
	add_theme_support( 'custom-header' );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'squoze' ),
	) );
}
endif; // squoze_setup
add_action( 'after_setup_theme', 'squoze_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since squoze 1.0
 */
function squoze_widgets_init() {
	register_widget( 'Squoze_About_Widget' );

	register_sidebar( array(
		'name' => __( 'Sidebar One', 'squoze' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar Two', 'squoze' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar widget area', 'squoze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Area One', 'squoze' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'squoze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'squoze' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'squoze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'squoze' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'squoze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Four', 'squoze' ),
		'id' => 'sidebar-6',
		'description' => __( 'An optional widget area for your site footer', 'squoze' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'squoze_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes and styles for the footer
 */
function squoze_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

function squoze_footer_sidebar_size() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;
		
	$style = '';

	switch ( $count ) {
		case '1':
			$style = '100';
			break;
		case '2':
			$style = '50';
			break;
		case '3':
			$style = '33.3';
			break;
		case '4':
			$style = '25';
			break;
	}

	if ( $style )
		echo 'style="width:' . $style . '%;"';
}


/**
 * Enqueue scripts and styles
 */
function squoze_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js' );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'squoze_scripts' );

/**
 * Implement the Custom Header feature
 */
// require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Remove annoying stuff
 */
remove_action('wp_head', 'wp_generator');