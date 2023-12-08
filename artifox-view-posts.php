<?php
/*
Plugin Name: ArtiFox View Posts
Description: ArtiFox View Posts WordPress Plugin
Version: 1.0.0
Author: artifox
Text Domain: artifox-view-posts
*/

define( 'ARTIFOX_VIEW_POSTS_NAME', wp_basename(__FILE__) );
define( 'ARTIFOX_VIEW_POSTS_URL', plugin_dir_url( __FILE__ ) );
define( 'ARTIFOX_VIEW_POSTS_ENTRY', __FILE__ );
define( 'ARTIFOX_VIEW_POSTS_DIR', WP_PLUGIN_DIR . '/artifox-view-posts' );
define( 'ARTIFOX_VIEW_POSTS_VERSION', '1.0.0' );
define( 'ARTIFOX_VIEW_POSTS_DOMAIN', 'artifox-view-posts' );
define( 'ARTIFOX_VIEW_POSTS_PREFIX', 'artifox_view_posts_' );
define( 'ARTIFOX_VIEW_POSTS_NONCE', 'artifox_view_posts_jYUvaCEPCrKN4LMQ' );

include_once "autoload.php";

\artifox\ViewPosts\Bootstrap\Bootstrap::instance()->init();