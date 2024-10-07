<?php
header('Content-Type: text/html; charset=utf-8');

$host = 'mysql-8.2';
$db = 'pr2b';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Режим обработки ошибок
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Режим выборки данных
    PDO::ATTR_EMULATE_PREPARES => false,                  // Отключение эмуляции подготовленных запросов
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    exit();
}