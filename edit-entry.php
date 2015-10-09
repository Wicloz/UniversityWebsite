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
			echo mainnavContent('edit-item');
		?>
		
		<div class="container-fluid" id="content">
			<div class="row">
				<div class="col-sm-2" id="content-right">
				</div>
				<div class="col-sm-8" id="content-main">
					<div class="paragraph-center col-sm-12">
						<?php
							if (isset($_POST['action']) && isset($_POST['table']) && isset($_POST['id']) && !empty($_POST['action']) && !empty($_POST['table']) && !empty($_POST['id'])) {
								$table = $_POST['table'];
								$id = $_POST['id'];
								foreach ($_POST as $key => $value) {
									if ($key != 'action' && $key != 'table' && $key != 'id') {
										$entry[$key] = $value;
									}
								}
										
								if ($_POST['action'] == 'insert') {
									insertEntry ($table, $entry);
									echo '<p>Entry Inserted!</p>';
								}
								else if ($_POST['action'] == 'update') {
									updateEntry ($table, $id, $entry);
									echo '<p>Entry Updated!</p>';
								}
								else if ($_POST['action'] == 'delete') {
									deleteEntry ($table, $id);
									echo '<p>Entry Deleted!</p>';
								}
							}
						
							if (isset($_GET['table']) && isset($_GET['id'])) {
								$table = $_GET['table'];
								$id = $_GET['id'];
								if (!empty($table) && !empty($id)) {
									echo getEditItemForm($table, $id);
								}
							}
						?>
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
