<?php
declare(strict_types=1);

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$restrictedPrefixes = ['/config/', '/data/', '/src/', '/views/'];
foreach ($restrictedPrefixes as $prefix) {
    if (str_starts_with($path, $prefix)) {
        http_response_code(404);
        exit;
    }
}

$requestedFile = __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, $path);
if ($path !== '/' && is_file($requestedFile)) {
    return false;
}

require __DIR__ . '/index.php';
