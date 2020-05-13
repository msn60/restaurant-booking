/*Public JS - Version 1*/
(function ($) {
    $(document).ready(function () {
        var $window = $(window);


        $('.gholi2').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                url: global_booking_data.ajax_url,
                type: 'post',
                data: {
                    action: 'msn_booking_ajax_call',
                    msn_ajax_sample: global_booking_data.msn_ajax_sample,
                    security: global_booking_data.ajax_nonce
                },
                success: function (response) {
                    fuckyoubaby(response);
                },
                error: function () {

                }
            });
        });

        $(document).on('click', '.msn-sample-vote', function (e) {
            e.preventDefault();
            var $this = $(this);
            var $post_id = $this.data('pid');
            if ($this.data('liked')) {
                alert('You have voted already!!!');
                return false;
            }
            $.ajax({
                url: data.ajax_url,
                type: 'post',
                //dataType: 'Text',
                dataType: 'json',
                data: {
                    action: 'sample_ajax_call_2',
                    security: data.ajax_nonce,
                    post_id: $post_id
                },
                success: function (response) {

                    //var response = JSON.parse(response);
                    if (response.success) {
                        var itag = $this.find('.msn-sample-count');
                        itag.html(response.count);
                        $this.data('liked', 1);
                        itag.addClass('msn-red');
                    }
                },
                error: function () {

                }
            });


        });


    });

})(jQuery);

function fuckyoubaby(response) {
    console.log(response);
}


var callback = function () {
    console.log('Firrst gholam test');
};

if (
    document.readyState === "complete" ||
    (document.readyState !== "loading" && !document.documentElement.doScroll)
) {
    callback();
} else {
    document.addEventListener("DOMContentLoaded", callback);
}

function send_booking_request(e) {
    e.preventDefault();
    const data = new FormData(document.getElementById('msn-wizard'));
    const msn_body = JSON.stringify({
        action: 'msn_booking_ajax_call',
        msn_ajax_sample: global_booking_data.msn_ajax_sample,
        security: global_booking_data.ajax_nonce
    });

    data.append('action', 'msn_booking_ajax_call');
    data.append('security', global_booking_data.ajax_nonce);
    data.append('msn_ajax_sample', global_booking_data.msn_ajax_sample);


    fetch(global_booking_data.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: data


    }).then(function (response) {

        return response.text();
    }).then(function (html) {
        console.log(typeof html);
        console.log(html);
        var msn_code_part = document.getElementById('msn-pre-code');
        console.log(msn_code_part);
        msn_code_part.innerHTML = html;

    }).catch(function (error) {
        console.log(error);

    })
}

function init() {
    var submit_button = document.getElementById('submit');
    submit_button.addEventListener('click', send_booking_request);

}

document.addEventListener("DOMContentLoaded", init);


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


function send_booking_request(e) {
    e.preventDefault();
    const data = new FormData(msn_booking_form);
    data.append('action', 'msn_booking_ajax_call');
    data.append('security', global_booking_data.ajax_nonce);
    data.append('msn_ajax_sample', global_booking_data.msn_ajax_sample);


    fetch(global_booking_data.ajax_url, {
        method: 'POST',
        credentials: 'same-origin',
        body: data


    }).then(function (response) {

        return response.text();
    }).then(function (html) {
        console.log(typeof html);
        console.log(html);

        console.log(msn_code_part);
        msn_code_part.innerHTML = html;

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
let msn_code_part = document.getElementById('msn-pre-code');
let msn_booking_form = document.getElementById('msn-booking-form');
document.addEventListener("DOMContentLoaded", init);