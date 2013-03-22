<?php

// needs $submit, $items, $name_pattern, $user

if ($submit) {
	$back_label  = get_string('back_button', 'apply');
	//
	if ($req_own_data and $submit->class!=APPLY_CLASS_CANCEL) {
		if ($submit->acked==APPLY_ACKED_ACCEPT) {
			// Update
			$change_label	= get_string('update_entry_button', 'apply');
			$change_params	= array('id'=>$id, 'submit_id'=>$submit->id, 'submit_ver'=>$submit_ver, 'courseid'=>$courseid, 'go_page'=>0);
			$change_action	= 'submit.php';
			// Cancel
			$discard_label 	= get_string('cancel_entry_button', 'apply');
			$discard_params = array('submit_id'=>$submit->id);
			$discard_action	= 'deete_submit.php';
		}
		else {
			// Edit
			$change_label	= get_string('edit_entry_button', 'apply');
			$change_params	= array('id'=>$id, 'submit_id'=>$submit->id, 'submit_ver'=>$submit_ver, 'courseid'=>$courseid, 'go_page'=>0);
			$change_action	= 'submit.php';
			// Delete
			$discard_label 	= get_string('delete_entry_button', 'apply');
			$discard_params = array('submit_id'=>$submit->id, 'acked'=>$submit->acked);
			$discard_action	= 'deete_submit.php';
		}
		//$back_params = array('id'=>$id, 'courseid'=>$courseid, 'do_show'=>'view');

		//
		$change_url	 = new moodle_url($CFG->wwwroot.'/mod/apply/'.$change_action,  $change_params);
		$discard_url = new moodle_url($CFG->wwwroot.'/mod/apply/'.$discard_action, $discard_params);
		//$back_url    = new moodle_url($CFG->wwwroot.'/mod/apply/view.php', $back_params);

		//	
		echo '<div align="center">';
		echo '<table border="0">';
		echo '<tr>';
		echo '<td>'.$OUTPUT->single_button($back_url, 	 $back_label).'</td>';
		echo '<td>&nbsp;&nbsp;&nbsp;</td>';
		echo '<td>'.$OUTPUT->single_button($change_url,  $change_label). '</td>';
		echo '<td>&nbsp;&nbsp;&nbsp;</td>';
		echo '<td>'.$OUTPUT->single_button($discard_url, $discard_label).'</td>';
		echo '<td>&nbsp;&nbsp;&nbsp;</td>';
		echo '</tr>';
		echo '</table>';
		echo '</div>';
	}


	// for admin
	else if (!$req_own_data and $submit->class!=APPLY_CLASS_CANCEL) {
		//$back_label  = get_string('back_button', 'apply');
		//$back_params = array('id'=>$id, 'courseid'=>$courseid, 'do_show'=>'show_entries');
		//$back_url    = new moodle_url($CFG->wwwroot.'/mod/apply/show_entries.php', $back_params);
		//
		echo '<div align="center">';
		echo $OUTPUT->single_button($back_url, $back_label);
		echo '</div>';
	}


	// APPLY_CLASS_CANCEL
	else {
		//$back_label  = get_string('back_button', 'apply');
		//$back_params = array('id'=>$id, 'courseid'=>$courseid, 'do_show'=>'show_entries');
		//$back_url    = new moodle_url($CFG->wwwroot.'/mod/apply/show_entries.php', $back_params);
		//
		echo '<div align="center">';
		echo $OUTPUT->single_button($back_url, $back_label);
		echo '</div>';
	}
}

