<?php
require 'items.php';
require 'errors.php';

function getContent ($name, $GET, $POST, $FILES) {
	$ret = '';
	
	switch ($name) {
		case 'table_exams';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			$ret .= '<h2>Exams:</h2>';
			$ret .= getTableTentamens();
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
			$ret .= '<h2>Events:</h2>';
			$ret .= getTableEvents('', true);
			$ret .= '</div>';
		break;
		
		case 'item_assignment';
		    $ret .= '<div class="paragraph-center col-sm-12">';
			if (isset($GET['id']) && !empty($GET['id'])) {
				$ret .= getItemAssignment($GET['id']);
			}
			$ret .= '</div>';
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
		    $ret .= '<div class="paragraph-center col-sm-12">';
			if (isset($GET['table']) && !empty($GET['table'])) {
				$ret .= getDataItemsList($GET['table']);
			}
			$ret .= '</div>';
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
		
		
	}
	
	else {
		return err_404();
	}
}

?>
