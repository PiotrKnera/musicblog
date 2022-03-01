<?php
/**
 * @package MusicBlog
 */

/**
 * Add theme support for Infinite Scroll.
 */
function musicblog_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'musicblog_jetpack_setup' );
