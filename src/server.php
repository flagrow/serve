<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$basePath = str_replace([
    '/vendor/flagrow/serve/src',
    '/workbench/serve/src',
], '', __DIR__);

if ($uri !== '/' && file_exists($basePath . $uri)) {
    return false;
}

if (strpos($uri, '/admin') === 0) {
    require 'admin.php';
} else if (strpos($uri, '/api') === 0) {
    require 'api.php';
} else {
    require 'index.php';
}
