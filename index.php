<?php
/*
Plugin Name: WPPlayer
Description: This is my first attempt on writing a versitile plugin. Biiird is a name of my studio, hence some naming refers to it.
Version: 1.0.0
Author: Mike Kuczek
Author URI: https://michalkuczek.pl
License: GPLv3
Text Domain: biiird-player
*/

defined( 'ABSPATH' ) or die( 'Set your aim straight.' );

define( 'BIIIRD_PLAYER_PATH', plugin_dir_path( __FILE__ ) );
define( 'BIIIRD_PLAYER_URL', plugin_dir_url( __FILE__ ) );
define( 'BIIIRD_PLAYER', plugin_basename( __FILE__ ) );
define( 'BIIIRD_PLAYER_VERSION', '1.0.0' );
define( 'BIIIRD_ENV_DEV', true );


add_action( 'wp_enqueue_scripts', 'wpplayer_enqueue' );

function wpplayer_enqueue() {
	$version = ( BIIIRD_ENV_DEV === true ) ? time() : BIIIRD_THEME_VERSION;
	if ( is_singular() && false !== strpos( get_queried_object()->post_content, '<!-- wp:audio' ) ) {
		wp_enqueue_script( 'wp-player', BIIIRD_PLAYER_URL . 'assets/js/wp-player.js', [], $version, true );
	}
}
