<?php
/*
Plugin Name: mowomo Analytics code
Plugin URI: https://mowomo.com/
Description: Insert Google Analytics code in your WordPress, it's simple!.
Author: mowomo
Author URI: https://mowomo.com/sobre-nosotros

Version: 1.0.4
License: GPLv2 o cualquier versión posterior.


  ,dPYba,,adPYba,    ,adPPYba,   88,     ,,      ba    ,adPPYba,    ,dPYba,,adPYba,    ,adPPYba,
 8P'   "88"    "8a  a8"     "8a  88     "88"     8a  a8"     "8a   8P'   "88"    "8a  a8"     "8a
88      88      88  8b       d8  88      88      88  8b       d8  88      88      88  8b       d8
88      88      88  "8a,   ,a8"  88b'  '8888'  'dd8  "8a,   ,a8"  88      88      88  "8a,   ,a8"
88      88      88   `"YbbdP"'    '8dbvba''adbna8'    `"YbbdP"'   88      88      88   `"YbbdP"'



*/
/**
 * mowomo-analytics-code
 *
 * @since      1.0.0
 */

define( 'MWMAC_PLUGIN', __FILE__ );
define( 'MWMAC_PLUGIN_DIR', untrailingslashit( dirname( MWMAC_PLUGIN ) ) );

require_once MWMAC_PLUGIN_DIR . '/configuracion.php';
require_once MWMAC_PLUGIN_DIR . '/insert-snippet.php';
