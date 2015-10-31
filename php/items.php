<?php
require 'content.php';

function getArticle ($name) {
	$articles = getAllEntries ('articles');
			
	while ($row = $articles->fetch_object()) {
		if ('article_'.$row->category.'_'.$row->name == $name) {
			return $row->content;
		}
	}
	
	return '<p class="message-error">Article with name \''.$name.'\' not found.</p>';
}

function headContent () {
	return '<head>
				<title>Wilco de Boer</title>
				<meta charset="utf-8">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
				<link rel="stylesheet" href="style.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			</head>';
}

function footerContent () {
	return '<div class="container-fluid" id="footer">
				<div class="row">
					<div class="col-sm-1" id="footer-right">
					</div>
					<div class="col-sm-10" id="footer-main">
						<h2>Contact</h2>
						<p>Name: Wilco de Boer</p>
						<p>Student Number: s1704362</p>
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
					<img src="media/leidenuniv.png" alt="Logo Universiteit Leiden">
				</a>
				<div class="container-fluid" id="headertext">
					<h1>W.F.H. de Boer</h1>
				</div>
			</div>';
}

function buildListItem ($title, $location, $target, $active) {
    $ret = '<li';
    if ($active == $location) {
        $ret .= ' class="active"';
    }
	if (!empty($target)) {
		$ret .= '><a href="'.$location.'" target="'.$target.'">'.$title.'</a></li>';
	} else {
		$ret .= '><a href="'.$location.'">'.$title.'</a></li>';
	}
	return $ret;
}

function discordSidebarI () {
	return '<iframe class="discord" src="https://discordapp.com/widget?id=107472497242275840&theme=dark" allowtransparency="true" frameborder="0"></iframe>';
}

function discordSidebarB () {
	return '';
}

function parseSubjectNav ($row) {
	$subjects = getAllEntriesSorted('subjects', 'name');
	while ($subject = $subjects->fetch_object()) {
		if ($subject->active) {
			$sub_names[] = $subject->name;
			$sub_urls[] = 'index.php?page=subjects&subject='.$subject->abbreviation;
		}
	}
	$row->sub_names = implode(', ', $sub_names);
	$row->sub_urls = implode(', ', $sub_urls);
	$row->url = '';
	return $row;
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
		if ($row->url == '%SUBJECTS%') {
			$row = parseSubjectNav($row);
		}
		
		if (!empty($row->url) && !empty($row->sub_names)) {
		    $subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
			if (in_array($active, $subUrls)) {
				$navbar .= buildListItem($row->name, $row->url, $row->target, $row->url);
			} else {
				$navbar .= buildListItem($row->name, $row->url, $row->target, $active);
			}
		}
		else if (!empty($row->url)) {
			$navbar .= buildListItem($row->name, $row->url, $row->target, $active);
		}
		else {
			$subNames = explode(',', str_replace(', ', ',', $row->sub_names));
			$subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
			$subSize = count($subNames);
			
			$navbar .= '<li class="dropdown';
			if (in_array($active, $subUrls)) {
				$navbar .= ' active';
			}
			$navbar .= '">';
			
			$navbar .= '<a class="dropdown-toggle" data-toggle="dropdown" href="">'.$row->name.'
						<span class="caret"></span></a>
						<ul class="dropdown-menu">';
			
			for ($i = 0; $i < $subSize; $i++) {
				$navbar .= buildListItem($subNames[$i], $subUrls[$i], '', $active);
			}
			
			$navbar .= '</ul></li>';
		}
	}

	$navbar .= '</ul><ul class="nav navbar-nav navbar-right">';
	$navbar .= buildListItem('<span class="glyphicon glyphicon-log-in"></span> Login', 'index.php?page=login', '', $active);
	$navbar .= '</ul></div></div></nav>';
	
	return $navbar;
}

function leftnavContent ($active) {
	$table = getAllEntries('navigation');
	$navbox = '';
	
	while ($row = $table->fetch_object()) {
		if ($row->url == '%SUBJECTS%') {
			$row = parseSubjectNav($row);
		}
		
		if (!empty($row->sub_names)) {
			$subUrls = explode(',', str_replace(', ', ',', $row->sub_urls));
			
			if (in_array($active, $subUrls)) {
				$subNames = explode(',', str_replace(', ', ',', $row->sub_names));
				$subSize = count($subNames);
							
				$navbox .= '<div class="navbox"><h2>'.$row->header.'</h2><ul>';
				for ($i = 0; $i < $subSize; $i++) {
					$navbox .= buildListItem($subNames[$i], $subUrls[$i], '', $active);
				}
				$navbox .= '</ul></div>';
			}
		}
	}
	
	return $navbox;
}

?>
