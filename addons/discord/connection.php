<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

use Discord\Discord;

// Email/Password for Discord
$email_address = getenv('DISCORD_EMAIL');
$password = getenv('DISCORD_PASSWORD');

// Try to log into Discord!
$discord = new Discord($email_address, $password, $token = null);

// Cache this for your next queries, pass it as the third argument
$cachedToken = $discord->token();

// Channel to post bot commands
$botChannel = '142026676581171200';

// Interaction
function postCommand($command) {
    global $discord, $botChannel;
    return $discord->api('channel')->messages()->create($botChannel, $command);
}

?>