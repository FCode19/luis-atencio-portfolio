<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;

require dirname(__DIR__) . '/config/app.php';
require dirname(__DIR__) . '/src/helpers.php';

header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');

startPortfolioSession();

function contactResponse(int $status, string $code, array $extra = []): never {
    http_response_code($status);
    echo json_encode(array_merge(['ok' => $status < 400, 'code' => $code], $extra), JSON_UNESCAPED_UNICODE);
    exit;
}

function contactRateLimitExceeded(): bool {
    $path = ensureDataFile('contact-rate-limit.json', "{}\n");
    $handle = @fopen($path, 'c+');
    if ($handle === false) {
        return false;
    }

    $exceeded = false;
    try {
        if (!flock($handle, LOCK_EX)) {
            return false;
        }

        rewind($handle);
        $contents = stream_get_contents($handle);
        $entries = is_string($contents) ? json_decode($contents, true) : null;
        $entries = is_array($entries) ? $entries : [];
        $now = time();
        $windowStart = $now - 3600;
        $clientKey = hash('sha256', (string) ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));

        foreach ($entries as $key => $timestamps) {
            $entries[$key] = array_values(array_filter(
                is_array($timestamps) ? $timestamps : [],
                static fn ($timestamp): bool => (int) $timestamp >= $windowStart
            ));
            if ($entries[$key] === []) {
                unset($entries[$key]);
            }
        }

        $attempts = $entries[$clientKey] ?? [];
        $exceeded = count($attempts) >= 5;
        if (!$exceeded) {
            $attempts[] = $now;
            $entries[$clientKey] = $attempts;
        }

        ftruncate($handle, 0);
        rewind($handle);
        fwrite($handle, json_encode($entries, JSON_PRETTY_PRINT) . PHP_EOL);
        fflush($handle);
        flock($handle, LOCK_UN);
    } finally {
        fclose($handle);
    }

    return $exceeded;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    header('Allow: POST');
    contactResponse(405, 'method_not_allowed');
}

// Honeypot fields should remain empty. Bots receive a neutral success response.
if (trim((string) ($_POST['website'] ?? '')) !== '') {
    contactResponse(200, 'success');
}

$csrf = (string) ($_POST['csrf_token'] ?? '');
$storedCsrf = (string) ($_SESSION['contact_csrf'] ?? '');
if ($storedCsrf === '' || $csrf === '' || !hash_equals($storedCsrf, $csrf)) {
    contactResponse(403, 'csrf_error');
}

$name = trim(preg_replace('/\s+/u', ' ', (string) ($_POST['name'] ?? '')) ?? '');
$email = trim((string) ($_POST['email'] ?? ''));
$message = trim((string) ($_POST['message'] ?? ''));
$captcha = trim((string) ($_POST['captcha'] ?? ''));
$captchaToken = trim((string) ($_POST['captcha_token'] ?? ''));

$nameLength = function_exists('mb_strlen') ? mb_strlen($name) : strlen($name);
$messageLength = function_exists('mb_strlen') ? mb_strlen($message) : strlen($message);
if ($nameLength < 2 || $nameLength > 80 || !filter_var($email, FILTER_VALIDATE_EMAIL) || $messageLength < 20 || $messageLength > 3000) {
    contactResponse(422, 'validation_error');
}

$challenge = $_SESSION['contact_challenges'][$captchaToken] ?? null;
$issuedAt = is_array($challenge) ? (int) ($challenge['issued_at'] ?? 0) : 0;
$expectedAnswer = is_array($challenge) ? (int) ($challenge['answer'] ?? -1) : -1;
if ($issuedAt === 0 || (time() - $issuedAt) < 2) {
    unset($_SESSION['contact_challenges'][$captchaToken]);
    contactResponse(422, 'too_fast', ['challenge' => newContactChallenge()]);
}
if (!ctype_digit($captcha) || (int) $captcha !== $expectedAnswer) {
    unset($_SESSION['contact_challenges'][$captchaToken]);
    contactResponse(422, 'captcha_error', ['challenge' => newContactChallenge()]);
}
unset($_SESSION['contact_challenges'][$captchaToken]);

if (contactRateLimitExceeded()) {
    contactResponse(429, 'rate_limited', ['challenge' => newContactChallenge()]);
}

$safeName = str_replace(["\r", "\n"], ' ', $name);
$safeEmail = str_replace(["\r", "\n"], '', $email);
$body = "Has recibido un nuevo mensaje desde tu portafolio.\n\n"
    . "Nombre: {$safeName}\n"
    . "Correo: {$safeEmail}\n"
    . "Fecha: " . date('Y-m-d H:i:s T') . "\n\n"
    . "Mensaje:\n{$message}\n";

$dryRun = getenv('PORTFOLIO_CONTACT_DRY_RUN') === '1';
if (!$dryRun) {
    $autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
    if (!is_file($autoloadPath) || SMTP_HOST === '' || SMTP_USERNAME === '' || SMTP_PASSWORD === '' || CONTACT_FROM_EMAIL === '') {
        contactResponse(503, 'mail_not_configured', ['challenge' => newContactChallenge()]);
    }

    require $autoloadPath;

    try {
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = SMTP_HOST;
        $mailer->Port = SMTP_PORT;
        $mailer->SMTPAuth = true;
        $mailer->Username = SMTP_USERNAME;
        $mailer->Password = SMTP_PASSWORD;
        $mailer->Timeout = 15;
        $mailer->CharSet = PHPMailer::CHARSET_UTF8;

        if (SMTP_ENCRYPTION === 'ssl' || SMTP_ENCRYPTION === 'smtps') {
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } elseif (SMTP_ENCRYPTION === 'tls' || SMTP_ENCRYPTION === 'starttls') {
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } else {
            $mailer->SMTPSecure = '';
            $mailer->SMTPAutoTLS = false;
        }

        $mailer->setFrom(CONTACT_FROM_EMAIL, CONTACT_FROM_NAME);
        $mailer->addAddress(CONTACT_EMAIL, 'Luis Atencio');
        $mailer->addReplyTo($safeEmail, $safeName);
        $mailer->Subject = 'Nuevo mensaje desde el portafolio de Luis Atencio';
        $mailer->Body = $body;
        $mailer->AltBody = $body;
        $mailer->send();
    } catch (Throwable $exception) {
        error_log('Portfolio SMTP delivery failed: ' . $exception->getMessage());
        contactResponse(503, 'mail_unavailable', ['challenge' => newContactChallenge()]);
    }
}

contactResponse(200, 'success', ['challenge' => newContactChallenge()]);
