<?php
/*
Plugin Name: White Label GP
Plugin URI: https://github.com/WestCoastDigital/gp-whitelabel
Description: Whitelabel GP with jQuery scripts
Version: 1.0.0
Author: Jon Mather
Author URI: https://github.com/WestCoastDigital/
Text Domain: gp-whitelabel
Domain Path: /languages
*/

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

if( function_exists('acf_add_options_page') ) {
	require_once 'inc/acf.php';
	require_once 'inc/functions.php';
} else {
	require_once 'inc/settings.php';
	require_once 'inc/functions.php';
}