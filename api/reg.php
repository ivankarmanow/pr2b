<?php

global $pdo;
require_once "db.php";

$errors = [];

function test_input($data) {
    return trim(htmlspecialchars($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = test_input($_POST['surname']);
    $name = test_input($_POST['name']);
    $otch = test_input($_POST['otch']);
    $login = test_input($_POST['login']);
    $birth = test_input($_POST['birth']);
    $mail = test_input($_POST['mail']);
    $phone = test_input($_POST['phone']);
    $passwd = $_POST['passwd'];
    $passwd2 = $_POST['passwd2'];

    if (!preg_match("/^[А-Яа-яЁё]+$/u", $surname)) {
        $errors[] = "Фамилия должна содержать только русские буквы.";
    }

    if (!preg_match("/^[А-Яа-яЁё]+$/u", $name)) {
        $errors[] = "Имя должно содержать только русские буквы.";
    }

    if (!empty($otch) && !preg_match("/^[А-Яа-яЁё]+$/u", $otch)) {
        $errors[] = "Отчество должно содержать только русские буквы.";
    }

    if (!preg_match("/^[a-zA-Z0-9_]+$/", $login)) {
        $errors[] = "Логин может состоять только из латинских букв, цифр и знака '_'.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM user WHERE login = ?");
        $stmt->execute([$login]);
        if ($stmt->rowCount() > 0) {
            $errors[] = "Логин уже используется.";
        }
    }

    $birthDate = strtotime($birth);
    if ($birthDate === false || $birthDate > time()) {
        $errors[] = "Дата рождения не может быть больше текущей.";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Почта должна быть в формате example@site.net.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->execute([$mail]);
        if ($stmt->rowCount() > 0) {
            $errors[] = "Почта уже используется.";
        }
    }

    if (!preg_match("/^\+\d{1,3}\d{10}$/", $phone)) {
        $errors[] = "Введите корректный номер телефона в международном формате.";
    }

    if (!preg_match("/^(?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*\d)(?=.*[\W_]).{8,}$/u", $passwd)) {
        $errors[] = "Пароль должен содержать не менее 8 символов, включая заглавные и строчные буквы, цифры и специальные символы.";
    }

    if ($passwd !== $passwd2) {
        $errors[] = "Пароли должны совпадать.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($passwd, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO user (surname, name, otch, login, birth_date, email, phone, password_hash) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        try {

            $stmt->execute([$surname, $name, $otch, $login, $birth, $mail, $phone, $hashed_password]);
            $result = true;

        } catch (\PDOException $e) {
            $result = false;
            $errors[] = "Ошибка при сохранении данных: " . $e->getMessage();
        }
    } else {
        $result = false;
    }
    include_once __DIR__ . "/../page/reg_result.php";
}
?>
