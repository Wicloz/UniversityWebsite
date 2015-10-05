<?php
require 'content.php';


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

function getLineWithState ($lineA, $lineB, $active) {
	$ret = $lineA;
	if (strpos($lineB, $active) !== false) {
		$ret .= ' class="active"';
	}
	$ret .= $lineB;
	return $ret;
}

function mainnavContent ($active) {
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
							
							$navbar .= getLineWithState('<li', '><a href="index.php">Home</a></li>', $active);
							
							$navbar .= '<li class="dropdown';
							if (strpos($active, 'subject') !== false) {
								$navbar .= ' active';
							}
							$navbar .= '">';
							
							  $navbar .= '<a class="dropdown-toggle" data-toggle="dropdown" href="">Subjects
							  <span class="caret"></span></a>
							  <ul class="dropdown-menu">';
							  
								$navbar .= getLineWithState('<li', '><a href="subject_fi1.php">Fundamentele Informatica</a></li>', $active);
								$navbar .= getLineWithState('<li', '><a href="subject_pm.php">Programmeermethoden</a></li>', $active);
								$navbar .= getLineWithState('<li', '><a href="subject_stpr.php">Studeren & Presenteren</a></li>', $active);
								$navbar .= getLineWithState('<li', '><a href="subject_mg.php">Moleculaire Genetica</a></li>', $active);
								$navbar .= getLineWithState('<li', '><a href="subject_bp.php">Basispracticum</a></li>', $active);
								
							  $navbar .= '</ul>
							</li>';
							
							$navbar .= getLineWithState('<li', '><a href="semester-overview.php">Semester Overview</a></li>', $active);
							$navbar .= getLineWithState('<li', '><a href="contact.php">Contact</a></li>', $active);
							$navbar .= getLineWithState('<li', '><a href="schedule.php">Schedule I&B</a></li>', $active);
							
							$navbar .= '<li><a href="https://onedrive.live.com/view.aspx?resid=7A26A4E50EEC48CB!401&ithint=onenote%2c&app=OneNote&authkey=!ALF9KqGbBDdyK_M" target="_blank">Notes</a></li>
							<li><a href="http://www.color-hex.com/color-palette/10598" target="_blank">Color Palette</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">';
						
							$navbar .= getLineWithState('<li', '><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>', $active);
							
						$navbar .= '</ul>
					</div>
				</div>
			</nav>';
	return $navbar;
}

?>