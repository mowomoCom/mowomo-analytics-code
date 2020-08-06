<?php
/*
Plugin Name: mowomo Analytics code
Plugin URI: https://mowomo.com/
Description: Insert Google Analytics code in your WordPress, it's simple!.
Author: mowomo
Author URI: https://mowomo.com/sobre-nosotros

Version: 1.0.4
License: GPLv2 o cualquier versión posterior.
Text Domain: mwm_ana


*/
/**
 * mowomo-analytics-code
 *
 * @since      1.0.0
 */

define( 'MWMAC_PLUGIN', __FILE__ );
define( 'MWMAC_PLUGIN_DIR', untrailingslashit( dirname( MWMAC_PLUGIN ) ) );
/* 
require_once MWMAC_PLUGIN_DIR . '/configuracion.php'; */

// Constants
if ( !defined( 'ABSPATH' ) )    exit;
if ( !defined( 'mwm_ana_NAME' ) )  define( 'mwm_ana_NAME', 'mowomo Mantenimiento' );
if ( !defined( 'mwm_ana_SLUG' ) )  define( 'mwm_ana_SLUG', 'mwm_ana' );
if ( !defined( 'mwm_ana_VER' ) )   define( 'mwm_ana_VER', '1.0.0' );
if ( !defined( 'mwm_ana_TD' ) )    define( 'mwm_ana_TD', mwm_ana_SLUG . '_textdomain' );
if ( !defined( 'mwm_ana_FILE' ) )  define( 'mwm_ana_FILE', __FILE__ );
if ( !defined( 'mwm_ana_URL' ) )   define( 'mwm_ana_URL', plugins_url('/', mwm_ana_FILE) );
if ( !defined( 'mwm_ana_JS' ) )    define( 'mwm_ana_JS', mwm_ana_URL . 'assets/js/' );
if ( !defined( 'mwm_ana_CSS' ) )   define( 'mwm_ana_CSS', mwm_ana_URL . 'assets/css/' );
if ( !defined( 'mwm_ana_IMG' ) )   define( 'mwm_ana_IMG', mwm_ana_URL . 'assets/images/' );
if ( !defined( 'mwm_ana_DIR' ) )   define( 'mwm_ana_DIR', plugin_dir_path( mwm_ana_FILE ) );
if ( !defined( 'mwm_ana_INC' ) )   define( 'mwm_ana_INC', mwm_ana_DIR . 'includes/' );
if ( !defined( 'mwm_ana_TPL' ) )   define( 'mwm_ana_TPL', mwm_ana_DIR . 'templates/' );

// Included files
include_once mwm_ana_INC.'functions.php';

// Enqueue assets
if (!function_exists('mwm_ana_enqueue_scripts')) {
    function mwm_ana_enqueue_scripts() {
        wp_register_script(mwm_ana_SLUG.'_scripts', mwm_ana_JS.'scripts.js', array('jquery'), mwm_ana_VER, true );
        wp_register_style(mwm_ana_SLUG.'_styles', mwm_ana_CSS.'styles.css', array(), mwm_ana_VER );
        wp_enqueue_script(mwm_ana_SLUG.'_scripts');
        wp_enqueue_style(mwm_ana_SLUG.'_styles');
    }
    add_action('wp_enqueue_scripts', 'mwm_ana_enqueue_scripts', 999);
}

// Enqueue admin assets
if (!function_exists('mwm_ana_enqueue_admin_scripts')) {
    function mwm_ana_enqueue_admin_scripts() {
        wp_register_script(mwm_ana_SLUG.'_admin_scripts', mwm_ana_JS.'admin_scripts.js', array('jquery'), mwm_ana_VER, true );
        wp_register_style(mwm_ana_SLUG.'_admin_styles', mwm_ana_CSS.'admin_styles.css', array(), mwm_ana_VER );

        wp_enqueue_script(mwm_ana_SLUG.'_admin_scripts');
        wp_enqueue_style(mwm_ana_SLUG.'_admin_styles');

        wp_localize_script( mwm_ana_SLUG.'_admin_scripts', 'mwm_ana_admin_data', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
        
    }
    add_action('admin_enqueue_scripts', 'mwm_ana_enqueue_admin_scripts', 999);
}

// Adding textdomain
if (!function_exists('mwm_ana_load_textdomain')) {
    function mwm_ana_load_textdomain() {
        load_plugin_textdomain( mwm_ana_TD, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    add_action( 'plugins_loaded', 'mwm_ana_load_textdomain' );
}
