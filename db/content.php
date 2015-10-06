<?php
require 'db/connect.php';

function buildFancyTable ($id, $headers, $content) {
	$table = '<table id="' . $id . '-table" class="table-fancy"><tr>';
	foreach ($headers as $field) {
		$table .= '<th>' . $field . '</th>';
	}
	$table .= '</tr>' . $content . '</table>';
	return $table;
}

function getTableAssingments () {
	$id = 'assingments';
	$headers = array('Date Assinged', 'Date Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	$table = getAllEntries ($id);
	
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>' . $row->start_date . '</td>';
		$content .= '<td>' . $row->end_date . '</td>';
		$content .= '<td>' . $row->subject . '</td>'; 
		$content .= '<td><a href="/assingments_item.php?id=' . $row->id . '">' . $row->desc_short . '</a></td>';
		$content .= '<td>' . $row->team . '</td>';
		
		$content .= '<td>';
			$content .= '<a target="_blank" href="' . $row->link_assingment . '">Assingment</a>';
			$content .= ' / ';
			$content .= '<a target="_blank" href="' . $row->link_elab . '">Repository</a>';
		$content .= '</td>';
		
		if ($row->completion == 1) {
			$content .= '<td>Complete</td>';
		} else {
			$content .= '<td>Working</td>';
		}
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($id, $headers, $content);
}

function getTableTentamens () {
	$id = 'tentamens';
	$headers = array('Date', 'Weight', 'Subject', 'Mark');
	$content = '';
	$table = getAllEntries ($id);
			
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>' . $row->date . '</td>';
		$content .= '<td>' . $row->weight . '</td>';
		$content .= '<td>' . $row->subject . '</td>';
		
		if ($row->completion == 1) {
			$content .= '<td>' . $row->mark . '</td>';
		} else {
			$content .= '<td>N/A</td>';
		}
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($id, $headers, $content);
}

function getItemAssignment ($item_id) {
	$item = '';
	$table = getAllEntries ('assingments');
	
	while ($row = $table->fetch_object()) {
		if ($row->id == $item_id) {
			$item .= '<div class="paragraph-center col-sm-12">';
			$item .= '<h2>' . $row->desc_short . '</h2>';
			$item .= '<p>' . $row->desc_full . '</p>';
			
			$item .= '<p><i>Subject: ' . $row->subject
				   . '<br>Date Assinged: ' . $row->start_date
				   . '<br>Deadline: ' . $row->end_date
				   . '<br>Team: ' . $row->team;
				   
			$item .= '<br>Status: ';
			if ($row->completion == 1) {
				$item .= 'Complete</i></p>';
			} else {
				$item .= 'Working</i></p>';
			}
			
			if (!empty($row->link_assingment) || !empty($row->link_elab) || !empty($row->link_report)) {
				$item .= '<p><b>Links:</b><br>';
				if (!empty($row->link_assingment)) {
					$item .= '<a target="_blank" href="' . $row->link_assingment . '">Assignment</a><br>';
				}
				if (!empty($row->link_elab)) {
					$item .= '<a target="_blank" href="' . $row->link_elab . '">Repository</a><br>';
				}
				if (!empty($row->link_report)) {
					$item .= '<a target="_blank" href="' . $row->link_report . '">Report</a><br>';
				}
				$item .= '</p>';
			}
			
			$item .= '</div>';
			
			if (!empty($row->link_report)) {
				$item .= '<div class="paragraph-center col-sm-12">';
				$item .= '<h2>Report</h2>';
				$item .= '<iframe name="report" src="' . $row->link_report . '" width="100%" height="600"></iframe>';
				$item .= '</div>';
			}
		}
	}
			
	return $item;
}

?>
