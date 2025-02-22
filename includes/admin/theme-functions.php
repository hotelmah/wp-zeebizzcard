<?php

	// Define Theme URL
	define('ZEE_THEME_URL', 'http://themezee.com/zeebizzcard/');
	
	// Define all Settings Pages Tabs
	function themezee_get_settings_page_tabs() {
		$tabs = array(
			'welcome' => __('Welcome', 'themezee_lang'),
			'general' => __('General', 'themezee_lang'),
			'colors' => __('Colors', 'themezee_lang'),
			'fonts' => __('Fonts', 'themezee_lang'),
			'about' => __('About Me', 'themezee_lang'),
			'slider' => __('Post Slider', 'themezee_lang'),
			'social' => __('Social Media', 'themezee_lang')
		);
		return $tabs;
	}
	
	function themezee_get_sections($tab) {
			
		// Get Section
		switch ( $tab ) :
			case 'general' :
				locate_template('/includes/admin/options/options-general.php', true);
				$themezee_sections = themezee_get_general_sections();
			break;
			case 'colors' :
				locate_template('/includes/admin/options/options-colors.php', true);
				$themezee_sections = themezee_get_colors_sections();
			break;
			case 'fonts' :
				locate_template('/includes/admin/options/options-fonts.php', true);
				$themezee_sections = themezee_get_fonts_sections();
			break;
			case 'about' :
				locate_template('/includes/admin/options/options-about.php', true);
				$themezee_sections = themezee_get_about_sections();
			break;
			case 'slider' :
				locate_template('/includes/admin/options/options-slider.php', true);
				$themezee_sections = themezee_get_slider_sections();
			break;
			case 'social' :
				locate_template('/includes/admin/options/options-social.php', true);
				$themezee_sections = themezee_get_social_sections();
			break;
			default :
				locate_template('/includes/admin/options/options-general.php', true);
				$themezee_sections = themezee_get_general_sections();
			break;
		endswitch;
		
		return $themezee_sections;
	}
	
	function themezee_get_settings($tab = 'general') {
	
		// Get Section
		switch ( $tab ) :
			case 'general' :
				locate_template('/includes/admin/options/options-general.php', true);
				$themezee_settings = themezee_get_general_settings();
			break;
			
			case 'colors' :
				locate_template('/includes/admin/options/options-colors.php', true);
				$themezee_settings = themezee_get_colors_settings();
			break;
			case 'fonts' :
				locate_template('/includes/admin/options/options-fonts.php', true);
				$themezee_settings = themezee_get_fonts_settings();
			break;
			case 'about' :
				locate_template('/includes/admin/options/options-about.php', true);
				$themezee_settings = themezee_get_about_settings();
			break;
			case 'slider' :
				locate_template('/includes/admin/options/options-slider.php', true);
				$themezee_settings = themezee_get_slider_settings();
			break;
			case 'social' :
				locate_template('/includes/admin/options/options-social.php', true);
				$themezee_settings = themezee_get_social_settings();
			break;
			default :
				locate_template('/includes/admin/options/options-general.php', true);
				$themezee_settings = themezee_get_general_settings();
			break;
		 endswitch;
		
		return $themezee_settings;
	}
	
	// Get available default Fonts
	function themezee_get_web_fonts() { 
		
		// Default font array
		$themezee_fonts = array(
			'Arial' => 'Arial',
			'Carme' => 'Carme',
			'Droid Sans' => 'Droid Sans',
			'Josefin Slab' => 'Josefin Slab',
			'Lobster' => 'Lobster',
			'Luckiest Guy' => 'Luckiest Guy',
			'Jockey One' => 'Jockey One',
			'Maven Pro' => 'Maven Pro',
			'Modern Antiqua' => 'Modern Antiqua',
			'Nobile' => 'Nobile',
			'Oswald' => 'Oswald',
			'Permanent Marker' => 'Permanent Marker',
			'Share' => 'Share',
			'Tahoma' => 'Tahoma',
			'Ubuntu' => 'Ubuntu',
			'Verdana' => 'Verdana');
			
		// Add fonts installed by User
		$options = get_option('themezee_options');
		if ( isset($options['themeZee_fonts_installed']) and $options['themeZee_fonts_installed'] != '' ) :
			
			$fonts = explode(";", $options['themeZee_fonts_installed']);
			foreach ( $fonts as $value) {
				$themezee_fonts[trim($value)] = trim($value);
			}
			asort($themezee_fonts);
		endif;
		
		return $themezee_fonts; 
	}

	// Add Scripts and CSS for ThemeZee Options Panel	
	add_action('admin_enqueue_scripts', 'themezee_admin_head');
	function themezee_admin_head() { 
		if ( isset($_GET['page']) and $_GET['page'] == 'themezee' ) :
			wp_register_style('zee_admin_css', get_template_directory_uri() .'/includes/admin/admin-style.css');
			wp_enqueue_style( 'zee_admin_css');
			
			wp_register_style('zee_colorpicker_css', get_template_directory_uri().'/includes/admin/colorpicker/colorpicker.css');
			wp_enqueue_style( 'zee_colorpicker_css');
			
			wp_register_script('zee_colorpicker_js', get_template_directory_uri() .'/includes/admin/colorpicker/colorpicker.js', false);
			wp_enqueue_script('zee_colorpicker_js');
			
			wp_register_script('zee_eye', get_template_directory_uri() .'/includes/admin/colorpicker/eye.js', array('zee_colorpicker_js'));
			wp_enqueue_script('zee_eye');
			
			wp_register_script('zee_utils', get_template_directory_uri() .'/includes/admin/colorpicker/utils.js', array('zee_eye'));
			wp_enqueue_script('zee_utils');
			
			wp_register_script('zee_mycolorpicker', get_template_directory_uri() .'/includes/admin/colorpicker/mycolorpicker.js', array('zee_utils'));
			wp_enqueue_script('zee_mycolorpicker');
			
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			
			wp_register_script('zee_image_upload', get_template_directory_uri() .'/includes/admin/jquery-image-upload.js', array('jquery','media-upload','thickbox'));
			wp_localize_script('zee_image_upload', 'zee_localizing_upload_js', array(
				'use_this_image' => __('Use this Image', 'themezee_lang')
			));
			
			wp_enqueue_script('zee_image_upload');
			wp_enqueue_style('thickbox');
		endif;
	}
	
?>