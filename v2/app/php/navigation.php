<?php
function isActive ($getHas, $encodedMust) {
    $active = true;
    $pairsMust = explode('&', substr($encodedMust, strpos($encodedMust, '?') + 1));
    $pairsHas = array();
    foreach ($getHas as $key => $value) {
        $pairsHas[] = $key.'='.$value;
    }
    
    foreach ($pairsMust as $pair) {
        if (!in_array($pair, $pairsHas)) {
            $active = false;
        }
    }
    
    return $active;
}

function parseSubjectNav ($row) {
	$subjects = getSubjectsSQL();
    
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

function topnav ($get) {
    $navin = getAllEntries('navigation');
    $navout = array();
    
    while ($row = $navin->fetch_object()) {
        if ($row->url == '%SUBJECTS%') {
			$row = parseSubjectNav($row);
		}
        
        $subNames = explode(',', str_replace(', ', ',', $row->sub_names));
        $subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
        $active = isActive($get, $row->url);
        
        $subItems = array();
        foreach ($subNames as $index => $subName) {
            $activeSub = isActive($get, $subUrls[$index]);
            if ($activeSub) {
                $active = true;
            }
            if (empty($row->url)) {
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

function sidenav ($get) {
    $navin = getAllEntries('navigation');
    $navout = array();
    
    while ($row = $navin->fetch_object()) {
        if ($row->url == '%SUBJECTS%') {
			$row = parseSubjectNav($row);
		}
        
        if (!empty($row->sub_names)) {
            $active = false;
			$subNames = explode(',', str_replace(', ', ',', $row->sub_names));
			$subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
            
            $subItems = array();
            foreach ($subNames as $index => $subName) {
                $activeSub = isActive($get, $subUrls[$index]);
                if ($activeSub) {
                    $active = true;
                }
                $subItems[] = ["title" => $subName,
                               "location" => $subUrls[$index],
                               "active" => $activeSub];
            }
            
            if ($active) {
                $navout[] = ["header" => $row->header,
                             "content" => $subItems];
            }
		}
    }
    
    return $navout;
}
?>