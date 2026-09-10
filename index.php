<?php
declare(strict_types=1);

require __DIR__ . '/config/app.php';
require __DIR__ . '/src/helpers.php';

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$uri = rtrim($uri, '/') ?: '/';

$routes = [
    '/' => ['view' => 'home', 'title' => 'Luis Atencio | AI & Automation Portfolio'],
    '/projects' => ['view' => 'projects', 'title' => 'Projects | Luis Atencio'],
    '/projects/avip' => ['view' => 'project-avip', 'title' => 'AVIP | Luis Atencio'],
    '/projects/bankops' => ['view' => 'project-bankops', 'title' => 'BankOps AI | Luis Atencio'],
];

$route = $routes[$uri] ?? null;

if (!$route) {
    http_response_code(404);
    $route = ['view' => '404', 'title' => '404 | Luis Atencio'];
}

$pageTitle = $route['title'];
$view = $route['view'];

require __DIR__ . '/views/layouts/header.php';
require __DIR__ . "/views/pages/{$view}.php";
require __DIR__ . '/views/layouts/footer.php';