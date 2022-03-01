<?php
/**
 * @package musicblog
 */

/**
 * @param array $args Configuration arguments.
 * @return array
 */
function musicblog_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'musicblog_page_menu_args' );

/**
 * @param array $classes Classes for the body element.
 * @return array
 */
function musicblog_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'musicblog_body_classes' );

/**
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function musicblog_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'musicblog' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'musicblog_wp_title', 10, 2 );

/**
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function musicblog_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'musicblog_setup_author' );
