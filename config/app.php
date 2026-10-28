<?php
declare(strict_types=1);

function loadPortfolioEnvironment(string $path): array {
    if (!is_readable($path)) {
        return [];
    }

    $values = parse_ini_file($path, false, INI_SCANNER_RAW);
    if (!is_array($values)) {
        return [];
    }

    foreach ($values as $key => $value) {
        if (!is_string($key)) {
            continue;
        }

        $currentValue = getenv($key);
        if ($currentValue !== false && trim((string) $currentValue) !== '') {
            continue;
        }
        $stringValue = is_string($value) ? $value : (string) $value;
        putenv($key . '=' . $stringValue);
        $_ENV[$key] = $stringValue;
    }

    return $values;
}

$portfolioEnvironment = loadPortfolioEnvironment(dirname(__DIR__) . '/.env');

function portfolioEnvironmentValue(string $key, string $default = ''): string {
    global $portfolioEnvironment;

    $processValue = getenv($key);
    if ($processValue !== false && trim((string) $processValue) !== '') {
        return (string) $processValue;
    }

    $fileValue = $portfolioEnvironment[$key] ?? null;
    return is_scalar($fileValue) ? (string) $fileValue : $default;
}

date_default_timezone_set('America/Lima');

const APP_NAME = 'Luis Atencio Portfolio';
define('APP_URL', portfolioEnvironmentValue('APP_URL', 'http://portfolio.local'));

const GITHUB_URL = 'https://github.com/FCode19';
const LINKEDIN_URL = 'https://www.linkedin.com/in/luisatencio-tech/';
const AVIP_REPOSITORY_URL = 'https://github.com/FCode19/avip-intelligent-virtual-agents-praga';
const AVIP_DEMO_URL = 'https://drive.google.com/file/d/1daFvmkv4hZGpn5eh4ccgq_nNZkJ4lR25/view?usp=sharing';
define('BANKOPS_REPOSITORY_URL', 'https://github.com/FCode19/bankops-ai');
define('CONTACT_EMAIL', portfolioEnvironmentValue('CONTACT_EMAIL', 'luisatencio0419@gmail.com'));
define('SMTP_HOST', portfolioEnvironmentValue('SMTP_HOST'));
define('SMTP_PORT', (int) portfolioEnvironmentValue('SMTP_PORT', '587'));
define('SMTP_USERNAME', portfolioEnvironmentValue('SMTP_USERNAME'));
define('SMTP_PASSWORD', portfolioEnvironmentValue('SMTP_PASSWORD'));
define('SMTP_ENCRYPTION', strtolower(portfolioEnvironmentValue('SMTP_ENCRYPTION', 'tls')));
define('CONTACT_FROM_EMAIL', portfolioEnvironmentValue('CONTACT_FROM_EMAIL', SMTP_USERNAME));
define('CONTACT_FROM_NAME', portfolioEnvironmentValue('CONTACT_FROM_NAME', 'Luis Atencio Portfolio'));
