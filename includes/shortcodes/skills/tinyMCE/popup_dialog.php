<?php
function themezee_shortcode_skills_dialog() { ?>
  	
	<script language="javascript" type="text/javascript">
	function insertShortcodeSkills() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
		var title = document.getElementById('zee_skills_title').value;
		var skill = document.getElementById('zee_skills_skill').value;
		var text = document.getElementById('zee_skills_text').value;
			
		if (title == '' ) {
			alert('Please specify a title of your skill.');
		}
		else {
		
			if(selectedContent == '') {
					
				tagtext = '[cardSkill title="'+title+'" skill="'+skill+'"] '+text+' [/cardSkill] ';
					
			} else {
					
				tagtext = '[cardSkill title="'+title+'" skill="'+skill+'"] '+selectedContent+' [/cardSkill] ';
					
			}
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
		<form id="themezee_shortcode_skills_dialog" method="post" action="">
			<table style="margin: 10px;" border="0" cellpadding="4" cellspacing="0">
				<tr>
					<td nowrap="nowrap"><label for="zee_skills_title">Skill Title:<span>*</span></label></td>
					<td><input type="text" name="zee_skills_title" id="zee_skills_title" /></td>
                </tr>
				<tr>
					<td class="label" nowrap="nowrap"><label for="zee_skills_skill">Skill Level:</label></td>
					<td>
						<select name="zee_skills_skill" id="zee_skills_skill">
							<option value="one">1 / 5</option>
							<option value="two">2 / 5</option>
							<option value="three">3 / 5</option>
							<option value="four">4 / 5</option>
							<option value="five">5 / 5</option>
                        </select>
                    </td>
				</tr>
				<tr>
					<td nowrap="nowrap"><label for="zee_skills_text">Description:</label></td>
					<td><textarea type="text" name="zee_skills_text" id="zee_skills_text" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" id="cancel" type="button" /></td>
					<td><input class="button-primary" name="insert" value="Insert" onclick="insertShortcodeSkills();" id="insert" type="button" /></td>
				</tr>
			</table>
		</form>
	</div>
  <?php
}
?>