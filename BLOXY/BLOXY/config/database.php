
<?php
declare(strict_types=1);

$host = getenv('BLOXY_DB_HOST') ?: '127.0.0.1';
$name = getenv('BLOXY_DB_NAME') ?: 'bloxy';
$user = getenv('BLOXY_DB_USER');
$password = getenv('BLOXY_DB_PASSWORD');

if (!$user || $password === false) {
    throw new RuntimeException('BLOXY database credentials are not configured.');
}

$dsn = "mysql:host={$host};dbname={$name};charset=utf8mb4";

$pdo = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
