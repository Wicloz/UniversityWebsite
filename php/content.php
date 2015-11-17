<?php
require 'computing.php';

function timeFancy ($time) {
	return date('H:i', strtotime($time));
}

function timeDuration ($time) {
	$minutes = date('i', strtotime($time));
	if (strpos($minutes, '0') === 0) {
		$minutes = substr($minutes, 1);
	}
	return date('G', strtotime($time)).'h '.$minutes.'m';
}

function dateFancy ($date) {
	return date('d-m-Y', strtotime($date));
}

function dateTable ($date) {
	return date('d-m-Y', strtotime($date));
}

function dateList ($date) {
	return date('d F Y', strtotime($date));
}

function dateItem ($date) {
	return date('d F Y', strtotime($date));
}

function assignmentCompletionString ($row) {
	if ($row->completion) {
		return 'Complete';
	} else if (date('Y-m-d') < $row->end_date || (date('Y-m-d') == $row->end_date && date('H:i:s') <= $row->end_time)) {
		return 'Working';
	} else {
		return 'Overdue';
	}
}

function examCompletionString ($row, $mark) {
	if (!empty($row->mark) && $mark) {
		return $row->mark;
	} else if ($row->date < date("Y-m-d")) {
		return 'Passed';
	} else {
		return 'Upcoming';
	}
}

function examMarkString ($row) {
	if (!empty($row->mark)) {
		return $row->mark;
	} else if ($row->date < date("Y-m-d")) {
		return 'N/A';
	} else {
		return 'Upcoming';
	}
}

function planningCompletionString ($row) {
	if ($row->done) {
		return 'Done';
	} else if (date('Y-m-d') <= $row->date_end) {
		return 'Planned';
	} else {
		return 'Overdue';
	}
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
	$subjects = getAllEntriesSorted('subjects', 'name');
	
	while ($row = $subjects->fetch_object()) {
		if ($row->active) {
			$assignments = getAllEntriesSorted('assignments', 'end_date');
			$exams = getAllEntriesSorted('tentamens', 'date');
			$hr = '</li><hr style="margin:0px;border-color:#06123B;margin-right:40%;">';
			$listA = '';
			$listE = '';
			
			$ret .= '<div class="paragraph-center col-sm-12" id="subject_'.$row->abbreviation.'">';
			$ret .= '<h2><a href="index.php?page=subjects&subject='.$row->abbreviation.'">'.$row->name.'</a></h2>';
			
			while ($assignment = $assignments->fetch_object()) {
				if ($assignment->subject == $row->name) {
					$listA .= '<li>';
					$listA .= dateList($assignment->end_date).' - ';
					$listA .= '<a href="index.php?page=assignments_item&id='.$assignment->id.'">'.$assignment->desc_short.'</a>';
					if ($assignment->end_date < date("Y-m-d")) {
						$listA = str_replace($hr, '', $listA);
						$listA .= $hr;
					}
				}
			}
			while ($exam = $exams->fetch_object()) {
				if ($exam->subject == $row->name) {
					$listE .= '<li>';
					$listE .= dateList($exam->date).' - ';
					$listE .= '<a href="index.php?page=exams_item&id='.$exam->id.'">'.$exam->weight.' '.$exam->subject.'</a>';
					$listE .= '</li>';
					if ($exam->date < date("Y-m-d")) {
						$listE = str_replace($hr, '', $listE);
						$listE .= $hr;
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
			if ($listE) {
				$ret .= '<h3 style="text-align:left;">Exams</h3><ul>';
				if (strpos($listE, $hr) === false) {
					$ret .= $hr;
				}
				$ret .= $listE;
				$ret .= '</ul>';
			}
			
			$ret .= '</div>';
		}
	}
	
	return $ret;
}

function getTableAssignments () {
	$headers = array('Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	$table = getAllEntriesSorted('assignments', 'end_date');
	
	while ($row = $table->fetch_object()) {
		$s1 = '';
		$s2 = '';
		if ($row->completion) {
			$s1 = '<s>';
			$s2 = '</s>';
		}
		
		$content .= '<tr>';
		
		$content .= '<td>'.$s1.dateTable($row->end_date).', '.timeFancy($row->end_time).$s2.'</td>';
		$content .= '<td>'.$s1.$row->subject.$s2.'</td>'; 
		$content .= '<td>'.$s1.'<a href="index.php?page=assignments_item&id='.$row->id.'">'.$row->desc_short.'</a>'.$s2.'</td>';
		$content .= '<td>'.$s1.$row->team.$s2.'</td>';
		
		$content .= '<td>'.$s1;
		if (!empty($row->link_assignment)) {
			$content .= '<a target="_blank" href="'.$row->link_assignment.'">Assignment</a>';
		}
		if (!empty($row->link_assignment) && !empty($row->link_repository)) {
			$content .= ' / ';
		}
		if (!empty($row->link_repository)) {
			$content .= '<a target="_blank" href="'.$row->link_repository.'">Repository</a>';
		}
		$content .= $s2.'</td>';
		
		$content .= '<td>'.$s1.assignmentCompletionString($row).$s2.'</td>';
		
		$content .= '</tr>';
	}
			
	$ret = buildFancyTable($headers, $content, '');
	$ret .= '<p><a class="button" href="index.php?page=list-entries&table=assignments">Edit Table</a></p>';
	return $ret;
}

function getTableExams () {
	$headers = array('Date', 'Weight', 'Subject', 'Mark');
	$content = '';
	$table = getAllEntriesSorted('tentamens', 'date');
			
	while ($row = $table->fetch_object()) {
		$s1 = '';
		$s2 = '';
		if ($row->date < date('Y-m-d')) {
			$s1 = '<s>';
			$s2 = '</s>';
		}
		
		$content .= '<tr>';
		
		$content .= '<td>'.$s1.dateTable($row->date).$s2.'</td>';
		$content .= '<td>'.$s1.'<a href="index.php?page=exams_item&id='.$row->id.'">'.$row->weight.'</a>'.$s2.'</td>';
		$content .= '<td>'.$s1.$row->subject.$s2.'</td>';
		$content .= '<td>'.$s1.examMarkString($row).$s2.'</td>';
		
		$content .= '</tr>';
	}
			
	$ret = buildFancyTable($headers, $content, 'table-thinner');
	$ret .= '<p><a class="button table-thinner" href="index.php?page=list-entries&table=tentamens">Edit Table</a></p>';
	return $ret;
}

function getTableEvents ($subject, $all, $clean) {
	$headers = array('Date', 'Subject', 'Task', 'Status');
	$content = '';
	
	if ($all) {
		$assignments = getAllEntriesSorted('assignments', 'end_date');
		$exams = getAllEntriesSorted('tentamens', 'date');
	} else {
		$assignments = getEntriesWithTestSorted('assignments', 'subject', $subject, 'end_date');
		$exams = getEntriesWithTestSorted('tentamens', 'subject', $subject, 'date');
	}
	
	$todayAdded = false;
	$doneT = false;
	$doneA = false;
    if (!$exams || !($rowT = $exams->fetch_object())) {
        $doneT = true;
    }
	if (!$assignments || !($rowA = $assignments->fetch_object())) {
        $doneA = true;
    }
	
	while (!$doneT || !$doneA) {
	    if (!$doneA && ($doneT || $rowA->end_date < $rowT->date)) {
			$s1 = '';
			$s2 = '';
			if ($rowA->completion) {
				$s1 = '<s>';
				$s2 = '</s>';
			}
			
			if (!$todayAdded && $rowA->end_date >= date('Y-m-d')) {
				$content .= '<tr>';
				$content .= '<td><b>'.dateTable(date('Y-m-d')).'</b></td>';
				$content .= '<td><b>Today is a gift</b></td>';
				$content .= '<td><b>Thats why it\'s called the present</b></td>';
				$content .= '<td><b>-</b></td>';
				$content .= '</tr>';
				$todayAdded = true;
			}
			
			if (!$clean || !$rowA->completion) {
				$content .= '<tr>';
				$content .= '<td>'.$s1.dateTable($rowA->end_date).$s2.'</td>';
				$content .= '<td>'.$s1.$rowA->subject.$s2.'</td>';
				$content .= '<td>'.$s1.'<a href="index.php?page=assignments_item&id='.$rowA->id.'">'.$rowA->desc_short.'</a>'.$s2.'</td>';
				$content .= '<td>'.$s1.assignmentCompletionString($rowA).$s2.'</td>';
				$content .= '</tr>';
			}
		    
		    if (!($rowA = $assignments->fetch_object())) {
		        $doneA = true;
		    }
	    }
	    else if (!$doneT) {
			$s1 = '';
			$s2 = '';
			if ($rowT->date < date('Y-m-d')) {
				$s1 = '<s>';
				$s2 = '</s>';
			}
			
			if (!$todayAdded && $rowT->date >= date('Y-m-d')) {
				$content .= '<tr>';
				$content .= '<td><b>'.dateTable(date('Y-m-d')).'</b></td>';
				$content .= '<td><b>Today is a gift</b></td>';
				$content .= '<td><b>Thats why it\'s called the present</b></td>';
				$content .= '<td><b>-</b></td>';
				$content .= '</tr>';
				$todayAdded = true;
			}
			
			if (!$clean || date('Y-m-d') <= $rowT->date) {
				$content .= '<tr>';
				$content .= '<td>'.$s1.dateTable($rowT->date).$s2.'</td>';
				$content .= '<td>'.$s1.$rowT->subject.$s2.'</td>';
				$content .= '<td>'.$s1.'<a href="index.php?page=exams_item&id='.$rowT->id.'">'.$rowT->weight.' '.$rowT->subject.'</a>'.$s2.'</td>';
				$content .= '<td>'.$s1.examCompletionString($rowT, false).$s2.'</td>';
				$content .= '</tr>';
			}
	        
	        if (!($rowT = $exams->fetch_object())) {
                $doneT = true;
	        }
	    }
	}
	
	if (!$todayAdded) {
		$content .= '<tr>';
		$content .= '<td><b>'.dateTable(date('Y-m-d')).'</b></td>';
		$content .= '<td><b>Today is a gift</b></td>';
		$content .= '<td><b>Thats why it\'s called the present</b></td>';
		$content .= '<td><b>-</b></td>';
		$content .= '</tr>';
		$todayAdded = true;
	}
	
	$content .= '<tr><form action="#events" method="POST"><input type="hidden" name="action" value="insert_event">';
	$content .= '<td><input type="date" name="date" style="width:100%"></td>';
	$content .= '<td><input type="text" name="subject" style="width:100%" value="'.$subject.'"></td>';
	$content .= '<td><input type="text" name="task" style="width:100%"></td>';
	$content .= '<td><input class="button submit-button table-button" type="submit" value="Add"></td>';
	$content .= '</form></tr>';
	
	if (!empty($content)) {
		return buildFancyTable($headers, $content, '');
	} else {
		return '<p class="message-info">No events present.</p>';
	}
}

function getTableToday () {
	$headers = array('Subject', 'Type', 'Task', 'Status', 'Edit');
	$content = '';
	$assignmentsPre = getAllEntriesSorted('assignments', 'end_date');
	$exams = getEntriesWithTestSorted('tentamens', 'date', date('Y-m-d'), 'subject');
	$planningPre = getAllEntriesSorted('planning', 'date_start');
	
	$assignments = array();
	while ($assignmentsPre && $row = $assignmentsPre->fetch_object()) {
		if (date('Y-m-d') == $row->end_date || (!$row->completion && $row->end_date < date('Y-m-d'))) {
			$assignments[] = $row;
		}
	}
	
	$planning = array();
	while ($planningPre && $row = $planningPre->fetch_object()) {
		if ((date('Y-m-d') >= $row->date_start && date('Y-m-d') <= $row->date_end) || (!$row->done && $row->date_end < date('Y-m-d'))) {
			$planning[] = $row;
		}
	}
	
	if (!$assignments && !$exams && empty($planning)) {
		return '<p class="message-info">Nothing to do today.</p>';
	}
	
	foreach ($assignments as $row) {
		$s1 = '';
		$s2 = '';
		if ($row->completion) {
			$s1 = '<s>';
			$s2 = '</s>';
		}
		
		$content .= '<tr>';
		
		$content .= '<td>'.$s1.$row->subject.$s2.'</td>'; 
		$content .= '<td>'.$s1.'Assignment Deadline'.$s2.'</td>';
		$content .= '<td>'.$s1.'<a href="index.php?page=assignments_item&id='.$row->id.'">'.$row->desc_short.'</a>'.$s2.'</td>';
		$content .= '<td>'.$s1.assignmentCompletionString($row).$s2.'</td>';
		
		if ($row->completion) {
			$button = 'Uncomplete';
		} else {
			$button = 'Complete';
		}
		$content .= '<td><form action="" method="POST"><input type="hidden" name="action" value="switch_event"><input type="hidden" name="table" value="assignments"><input type="hidden" name="id" value="'.$row->id.'"><input class="button submit-button table-button" type="submit" value="'.$button.'"></form></td>';
		
		$content .= '</tr>';
	}
	
	while ($exams && $row = $exams->fetch_object()) {
		$s1 = '';
		$s2 = '';
		if ($row->date < date('Y-m-d')) {
			$s1 = '<s>';
			$s2 = '</s>';
		}
		
		$content .= '<tr>';
		
		$content .= '<td>'.$s1.$row->subject.$s2.'</td>';
		$content .= '<td>'.$s1.'Examination'.$s2.'</td>';
		$content .= '<td>'.$s1.'<a href="index.php?page=exams_item&id='.$row->id.'">'.$row->weight.' '.$row->subject.'</a>'.$s2.'</td>';
		$content .= '<td>'.$s1.examCompletionString($row, false).$s2.'</td>';
		$content .= '<td><a class="button table-button" href="index.php?page=edit-entry&table=tentamens&id='.$row->id.'">Edit</a></td>';
		
		$content .= '</tr>';
	}
	
	foreach ($planning as $row) {
		$s1 = '';
		$s2 = '';
		if ($row->done) {
			$s1 = '<s>';
			$s2 = '</s>';
		}
		
		$content .= '<tr>';
		
		$content .= '<td>'.$s1.$row->subject.$s2.'</td>';
		$content .= '<td>'.$s1.'Planning'.$s2.'</td>';
		$content .= '<td>'.$s1.$row->goal.$s2.'</td>';
		$content .= '<td>'.$s1.planningCompletionString($row).$s2.'</td>';
		
		if ($row->done) {
			$button = 'Uncomplete';
		} else {
			$button = 'Complete';
		}
		$content .= '<td><form action="" method="POST"><input type="hidden" name="action" value="switch_event"><input type="hidden" name="table" value="planning"><input type="hidden" name="id" value="'.$row->id.'"><input class="button submit-button table-button" type="submit" value="'.$button.'"></form></td>';
		
		$content .= '</tr>';
	}
			
	return buildFancyTable($headers, $content, '');
}

function getTablePlanning ($table, $id, $subject, $all, $clean) {
	$content = '';
	if ($all) {
		$entries = getAllEntriesSorted('planning', 'date_start');
		$headers = array('Date', 'Subject', 'Estimated Duration', 'Goal', 'Status', 'Edit');
	} else if (!empty($subject)) {
		$entries = getEntriesWithTestSorted('planning', 'subject', $subject, 'date_start');
		$headers = array('Date', 'Estimated Duration', 'Goal', 'Status', 'Edit');
	} else if ($id == -1) {
		$entries = getEntriesWithTestSorted('planning', 'parent_table', $table, 'date_start');
		$headers = array('Date', 'Subject', 'Estimated Duration', 'Goal', 'Status', 'Edit');
	} else {
		$entries = getEntriesWithDoubleTestSorted('planning', 'parent_table', $table, 'parent_id', $id, 'date_start');
		$headers = array('Date', 'Estimated Duration', 'Goal', 'Status', 'Edit');		
	}
	
	if ($entries) {
		while ($row = $entries->fetch_object()) {
			$s1 = '';
			$s2 = '';
			if ($row->done) {
				$s1 = '<s>';
				$s2 = '</s>';
			}
			
			if (!$clean || !$row->done) {
				$content .= '<tr>';
				
				if ($row->date_start == $row->date_end) {
					$content .= '<td>'.$s1.dateTable($row->date_start).$s2.'</td>';	
				} else {
					$content .= '<td>'.$s1.dateTable($row->date_start).' - '.dateTable($row->date_end).$s2.'</td>';	
				}
				
				if ($all || $id == -1) {
					$content .= '<td>'.$s1.$row->subject.$s2.'</td>';
				}
				
				if ($row->duration == '00:00:00') {
					$content .= '<td>'.$s1.'Undefined'.$s2.'</td>';
				} else {
					$content .= '<td>'.$s1.timeDuration($row->duration).$s2.'</td>';
				}
				
				$content .= '<td>'.$s1.$row->goal.$s2.'</td>';
				$content .= '<td>'.$s1.planningCompletionString($row).$s2.'</td>';
				
				if ($row->done) {
					$button = 'Uncomplete';
				} else {
					$button = 'Complete';
				}
				$content .= '<td><form action="" method="POST"><input type="hidden" name="action" value="switch_event"><input type="hidden" name="table" value="planning"><input type="hidden" name="id" value="'.$row->id.'"><input class="button submit-button table-button" type="submit" value="'.$button.'"></form></td>';
				
				$content .= '</tr>';
			}
		}
	}
	
	if (!empty($table) && !empty($id)) {
		$content .= '<tr>';
		$content .= '<td><form action="" method="POST"><input type="hidden" name="action" value="insert_planning"><input type="hidden" name="parent_table" value="'.$table.'"><input type="hidden" name="parent_id" value="'.$id.'">';
		$content .= '<input type="date" name="start_date" style="width:46%"> - <input type="date" name="end_date" style="width:46%"></td>';
		$content .= '<td><input type="text" name="duration" placeholder="00h 00m" style="width:100%"></td>';
		$content .= '<td><input type="text" name="goal" style="width:100%"></td>';
		$content .= '<td>-</td>';
		$content .= '<td><input class="button submit-button table-button" type="submit" value="Add"></form></td>';
		$content .= '</tr>';
	}
	
	if (!empty($content)) {
		$ret = buildFancyTable($headers, $content, '');
		$ret .= '<p><a class="button" href="index.php?page=list-entries&table=planning">Edit Table</a></p>';
		return $ret;
	} else {
		$ret = '<p class="message-info">No planning present.</p>';
		$ret .= '<p><a class="button" href="index.php?page=list-entries&table=planning">Edit Table</a></p>';
		return $ret;
	}
}

function getItemAssignment ($id) {
	if ($currentEntryTable = getEntryWithId('assignments', $id)) {
		$row = $currentEntryTable->fetch_object();
		
		$item = '<h2>'.$row->desc_short.'</h2>';
		$item .= '<p>'.$row->desc_full.'</p>';
		
		$item .= '<p><i>Subject: '.$row->subject
			  .'<br>Date Assigned: '.dateItem($row->start_date)
			  .'<br>Deadline: '.dateItem($row->end_date).', '.timeFancy($row->end_time);
			   
		if (!empty($row->team)) {
			$item .= '<br>Team: '.$row->team;
		}
		
		$item .= '<br>Status: ';
		$item .= assignmentCompletionString($row).'</i></p>';
		
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
		
		$item .= '<a class="button edit-item-button" href="index.php?page=edit-entry&table=assignments&id='.$id.'">Edit Item</a>';
		
		if (!empty($row->link_report)) {
			$item .= '</div>';
			$item .= '<div class="paragraph-center col-sm-12">';
			$item .= '<h2>Report</h2>';
			$item .= '<iframe name="report" src="'.$row->link_report.'" width="100%" height="600"></iframe>';
		}
		return $item;
	}
	
	else {
		return '<p class="message-warning">Could not load item: entry does not exist.</p>';
	}
}

function getItemExam ($id) {
	if ($currentEntryTable = getEntryWithId('tentamens', $id)) {
		$row = $currentEntryTable->fetch_object();
		
		$item = '<h2>'.$row->weight.' '.$row->subject.'</h2>';
		$item .= '<p>'.$row->substance.'</p>';
		
		$item .= '<p><i>Subject: '.$row->subject
			  .'<br>Exam Date: '.dateItem($row->date);
		
		$item .= '<br>Status: '.examCompletionString($row, true);
		
		if (!empty($row->link)) {
			$item .= '<br>Link: <a target="_blank" href="'.$row->link.'">'.$row->link.'</a>';
		}
		
		$item .= '</i></p>';
		$item .= '<a class="button edit-item-button" href="index.php?page=edit-entry&table=tentamens&id='.$id.'">Edit Item</a>';
		return $item;
	}
	
	else {
		return '<p class="message-warning">Could not load item: entry does not exist.</p>';
	}
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

			$content .= '<td><a class="button table-button" href="index.php?page=edit-entry&table='.$table.'&id='.$row['id'].'">Edit</a></td>';
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
