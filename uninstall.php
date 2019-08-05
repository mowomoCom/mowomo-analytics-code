<?php
/**
 * mowomo-analytics-code
 *
 *  Elimina el contenido creado en la base de datos
 *
 * @since      1.0.0
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('mwm_ac_ID_propiedad');
