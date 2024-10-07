<?php

require_once "db.php";

global $pdo;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $pdo->prepare("SELECT * FROM password_reset WHERE token = :token AND expire_at > :now");
    $stmt->execute(['token' => $token, 'now' => time()]);
    $reset = $stmt->fetch();

    if ($reset) {
        require_once __DIR__ . "/../page/reset_password.php";
    } else {
        $error = "token";
        $result = false;
        require_once __DIR__ . "/../page/forgot_result.php";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['passwd'];
    $confirm_password = $_POST['passwd2'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("SELECT * FROM password_reset WHERE token = :token");
        $stmt->execute(['token' => $token]);
        $reset = $stmt->fetch();

        if ($reset) {
            $stmt = $pdo->prepare("UPDATE user SET password_hash = :password WHERE id = :user_id");
            $stmt->execute(['password' => $hashed_password, 'user_id' => $reset['user_id']]);

            $stmt = $pdo->prepare("DELETE FROM password_reset WHERE token = :token");
            $stmt->execute(['token' => $token]);

            $result = true;
            $msg = "Ваш пароль успешно обновлён!";
            require_once __DIR__ . "/../page/forgot_result.php";
        } else {
            $result = false;
            $error = "token";
            require_once __DIR__ . "/../page/forgot_result.php";
        }
    } else {
        $result = false;
        $error = "pwd";
        require_once __DIR__ . "/../page/forgot_result.php";
    }
}
?>
