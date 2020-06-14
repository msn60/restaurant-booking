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

/**
 * Normal reservation process
 * @param result
 *
 * @see https://businessbloomer.com/woocommerce-custom-add-cart-urls-ultimate-guide/
 */
function show_normal_reservation(result) {
    msn_normal_reservation.classList.remove('msn-display-none');
    let p_element1 = document.createElement('p');
    p_element1.innerHTML = 'So you need to pay before register your reservation.';
    let p_element2 = document.createElement('p');
    p_element2.innerHTML = 'Click on the link below to checkout page.';
    let p_element3 = document.createElement('p');
    p_element3.innerHTML = 'After checkout of your payment, your table will be reserved.';
    let h3_element = document.createElement('h3');
    h3_element.innerHTML = 'You need to have pre-payment for each of your guests:';
    let h2_element = document.createElement('h2');
    h2_element.innerHTML = 'Only one step to complete your reservation!!!';

    msn_normal_reservation.insertBefore(p_element3, msn_normal_reservation.childNodes[0]);
    msn_normal_reservation.insertBefore(p_element2, msn_normal_reservation.childNodes[0]);
    msn_normal_reservation.insertBefore(p_element1, msn_normal_reservation.childNodes[0]);
    msn_normal_reservation.insertBefore(h3_element, msn_normal_reservation.childNodes[0]);
    msn_normal_reservation.insertBefore(h2_element, msn_normal_reservation.childNodes[0]);
    document.getElementById('msn_normal_add_to_cart').setAttribute('href', '/checkout/?add-to-cart=' + result.table_reservation_product_id + '&quantity=' + result.guest_count)

}

function show_conditional_reservation($result) {
    msn_conditional_reservation.classList.remove('msn-display-none');
    let p_element1 = document.createElement('p');
    p_element1.innerHTML = 'Your guest number is greater than 10 person.';
    let p_element2 = document.createElement('p');
    p_element2.innerHTML = 'To complete your reservation, you must select foods that you want to serve for reservation time';
    let p_element3 = document.createElement('p');
    p_element3.innerHTML = 'After checkout of your payment, your table will be reserved';
    let h2_element = document.createElement('h2');
    h2_element.innerHTML = 'Only one step to complete your reservation!!!';
    let h3_element = document.createElement('h3');
    h3_element.innerHTML = 'Please select your food:';
    msn_conditional_reservation.insertBefore(h3_element, msn_conditional_reservation.childNodes[0]);
    msn_conditional_reservation.insertBefore(p_element3, msn_conditional_reservation.childNodes[0]);
    msn_conditional_reservation.insertBefore(p_element2, msn_conditional_reservation.childNodes[0]);
    msn_conditional_reservation.insertBefore(p_element1, msn_conditional_reservation.childNodes[0]);
    msn_conditional_reservation.insertBefore(h2_element, msn_conditional_reservation.childNodes[0]);


}

function get_local_store(name) {
    return JSON.parse(localStorage.getItem(name));
}

function update_local_store(name, store) {

    localStorage.setItem(name, JSON.stringify(store));
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

    let main_phone_prefix = document.querySelector(".iti__selected-dial-code").innerText;
    let full_phone_number = main_phone_prefix + '-' + document.getElementById("phone_number").value;
    const data = new FormData(msn_booking_form);
    data.append('action', 'msn_booking_ajax_call');
    data.append('security', global_booking_data.ajax_nonce);
    data.append('full_phone_number', full_phone_number);


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
                if (parseInt(result.guest_count) <= 10) {
                    update_local_store('msn_reservation_detail', result);
                    //show_reservation_detail(result);
                    //show_reservation_detail(get_local_store('msn_reservation_detail'));
                    show_normal_reservation(result);

                } else {
                    update_local_store('msn_reservation_detail', result);
                    show_conditional_reservation(result);

                }
            }

        }


    }).catch(function (error) {
        console.log(error);

    })
}

function create_fetch_product_url(type) {
    switch (type) {
        case 'persian-food':
            temp_element = msn_persian_foods_button;
            break;
        case 'indian-food':
            temp_element = msn_indian_foods_button;
            break;
        case 'georgian-food':
            temp_element = msn_georgian_foods_button;
            break;
        case 'arabian-food':
            temp_element = msn_arabian_foods_button;
            break;
        case 'dessert':
            temp_element = msn_dessert_button;
            break;
        case 'salad':
            temp_element = msn_salad_button;
            break;
        default:
            temp_element = 'error';
    }
    let msn_reserve_information_object = get_local_store('msn_reservation_detail');

    if ('error' !== temp_element) {
        if ('local' === msn_reserve_information_object.host_type) {
            request_url = 'https://nayeb.local/wp-json/wc/v3/products/?category=' + temp_element.getAttribute("data-foodCategoryLocalId") +
                '&per_page=100&consumer_key=' + msn_reserve_information_object.consumer_key + '&consumer_secret=' + msn_reserve_information_object.consumer_secret;
        } else {
            request_url = 'https://nayebrestaurant.com/wp-json/wc/v3/products/?category=' + temp_element.getAttribute("data-foodCategoryOnlineId") +
                '&per_page=100&consumer_key=' + msn_reserve_information_object.consumer_key + '&consumer_secret=' + msn_reserve_information_object.consumer_secret;
        }
        return request_url;
    } else {
        return 'fetch-url-error';
    }

}

function send_food_request(e) {
    e.preventDefault();
    console.log(get_local_store('msn_reservation_detail'));
    food_type = event.currentTarget.attributes.foodType.value;
    request_url = create_fetch_product_url(food_type);
    if ('fetch-url-error' === request_url) {
        console.log('Problem in generating fethch url');
        alert('Problem in generating fethch url! Please reload this page and send your data again');
        return false;
    }
    console.log(request_url);

    fetch(request_url, {
        method: 'GET'
    }).then(function (response) {
            if (200 !== parseInt(response.status)) {
                console.log('Woocommerce Rest API is not available.');
                alert('Woocommerce Rest API is not available! Please contact us to investigate this issue.');
            } else {
                return response.json();
            }
        }
    ).then(function (result) {
        console.log(result);

    }).catch(function (error) {
        console.log(error);

    })
}

function init() {
    document.getElementById('reservation_name').value = 'Amghezi';
    document.getElementById('guest_count').value = 11;
    document.getElementById('email').value = 'mehdi.soltani666@gmail.com';
    document.getElementById('phone_number').value = '2144814546';
    document.getElementById('date').value = '2020-06-23';
    document.getElementById('time').value = '17:30';


    submit_button.addEventListener('click', send_booking_request);
    msn_persian_foods_button.addEventListener('click', send_food_request);
    msn_indian_foods_button.addEventListener('click', send_food_request);
    msn_georgian_foods_button.addEventListener('click', send_food_request);
    msn_arabian_foods_button.addEventListener('click', send_food_request);
    msn_dessert_button.addEventListener('click', send_food_request);
    msn_salad_button.addEventListener('click', send_food_request);


}


//TODO: only use recaptcha in this file (not in separated file)
let submit_button = document.getElementById('first_submit');
let msn_code_part = document.getElementById('msn_pre_code');
let msn_booking_form = document.getElementById('msn_booking_form');
let msn_error_message = document.getElementById('msn_error_message');
let msn_reservation_detail = document.getElementById('msn_reservation_detail');
let msn_conditional_reservation = document.getElementById('msn_conditional_reservation');
let msn_normal_reservation = document.getElementById('msn_normal_reservation');

let msn_persian_foods_button = document.getElementById('msn_persian_food');
msn_persian_foods_button.setAttribute('foodType','persian-food');
let msn_indian_foods_button = document.getElementById('msn_indian_food');
msn_indian_foods_button.setAttribute('foodType','indian-food');
let msn_georgian_foods_button = document.getElementById('msn_georgian_food');
msn_georgian_foods_button.setAttribute('foodType','georgian-food');
let msn_arabian_foods_button = document.getElementById('msn_arabian_food');
msn_arabian_foods_button.setAttribute('foodType','arabian-food');
let msn_dessert_button = document.getElementById('msn_dessert');
msn_dessert_button.setAttribute('foodType','dessert');
let msn_salad_button = document.getElementById('msn_salad');
msn_salad_button.setAttribute('foodType','salad');

// https://nayeb.local/wp-json/wc/v3/products?per_page=20&consumer_key=ck_cb0f7a9a7adcf29b3066fc2bee4d344f1234daba&consumer_secret=cs_008c2a10c302258236fd21f51c026f0c7118beec
document.addEventListener("DOMContentLoaded", init);

