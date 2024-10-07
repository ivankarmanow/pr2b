<?php

global $pdo;
require_once "db.php";

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $stmt = $pdo->prepare("DELETE FROM token WHERE token = ?");
    $stmt->execute([$token]);

    setcookie('token', '', time() - 3600, '/');

    unset($_COOKIE['token']);
}

header("Location: /");
exit();
?>
