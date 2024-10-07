document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.needs-validation');

    form.addEventListener('submit', function (event) {
        form.classList.remove('was-validated');
        let valid = true;

        const surname = form.elements['surname'];
        const name = form.elements['name'];
        const otch = form.elements['otch'];
        const login = form.elements['login'];
        const birth = form.elements['birth'];
        const mail = form.elements['mail'];
        const phone = form.elements['phone'];
        const passwd = form.elements['passwd'];
        const passwd2 = form.elements['passwd2'];

        const rusLettersRegex = /^[А-Яа-яЁё]+$/;
        const loginRegex = /^[a-zA-Z0-9_]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^\+\d{1,3}\d{10}$/;
        const passwordRegex = /^(?=.*[a-zа-я])(?=.*[A-ZА-Я])(?=.*\d)(?=.*[\W_]).{8,}$/;

        function setInvalid(inputElement, message) {
            valid = false;
            inputElement.classList.add('is-invalid');
            inputElement.classList.remove('is-valid');
            const feedback = inputElement.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = message;
            }
        }

        function setValid(inputElement) {
            inputElement.classList.remove('is-invalid');
            inputElement.classList.add('is-valid');
            const feedback = inputElement.nextElementSibling;
            if (feedback && feedback.classList.contains('invalid-feedback')) {
                feedback.textContent = '';
            }
        }

        function isEmpty(value) {
            return value.trim() === '';
        }

        if (isEmpty(surname.value)) {
            setInvalid(surname, "Пожалуйста, введите вашу фамилию!");
        } else if (!rusLettersRegex.test(surname.value.trim())) {
            setInvalid(surname, "Фамилия должна содержать только русские буквы.");
        } else {
            setValid(surname);
        }

        if (isEmpty(name.value)) {
            setInvalid(name, "Пожалуйста, введите ваше имя!");
        } else if (!rusLettersRegex.test(name.value.trim())) {
            setInvalid(name, "Имя должно содержать только русские буквы.");
        } else {
            setValid(name);
        }

        if (!isEmpty(otch.value) && !rusLettersRegex.test(otch.value.trim())) {
            setInvalid(otch, "Отчество должно содержать только русские буквы.");
        } else {
            setValid(otch);
        }

        if (isEmpty(login.value)) {
            setInvalid(login, "Пожалуйста, введите логин!");
        } else if (!loginRegex.test(login.value.trim())) {
            setInvalid(login, "Логин может состоять только из латинских букв, цифр и знака '_'.");
        } else {
            setValid(login);
        }

        if (birth.value === "") {
            setInvalid(birth, "Пожалуйста, выберите дату рождения!");
        } else {
            const birthDate = new Date(birth.value);
            const today = new Date();
            if (birthDate > today) {
                setInvalid(birth, "Дата рождения не может быть больше текущей.");
            } else {
                setValid(birth);
            }
        }

        if (isEmpty(mail.value)) {
            setInvalid(mail, "Пожалуйста, введите вашу почту!");
        } else if (!emailRegex.test(mail.value.trim())) {
            setInvalid(mail, "Пожалуйста, введите корректный адрес электронной почты.");
        } else {
            setValid(mail);
        }

        if (isEmpty(phone.value)) {
            setInvalid(phone, "Пожалуйста, введите номер телефона!");
        } else if (!phoneRegex.test(phone.value.trim())) {
            setInvalid(phone, "Введите корректный номер телефона в международном формате, например: +71234567890.");
        } else {
            setValid(phone);
        }

        if (isEmpty(passwd.value)) {
            setInvalid(passwd, "Пожалуйста, введите пароль!");
        } else if (!passwordRegex.test(passwd.value)) {
            setInvalid(passwd, "Пароль должен содержать не менее 8 символов, включая заглавные и строчные буквы, цифры и специальные символы.");
        } else {
            setValid(passwd);
        }

        if (isEmpty(passwd2.value)) {
            setInvalid(passwd2, "Пожалуйста, повторите пароль!");
        } else if (passwd.value !== passwd2.value) {
            setInvalid(passwd2, "Пароли должны совпадать.");
        } else {
            setValid(passwd2);
        }

        if (!valid) {
            event.preventDefault();
            event.stopPropagation();
        }
    }, false);
});