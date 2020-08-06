<?php

/**
 * Guarda las configuraciones de la página de configuración del plugin.
 *
 * @since      1.0.0
 */
function mwm_ana_save_data() {

	$mwm_ac_ID_propiedad = $_POST[ 'mwm_ac_ID_propiedad' ];
	update_option('mwm_ac_ID_propiedad',$mwm_ac_ID_propiedad);
    echo json_encode(array('Cambios realizados con exito')); 
    wp_die();

}

add_action('wp_ajax_mwm_get_token', 'mwm_get_token');
add_action('wp_ajax_nopriv_mwm_get_token', 'mwm_get_token');

add_action('wp_ajax_mwm_ana_save_data', 'mwm_ana_save_data');
add_action('wp_ajax_nopriv_mwm_ana_save_data', 'mwm_ana_save_data');

/**
 * Añade la página del plugin en el administrador de WordPress
 * 
 * @since      1.0.0
 *
 */
add_action('admin_menu', 'mwm_ana_paginas');

function mwm_ana_paginas() {
    add_menu_page( 'mowomo page', 'Analytics Code', 'manage_options', 'mwm-man', 'mwm_ana_page', mwm_ana_IMG.'logo-mowomo-white.svg' );
}

/**
 * Página de administración del plugin
 * 
 * @since      1.0.0
 *
 */

function mwm_ana_page() {
    ?>
    <div id="mwm-wrap" class="wrap">

        <div class="mwm-panel-principal">
        
            

            <h1><?php _e('mowomo Analytics Code', 'mwm-man'); ?></h1>

            <h2 class="nav-tab-wrapper">
                <a href="javascript:void(0);" mwm-tab="mwm_ana_conf" class="nav-tab mwm_ana_conf"><?php _e( 'Configuración general', 'mwm_ana' ); ?></a>
            </h2>

            <!-- Dinamic Admin Form -->
                <div id="tab-mwm_ana_conf" class="mwm-tab">
                    <table class="form-table">
                        <label id="alertas"></label>
                        <tbody>
                        <tr>
                            <td>
                                <input type="text" name="mwm_ac_ID_propiedad" id="mwm_ac_ID_propiedad" value="<?php echo get_option('mwm_ac_ID_propiedad    '); ?>">
                                <p class="description"><?php _e('User ID, same that UA-XXXXXXXXX-X, you can get the code','mwm_ac'); ?></p><a href="https://support.google.com/analytics/answer/1008080?hl=en"><?php _e('in this article','mwm_ac');?></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="tab-mwm_ana_vis" class="mwm-tab hidden">
                    
                </div>

                <button id="guardar_cambios"><?php _e( 'Guardar cambios' , 'mwm-man' ); ?></button>
        </div>

        <?php 
        if(strpos(get_locale(),'es')!== false){

            $posts = mwm_endpoint_get_sidebar_content('ES');
        } else {

            $posts = mwm_endpoint_get_sidebar_content('EN');
        }

            ?>
            <div class="mwm-panel-sidebar">
                <?php foreach ($posts as $post) : ?>
                    <div class="mwm-panel-sidebar__block">
                        <?php echo $post->post_content;?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php settings_errors(); ?>
    <?php
}