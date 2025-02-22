<?php

	// Include Shortcodes CSS
	function themezee_shortcodes_css() {
		wp_register_style('zee_shortcodes', get_template_directory_uri() . '/includes/shortcodes/shortcodes.css');
		wp_enqueue_style('zee_shortcodes');
	}
	add_action('wp_enqueue_scripts', 'themezee_shortcodes_css');
	
	// Include Shortcodes
	locate_template('/includes/shortcodes/resume/resume.php', true);
	locate_template('/includes/shortcodes/skills/skills.php', true);
	locate_template('/includes/shortcodes/plugs/plugs.php', true);
	
	//let's trick tinymce into thinking its a new version to clean up the cache
	function themezee_refresh_mce($ver) {
	  $ver += 3;
	  return $ver;
	}
	add_filter( 'tiny_mce_version', 'themezee_refresh_mce');

?>