<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ), false );
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

add_action( 'wp_enqueue_scripts', 'understrap_custom_scripts', 20 );

function understrap_custom_scripts() {
	$the_theme = wp_get_theme();


	wp_enqueue_script( 'typing-carousel', get_template_directory_uri() . '/js/typing-carousel.js', array('jquery'), $the_theme->get( 'Version' ), true );
}


add_action( 'init', 'ns_enqueue_scripts' );
function ns_enqueue_scripts() {

	require_once(dirname(__FILE__)."/../helpers/helper_enqueue_file.php");
	$helperReg = new NSHelperEnqueueFile();

	$helperReg->registrateScript(
		"ns-timeline-settings", 
		get_template_directory_uri() . "/widgets/js/timeline-settings.js", 
		array('jquery'), 
		dirname(__FILE__) . "/../widgets/js/timeline-settings.js"
	);

	$helperReg->registrateScript(
		"ns-columns-settings", 
		get_template_directory_uri() . "/widgets/js/columns-settings.js", 
		array('jquery'), 
		dirname(__FILE__) . "/../widgets/js/columns-settings.js"
	);	

}

