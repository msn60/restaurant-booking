grecaptcha.ready(function () {
    grecaptcha.execute('6LfaVvMUAAAAAOPHKXivJXzqh5H-gKUf7f1YBRhA', {action: 'contact'}).then(function (token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
});