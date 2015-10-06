<?php
require 'content.php';

function editItemForm ($table, $id) {
	$view = '';
	
/*
<form action="action_page.php">
	First name:<br>
	<input type="text" name="firstname" value="Mickey">
	<br>
	Last name:<br>
	<input type="text" name="lastname" value="Mouse">
	<br><br>
	<input type="submit" value="Submit">
</form>

	<div id="loginFormText">
		<p>Please enter your credentials and click the <b>Login</b> button below:</p>
	</div>
	<div id="loginFormFields">
		<ul id="loginFormList">
			<li class="login-field">
				<label for="user_id">Username:</label>
				<input name="user_id" id="user_id" size="25" maxlength="50" type="text">
			</li>
			<li class="login-field">
				<label for="password">Password:</label>
				<input size="25" name="password" id="password" autocomplete="off" type="password">
			</li>
			<li>
				<input class="submit-button" value="Login" name="login" type="submit">
			</li>
		</ul>
	</div>
	<input name="action" value="login" type="hidden">
	<input name="new_loc" value="" type="hidden">
</form>
*/
	
	$view .= '<div class="paragraph-center col-sm-12">';
	if ($id == 'new') {
		$view .= '<form action="db/submit/insertTable.php" method="POST">';
	} else {
		$view .= '<form action="db/submit/updateTable.php" method="POST">';
		$currentEntryTable = getEntryWithId ($table, $id);
		$currentEntry = $currentEntryTable->fetch_assoc();
	}
	
	if ($columnInfo = getTableFormInfo($table)) {
		while ($row = $columnInfo->fetch_object()) {
			if ($row->COLUMN_NAME != 'id') {
				$type = 'text';
				$value = '';
				$arguments = '';
				
				switch ($row->DATA_TYPE) {
					case 'tinyint':
						$type = 'checkbox';
					break;
					case 'date':
						$type = 'date';
						$value = 'yyyy-mm-dd';
					break;
					case 'datetime':
						$type = 'datetime';
						$value = 'yyyy-mm-dd hh:mm:ss';
					break;
					case 'int':
						$type = 'number';
					case 'float':
						$type = 'number';
					break;
				}
				
				if ($id != 'new') {
					$value = $currentEntry[$row->COLUMN_NAME];
				}
				
				if ($row->COLUMN_NAME == 'password') {
					$type = 'password';
					$arguments .= 'autocomplete="off"';
					$value = 'password';
				}
				
				if (!empty($row->CHARACTER_MAXIMUM_LENGTH) && $row->CHARACTER_MAXIMUM_LENGTH <= 100) {
					$arguments .= 'size="'.$row->CHARACTER_MAXIMUM_LENGTH.'"';
				}
				
				$view .= $row->COLUMN_NAME . ':<br>';
				$view .= '<input name="'.$row->COLUMN_NAME.'" type="'.$type.'" value="'.$value.'" '.$arguments.'><br>';
			}
		}
	}
	
	else {
		return '<div class="paragraph-center col-sm-12"><p>Could not load form: database errors.</p></div>';
	}
	
	if ($id == 'new') {
		$view .= '<br><input type="submit" value="Insert"></form></div>';
		$view .= '<input name="action" value="insert" type="hidden">';
	} else {
		$view .= '<br><input type="submit" value="Update"></form></div>';
		$view .= '<input name="action" value="update" type="hidden">';
	}
	$view .= '<input name="table" value="'.$table.'" type="hidden">';

	return $view;
}

?>
