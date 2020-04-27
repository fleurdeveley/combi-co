$(function () {
    let email = $('#login input[type="email"]');
    let password = $('#login input[type="password"]');
    let btn = $('#login button[type="submit"]');
    
    function checkEmail () {
        if (email.val().length > 0 && email.val().match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)) {
            email.removeClass('is-invalid').addClass('is-valid');
        } else {
            email.removeClass('is-valid').addClass('is-invalid');
        }
    }

    function checkPassword () {
        if (password.val().length == 8) {
            password.removeClass('is-invalid').addClass('is-valid');
        } else {
            password.removeClass('is-valid').addClass('is-invalid');
        }
    }

    email.on('keyup', function (event) {
        checkEmail();
    })

    password.on('keyup', function (event) {
        checkPassword();
    })

    btn.on('click', function (event) {
        event.preventDefault();

        checkEmail ();
        checkPassword ();

        if ($('.is-invalid').length == 0) {
            $('#login').submit();
        }
    })
});
