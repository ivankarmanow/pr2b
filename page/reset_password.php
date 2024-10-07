<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
    <script src="/bs/bootstrap.bundle.min.js"></script>
    <title>Смена пароля</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/reset_password.js"></script>
</head>
<body>
<div class="container" id="root">
    <form action="/api/reset_password.php" method="post"
          class="d-flex flex-column align-items-center my-5 w-100 needs-validation" novalidate>
        <h1 class="text-center">Смена пароля</h1>
        <label class="form-label w-100">
            Новый пароль: <input type="password" name="passwd" class="form-control" required
                                 placeholder="Придумайте новый пароль...">
            <div class="invalid-feedback">
                Пожалуйста, введите новый пароль!
            </div>
        </label>
        <label class="form-label w-100">
            Повторите новый пароль: <input type="password" name="passwd2" class="form-control" required
                                           placeholder="Повторите новый пароль...">
            <div class="invalid-feedback">
                Пожалуйста, повторите новый пароль! Пароли должны совпадать
            </div>
        </label>
        <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
        <button type="submit" class="btn btn-primary">Восстановить</button>
    </form>
</div>

</body>
</html>