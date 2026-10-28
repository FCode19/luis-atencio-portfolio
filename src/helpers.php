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

function bilingual(string $en, string $es): string {
    return '<span data-i18n-en="' . e($en) . '" data-i18n-es="' . e($es) . '">' . e($en) . '</span>';
}

function startPortfolioSession(): void {
    if (PHP_SAPI === 'cli' || session_status() === PHP_SESSION_ACTIVE || headers_sent()) {
        return;
    }

    session_name('luis_portfolio_session');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

function ensureDataFile(string $filename, string $defaultContents): string {
    $path = __DIR__ . '/../data/' . $filename;
    if (!is_file($path)) {
        @file_put_contents($path, $defaultContents, LOCK_EX);
    }
    return $path;
}

function readVisitorCount(): int {
    $path = ensureDataFile('visits.json', "{\n    \"count\": 0\n}\n");
    $contents = @file_get_contents($path);
    $data = is_string($contents) ? json_decode($contents, true) : null;
    return max(0, (int) ($data['count'] ?? 0));
}

function registerVisit(): int {
    $current = readVisitorCount();
    if (PHP_SAPI === 'cli' || isset($_COOKIE['portfolio_visit_counted'])) {
        return $current;
    }

    $path = ensureDataFile('visits.json', "{\n    \"count\": 0\n}\n");
    $handle = @fopen($path, 'c+');
    if ($handle === false) {
        return $current;
    }

    try {
        if (!flock($handle, LOCK_EX)) {
            return $current;
        }
        rewind($handle);
        $contents = stream_get_contents($handle);
        $data = is_string($contents) ? json_decode($contents, true) : null;
        $current = max(0, (int) ($data['count'] ?? 0)) + 1;
        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, json_encode(['count' => $current], JSON_PRETTY_PRINT) . PHP_EOL);
        fflush($handle);
        flock($handle, LOCK_UN);
    } finally {
        fclose($handle);
    }

    if (!headers_sent()) {
        setcookie('portfolio_visit_counted', '1', [
            'expires' => time() + 43200,
            'path' => '/',
            'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
    }

    return $current;
}

function contactCsrfToken(): string {
    startPortfolioSession();
    if (empty($_SESSION['contact_csrf'])) {
        $_SESSION['contact_csrf'] = bin2hex(random_bytes(32));
    }
    return (string) $_SESSION['contact_csrf'];
}

function newContactChallenge(): array {
    startPortfolioSession();
    $left = random_int(2, 9);
    $right = random_int(1, 9);
    $token = bin2hex(random_bytes(16));
    $now = time();
    $challenges = is_array($_SESSION['contact_challenges'] ?? null) ? $_SESSION['contact_challenges'] : [];
    $challenges = array_filter($challenges, static fn ($challenge): bool => is_array($challenge) && (int) ($challenge['issued_at'] ?? 0) >= $now - 1800);
    if (count($challenges) >= 10) {
        $challenges = array_slice($challenges, -9, null, true);
    }
    $challenges[$token] = [
        'answer' => $left + $right,
        'issued_at' => $now,
    ];
    $_SESSION['contact_challenges'] = $challenges;
    return ['question' => $left . ' + ' . $right . ' = ?', 'token' => $token];
}

function currentContactChallenge(): array {
    return newContactChallenge();
}
