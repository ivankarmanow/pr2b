<?php

global $pdo;
require_once "db.php";
if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    $stmt = $pdo->prepare("SELECT user.* FROM user INNER JOIN token ON user.id = token.user_id WHERE token.token = ?");
    $stmt->execute([$token]);
    $acc = $stmt->fetch();
}
function redirectToLogin() {
    header("Location: /page/login.php");
    die();
} ?>