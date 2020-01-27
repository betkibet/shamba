<?php
/**
 * bizplus functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bizplus
 */

/**
 * require bizplus int.
 */
require get_template_directory() . '/inc/init.php';

if ( ! function_exists( 'bizplus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bizplus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bizplus, use a find and replace
	 * to change 'bizplus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bizplus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	*Remove hearder color option from customizer
	*/
	// add_theme_support( 'custom-header' )
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );


	/*
	 * Enable support for image sizes on posts and pages.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 */
	add_image_size( 'bizplus-main-banner', 1370, 550, true );
	add_image_size( 'bizplus-sticky-post', 420, 336, true );
	add_image_size( 'bizplus-costume-medium', 270, 307, true );
	add_image_size( 'bizplus-small-post', 200, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bizplus' ),
		'social' => esc_html__( 'Social Menu', 'bizplus' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bizplus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*implimenting new feature from 4.5*/
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	   'height'      => 50,
	   'width'       => 165,
	   'flex-width' => true
	) );
}
endif;
add_action( 'after_setup_theme', 'bizplus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bizplus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bizplus_content_width', 640 );
}
add_action( 'after_setup_theme', 'bizplus_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */


/*Google Fonts*/
function bizplus_google_fonts() {
    global $bizplus_customizer_all_values;
	$fonts_url = '';
	$fonts     = array();


	$bizplus_font_family_body = $bizplus_customizer_all_values['bizplus-font-family-Primary'];
	$bizplus_font_family_title = $bizplus_customizer_all_values['bizplus-font-family-title'];
	$bizplus_font_family_sub_title = $bizplus_customizer_all_values['bizplus-font-family-subtitle'];
	$bizplus_font_family_site_identity = $bizplus_customizer_all_values['bizplus-font-family-site-identity'];
    
	$bizplus_fonts = array();
	$bizplus_fonts[]=$bizplus_font_family_body;
	$bizplus_fonts[]=$bizplus_font_family_title;
	$bizplus_fonts[]=$bizplus_font_family_sub_title;
	$bizplus_fonts[]=$bizplus_font_family_site_identity;

	  $bizplus_fonts_stylesheet = '//fonts.googleapis.com/css?family=';

	  $i  = 0;
	  for ($i=0; $i < count( $bizplus_fonts ); $i++) { 

	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'bizplus' ), $bizplus_fonts[$i] ) ) {
			$fonts[] = $bizplus_fonts[$i];
		}

	  }

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}


function bizplus_scripts() {
		/*google fonts*/
		wp_enqueue_style( 'google-fonts', bizplus_google_fonts() );

	 	/*animate*/
	    wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/frameworks/wow/css/animate.min.css', array(), '3.4.0' );/*added*/

		// mmenu
		wp_enqueue_style( 'jquery-mmenu-all-style', get_template_directory_uri() . '/assets/frameworks/mmenu/css/jquery.mmenu.all.css' );/*added*/
		
		// photobox
		wp_enqueue_style( 'jquery-photobox', get_template_directory_uri() . '/assets/frameworks/photobox/photobox.css' );/*added*/

		//slick main
	    wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick.css', array(), '3.4.0' );/*added*/
		
		//slick theme
	    wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick-theme.css', array(), '3.4.0' );/*added*/
		
		wp_enqueue_style( 'bizplus-style', get_stylesheet_uri() );
		
		// Script
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'), '2.8.3', true );

		wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );
		
		wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/frameworks/jquery.easing/jquery.easing.js', array('jquery'), '0.3.6', 1);

	    wp_enqueue_script('jquery-wow', get_template_directory_uri() . '/assets/frameworks/wow/js/wow.min.js', array('jquery'), '1.1.2', 1);

	    // mmenu
		wp_enqueue_script( 'jquery-mmenu', get_template_directory_uri() . '/assets/frameworks/mmenu/js/jquery.mmenu.min.all.js', array('jquery'), '4.7.5', false );

		/*cycle2 slider*/
		wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.js', array( 'jquery' ), '2.1.6', true );
		
    	wp_enqueue_script( 'jquery-cycle2-swipe', get_template_directory_uri() . '/assets/frameworks/cycle2/js/jquery.cycle2.swipe.js', array( 'jquery' ), '20121120', true );

    	// isotope
    	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/assets/frameworks/isotope/isotope.pkgd.js', array('jquery'), '3.0.1', true );
		
    	wp_enqueue_script( 'bizplus-support', get_template_directory_uri() . '/assets/js/bizplus-support.js',array('jquery'), '1.0.0', true);

    	// photobox
    	wp_enqueue_script( 'jquery-photobox', get_template_directory_uri() . '/assets/frameworks/photobox/jquery.photobox.js', array('jquery'), '1.9.2', true );
    	
    	// slick
    	wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/frameworks/slick/slick.min.js', array('jquery'), '1.6.0', 1);

		wp_enqueue_script('bizplus-custom', get_template_directory_uri() . '/assets/js/evision-custom.js', array('jquery'), '1.0.1', 1);

		wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bizplus_scripts' );

/*added admin css for meta*/
function bizplus_wp_admin_style($hook) {
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
        wp_register_style( 'bizplus-admin-css', get_template_directory_uri() . '/assets/css/admin-meta.css',array(), ''  );
        wp_enqueue_style( 'bizplus-admin-css' );
    }
}
add_action( 'admin_enqueue_scripts', 'bizplus_wp_admin_style' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/*update to pro link*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/bizplus/class-customize.php' );
