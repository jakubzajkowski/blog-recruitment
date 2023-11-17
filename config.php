<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

$config = [
    'DB_HOST' => $_ENV['DB_HOST'],
    'DB_USERNAME' => $_ENV['DB_USERNAME'],
    'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
    'DB_DATABASE' => $_ENV['DB_DATABASE'],
];

return $config;