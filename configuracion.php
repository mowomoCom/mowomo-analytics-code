<?php
/**
 * mowomo-analytics-code
 *
 * @since      1.0.0
 */
add_action( 'admin_init', 'mwm_ac_init' );
function mwm_ac_init() {

    register_setting( 'mwm_ac_option', 'mwm_ac_ID_propiedad' );

}

/**
 * mowomo-analytics-code
 *
 * @since      1.0.0
 *
 * Añade la página del plugin en el administrador de WordPress
 */
add_action('admin_menu', 'mwm_ac_paginas');

function mwm_ac_paginas(){
    add_menu_page( 'mowomo page', 'Analytics code', 'manage_options', 'mwm-ac', 'mwm_ac_page', plugin_dir_url( __FILE__ ).'/assets/logo-mowomo-white.svg' );
}

function mwm_ac_page(){
?>
  <div class="wrap">
        <?php screen_icon(); ?>
        <h1><?php _e('mowomo Analytics code', 'mwm_ac'); ?></h1>
        <?php settings_errors(); ?>
        <form action="options.php" method="post">
            <?php settings_fields( 'mwm_ac_option' ); ?>

            <?php @do_settings_fields( 'mwm-ac' ,'mwm_ac_option' ); ?>

            <table class="form-table">
                <tbody>
                    <tr>
                        <th>
                            <h2><?php _e('Identifier Analytics Code', 'mwm_ac'); ?></h2>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="mwm_ac_ID_propiedad" id="mwm_ac_ID_propiedad" value="<?php echo get_option('mwm_ac_ID_propiedad'); ?>">
                            <p class="description"><?php _e('User ID, same that UA-XXXXXXXXX-X, you can get the code','mwm_ac'); ?></p><a href="https://support.google.com/analytics/answer/1008080?hl=en"><?php _e('in this article','mwm_ac');?></a>
                        </td>
                    </tr>

                </tbody>
            </table>
            <p><?php @submit_button( ); ?></p>

        </form>

    </div>
<?php
}

/**
 * mowomo-movil-ac
 *
 * @since      1.0.0
 *
 * Reemplaza el footer de WordPress en la pagina de mowomo Móvil ac
 *
*/
function mwm_footer_admin_personalizado( $footer_text ) {

    if ( isset($_GET['page']) && $_GET['page'] == "mwm-ac" ) { // Don't forget to add a check for your plugin's page here
        $footer_text = __( 'Thanks for using mowomo Analytics code, plugin made by <a href="https://mowomo.com" target="_blank" rel="nofollow">mowomo team</a>.' );
    }
    return $footer_text;
}
    add_filter( 'admin_footer_text', 'mwm_footer_admin_personalizado' );
