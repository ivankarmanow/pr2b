<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
    <script src="/bs/bootstrap.bundle.min.js"></script>
    <title>Профиль</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php

require_once __DIR__ . "/../api/auth.php";

if (!isset($acc) or !$acc) {
    die(header("Location: /page/login.php"));
}

?>
<div class="container d-flex align-items-center my-5 flex-column" id="root">
    <div class="card w-75">
        <div class="card-header">
            <h5 class="card-title">Профиль пользователя</h5>
        </div>
        <div class="card-body">
            <p><strong>Фамилия:</strong> <?php echo htmlspecialchars($acc['surname']); ?></p>
            <p><strong>Имя:</strong> <?php echo htmlspecialchars($acc['name']); ?></p>
            <p><strong>Отчество:</strong> <?php echo htmlspecialchars($acc['otch']); ?></p>
            <p><strong>Логин:</strong> <?php echo htmlspecialchars($acc['login']); ?></p>
            <p><strong>Дата рождения:</strong> <?php echo htmlspecialchars($acc['birth_date']); ?></p>
            <p><strong>Почта:</strong> <?php echo htmlspecialchars($acc['email']); ?></p>
            <p><strong>Номер телефона:</strong> <?php echo htmlspecialchars($acc['phone']); ?></p>
            <a href="/api/logout.php" class="btn btn-danger">Выйти</a>
        </div>
    </div>
</div>
</body>
</html>