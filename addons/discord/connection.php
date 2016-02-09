<?php
require 'vendor/autoload.php';
require 'db/data.php';
use Discord\Discord;

$clientUID = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
$botChannel = '142026676581171200';
$allowedCommands = array('play', 'search', 'volume', 'pause', 'resume', 'queue', 'shuffle', 'skip');
$discord = getDiscordClient($clientUID);
if (!$discord) {
    $discord = getDefaultClient();
}

function getDefaultClient () {
    $email_address = 'wilco.deboer@live.nl';
    $password = 'CookieJuice.1';
    $client = 'default';
    
    $discord = getDiscordClient($client);
    if (!$discord) {
        addNewClient($client, $email_address, $password);
        $discord = getDiscordClient($client);
    }
    
    return $discord;
}

function getDiscordClient ($client) {
    $token = getToken($client);
    if (!$token) {
        return false;
    }
    $discord = new Discord('', '', $token);
    try {
        $discord->api('user')->me();
    }
    catch(Exception $e) {
        deleteClient($client);
        return false;
    }
    return $discord;
}

function addNewClient ($client, $email_address, $password) {
    $token = createToken($email_address, $password);
    setToken($client, $token);
}

function createToken ($email_address, $password) {
    $succes = false;
    while (!$succes) {
        try {
            $discord = new Discord($email_address, $password);
            $succes = true;
        }
        catch(Exception $e) {}
    }
    
    try {
        $discord->api('user')->me();
        return $discord->token();
    }
    catch(Exception $e) {
        return false;
    }
}

function isDefault () {
    global $discord;
    return $discord->api('user')->me()['email'] == getenv('DISCORD_EMAIL');
}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}

// Interaction
function postCommand ($command) {
    global $discord, $botChannel;
    if ($discord) {
        return $discord->api('channel')->messages()->create($botChannel, $command);
    }
}

function getVolume ($force=false) {
    global $discord, $botChannel;
    $limit = 100;
    
    if (!$discord) {
        return 15;
    }
    
    if ($force) {
        postCommand('!volume');
        $limit = 10;
        usleep(300000);
    }
    
    $messages = $discord->api('channel')->messages()->show($botChannel, $limit);
    $volume = 15;
    foreach ($messages as $message) {
        $message = $message['content'];
        if (strpos($message, 'Current volume:') !== false) {
            $volume = (int) str_replace('%`', '', substr($message, strpos($message, ': ') + 3));
            break;
        }
        else if (strpos($message, '!volume ') !== false) {
            $volume = (int) substr($message, strpos($message, ' ') + 1);
            break;
        }
    }
    return $volume;
}
?>
