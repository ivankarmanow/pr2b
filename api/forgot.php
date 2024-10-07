<?php

require_once "db.php";

require_once __DIR__ . "/../mail/PHPMailer.php";
require_once __DIR__ . "/../mail/Exception.php";
require_once __DIR__ . "/../mail/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

global $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $email = $_POST['mail'];

    // Проверка пользователя в БД
    $stmt = $pdo->prepare("SELECT * FROM user WHERE login = :login AND email = :email");
    $stmt->execute(['login' => $login, 'email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $expire_time = time() + 3600;

        $stmt = $pdo->prepare("INSERT INTO password_reset (user_id, token, expire_at) VALUES (:user_id, :token, :expire_at)");
        $stmt->execute(['user_id' => $user['id'], 'token' => $token, 'expire_at' => $expire_time]);

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.mail.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'password-repair@karmanow.ru';
            $mail->Password = 'rrWZNh6fSrZNEtvjMbvk';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('password-repair@karmanow.ru', 'Восстановление пароля');
            $mail->addAddress('ivan@karmanow.ru', 'Иван Карманов');

            $reset_link = "https://pr2b/api/reset_password.php?token=$token";

            $mail->Subject = 'Восстановление пароляя';
            $mail->Body = "Перейдите по ссылке для восстановления пароля: $reset_link";

            $mail->send();
            $result = true;
        } catch (Exception $e) {
            $result = false;
            $error = "else";
        }

        $msg = "Ссылка на восстановление пароля отправлена вам на электронную почту!";
    } else {
        $result = false;
        $error = "login";
    }

    require_once __DIR__ . "/../page/forgot_result.php";
}
?>
