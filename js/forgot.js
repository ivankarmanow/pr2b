document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.needs-validation');

    form.addEventListener('submit', function (event) {
        let valid = true;

        const login = form.elements['login'];
        const mail = form.elements['mail'];

        if (login.value.trim() === '') {
            valid = false;
        }

        if (mail.value.trim() === '') {
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            event.stopPropagation();
        }

    }, false);
});