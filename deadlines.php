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
					<a class="navbar-brand" href="index.php">s1704362</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="">Vakken
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="vak_fi1.php">Fundamentele Informatica</a></li>
							<li><a href="vak_pm.php">Programmeermethoden</a></li>
							<li><a href="vak_stpr.php">Studeren & Presenteren</a></li>
							<li><a href="vak_mg.php">Moleculaire Genetica</a></li>
							<li><a href="vak_bp.php">Basispracticum</a></li>
						  </ul>
						</li>
						<li><a href="tentamens.php">Tentamens</a></li>
						<li class="active"><a href="deadlines.php">Deadlines</a></li>
						<li><a href="links.php">Handige Links</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="rooster.php">Rooster I&B</a></li>
						<li><a href="https://onedrive.live.com/view.aspx?resid=7A26A4E50EEC48CB!401&ithint=onenote%2c&app=OneNote&authkey=!ALF9KqGbBDdyK_M" target="_blank">Notities</a></li>
						<li><a href="http://www.color-hex.com/color-palette/10598" target="_blank">Kleurenpalet</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
						<h2>Deadlines:</h2>
						<table id="deadlines-tabel" class="table-fancy">
							<tr>
								<th>Datum Opgave</th>
								<th>Datum Deadline</th>
								<th>Vak</th>
								<th>Taak</th>
								<th>Team</th>
								<th>Links</th>
								<th>Status</th>
							</tr>
						<?php
							if ($result = $db->query("SELECT * FROM deadlines")) {
								if ($result->num_rows) {
									while ($row = $result->fetch_object()) {
										echo '<tr>';
										echo '<td>', $row->start_date, '</td>';
										echo '<td>', $row->end_date, '</td>';
										echo '<td>', $row->subject, '</td>'; 
										echo '<td>', $row->short_desc, '</td>';
										echo '<td>', $row->team, '</td>';
										echo '<td>';
											echo '<a target="_blank" href="', $row->link_assingment, '">Opdracht</a>';
											echo ' / ';
											echo '<a target="_blank" href="', $row->link_handin, '">Uitwerking</a>';
										echo '</td>';
										if ($row->completion == 1) {
											echo '<td>Compleet</td>';
										} else {
											echo '<td>Bezig</td>';
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
		
		<!--sdf-->
		<div class="container-fluid" id="footer">
			<div class="row">
				<div class="col-sm-1" id="footer-right">
				</div>
				<div class="col-sm-10" id="footer-main">
					<h2>Contact</h2>
					<p>Wilco de Boer</p>
					<p>Email: <a href="mailto:deboer.wilco@gmail.com">deboer.wilco@gmail.com</a></p>
					<p>Umail: <a href="mailto:s1704362@umail.leidenuniv.nl">s1704362@umail.leidenuniv.nl</a></p>
					<p>Telefoon: +31 0637338259</p>
				</div>
				<div class="col-sm-1" id="footer-left">
				</div>
			</div>
		</div>
		<!--edf-->
	</body>
</html>
