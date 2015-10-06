<?php
require 'data.php';

function buildFancyTable ($id, $headers, $content) {
	$table = '<table id="' . $id . '-table" class="table-fancy"><tr>';
	foreach ($headers as $field) {
		$table .= '<th>' . $field . '</th>';
	}
	$table .= '</tr>' . $content . '</table>';
	return $table;
}

function getTableAssignments () {
	$id = 'assignments';
	$headers = array('Date Assigned', 'Deadline', 'Subject', 'Task', 'Team', 'Links', 'Status');
	$content = '';
	$table = getAllEntries ($id);
	
	while ($row = $table->fetch_object()) {
		$content .= '<tr>';
		
		$content .= '<td>' . $row->start_date . '</td>';
		$content .= '<td>' . $row->end_date . '</td>';
		$content .= '<td>' . $row->subject . '</td>'; 
		$content .= '<td><a href="assignments_item.php?id=' . $row->id . '">' . $row->desc_short . '</a></td>';
		$content .= '<td>' . $row->team . '</td>';
		
		$content .= '<td>';
			$content .= '<a target="_blank" href="' . $row->link_assignment . '">Assignment</a>';
			$content .= ' / ';
			$content .= '<a target="_blank" href="' . $row->link_repository . '">Repository</a>';
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
	$table = getAllEntries('assignments');
	
	while ($row = $table->fetch_object()) {
		if ($row->id == $item_id) {
			$item .= '<div class="paragraph-center col-sm-12">';
			$item .= '<h2>' . $row->desc_short . '</h2>';
			$item .= '<p>' . $row->desc_full . '</p>';
			
			$item .= '<p><i>Subject: ' . $row->subject
				   . '<br>Date Assigned: ' . $row->start_date
				   . '<br>Deadline: ' . $row->end_date
				   . '<br>Team: ' . $row->team;
				   
			$item .= '<br>Status: ';
			if ($row->completion == 1) {
				$item .= 'Complete</i></p>';
			} else {
				$item .= 'Working</i></p>';
			}
			
			if (!empty($row->link_assignment) || !empty($row->link_repository) || !empty($row->link_report)) {
				$item .= '<p><b>Links:</b><br>';
				if (!empty($row->link_assignment)) {
					$item .= '<a target="_blank" href="' . $row->link_assignment . '">Assignment</a><br>';
				}
				if (!empty($row->link_repository)) {
					$item .= '<a target="_blank" href="' . $row->link_repository . '">Repository</a><br>';
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

// Headers, footers and navigation
function footerContent () {
	return '<div class="container-fluid" id="footer">
				<div class="row">
					<div class="col-sm-1" id="footer-right">
					</div>
					<div class="col-sm-10" id="footer-main">
						<h2>Contact</h2>
						<p>Wilco de Boer</p>
						<p>Email: <a href="mailto:deboer.wilco@gmail.com">deboer.wilco@gmail.com</a></p>
						<p>Umail: <a href="mailto:s1704362@umail.leidenuniv.nl">s1704362@umail.leidenuniv.nl</a></p>
						<p>Mobile number: +31 0637338259</p>
					</div>
					<div class="col-sm-1" id="footer-left">
					</div>
				</div>
			</div>';
}

function headerContent () {
	return '<div class="container-fluid" id="header">
				<a href="http://liacs.leidenuniv.nl/" target="_blank">
					<img src="images/leidenuniv.png" alt="Logo Universiteit Leiden">
				</a>
				<div class="container-fluid" id="headertext">
					<h1>W.F.H. de Boer</h1>
				</div>
			</div>';
}

function buildListItem ($title, $location, $target, $active) {
    $ret = '<li';
    
    if ($active == str_replace('.php', '', $location)) {
        $ret .= ' class="active"';
    }
    
	if (!empty($target)) {
		$ret .= '><a href="' . $location . '" target="' . $target . '">' . $title . '</a></li>';
	} else {
		$ret .= '><a href="' . $location . '">' . $title . '</a></li>';
	}
	
	return $ret;
}

function mainnavContent ($active) {
	$table = getAllEntries('navigation');
	$navbar = '<nav class="navbar navbar-blue">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">s1704362</a>
					</div>
					<div class="collapse navbar-collapse" id="mainNavbar">
						<ul class="nav navbar-nav">';
							
	while ($row = $table->fetch_object()) {
		if (!empty($row->file)) {
		    $navbar .= buildListItem($row->name, $row->file, $row->target, $active);
		} else {
			$subNames = explode(',', $row->sub_names);
			$subFiles = explode(',', $row->sub_files);
			$subSize = count($subNames);
			
			$navbar .= '<li class="dropdown';
			if (strpos($active, $row->subid) !== false) {
				$navbar .= ' active';
			}
			$navbar .= '">';
			
			$navbar .= '<a class="dropdown-toggle" data-toggle="dropdown" href="">' . $row->name . '
						<span class="caret"></span></a>
						<ul class="dropdown-menu">';
			
			for ($i = 0; $i < $subSize; $i++) {
				$navbar .= buildListItem($subNames[$i], $row->subid.'_'.$subFiles[$i], '', $active);
			}
				
			$navbar .= '</ul>
						</li>';
		}
	}

						$navbar .= '</ul>
						<ul class="nav navbar-nav navbar-right">';
							$navbar .= buildListItem('<span class="glyphicon glyphicon-log-in"></span> Login', 'login.php', '', $active);
						$navbar .= '</ul>
					</div>
				</div>
			</nav>';
	return $navbar;
}

function leftnavContent ($active) {
	$table = getAllEntries('navigation');
	$navbox = '';
	
	while ($row = $table->fetch_object()) {
		if (!empty($row->sub_names)) {
			$subFiles = explode(',', $row->sub_files);
			
			if (in_array(str_replace($row->subid.'_', '', $active).'.php', $subFiles)) {
				$subNames = explode(',', $row->sub_names);
				$subSize = count($subNames);
							
				$navbox .= '<div class="navbox">
								<h2>' . $row->header . '</h2>
								<ul>';
				
				for ($i = 0; $i < $subSize; $i++) {
					$thisFile = $subFiles[$i];
					if (!empty($row->subid)) {
						$thisFile = $row->subid . '_' . $subFiles[$i];
					}
					
					$navbox .= buildListItem($subNames[$i], $thisFile, '', $active);
				}
				
				$navbox .= '</ul>
						</div>';
			}
		}
	}
	
	return $navbox;
}

?>
