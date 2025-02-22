<?php
function themezee_shortcode_plugs_dialog() { ?>
  	
	<script language="javascript" type="text/javascript">
	function insertShortcodePlugs() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		var plug = document.getElementById('zee_plugs_plug').value;
			
		if (plug == 'about' ) {
			tagtext = '[cardAbout]';
		}
		else {
			tagtext = '[cardNetworks]';
		}
	
		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<div style="display:none;">
		<form id="themezee_shortcode_plugs_dialog" method="post" action="">
			<table style="margin: 10px;" border="0" cellpadding="4" cellspacing="0">
				<tr>
					<td class="label" nowrap="nowrap"><label for="zee_plugs_plug">Insert Plugin</label></td>
					<td>
						<select name="zee_plugs_plug" id="zee_plugs_plug">
							<option value="about">About / Personal Details</option>
							<option value="networks">Networks / SocialMedia Buttons</option>
                        </select>
                    </td>
				</tr>
				<tr>
					<td><input name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" id="cancel" type="button" /></td>
					<td><input class="button-primary" name="insert" value="Insert" onclick="insertShortcodePlugs();" id="insert" type="button" /></td>
				</tr>
			</table>
		</form>
	</div>
  <?php
}
?>