document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.needs-validation');

    form.addEventListener('submit', function (event) {
        let valid = true;

        const passwd = form.elements['passwd'];
        const passwd2 = form.elements['passwd2'];

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