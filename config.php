<?php

$ini = parse_ini_file("files/config.ini");

define("ADDRESS", $ini['host']);
define("PORT", $ini['port']);
define("PASS", $ini['pass']);

?>