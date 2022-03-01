<?php
/**
 * MusicBlog functions
 *
 * @package MusicBlog
 */


if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

if ( ! function_exists( 'musicblog_setup' ) ) :

function musicblog_setup() {

	load_theme_textdomain( 'musicblog', get_template_directory() . '/languages' );

	/* Enable support for Post Thumbnails on posts and pages. */
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'musicblog' ),
		'footer' => __( 'Footer Menu', 'musicblog' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/* Enable support for Post Formats.*/
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'musicblog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;

add_action( 'after_setup_theme', 'musicblog_setup' );

function musicblog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'musicblog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Extra Sidebar', 'musicblog' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'musicblog_widgets_init' );

function musicblog_scripts() {
	wp_enqueue_style( 'musicblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'musicblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'musicblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'musicblog_scripts' );

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates. */
require get_template_directory() . '/inc/extras.php';

/** Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/** Load Jetpack compatibility file. */
require get_template_directory() . '/inc/jetpack.php';

/** Replaces the excerpt "more" text by a link. */
function new_excerpt_more($more) {
    global $post;
	return '... <a class="moretag" href="'. get_permalink($post->ID) . '"> continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

