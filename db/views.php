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

function getTableAssingments ($db) {
	$id = 'assingments';
	$headers = array('Date Assinged', 'Date Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	
	if ($result = $db->query("SELECT * FROM deadlines")) {
		if ($result->num_rows) {
			
			while ($row = $result->fetch_object()) {
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
			
			$result->free();
		}
		return buildFancyTable($id, $headers, $content);
	} else {
		return ($db->error);
	}
}

function getTableTentamens ($db) {
	$id = 'tentamens';
	$headers = array('Date', 'Weight', 'Subject', 'Mark');
	$content = '';
	
	if ($result = $db->query("SELECT * FROM tentamens")) {
		if ($result->num_rows) {
			
			while ($row = $result->fetch_object()) {
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
			
			$result->free();
		}
		return buildFancyTable($id, $headers, $content);
	} else {
		return ($db->error);
	}
}

function getItemAssingment ($db, $item_id) {
	$view = '';
	
	if ($result = $db->query("SELECT * FROM deadlines")) {
		if ($result->num_rows) {
			
			while ($row = $result->fetch_object()) {
				if ($row->id == $item_id) {
					$view .= '<div class="paragraph-center col-sm-12">';
					$view .= '<h2>' . $row->desc_short . '</h2>';
					$view .= '<p>' . $row->desc_full . '</p>';
					
					$view .= '<p><i>Subject: ' . $row->subject
						   . '<br>Date Assinged: ' . $row->start_date
						   . '<br>Deadline: ' . $row->end_date
						   . '<br>Team: ' . $row->team;
						   
					$view .= '<br>Status: ';
					if ($row->completion == 1) {
						$view .= 'Complete</i></p>';
					} else {
						$view .= 'Working</i></p>';
					}
					
					if (!empty($row->link_assingment) || !empty($row->link_elab) || !empty($row->link_report)) {
						$view .= '<p><b>Links:</b><br>';
						if (!empty($row->link_assingment)) {
							$view .= '<a target="_blank" href="' . $row->link_assingment . '">Assingment</a><br>';
						}
						if (!empty($row->link_elab)) {
							$view .= '<a target="_blank" href="' . $row->link_elab . '">Repository</a><br>';
						}
						if (!empty($row->link_report)) {
							$view .= '<a target="_blank" href="' . $row->link_report . '">Report</a><br>';
						}
						$view .= '</p>';
					}
					
					$view .= '</div>';
					
					if (!empty($row->link_report)) {
						$view .= '<div class="paragraph-center col-sm-12">';
						$view .= '<h2>Report</h2>';
						$view .= '<iframe name="report" src="' . $row->link_report . '" width="100%" height="600"></iframe>';
						$view .= '</div>';
					}
				}
			}
			
			$result->free();
		}
		return $view;
	} else {
		return ($db->error);
	}
}

?>