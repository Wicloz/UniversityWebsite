<?php
	error_reporting(E_ALL);
	require 'db/mixer.php';
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
			echo mainnavContent('schedule');
		?>
		
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
		
		<?php
			echo footerContent()
		?>
	</body>
</html>
