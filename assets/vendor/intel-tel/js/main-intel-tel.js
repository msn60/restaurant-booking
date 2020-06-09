let msn_input = document.getElementById("phone_number");
//window.intlTelInputGlobals.loadUtils("../../vendor/intel-tel/js/utils.js");
let iti = window.intlTelInput(msn_input, {
    initialCountry: "auto",
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    /*geoIpLookup: function (success, failure) {



        $.get("https://ipinfo.io", function () {
        }, "jsonp").always(function (resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            success(countryCode);
        });
    },*/
    //hiddenInput: "full_number",
    // initialCountry: "auto"
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: true,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "utils.js",
});

