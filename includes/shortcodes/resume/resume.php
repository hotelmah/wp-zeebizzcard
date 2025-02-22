<?php

	// Add cardResume Shortcode
	add_shortcode('cardResume', 'themezee_shortcode_resume_function');
	function themezee_shortcode_resume_function($atts, $content = null) {
		
		extract(shortcode_atts(array(
			'jobtitle' => '',
			'company' => '',
			'date' => ''
		), $atts));
		
		return '<div class="short_resume"><h4 class="short_resume_jobtitle">'.$jobtitle.'</h4><div class="short_resume_company">'.$company.'</div><div class="short_resume_date">'.$date.'</div><div class="short_resume_content">'.$content.'</div></div>';
	
	}

	// Include tineMCE plugin
	locate_template('/includes/shortcodes/resume/tinyMCE/tinyMCE.php', true);

?>