/**
 * File to load google recaptcha V3
 *
 * It can be handle timeout after 2 minutes. It's refreshed each 2 minutes.
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 *
 * @see https://stackoverflow.com/questions/55251837/how-to-solve-google-v3-recaptcha-timeout
 *
 */


function getReCaptcha() {
    grecaptcha.ready(function () {
        grecaptcha.execute('6LfaVvMUAAAAAOPHKXivJXzqh5H-gKUf7f1YBRhA', {action: 'contact'}).then(function (token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
}

getReCaptcha();  // This is the initial call
setInterval(function () {
    getReCaptcha();
}, 120000);