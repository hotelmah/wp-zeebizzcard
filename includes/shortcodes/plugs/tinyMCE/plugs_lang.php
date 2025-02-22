<?php
# i18n/mce_locale.php
/**
* @var string $strings a JavaScript snippet to add another language pack to TinyMCE
* @var string $mce_locale an ISO 639-1 formated string of the current language e.g. en, de...
* @deprecated wp_tiny_mce() at wp-admin/includes/post.php (for versions prior WP 3.3)
* @see _WP_Editors::editor_settings in wp-includes/class-wp-editor.php
*/
$strings =
  'tinyMCE.addI18n( 
    "' . $mce_locale .'.themezee_shortcode_plugs", 
    {
      buttonTitle : "' . esc_js( __( 'Shortcodes: Plugs', 'themezee_lang' ) ) . '",
      popupTitle  : "' . esc_js( __( 'Shortcodes: Plugs', 'themezee_lang' ) ) . '",
    } 
  );';