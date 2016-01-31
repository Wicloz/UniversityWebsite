<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
use Discord\Discord;

// Channel to post bot commands
$botChannel = '142026676581171200';
// Commands that the site is allowed to post
$allowedCommands = array('play', 'search', 'volume', 'pause', 'resume', 'skip', 'queue', 'shuffle');
// Get discord client
$discord = getDiscordClient();

// Creates a discord client using a cached token if possible
function getDiscordClient() {
    // Email/Password for Discord
    $email_address = getenv('DISCORD_EMAIL');
    $password = getenv('DISCORD_PASSWORD');
    $tokenFile = 'token.__'.$email_address.'__.dat';

    // Create a client using the cached token
    $discord = new Discord($email_address, $password, file_get_contents($tokenFile));
    
    // Check authorization of the client
    try {
        $discord->api('user')->me();
    }
    
    // Try to log into Discord, retry if unsuccesfull
    catch(Exception $e) {
        $succes = false;
        while (!$succes) {
            try {
                $discord = new Discord($email_address, $password);
                $succes = true;
            }
            catch(Exception $e) {}
        }
    }

    // Cache the token for next queries
    file_put_contents($tokenFile, $discord->token());

    // Return client
    return $discord;
}

// Interaction
function postCommand($command) {
    global $discord, $botChannel;
    return $discord->api('channel')->messages()->create($botChannel, $command);
}

function getVolume($force=false) {
    global $discord, $botChannel;
    $limit = 100;
    
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