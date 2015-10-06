<?php
	error_reporting(0);
	require 'db/views.php';
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
		<?php
			echo headerContent();
			echo mainnavContent('semester-overview');
		?>
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
				    <!--bdoc-->
					<div class="navbox">
						<h2>Overview</h2>
						<ul>
							<li class="active"><a href="semester-overview.php">Semester Overview</a></li>
							<li><a href="exams.php">Exams</a></li>
							<li><a href="assingments.php">Assingments</a></li>
						</ul>
					</div>
                    <!--edoc-->
				</div>
				<div class="col-sm-8" id="content-main">
					
				</div>
				<div class="col-sm-2" id="content-left">
				</div>
			</div>
		</div>
		
		<?php
			echo footerContent()
		?>
	</body>
</html>
