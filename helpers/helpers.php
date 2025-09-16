<?php
require_once __DIR__ . '/../config/Config.php';

function url(string $path = ''): string {
    $path = ltrim($path, '/');
    return rtrim(Config::BASE_URL, '/') . '/' . $path;
}

function pp($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}