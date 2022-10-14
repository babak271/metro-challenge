<?php

require 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

const ROOT_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
const RESOURCE_URL = '/';

$filter = $argv[1];
$args   = array_slice($argv, 2);
$base   = new \App\Base($filter, $args);
$base->run();