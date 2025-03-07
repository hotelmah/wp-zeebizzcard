<?php

// Load additional Predefined Color Schemes if Custom Colors is deactivated

// add_action('wp_enqueue_scripts', 'themezee_load_custom_css');

function themezee_load_custom_css()
{
    $options = get_option('themezee_options');

    // Load PredefinedColor CSS
    if (!isset($options['themeZee_color_activate']) or $options['themeZee_color_activate'] != 'true') {
        $stylesheet = get_template_directory_uri() . '/includes/css/colorschemes/' . $options['themeZee_stylesheet'];
        wp_register_style('zeeBizzCard_colorscheme', $stylesheet, array('zeeBizzCard_stylesheet'));
        wp_enqueue_style('zeeBizzCard_colorscheme');
    }
}

/* ===================================================================================================================== */

// Include Fonts from Google Web Fonts API
add_action('wp_enqueue_scripts', 'themezee_load_web_fonts');

function themezee_load_web_fonts()
{
    $options = get_option('themezee_options');

    // Default Fonts which haven't to be load from Google
    $default_fonts = array('Arial', 'Verdana', 'Tahoma', 'Times New Roman', 'Helvetica');


    // Load Fonts ?
    if (isset($options['themeZee_fonts_activate']) and $options['themeZee_fonts_activate'] == 'true') :
        // Load Text Font
        if (isset($options['themeZee_fonts_text']) and !in_array($options['themeZee_fonts_text'], $default_fonts)) :
            wp_register_style('themezee_text_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_text']);
            wp_enqueue_style('themezee_text_font');
        endif;


        // Load Navigation Font
        if (isset($options['themeZee_fonts_navi']) and !in_array($options['themeZee_fonts_navi'], $default_fonts)) :
            wp_register_style('themezee_navi_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_navi']);
            wp_enqueue_style('themezee_navi_font');
        endif;


        // Load Title Font
        if (isset($options['themeZee_fonts_title']) and !in_array($options['themeZee_fonts_title'], $default_fonts)) :
            wp_register_style('themezee_title_font', 'http://fonts.googleapis.com/css?family=' . $options['themeZee_fonts_title']);
            wp_enqueue_style('themezee_title_font');
        endif;


    // Load Standard Font
    else :
        wp_register_style('themezee_default_font', 'http://fonts.googleapis.com/css?family=Carme');
        wp_enqueue_style('themezee_default_font');
        wp_register_style('themezee_default_font_two', 'http://fonts.googleapis.com/css?family=Oswald');
        wp_enqueue_style('themezee_default_font_two');
    endif;
}

/* ===================================================================================================================== */

// Web Fonts Wrapper Function for Admin
add_action('admin_init', 'themezee_load_web_fonts_admin');

function themezee_load_web_fonts_admin()
{
    $default_fonts = themezee_get_web_fonts();

    // Make sure to load Fonts only at Theme Options Page in the Backend
    if (isset($_GET['page']) and $_GET['page'] == 'themezee' and isset($_GET['tab']) and $_GET['tab'] == 'fonts') :
        foreach ($default_fonts as $value => $label) {
            wp_register_style('themezee_font_' . $label, 'http://fonts.googleapis.com/css?family=' . $value);
            wp_enqueue_style('themezee_font_' . $label);
        }
    endif;
}

/* ===================================================================================================================== */

// Include CSS Files

locate_template('/includes/css/colors.css.php', true);

locate_template('/includes/css/fonts.css.php', true);

locate_template('/includes/css/layout.css.php', true);
