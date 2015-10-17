<?php
	error_reporting(E_ALL);
	require 'php/mixer.php';
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
			echo mainnavContent('subject_mg');
		?>
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
					<?php
						echo leftnavContent('subject_mg');
					?>
				</div>
				<div class="col-sm-8" id="content-main">
				    <div class="paragraph-center col-sm-12">
						<h2>Shakespeak</h2>
				        <iframe name="shakeq" src="http://shakeq.com/molgen1" width="100%" height="600"></iframe>
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
