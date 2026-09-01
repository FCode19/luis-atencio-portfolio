<?php
declare(strict_types=1);

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function asset(string $path): string {
    return '/assets/' . ltrim($path, '/');
}

function isActive(string $path): string {
    $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $uri = rtrim($uri, '/') ?: '/';
    return $uri === $path ? 'active' : '';
}
