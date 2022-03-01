<?php
/**
 * @package musicblog
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function musicblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'musicblog_customize_register' );

/* Binds JS handlers to make Theme Customizer preview reload changes asynchronously. */
function musicblog_customize_preview_js() {
	wp_enqueue_script( 'musicblog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'musicblog_customize_preview_js' );
