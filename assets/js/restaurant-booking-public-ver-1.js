/**
 * File to handle ajax request for booking form
 *
 * This file contains a class that handle all of booking ajax calls
 *
 * @package    Restaurant_Booking
 * @author     Mehdi Soltani Neshan <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://wpwebmaster.ir
 * @since      1.0.1
 *
 * @see     https://php.quicoto.com/how-to-use-wordpress-admin-ajax-with-fetch-api/
 * @see     https://gomakethings.com/getting-html-with-fetch-in-vanilla-js/
 * @see     https://stackoverflow.com/questions/36631762/returning-html-with-fetch
 * @see     https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
 * @see     https://wordpress.stackexchange.com/questions/252680/wp-admin-ajax-with-fetch-api-is-done-without-user
 *
 */

function show_recatpcha_issues(result) {
    msn_error_message.classList.remove('msn-display-none');
    let p_element = document.createElement('p');
    p_element.innerHTML = result.message.body;
    let h2_element = document.createElement('h2');
    h2_element.innerHTML = result.message.header;
    msn_error_message.appendChild(h2_element);
    msn_error_message.appendChild(p_element);

}

function send_booking_request(e) {
    e.preventDefault();
    msn_error_message.classList.add('msn-display-none');
    msn_error_message.innerHTML = '';


    const data = new FormData(msn_booking_form);
    data.append('action', 'msn_booking_ajax_call');
    data.append('security', global_booking_data.ajax_nonce);
    data.append('msn_ajax_sample', global_booking_data.msn_ajax_sample);


    fetch(global_booking_data.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: data


    }).then(
        (response) => response.json()
    ).then(function (result) {
        if (result.recaptcha_problem) {
            show_recatpcha_issues(result);
        } else {
            console.log(result);
        }


    }).catch(function (error) {
        console.log(error);

    })
}

function init() {
    document.getElementById('reservation_name').value = 'Amghezi';
    document.getElementById('guest_count').value = 9;
    document.getElementById('email').value = 'mehdi.soltani666@gmail.com';
    document.getElementById('phone_number').value = '02144814546';
    document.getElementById('date').value = '2020-5-11';
    document.getElementById('time').value = '16:30';

    submit_button.addEventListener('click', send_booking_request);

}

let submit_button = document.getElementById('first_submit');
let msn_code_part = document.getElementById('msn_pre_code');
let msn_booking_form = document.getElementById('msn_booking_form');
let msn_error_message = document.getElementById('msn_error_message');
document.addEventListener("DOMContentLoaded", init);