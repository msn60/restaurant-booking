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

//TODO: increase recaptcha time
// https://stackoverflow.com/questions/44820652/increase-recaptcha-expiration-time/49908226
// https://stackoverflow.com/questions/55251837/how-to-solve-google-v3-recaptcha-timeout
function show_recatpcha_issues(result) {
    msn_error_message.classList.remove('msn-display-none');
    let p_element = document.createElement('p');
    p_element.innerHTML = result.message.body;
    let h2_element = document.createElement('h2');
    h2_element.innerHTML = result.message.header;
    let h3_element = document.createElement('h3');
    h3_element.innerHTML = result.message.issue;
    msn_error_message.appendChild(h2_element);
    msn_error_message.appendChild(h3_element);
    msn_error_message.appendChild(p_element);
    if (result.is_need_remove_form) {
        msn_booking_form.classList.add('msn-display-none');
    }

}

function show_reservation_detail(result) {

    msn_reservation_detail.classList.remove('msn-display-none');
    let p_element = document.createElement('p');
    p_element.innerHTML = 'This is detail information of your booking';
    let h2_element = document.createElement('h2');
    h2_element.innerHTML = 'Your table booking was successful';
    let main_detail_div_element = document.createElement('div');
    main_detail_div_element.classList.add('msn-reservation-detail-box');
    let temp_element;
    for (const [key, value] of Object.entries(result)) {
        temp_element = document.createElement('p');
        temp_element.innerHTML = key + ' : ' + value;
        main_detail_div_element.appendChild(temp_element);
    }
    msn_reservation_detail.appendChild(h2_element);
    msn_reservation_detail.appendChild(p_element);
    msn_reservation_detail.appendChild(main_detail_div_element);
}

function reload_google_reptcha() {
    grecaptcha.execute('6LfaVvMUAAAAAOPHKXivJXzqh5H-gKUf7f1YBRhA', {action: 'contact'}).then(function (token) {
        let recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
}

function send_booking_request(e) {
    e.preventDefault();
    //TODO: check guest count before sending
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
        if (result.submitting_problem) {
            reload_google_reptcha();
            show_recatpcha_issues(result);

        } else {
            //TODO: remove reloading recaptcha after testing this section
            //reload_google_reptcha();
            msn_booking_form.remove();
            if (result.reserve_id) {
                if ("Completed" == result.confirmation_status) {
                    show_reservation_detail(result);
                } else {
                    console.log(result);
                }
            }

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
    document.getElementById('date').value = '2020-05-11';
    document.getElementById('time').value = '16:30';

    submit_button.addEventListener('click', send_booking_request);

}

//TODO: only use recaptcha in this file (not in separated file)
let submit_button = document.getElementById('first_submit');
let msn_code_part = document.getElementById('msn_pre_code');
let msn_booking_form = document.getElementById('msn_booking_form');
let msn_error_message = document.getElementById('msn_error_message');
let msn_reservation_detail = document.getElementById('msn_reservation_detail');
document.addEventListener("DOMContentLoaded", init);