<?php
require 'connection.php';
use Discord\Helpers\RoleColors;
$color = new RoleColors();
$guildId = '96989967485517824';
$roleId = '144548843730501632';
$roleColor = $color->darkRed;

$discord->api('guild')->roles()->edit($guildId, $roleId, null, null, null, null);
?>
