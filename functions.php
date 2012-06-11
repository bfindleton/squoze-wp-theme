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
	 * Options Framework by Devin Price
	 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
		require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	}

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom post types
	 */
	require( get_template_directory() . '/inc/product-type.php' );

	// Get widgets.
	require( get_template_directory() . '/lib/class-widgets.php' );

	/**
	 * Shortcode class
	 */
    require( get_template_directory() . '/lib/class-shortcode-mgr.php' );

	/**
	 * Add the Shortcodes
	 */
	$scm = new Shortcode_Mgr();
	add_shortcode('squoze_catalog_category', array($scm, 'squoze_add_category'));
	add_shortcode('squoze_catalog_item',     array($scm, 'squoze_add_item'));

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
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'squoze' ),
	) );
	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'squoze' ),
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
 * Get layout and sidebar info
 */
 function squoze_get_layout() {

	 // Get layout and column spans
	switch ( of_get_option( 'sidebar_layout' ) ) {
		case 'both':
			get_sidebar( 'two' );
			$leftside = of_get_option( 'left_sidebar_columns', 3 );
			$rightside = of_get_option( 'right_sidebar_columns', 3 );
			$content_columns = 12 - $leftside - $rightside;
			wp_localize_script(
					'squoze-js',
					'layout_object',
					array(
						'layout' => 'both',
					)
			);
			break;
		case 'left':
			$leftside = of_get_option( 'left_sidebar_columns' );
			$content_columns = 12 - $leftside;
			$content_columns .= " float_right";
			break;
		case 'right':
			$rightside = of_get_option( 'right_sidebar_columns' );
			$content_columns = 12 - $rightside;
			break;
		default:
			$content_columns = 12;
			break;
	}
	
	return $content_columns;
}

function squoze_which_sidebars() {

	switch ( of_get_option( 'sidebar_layout' ) ) {
		case 'both':
			get_sidebar();
			break;
		case 'left':
		case 'right':
			get_sidebar();
			get_sidebar( 'two' );
			break;
		default:
			break;
	}
}

/**
 * Enqueue scripts and styles
 */
function squoze_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	if( $custom_styles = of_get_option( 'custom_styles' ) ) {
		wp_enqueue_style( 'squoze-custom-css', $custom_styles );
	}

	wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', false, '1.1.0' );	

	wp_enqueue_script( 'squoze-js', get_template_directory_uri() . '/js/squoze.js', array( 'jquery' ), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'squoze_scripts' );

/**
 * Implement the View feature
 */
function squoze_get_view($template, $args, $content = null) {
	$filename = get_template_directory() . '/views/' . $template;

	ob_start();
	include $filename;
	$view = ob_get_contents();
	ob_end_clean();

	return $view;
}

/**
 * Where the post has no post title, but must still display a link to the single-page post view.
 * Nicked from Emil Uzelac's Responsive theme
 */
add_filter('the_title', 'squoze_title');

function squoze_title($title) {
	if ($title == '') {
		return __('Untitled','squoze');
	} else {
		return $title;
	}
}

/**
 * Remove annoying, dangerous stuff
 */
function squoze_remove_version() {
	return '';
}
add_filter( 'the_generator', 'squoze_remove_version' );
remove_action( 'wp_head', 'wlwmanifest_link');
