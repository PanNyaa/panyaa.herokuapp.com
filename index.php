<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
 
/* herokuに置いたライブラリ群を、vendor/autoload.phpでここで読み込むことですべてのphp内で使えるようになるぞ！ */
require_once('vendor/autoload.php');
use Controllers\MyController;

define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

