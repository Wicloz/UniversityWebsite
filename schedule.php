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
						  <a class="dropdown-toggle" data-toggle="dropdown" href="">Subjects
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="subject_fi1.php">Fundamentele Informatica</a></li>
							<li><a href="subject_pm.php">Programmeermethoden</a></li>
							<li><a href="subject_stpr.php">Studeren & Presenteren</a></li>
							<li><a href="subject_mg.php">Moleculaire Genetica</a></li>
							<li><a href="subject_bp.php">Basispracticum</a></li>
						  </ul>
						</li>
						<li><a href="semester-overview.php">Semester Overview</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li class="active"><a href="schedule.php">Schedule I&B</a></li>
						<li><a href="https://onedrive.live.com/view.aspx?resid=7A26A4E50EEC48CB!401&ithint=onenote%2c&app=OneNote&authkey=!ALF9KqGbBDdyK_M" target="_blank">Notes</a></li>
						<li><a href="http://www.color-hex.com/color-palette/10598" target="_blank">Color Palette</a></li>
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
				        <iframe class="agenda" src="https://www.google.com/calendar/embed?src=a4qi9uldsf0stvtvp24d0vc008%40group.calendar.google.com&ctz=Europe/Amsterdam" frameborder="0" scrolling="no"></iframe>
                    </div>
                    <div class="paragraph-center col-sm-12">
                        <a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-naj-2015-2016.pdf">
							<img class="rooster-img" src="images/1e-jr-IB-naj-2015-2016-page-001.jpg" alt="Rooster Voorjaar">
						</a>
					</div>
                    <div class="paragraph-center col-sm-12">
                        <a target="_blank" href="http://liacs.leidenuniv.nl/assets/Roosters-2015-2016/1e-jr-IB-voorj-2015-2016.pdf">
							<img class="rooster-img" src="images/1e-jr-IB-voorj-2015-2016-page-001.jpg" alt="Rooster Voorjaar">
						</a>
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
					<p>Mobile number: +31 0637338259</p>
				</div>
				<div class="col-sm-1" id="footer-left">
				</div>
			</div>
		</div>
		<!--edf-->
	</body>
</html>
