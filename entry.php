<?php
// Get params, the zero one is the route path, the first one is a controller name, the second one is a method name, the third one is params.
$fileName = $argv[1];
$methodName = $argv[2];
$params = $argv[3];

$filePath = './' . $methodName . '.php';

require $filePath;

$controller = new $fileName;
$controller->$methodName($params);