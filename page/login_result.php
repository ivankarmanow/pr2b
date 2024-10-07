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
        <h1 class="text-center">Вход прошёл успешно!</h1>
        <a href="/" class="btn btn-success">На главную</a>
    <?php } else { ?>
        <h1 class="text-center">Ошибка в процессе входа!</h1>
        <?php if (isset($errors)) { ?>
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li class="text-danger"><?= $error ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <button class="btn btn-danger" onclick="window.history.back()">Вернуться назад</button>
    <?php } ?>
</div>
</body>
</html>