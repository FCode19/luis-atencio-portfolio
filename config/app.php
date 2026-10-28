<?php
declare(strict_types=1);

function loadPortfolioEnvironment(string $path): void {
    if (!is_readable($path)) {
        return;
    }

    $values = parse_ini_file($path, false, INI_SCANNER_RAW);
    if (!is_array($values)) {
        return;
    }

    foreach ($values as $key => $value) {
        if (!is_string($key) || getenv($key) !== false) {
            continue;
        }
        $stringValue = is_string($value) ? $value : (string) $value;
        putenv($key . '=' . $stringValue);
        $_ENV[$key] = $stringValue;
    }
}

loadPortfolioEnvironment(dirname(__DIR__) . '/.env');
date_default_timezone_set('America/Lima');

const APP_NAME = 'Luis Atencio Portfolio';
define('APP_URL', getenv('APP_URL') ?: 'http://portfolio.local');

const GITHUB_URL = 'https://github.com/FCode19';
const LINKEDIN_URL = 'https://www.linkedin.com/in/luisatencio-tech/';
const AVIP_REPOSITORY_URL = 'https://github.com/FCode19/avip-intelligent-virtual-agents-praga';
const AVIP_DEMO_URL = 'https://drive.google.com/file/d/1daFvmkv4hZGpn5eh4ccgq_nNZkJ4lR25/view?usp=sharing';
define('BANKOPS_REPOSITORY_URL', 'https://github.com/FCode19/bankops-ai');
define('CONTACT_EMAIL', getenv('CONTACT_EMAIL') ?: 'luisatencio0419@gmail.com');
define('SMTP_HOST', getenv('SMTP_HOST') ?: '');
define('SMTP_PORT', (int) (getenv('SMTP_PORT') ?: 587));
define('SMTP_USERNAME', getenv('SMTP_USERNAME') ?: '');
define('SMTP_PASSWORD', getenv('SMTP_PASSWORD') ?: '');
define('SMTP_ENCRYPTION', strtolower((string) (getenv('SMTP_ENCRYPTION') ?: 'tls')));
define('CONTACT_FROM_EMAIL', getenv('CONTACT_FROM_EMAIL') ?: SMTP_USERNAME);
define('CONTACT_FROM_NAME', getenv('CONTACT_FROM_NAME') ?: 'Luis Atencio Portfolio');
