<?php

chdir(__DIR__);
require('../vendor/techdivision/server/src/TechDivision/Server/Standalone.php');

$argv = [];

// check if first argument is given for configuration
if (isset($argv[1])) {
$config = $argv[1];
} else {
$config = 'etc/logserver.xml';
}

$server = new \TechDivision\Server\Standalone(__DIR__, $config, __DIR__ . '/../vendor/autoload.php');
$server->start();
$server->join();