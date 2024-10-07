<?php
// api/login.php

global $pdo;
require_once "db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $passwd = $_POST['passwd'];

    $errors = [];

    if (empty($login)) {
        $errors[] = "Пожалуйста, введите логин!";
    }

    if (empty($passwd)) {
        $errors[] = "Пожалуйста, введите пароль!";
    }

    if (empty($errors)) {
        $result = true;
        $stmt = $pdo->prepare("SELECT id, password_hash FROM user WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();

        if ($user && password_verify($passwd, $user['password_hash'])) {
            $token = bin2hex(random_bytes(32));

            $stmt = $pdo->prepare("INSERT INTO token (user_id, token, created_at) VALUES (?, ?, NOW())");
            $stmt->execute([$user['id'], $token]);

            $secure = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
            setcookie("token", $token, time() + (86400 * 30), "/", "", $secure, true);

            // header("Location: /dashboard.php");
            // exit();
        } else {
            $errors[] = "Неверный логин или пароль.";
            $result = false;
        }
    } else {
        $result = false;
    }

    include_once __DIR__ . "/../page/login_result.php";
}
?>
