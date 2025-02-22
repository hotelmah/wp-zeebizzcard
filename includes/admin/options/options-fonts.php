<?php
	
	function themezee_get_fonts_sections() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_fonts_active",
					"name" => __('Activate Custom Fonts', 'themezee_lang'));
		
		$themezee_sections[] = array("id" => "themeZee_fonts_family",
					"name" => __('Font Families', 'themezee_lang'));
					
		$themezee_sections[] = array("id" => "themeZee_fonts_sizes",
					"name" => __('Font Sizes', 'themezee_lang'));

		return $themezee_sections;
	}
	
	function themezee_get_fonts_settings() {
	
		// Array with all available Fonts to choose from
		$default_fonts = themezee_get_web_fonts();
	
		### FONTS SETTINGS
		#######################################################################################
		
		$themezee_settings[] = array("name" => __('Active Custom Fonts?', 'themezee_lang'),
						"desc" => __('Check this to activate Custom Fonts.', 'themezee_lang'),
						"id" => "themeZee_fonts_activate",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_fonts_active");
						
		$themezee_settings[] = array("name" => __('Install more Fonts', 'themezee_lang'),
						"desc" => __('You want more fonts? You can install further fonts from the <a target="_blank" href="http://www.google.com/webfonts/">Google Font API</a> here. 
									Just insert a list of fonts separated by Semicolon, i.e  Arial; Galindo; Cantora One; ...', 'themezee_lang'),
						"id" => "themeZee_fonts_installed",
						"std" => "",
						"type" => "text",
						"section" => "themeZee_fonts_active");
						
		$themezee_settings[] = array("name" => __('Text Font', 'themezee_lang'),
						"desc" => __("Select the font family of text here.", 'themezee_lang'),
						"id" => "themeZee_fonts_text",
						"std" => "Carme",
						"type" => "fontpicker",
						'choices' => $default_fonts,
						"section" => "themeZee_fonts_family");
						
		$themezee_settings[] = array("name" => __('Navigation Font', 'themezee_lang'),
						"desc" => __("Select the navigation font here.", 'themezee_lang'),
						"id" => "themeZee_fonts_navi",
						"std" => "Carme",
						"type" => "fontpicker",
						'choices' => $default_fonts,
						"section" => "themeZee_fonts_family");
						
		$themezee_settings[] = array("name" => __('Title Font', 'themezee_lang'),
						"desc" => __("Select the title font here.", 'themezee_lang'),
						"id" => "themeZee_fonts_title",
						"std" => "Oswald",
						"type" => "fontpicker",
						'choices' => $default_fonts,
						"section" => "themeZee_fonts_family");
						
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('Size of Text', 'themezee_lang'),
						"desc" => __("Choose the font size of text in points (default: 10pt).", 'themezee_lang'),
						"id" => "themeZee_font_size_text",
						"std" => "10",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Navigation', 'themezee_lang'),
						"desc" => __("Choose the font size of navigation in points (default: 9pt).", 'themezee_lang'),
						"id" => "themeZee_font_size_navi",
						"std" => "9",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Page Title', 'themezee_lang'),
						"desc" => __("Choose the font size of page titles in points (default: 26pt)", 'themezee_lang'),
						"id" => "themeZee_font_size_page_title",
						"std" => "26",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
						
		$themezee_settings[] = array("name" => __('Size of Post Title', 'themezee_lang'),
						"desc" => __("Choose the font size of post tiles in points (default: 22pt)", 'themezee_lang'),
						"id" => "themeZee_font_size_post_title",
						"std" => "24",
						"type" => "fontsizer",
						"section" => "themeZee_fonts_sizes");
		
		return $themezee_settings;
	}

?>