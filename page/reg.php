<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bs/bootstrap.min.css">
        <script src="/bs/bootstrap.bundle.min.js"></script>
    <title>Регистрация</title>
    <script src="/js/reg.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container" id="root">
    <form action="/api/reg.php" method="post" class="d-flex flex-column align-items-center my-5 w-100 needs-validation"
          novalidate>
        <h1>Регистрация</h1>
        <label class="form-label w-100">
            Фамилия: <input type="text" name="surname" class="form-control" required
                            placeholder="Введите свою фамилию...">
            <div class="invalid-feedback">
                Пожалуйста, введите вашу фамилию русскими буквами!
            </div>
        </label>
        <label class="form-label w-100">
            Имя: <input type="text" name="name" class="form-control" required placeholder="Введите своё имя...">
            <div class="invalid-feedback">
                Пожалуйста, введите ваше имя русскими буквами!
            </div>
        </label>
        <label class="form-label w-100">
            Отчество: <input type="text" name="otch" class="form-control" placeholder="Введите своё отчество...">
        </label>
        <label class="form-label w-100">
            Логин: <input type="text" name="login" class="form-control" required placeholder="Введите логин...">
            <div class="invalid-feedback">
                Пожалуйста, введите логин! Логин может состоять только из латинских символов, цифр и знака _
            </div>
        </label>
        <label class="form-label w-100">
            Дата рождения: <input type="date" name="birth" class="form-control" required>
            <div class="invalid-feedback">
                Пожалуйста, выберите дату рождения! Дата рождения не может быть больше текущей
            </div>
        </label>
        <label class="form-label w-100">
            Почта: <input type="email" name="mail" class="form-control" required placeholder="Введите свою почту...">
            <div class="invalid-feedback">
                Пожалуйста, введите вашу почту! Почта должна быть в формате example@site.net
            </div>
        </label>
        <label class="form-label w-100">
            Номер телефона: <input type="text" name="phone" class="form-control" required
                                   placeholder="Введите свой номер телефона...">
            <div class="invalid-feedback">
                Пожалуйста, введите корректный номер телефона!
            </div>
        </label>
        <label class="form-label w-100">
            Пароль: <input type="password" name="passwd" class="form-control" required
                           placeholder="Придумайте пароль...">
            <div class="invalid-feedback">
                Пожалуйста, введите пароль!
            </div>
        </label>
        <label class="form-label w-100">
            Повторите пароль: <input type="password" name="passwd2" class="form-control" required
                                     placeholder="Повторите пароль...">
            <div class="invalid-feedback">
                Пожалуйста, повторите пароль! Пароли должны совпадать
            </div>
        </label>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <a href="/page/login.php" class="mt-2">Вход</a>
    </form>
</div>
</body>
</html>