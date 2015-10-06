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
			echo mainnavContent('subject_bp');
		?>
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
					<?php
						echo leftnavContent('subject_bp');
					?>
				</div>
				<div class="col-sm-8" id="content-main">
					<div class="paragraph-center col-sm-12">
						<h2>This is a header</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempor dolor ac blandit sagittis. Morbi aliquam gravida eleifend. Nulla ac nunc sapien. Donec dapibus velit vulputate purus fermentum, quis lobortis lacus semper. Pellentesque ac hendrerit augue. Duis quis ex ipsum. Suspendisse dignissim nisl vitae risus rhoncus, eget lobortis odio tincidunt. Donec eu accumsan mi, eget suscipit purus. Nullam feugiat neque sit amet fringilla ultrices.</p>
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
