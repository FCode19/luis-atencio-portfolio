<?php
declare(strict_types=1);

require dirname(__DIR__) . '/config/app.php';

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

$environmentPath = dirname(__DIR__) . '/.env';
$parsed = @parse_ini_file($environmentPath, false, INI_SCANNER_RAW);

echo json_encode([
    'keys' => is_array($parsed) ? array_keys($parsed) : [],
    'autoload_exists' => is_file(dirname(__DIR__) . '/vendor/autoload.php'),
    'smtp_host_configured' => SMTP_HOST !== '',
    'smtp_username_configured' => SMTP_USERNAME !== '',
    'smtp_password_configured' => SMTP_PASSWORD !== '',
], JSON_UNESCAPED_SLASHES);
