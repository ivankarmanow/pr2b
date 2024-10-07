<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
    <script src="/bs/bootstrap.bundle.min.js"></script>
    <title>Вход</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/login.js"></script>
</head>
<body>
<div class="container" id="root">
    <form action="/api/login.php" method="post"
          class="d-flex flex-column align-items-center my-5 w-100 needs-validation" novalidate>
        <h1>Вход</h1>
        <label class="form-label w-100">
            Логин: <input type="text" name="login" class="form-control" required placeholder="Введите логин...">
            <div class="invalid-feedback">
                Пожалуйста, введите логин!
            </div>
        </label>
        <label class="form-label w-100">
            Пароль: <input type="password" name="passwd" class="form-control" required
                           placeholder="Введите свой пароль...">
            <div class="invalid-feedback">
                Пожалуйста, введите пароль!
            </div>
        </label>
        <button type="submit" class="btn btn-primary">Войти</button>
        <a href="/page/reg.php" class="mt-2">Регистрация</a>
        <a href="/page/forgot.php">Забыли пароль?</a>
    </form>
</div>
</body>
</html>