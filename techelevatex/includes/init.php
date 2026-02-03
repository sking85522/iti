<?php
session_start();

$config = require __DIR__ . '/../config/app.php';

try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8mb4', $config['db']['host'], $config['db']['name']);
    $db = new PDO($dsn, $config['db']['user'], $config['db']['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo 'Database connection failed.';
    exit;
}

$currentUser = null;
if (!empty($_SESSION['user_id'])) {
    $stmt = $db->prepare('SELECT id, uid, name, email, role, language, photo_url FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $currentUser = $stmt->fetch();
}

function generate_csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verify_csrf_token(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

function detect_language(string $header): string
{
    $header = strtolower($header);
    if (strpos($header, 'hi') !== false || strpos($header, '-in') !== false) {
        return 'hi';
    }
    $primary = explode(',', $header)[0] ?? 'en';
    return explode('-', $primary)[0] ?: 'en';
}

function load_language_pack(string $code): array
{
    $basePath = __DIR__ . '/../language/';
    $filePath = $basePath . $code . '.json';
    if (!file_exists($filePath)) {
        $filePath = $basePath . 'en.json';
    }
    $contents = file_get_contents($filePath);
    return json_decode($contents, true) ?: [];
}

$manualLanguage = $_GET['lang'] ?? null;
$userLanguage = $currentUser['language'] ?? null;
$browserLanguage = detect_language($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '');
$currentLanguage = strtolower($manualLanguage ?: ($userLanguage ?: ($browserLanguage ?: $config['default_language'])));
$languagePack = load_language_pack($currentLanguage);

function t(string $key, array $pack): string
{
    return $pack[$key] ?? $key;
}

function require_auth($currentUser): void
{
    if (!$currentUser) {
        header('Location: /techelevatex/auth/login.php');
        exit;
    }
}

function require_role($currentUser, string $role): void
{
    require_auth($currentUser);
    if ($currentUser['role'] !== $role) {
        http_response_code(403);
        include __DIR__ . '/../shared/forbidden.php';
        exit;
    }
}

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
