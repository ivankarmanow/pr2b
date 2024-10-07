<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <title>Практическая работа 2</title>
</head>
<body>
<div class="container d-flex flex-column align-items-center">
    <a href="page/login.php" class="mt-5 display-6">Вход</a>
    <a href="page/reg.php" class="display-6">Регистрация</a>
    <a href="page/forgot.php" class="display-6">Забыли пароль</a>
    <?php
    require_once __DIR__ . "/api/auth.php";

    if (isset($acc) and $acc) {
        ?>
        <a href="page/profile.php" class="display-6">Ваш профиль</a>
    <?php } ?>
</div>
</body>
</html>