<?php
function parseSubjectNav ($row) {
	$subjects = getSubjects();
    
    while ($subject = $subjects->fetch_object()) {
        if ($subject->active) {
            $sub_names[] = $subject->name;
            $sub_urls[] = '?page=subjects&subject='.$subject->abbreviation;
        }
    }
    if (!isset($sub_names) || !isset($sub_urls)) {
        $sub_names[] = 'No Subjects';
        $sub_urls[] = '?page=subjects&subject=none';
    }
    
	$row->sub_names = implode(', ', $sub_names);
	$row->sub_urls = implode(', ', $sub_urls);
	$row->url = '';
	return $row;
}

function topnav ($page) {
    $navin = getAllEntries('navigation');
    $navout = array();
    
    while ($row = $navin->fetch_object()) {
        if ($row->url == '%SUBJECTS%') {
			$row = parseSubjectNav($row);
		}
        
        $subNames = explode(',', str_replace(', ', ',', $row->sub_names));
        $subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
        $active = $page == $row->url;
        
        $subItems = array();
        if (empty($row->url)) {
            foreach ($subNames as $index => $subName) {
                $activeSub = $page == $subUrls[$index];
                $subItems[] = ["title" => $subName,
                               "location" => $subUrls[$index],
                               "active" => $activeSub];
            }
        }

        if (empty($subItems)) {
            $subItems = "";
        }
        
        $navout[] = ["title" => $row->name,
                     "location" => $row->url,
                     "target" => $row->target,
                     "active" => $active,
                     "subItems" => $subItems];
    }
    
    return $navout;
}

function sidenav ($page) {
    
}
?>