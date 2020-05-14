/*window.onload = function () {
    document.getElementById("reservation_name").value = "";
    document.getElementById("guest_count").value = "";
    document.getElementById("email").value = "";
};*/
(function ($) {
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd'
    });
    $('.timepicker').pickatime({
            format: 'HH:i',
            min: [12, 30],
            max: [23, 30]
        }
    );

})(jQuery);



