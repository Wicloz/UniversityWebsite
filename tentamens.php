<?php
	error_reporting(0);
	require 'db/connect.php';
?>

<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Wilco de Boer</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	
	<body>
        <!--sdh-->
		<div class="container-fluid" id="header">
			<a href="http://liacs.leidenuniv.nl/" target="_blank">
				<img src="images/leidenuniv.png" alt="Logo Universiteit Leiden">
			</a>
			<div class="container-fluid" id="headertext">
				<h1>W.F.H. de Boer</h1>
			</div>
		</div>
		
		<nav class="navbar navbar-blue">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">s1704362</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.html">Home</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="">Vakken
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="vak_fi1.html">Fundamentele Informatica</a></li>
							<li><a href="vak_pm.html">Programmeermethoden</a></li>
							<li><a href="vak_stpr.html">Studeren & Presenteren</a></li>
							<li><a href="vak_mg.html">Moleculaire Genetica</a></li>
							<li><a href="vak_bp.html">Basispracticum</a></li>
						  </ul>
						</li>
						<li class="active"><a href="tentamens.php">Tentamens</a></li>
						<li><a href="deadlines.php">Deadlines</a></li>
						<li><a href="links.html">Handige Links</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="rooster.html">Rooster I&B</a></li>
						<li><a href="https://onedrive.live.com/redir?resid=7A26A4E50EEC48CB!401&authkey=!ALF9KqGbBDdyK_M&ithint=onenote%2c" target="_blank">Notities</a></li>
						<li><a href="http://www.color-hex.com/color-palette/10598" target="_blank">Kleurenpalet</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
        <!--edh-->
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
				</div>
				<div class="col-sm-8" id="content-main">
                    <div class="paragraph-center col-sm-12">
				        <iframe class="agenda" src="https://www.google.com/calendar/embed?src=ai9kouej2b434he9otn9pvd66c%40group.calendar.google.com&ctz=Europe/Amsterdam" frameborder="0" scrolling="no"></iframe>
                    </div>
					<div class="paragraph-center col-sm-12">
						<h2>Tentamens:</h2>
						<table id="tentamens-tabel" class="table-fancy">
							<tr>
								<th>Datum</th>
								<th>Soort</th>
								<th>Vak</th>
								<th>Cijfer</th>
							</tr>
						<?php
							if ($result = $db->query("SELECT * FROM tentamens")) {
								if ($result->num_rows) {
									while ($row = $result->fetch_object()) {
										echo '<tr>';
										echo '<td>', $row->date, '</td>';
										echo '<td>', $row->weight, '</td>';
										echo '<td>', $row->subject, '</td>';
										if ($row->completion == 1) {
											echo '<td>', $row->mark, '</td>';
										} else {
											echo '<td>N/A</td>';
										}
										echo '</tr>';
									}
									$result->free();
								}
							} else {
								die ($db->error);
							}
						?>
						</table>
                    </div>
				</div>
				<div class="col-sm-2" id="content-left">
				</div>
			</div>
		</div>
	</body>
</html>
