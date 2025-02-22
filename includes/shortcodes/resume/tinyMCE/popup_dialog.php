<?php
function themezee_shortcode_resume_dialog() { ?>
  	
	<script language="javascript" type="text/javascript">
	function insertShortcodeResume() {
		
		var tagtext;
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
			
		var jobtitle = document.getElementById('zee_resume_jobtitle').value;
		var company = document.getElementById('zee_resume_company').value;
		var date = document.getElementById('zee_resume_date').value;
		var jobdesc = document.getElementById('zee_resume_jobdesc').value;
			
		if(selectedContent == '') {
			if (jobdesc != '' )
				tagtext = '[cardResume jobtitle="'+jobtitle+'" company="'+company+'" date="'+date+'"] '+jobdesc+' [/cardResume] ';
			else
				alert('Please insert a job description to your resume.');
		} else {
			tagtext = '[cardResume jobtitle="'+jobtitle+'" company="'+company+'" date="'+date+'"] '+selectedContent+' [/cardResume] ';
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
		<form id="themezee_shortcode_resume_dialog" method="post" action="">
			<table style="margin: 10px;" border="0" cellpadding="4" cellspacing="0">
                 <tr>
					<td nowrap="nowrap"><label for="zee_resume_jobtitle">Job Title:</label></td>
                    <td><input type="text" name="zee_resume_jobtitle" id="zee_resume_jobtitle" value="" /></td>
				</tr>
                 <tr>
					<td nowrap="nowrap"><label for="zee_resume_company">Company/Organisation:</label></td>
                    <td><input type="text" name="zee_resume_company" id="zee_resume_company" value="" /></td>
				</tr>
                 <tr>
					<td nowrap="nowrap"><label for="zee_resume_date">Date Employed:</label></td>
                    <td><input type="text" name="zee_resume_date" id="zee_resume_date" value="" /></td>
				</tr>
				<tr>
					<td nowrap="nowrap"><label for="zee_resume_jobdesc">Job Description:<span>*</span></label></td>
					<td><textarea type="text" name="zee_resume_jobdesc" id="zee_resume_jobdesc" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" id="cancel" type="button" /></td>
					<td><input class="button-primary" name="insert" value="Insert" onclick="insertShortcodeResume();" id="insert" type="button" /></td>
				</tr>
			</table>
		</form>
	</div>
  <?php
}
?>