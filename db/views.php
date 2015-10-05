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

function getItemAssingment ($db) {
	
}

?>