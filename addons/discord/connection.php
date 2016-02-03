<?php
require 'vendor/autoload.php';
require 'db/data.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
use Discord\Discord;

$botChannel = '142026676581171200';
$allowedCommands = array('play', 'search', 'volume', 'pause', 'resume', 'queue', 'shuffle');
$discord = getDiscordClient('');
if (!$discord) {
    $discord = getDefaultClient();
}

function getDefaultClient () {
    $email_address = getenv('DISCORD_EMAIL');
    $password = getenv('DISCORD_PASSWORD');
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