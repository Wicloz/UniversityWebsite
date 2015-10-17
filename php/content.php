<?php
require 'db/data.php';

function editDataItem ($table, $id, $action, $item) {	
	if ($action == 'insert') {
		insertEntry ($table, $item);
		return '<p>Entry Inserted!</p>';
	}
	else if ($action == 'update') {
		updateEntry ($table, $id, $item);
		return '<p>Entry Updated!</p>';
	}
	else if ($action == 'delete') {
		deleteEntry ($table, $id);
		return '<p>Entry Deleted!</p>';
	}
}

function buildFancyTable ($id, $headers, $content) {
	$table = '<table id="'.$id.'-table" class="table-fancy"><tr>';
	foreach ($headers as $field) {
		$table .= '<th>'.$field.'</th>';
	}
	$table .= '</tr>'.$content.'</table>';
	return $table;
}

function getTableAssignments () {
	$id = 'assignments';
	$headers = array('Date Assigned', 'Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	$table = getAllEntriesSorted($id, 'end_date');
	
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.$row->start_date.'</td>';
		$content .= '<td>'.$row->end_date.'</td>';
		$content .= '<td>'.$row->subject.'</td>'; 
		$content .= '<td><a href="assignments_item.php?id='.$row->id.'">'.$row->desc_short.'</a></td>';
		$content .= '<td>'.$row->team.'</td>';
		
		$content .= '<td>';
		if (!empty($row->link_assignment)) {
			$content .= '<a target="_blank" href="'.$row->link_assignment.'">Assignment</a>';
		}
		if (!empty($row->link_assignment) && !empty($row->link_repository)) {
			$content .= ' / ';
		}
		if (!empty($row->link_repository)) {
			$content .= '<a target="_blank" href="'.$row->link_repository.'">Repository</a>';
		}
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
	$table = getAllEntriesSorted($id, 'date');
			
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.$row->date.'</td>';
		$content .= '<td>'.$row->weight.'</td>';
		$content .= '<td>'.$row->subject.'</td>';
		
		if ($row->completion == 1) {
			$content .= '<td>'.$row->mark.'</td>';
		} else {
			$content .= '<td>N/A</td>';
		}
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($id, $headers, $content);
}

function getTableEvents () {
	$id = 'events';
	$headers = array('Date', 'Subject', 'Task', 'Complete');
	$content = '';
	$assignments = getAllEntriesSorted('assignments', 'end_date');
	$tentamens = getAllEntriesSorted('tentamens', 'date');
			
	while ($row = $tentamens->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.$row->date.'</td>';
		$content .= '<td>'.$row->subject.'</td>';
		$content .= '<td>'.$row->weight.' '.$row->subject.'</td>';
		if ($row->completion == 1) {
			$content .= '<td>Complete</td>';
		} else {
			$content .= '<td>Upcoming</td>';
		}
		
		$content .= '</tr>';
	}
	
	while ($row = $assignments->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.$row->end_date.'</td>';
		$content .= '<td>'.$row->subject.'</td>';
		$content .= '<td>'.$row->desc_short.'</td>';
		if ($row->completion == 1) {
			$content .= '<td>Complete</td>';
		} else {
			$content .= '<td>Working</td>';
		}
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($id, $headers, $content);
}

function getItemAssignment ($item_id) {
	$item = '';
	$table = getAllEntries('assignments');
	
	while ($row = $table->fetch_object()) {
		if ($row->id == $item_id) {
			$item .= '<h2>'.$row->desc_short.'</h2>';
			$item .= '<p>'.$row->desc_full.'</p>';
			
			$item .= '<p><i>Subject: '.$row->subject
				  .'<br>Date Assigned: '.$row->start_date
				  .'<br>Deadline: '.$row->end_date;
				   
			if (!empty($row->team)) {
				$item .= '<br>Team: '.$row->team;
			}
			
			$item .= '<br>Status: ';
			if ($row->completion == 1) {
				$item .= 'Complete</i></p>';
			} else {
				$item .= 'Working</i></p>';
			}
			
			if (!empty($row->link_assignment) || !empty($row->link_repository) || !empty($row->link_report)) {
				$item .= '<p><b>Links:</b><br>';
				if (!empty($row->link_assignment)) {
					$item .= '<a target="_blank" href="'.$row->link_assignment.'">Assignment</a><br>';
				}
				if (!empty($row->link_repository)) {
					$item .= '<a target="_blank" href="'.$row->link_repository.'">Repository</a><br>';
				}
				if (!empty($row->link_report)) {
					$item .= '<a target="_blank" href="'.$row->link_report.'">Report</a><br>';
				}
				$item .= '</p>';
			}
			
			$item .= '<a class="button edit-item-button" href="edit-entry.php?table=assignments&id='.$item_id.'">Edit Item</a>';
			
			if (!empty($row->link_report)) {
				$item .= '</div>';
				$item .= '<div class="paragraph-center col-sm-12">';
				$item .= '<h2>Report</h2>';
				$item .= '<iframe name="report" src="'.$row->link_report.'" width="100%" height="600"></iframe>';
			}
		}
	}
	
	return $item;
}

function getEditItemForm ($table, $id) {
	$form = '<form action="edit-entry.php?table='.$table.'&id='.$id.'" method="POST">';
	if ($id != 'create') {
		if ($currentEntryTable = getEntryWithId($table, $id)) {
			$currentEntry = $currentEntryTable->fetch_assoc();
		} else {
			return '<p>Could not load form: entry does not exist.</p>';
		}
	}
	
	if ($columnInfo = getTableFormInfo($table)) {
		while ($row = $columnInfo->fetch_object()) {
			if ($row->COLUMN_NAME != 'id') {
				$type = 'text';
				$value = '';
				$arguments = '';
				
				switch ($row->DATA_TYPE) {
					case 'tinyint':
						$type = 'checkbox';
						$value = '1';
						$form .= '<input name="'.$row->COLUMN_NAME.'" value="0" type="hidden">';
					break;
					case 'date':
						$type = 'date';
						$arguments .= 'placeholder="yyyy-mm-dd"';
					break;
					case 'datetime':
						$type = 'datetime';
						$arguments .= 'placeholder="yyyy-mm-dd hh:mm:ss"';
					break;
					case 'int':
						$type = 'number';
					case 'float':
						$type = 'number';
					break;
				}
				
				if ($id != 'create') {
					if ($row->DATA_TYPE != 'tinyint') {
						$value = $currentEntry[$row->COLUMN_NAME];
					}
					else if ($currentEntry[$row->COLUMN_NAME]) {
						$arguments .= 'checked="true"';
					}
				}
				
				if ($row->COLUMN_NAME == 'password') {
					$type = 'password';
					$arguments .= 'autocomplete="off"';
					$value = 'password';
				}
				
				if (!empty($row->CHARACTER_MAXIMUM_LENGTH) && $row->CHARACTER_MAXIMUM_LENGTH <= 100) {
					$arguments .= 'size="'.$row->CHARACTER_MAXIMUM_LENGTH.'"';
				}
				
				$form .= $row->COLUMN_NAME.':<br>';
				$form .= '<input name="'.$row->COLUMN_NAME.'" type="'.$type.'" value="'.$value.'" '.$arguments.'><br>';
			}
		}
	}
	
	else {
		return '<p>Could not load form: database errors.</p>';
	}
	
	if ($id == 'create') {
		$form .= '<br><input type="submit" value="Insert">';
		$form .= '<input name="action" value="insert" type="hidden">';
	} else {
		$form .= '<br><input type="submit" value="Update">';
		$form .= '<input name="action" value="update" type="hidden">';
		$form .= '<input name="action" value="delete" type="checkbox"> Delete';
	}
	
	$form .= '<input name="table" value="'.$table.'" type="hidden"><input name="id" value="'.$id.'" type="hidden">';
	$form .= '</form>';
	
	return $form;
}

function getDataItemsList ($table) {
	$headers = array();
	$content = '';

	$i = 0;
	if ($columnInfo = getTableFormInfo($table)) {
		while ($row = $columnInfo->fetch_object()) {
			if ($row->COLUMN_NAME != 'id') {
				$headers[$i] = $row->COLUMN_NAME;
				$i++;
			}
		}
	}
	
	else {
		return '<p>Could not load list: database errors.</p>';
	}
	
	if ($items = getAllEntries($table)) {
		while ($row = $items->fetch_assoc()) {
			$content .= '<tr>';
						
			foreach ($headers as $field) {
				$content .= '<td>'.$row[$field].'</td>';
			}

			$content .= '<td><a href="edit-entry.php?table='.$table.'&id='.$row['id'].'">Edit</a></td>';
			$content .= '</tr>';
		}
	}
	
	else {
		return '<p>Could not load list: database errors.</p>';
	}
	
	$headers[$i] = 'Edit';
	$ret = buildFancyTable('items', $headers, $content);
	$ret .= '<p><a href="edit-entry.php?table='.$table.'&id=create">Add Item</a></p>';
	
	return $ret;
}

?>
