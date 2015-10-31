<?php
require 'items.php';
require 'errors.php';

function getContent ($name, $GET, $POST, $FILES) {
	$ret = '';
	
	switch ($name) {
		case 'table_exams';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<h2>Exams:</h2>';
			$ret .= getTableExams();
			$ret .= '</div>';
		break;
		
		case 'table_assignments';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<h2>Assignments:</h2>';
			$ret .= getTableAssignments();
			$ret .= '</div>';
		break;
		
		case 'table_events';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<h2>Upcoming Events:</h2>';
			$ret .= getTableEvents('', true, true);
			$ret .= '</div>';
		break;
		
		case 'item_assignment';
			if (isset($GET['id']) && !empty($GET['id'])) {
				$ret .= '<div class="paragraph-center col-sm-12">';
				$ret .= getItemAssignment($GET['id']);
			    $ret .= '</div>';
			}
		break;
		
		case 'item_exam';
			if (isset($GET['id']) && !empty($GET['id'])) {
				$ret .= '<div class="paragraph-center col-sm-12">';
				$ret .= getItemExam($GET['id']);
				$ret .= '</div>';
				$ret .= '<div class="paragraph-center col-sm-12">';
				$ret .= '<h2>Planning:</h2>';
				$ret .= getTablePlanning('tentamens', $GET['id'], false);
				$ret .= '</div>';
			}
		break;
		
		case 'form_editItem';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			if (isset($POST['action']) && isset($POST['table']) && isset($POST['id']) && !empty($POST['action']) && !empty($POST['table']) && !empty($POST['id'])) {
				foreach ($POST as $key => $value) {
					if ($key != 'action' && $key != 'table' && $key != 'id') {
						$entry[$key] = $value;
					}
				}
				$ret .= editDataItem($POST['table'], $POST['id'], $POST['action'], $entry);
			}
			if (isset($GET['table']) && isset($GET['id']) && !empty($GET['table']) && !empty($GET['id'])) {
				$ret .= getEditItemForm($GET['table'], $GET['id']);
			}
			$ret .= '</div>';
		break;
		
		case 'list_dataItems';
			if (isset($GET['table']) && !empty($GET['table'])) {
				$ret .= '<div class="paragraph-center col-sm-12">';
				$ret .= getDataItemsList($GET['table']);
				$ret .= '</div>';
			}
		break;
		
		case 'form_login';
			$ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '</div>';
		break;
		
		case 'form_uploadAny';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			if (isset($FILES['file']['name']) && isset($POST['target']) && !empty($FILES['file']['name']) && !empty($POST['target'])) {
				$ret .= uploadFileAny($FILES, $POST['target']);
			}
			$ret .= getUploadFileForm();
			$ret .= '</div>';
		break;
		
		case 'list_subjectOverview';
			$ret .= getSubjectOverview();
		break;
		
		case 'subjectPage':
			if (isset($GET['subject']) && !empty($GET['subject'])) {
				$ret .= getSubjectPage($GET['subject']);
			} else {
				$ret .= err_404();
			}
		break;
		
		case 'table_planning':
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<h2>Planning:</h2>';
			$ret .= getTablePlanning('', '', true);
			$ret .= '</div>';
		break;
		
		default:
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<p class="message-error">Content with name \''.$name.'\' not found.</p>';
			$ret .= '</div>';
		break;
	}
	
	if (strpos($name, 'article_') !== false) {
	    $ret = '<div class="paragraph-center col-sm-12">';
		$ret .= getArticle($name);
		$ret .= '</div>';
	}
	
	return $ret;
}

function getViewForPage ($page, $GET, $POST, $FILES) {
	$view = '';
	$content = explode(',', str_replace(', ', ',', $page->content));
	foreach ($content as $item) {
		$view .= getContent($item, $GET, $POST, $FILES);
	}
	return $view;
}

function getSubjectPage ($id) {
	if ($subjects = getEntryWithTest('subjects', 'abbreviation', $id)) {
		$subject = $subjects->fetch_object();
		
		$ret = '<div class="paragraph-center col-sm-12">';
		$ret .= '<h2>'.$subject->name.'</h2>';
		$ret .= '<p>'.$subject->content.'</p>';
		$ret .= '</div>';
		
		$links = '<ul>';
		if (!empty($subject->link_home)) {
			$links .= '<li><a href="'.$subject->link_home.'" target="_blank">Main Page</a></li>';	
		}
		if (!empty($subject->link_schedule)) {
			$links .= '<li><a href="'.$subject->link_schedule.'" target="_blank">Schedule</a></li>';	
		}
		if (!empty($subject->link_powerpoints)) {
			$links .= '<li><a href="'.$subject->link_powerpoints.'" target="_blank">College Slides</a></li>';	
		}
		if (!empty($subject->link_assignments)) {
			$links .= '<li><a href="'.$subject->link_assignments.'" target="_blank">Assignments</a></li>';	
		}
		if (!empty($subject->link_marks)) {
			$links .= '<li><a href="'.$subject->link_marks.'" target="_blank">Marks</a></li>';	
		}
		
		if ($links != '<ul>') {
			$ret .= '<div class="paragraph-left col-sm-12">';
			$ret .= '<h2>Links:</h2>';
			$ret .= $links.'</ul>';
			$ret .= '</div>';
		}
		
		$ret .= '<div class="paragraph-center col-sm-12">';
		$ret .= '<h2>Planning:</h2>';
		$ret .= getTablePlanning('subjects', $id, false);
		$ret .= '</div>';
		
		$ret .= '<div class="paragraph-center col-sm-12">';
		$ret .= getTableEvents($subject->name, false, false);
		$ret .= '</div>';

		return $ret;
	}
	
	else {
		return err_404();
	}
}

?>
