document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form.needs-validation');

    form.addEventListener('submit', function (event) {
        let valid = true;

        const login = form.elements['login'];
        const passwd = form.elements['passwd'];

        if (login.value.trim() === '') {
            valid = false;
        }

        if (passwd.value.trim() === '') {
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add("was-validated");
        }

    }, false);
});