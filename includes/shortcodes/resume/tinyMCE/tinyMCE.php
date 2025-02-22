<?php
	// Include Function which displays the Popup Dialog
	locate_template('/includes/shortcodes/resume/tinyMCE/popup_dialog.php', true);
	
	class add_ShortcodeResume {
	
		var $pluginname = "themezee_shortcode_resume";
		
		function add_ShortcodeResume()  {
			
			// Modify the version when tinyMCE plugins are changed.
			add_filter('tiny_mce_version', array(&$this, 'change_tinymce_version') );
			
			// Don't bother doing this stuff if the current user lacks permissions
			if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
			
			// Add only in Rich Editor mode
			if ( get_user_option('rich_editing') == 'true') {
			 
				// add the tinyMCE button for WordPress editor
				add_filter('mce_buttons', array(&$this, 'add_ShortcodeResume_Button' ), 5);
				add_filter("mce_external_plugins", array(&$this, "add_ShortcodeResume_Plugin" ), 5);
				add_filter( 'mce_external_languages', array(&$this, "add_ShortcodeResume_Languages" ), 5);
				
				// Add Popup Dialog to admin footer
				add_action( 'admin_footer', 'themezee_shortcode_resume_dialog' );
			}
		}
		
		// Used to insert button in WordPress Editor
		function add_ShortcodeResume_Button($buttons) {
			array_push($buttons, "", $this->pluginname );
			return $buttons;
		}
		
		// Load the TinyMCE plugin (javascript file)
		function add_ShortcodeResume_Plugin($plugin_array) {    
			$plugin_array[$this->pluginname] =  get_template_directory_uri().'/includes/shortcodes/resume/tinyMCE/resume.js';
			return $plugin_array;
		}
		
		// Load the tinyMCE plugin Textdomain
		function add_ShortcodeResume_Languages( $plugin_array ) {
			$plugin_array[$this->pluginname] = get_template_directory_uri().'/includes/shortcodes/resume/tinyMCE/resume_lang.php';
			return $plugin_array;
		}
		
		function change_tinymce_version($version) {
			return ++$version;
		}
		
	}
	// Call it now
	$tinymce_button = new add_ShortcodeResume();

?>