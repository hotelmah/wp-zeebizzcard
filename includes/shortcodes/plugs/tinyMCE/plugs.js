(function() {
	
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('themezee_shortcode_plugs');
	
	tinymce.create('tinymce.plugins.themezee_shortcode_plugs', {		 
		init : function(ed, url) {
			
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mce_themezee_shortcode_plugs', function() {
				
				ed.windowManager.open({
					
					id       : 'themezee_shortcode_plugs_dialog',
					width    : 400,
					title : ed.getLang( 'themezee_shortcode_plugs.popupTitle', 'Shortcodes: Plugs' ),
					height   : 'auto',
					wpDialog : true
					
				}, {
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton('themezee_shortcode_plugs', {
				
				title : ed.getLang( 'themezee_shortcode_plugs.buttonTitle', 'Shortcodes: Plugs' ),
				cmd : 'mce_themezee_shortcode_plugs',
				image : url + '/plugs.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				
				cm.setActive('mce_themezee_shortcode_plugs', n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add('themezee_shortcode_plugs', tinymce.plugins.themezee_shortcode_plugs);
	
})();