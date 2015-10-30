<?php
require 'computing.php';

function fancyDate ($date) {
	return date('d-m-Y', strtotime($date));
}

function buildFancyTable ($headers, $content, $class) {
	if (!empty($class)) {
		$table = '<table class="table-fancy '.$class.'"><tr>';
	} else {
		$table = '<table class="table-fancy"><tr>';
	}
	foreach ($headers as $field) {
		$table .= '<th>'.$field.'</th>';
	}
	$table .= '</tr>'.$content.'</table>';
	return $table;
}

function getSubjectOverview () {
    $ret = '';
    $assignments = getAllEntriesSorted('assignments', 'end_date');
	$tentamens = getAllEntriesSorted('tentamens', 'date');
	$subjects = array();
	
	while ($row = $tentamens->fetch_object()) {
	    if (!in_array($row->subject, $subjects)) {
	        $subjects[] = $row->subject;
	    }
	}
	while ($row = $assignments->fetch_object()) {
	    if (!in_array($row->subject, $subjects)) {
	        $subjects[] = $row->subject;
	    }
	}
	
	foreach ($subjects as $subject) {
		$assignments = getAllEntriesSorted('assignments', 'end_date');
		$tentamens = getAllEntriesSorted('tentamens', 'date');
		$hr = '</li><hr style="margin:0px;border-color:#06123B;margin-right:50%;">';
		$listA = '';
		$listT = '';
		
		$ret .= '<div class="paragraph-center col-sm-12">';
	    $ret .= '<h2>'.$subject.'</h2>';
		
		while ($row = $assignments->fetch_object()) {
			if ($row->subject == $subject) {
				$listA .= '<li>';
				$listA .= date('d F Y', strtotime($row->end_date)).' - ';
				$listA .= '<a href="index.php?page=assignments_item&id='.$row->id.'">'.$row->desc_short.'</a>';
				if ($row->end_date < date("Y-m-d")) {
					$listA = str_replace($hr, '', $listA);
					$listA .= $hr;
				}
			}
		}
		while ($row = $tentamens->fetch_object()) {
			if ($row->subject == $subject) {
				$listT .= '<li>';
				$listT .= date('d F Y', strtotime($row->date)).' - ';
				$listT .= $row->weight.' '.$row->subject;
				$listT .= '</li>';
				if ($row->date < date("Y-m-d")) {
					$listT = str_replace($hr, '', $listT);
					$listT .= $hr;
				}
			}
		}
		
		if ($listA) {
			$ret .= '<h3 style="text-align:left;">Assignments</h3><ul>';
			if (strpos($listA, $hr) === false) {
				$ret .= $hr;
			}
			$ret .= $listA;
			$ret .= '</ul>';
		}
		if ($listT) {
			$ret .= '<h3 style="text-align:left;">Exams</h3><ul>';
			if (strpos($listT, $hr) === false) {
				$ret .= $hr;
			}
			$ret .= $listT;
			$ret .= '</ul>';
		}
		
	    $ret .= '</div>';
	}
	
	return $ret;
}

function getTableAssignments () {
	$headers = array('Date Assigned', 'Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	$table = getAllEntriesSorted('assignments', 'end_date');
	
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.fancyDate($row->start_date).'</td>';
		$content .= '<td>'.fancyDate($row->end_date).' '.$row->end_time.'</td>';
		$content .= '<td>'.$row->subject.'</td>'; 
		$content .= '<td><a href="index.php?page=assignments_item&id='.$row->id.'">'.$row->desc_short.'</a></td>';
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
			
	return buildFancyTable($headers, $content, '');
}

function getTableTentamens () {
	$headers = array('Date', 'Weight', 'Subject', 'Mark');
	$content = '';
	$table = getAllEntriesSorted('tentamens', 'date');
			
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>'.fancyDate($row->date).'</td>';
		$content .= '<td>'.$row->weight.'</td>';
		$content .= '<td>'.$row->subject.'</td>';
		
		if (!empty($row->mark)) {
			$content .= '<td>'.$row->mark.'</td>';
		} else if ($row->date < date("Y-m-d")) {
			$content .= '<td>N/A</td>';
		} else {
			$content .= '<td>Upcoming</td>';
		}
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($headers, $content, 'table-tentamens');
}

function getTableEvents () {
	$headers = array('Date', 'Subject', 'Task', 'Status');
	$content = '';
	$assignments = getAllEntriesSorted('assignments', 'end_date');
	$tentamens = getAllEntriesSorted('tentamens', 'date');
	
	$doneT = false;
	$doneA = false;
    if (!($rowT = $tentamens->fetch_object())) {
        $doneT = true;
    }
	if (!($rowA = $assignments->fetch_object())) {
        $doneA = true;
    }
	
	while (!$doneT || !$doneA) {
	    if (!$doneA && ($doneT || $rowA->end_date < $rowT->date)) {
	 		$content .= '<tr>';
		    $content .= '<td>'.fancyDate($rowA->end_date).'</td>';
		    $content .= '<td>'.$rowA->subject.'</td>';
		    $content .= '<td><a href="index.php?page=assignments_item&id='.$rowA->id.'">'.$rowA->desc_short.'</a></td>';
		    if ($row->completion == 1) {
			    $content .= '<td>Complete</td>';
		    } else {
			    $content .= '<td>Working</td>';
		    }
		    $content .= '</tr>';
		    
		    if (!($rowA = $assignments->fetch_object())) {
		        $doneA = true;
		    }
	    }
	    else if (!$doneT) {
	    	$content .= '<tr>';
	        $content .= '<td>'.fancyDate($rowT->date).'</td>';
	        $content .= '<td>'.$rowT->subject.'</td>';
	        $content .= '<td>'.$rowT->weight.' '.$rowT->subject.'</td>';
	        if ($row->date < date("Y-m-d")) {
		        $content .= '<td>Passed</td>';
	        } else {
		        $content .= '<td>Upcoming</td>';
	        }
	        $content .= '</tr>';
	        
	        if (!($rowT = $tentamens->fetch_object())) {
                $doneT = true;
	        }
	    }
	}
			
	return buildFancyTable($headers, $content, '');
}

function getItemAssignment ($item_id) {
	$item = '';
	$table = getAllEntries('assignments');
	
	while ($row = $table->fetch_object()) {
		if ($row->id == $item_id) {
			$item .= '<h2>'.$row->desc_short.'</h2>';
			$item .= '<p>'.$row->desc_full.'</p>';
			
			$item .= '<p><i>Subject: '.$row->subject
				  .'<br>Date Assigned: '.fancyDate($row->start_date)
				  .'<br>Deadline: '.fancyDate($row->end_date).' '.$row->end_time;
				   
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
			
			$item .= '<a class="button edit-item-button" href="index.php?page=edit-entry&table=assignments&id='.$item_id.'">Edit Item</a>';
			
			if (!empty($row->link_report)) {
				$item .= '</div>';
				$item .= '<div class="paragraph-center col-sm-12">';
				$item .= '<h2>Report</h2>';
				$item .= '<iframe name="report" src="'.$row->link_report.'" width="100%" height="600"></iframe>';
			}
			break;
		}
	}
	
	return $item;
}

function getEditItemForm ($table, $id) {
	$form = '<form action="index.php?page=edit-entry&table='.$table.'&id='.$id.'" method="POST">';
	if ($id != 'create') {
		if ($currentEntryTable = getEntryWithId($table, $id)) {
			$currentEntry = $currentEntryTable->fetch_assoc();
		} else {
			return '<p class="message-warning">Could not load form: entry does not exist.</p>';
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
						//$type = 'number';
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
		return err_501();
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
		return err_501();
	}
	
	if ($items = getAllEntries($table)) {
		while ($row = $items->fetch_assoc()) {
			$content .= '<tr>';
						
			foreach ($headers as $field) {
				$content .= '<td>'.$row[$field].'</td>';
			}

			$content .= '<td><a href="index.php?page=edit-entry&table='.$table.'&id='.$row['id'].'">Edit</a></td>';
			$content .= '</tr>';
		}
	}
	
	else {
		return err_501();
	}
	
	$headers[$i] = 'Edit';
	$ret = buildFancyTable($headers, $content, '');
	$ret .= '<p><a class="button" href="index.php?page=edit-entry&table='.$table.'&id=create">Add Item</a></p>';
	
	return $ret;
}

function getUploadFileForm () {
	$form = '<form action="upload.php" method="POST" enctype="multipart/form-data">';
	
	$form .= '<input type="file" name="file"><br>';
	$form .= 'Target file location:<br>';
	$form .= '<input type="text" name="target"><br><br>';
	$form .= '<input type="submit" value="Upload">';
	
	$form .= '<form>';
	return $form;
}

?>
