<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
    <script src="/bs/bootstrap.bundle.min.js"></script>
    <title>Восстановление пароля</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/forgot.js"></script>
</head>
<body>
<div class="container" id="root">
    <form action="/api/forgot.php" method="post"
          class="d-flex flex-column align-items-center my-5 w-100 needs-validation" novalidate>
        <h1 class="text-center">Восстановление пароля</h1>
        <label class="form-label w-100">
            Логин: <input type="text" name="login" class="form-control" required placeholder="Введите свой логин...">
            <div class="invalid-feedback">
                Пожалуйста, введите логин!
            </div>
        </label>
        <label class="form-label w-100">
            Почта: <input type="email" name="mail" class="form-control" required placeholder="Введите свою почту...">
            <div class="invalid-feedback">
                Пожалуйста, введите вашу почту!
            </div>
        </label>
        <button type="submit" class="btn btn-primary">Восстановить</button>
    </form>
</div>

</body>
</html>