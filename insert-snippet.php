<?php
/**
 * mowomo-analytics-code
 *
 * Inserta el codigo de analytics en la cabecera
 *
 * @since      1.0.0
 */
function mwmw_ac_analytics_code() { 
  if(get_option('mwm_ac_ID_propiedad')!=""):?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_option('mwm_ac_ID_propiedad'); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php echo get_option('mwm_ac_ID_propiedad'); ?>');
  </script>
  <?php endif; }
add_action('wp_head', 'mwmw_ac_analytics_code');
