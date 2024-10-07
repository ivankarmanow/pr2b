<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
    <script src="/bs/bootstrap.bundle.min.js"></script>
    <?php if (!isset($result)) die(header("Location: /")) ?>
    <title><?= $result ? "Успешно" : "Ошибка" ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container d-flex align-items-center my-5 flex-column" id="root">
    <?php if ($result) { ?>
        <h1 class="text-center"><?= $msg ?></h1>
        <a href="/" class="btn btn-success">На главную</a>
    <?php } elseif ($error == "login") { ?>
        <h1 class="text-center">Неверная почта или логин, попробуйте снова!</h1>
        <button class="btn btn-danger" onclick="window.history.back()">Вернуться назад</button>
    <?php } elseif ($error = "token") { ?>
        <h1 class="text-center">Неверный токен! Проверьте, что вы не меняли ссылку из письма</h1>
        <a href="/" class="btn btn-success">На главную</a>
    <?php } elseif ($error = "pwd") { ?>
        <h1 class="text-center">Пароли не совпадают!</h1>
        <button class="btn btn-danger" onclick="window.history.back()">Вернуться назад</button>
    <?php } else { ?>
        <h1 class="text-center">Неизвестная ошибка</h1>
        <button class="btn btn-danger" onclick="window.history.back()">Вернуться назад</button>
    <?php } ?>
</div>
</body>
</html>