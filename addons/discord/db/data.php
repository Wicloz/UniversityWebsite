<?php
require 'connect.php';

function getToken ($client) {
	global $db;
	if ($result = $db->query("SELECT * FROM discord_tokens WHERE client = '{$client}'")) {
		if ($result->num_rows) {
			return $result->fetch_object()->token;
			$result->free();
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function setToken ($client, $token) {
	global $db;
    $client = $db->escape_string($client);
    $token = $db->escape_string($token);
    
    if (getToken($client)) {
        $qry = "UPDATE discord_tokens SET token='{$token}' WHERE client = '{$client}'";
    }
    else {
        $qry = "INSERT INTO discord_tokens (client, token) VALUES ('{$client}', '{$token}')";
    }
	
	if ($update = $db->query($qry)) {
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}

function deleteClient ($client) {
    global $db;
	
	$qry = "DELETE FROM discord_tokens WHERE client = '{$client}'";
	
	if ($update = $db->query($qry)) {	
		return $db->affected_rows;
	} else {
		return $db->error;
	}
}
?>
