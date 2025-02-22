(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('themezee_shortcode_resume');
	
	tinymce.create('tinymce.plugins.themezee_shortcode_resume', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mce_themezee_shortcode_resume', function() {
				
				ed.windowManager.open({
					
					id       : 'themezee_shortcode_resume_dialog',
					width    : 400,
					title : ed.getLang( 'themezee_shortcode_resume.popupTitle', 'Shortcodes: Resume' ),
					height   : 'auto',
					wpDialog : true
					
				}, {
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('themezee_shortcode_resume', {
				
				title : ed.getLang( 'themezee_shortcode_resume.buttonTitle', 'Shortcodes: Resume' ),
				cmd : 'mce_themezee_shortcode_resume',
				image : url + '/resume.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mce_themezee_shortcode_resume', n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add('themezee_shortcode_resume', tinymce.plugins.themezee_shortcode_resume);
	
})();