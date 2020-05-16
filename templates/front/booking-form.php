<div class="msn-flex-container">
    <div class="wrapper">
        <div id="msn_error_message" class="msn-display-none" ></div>
        <div id="msn_reservation_detail" class="msn-display-none" ></div>
        <!-- TODO: add auto complete to form and its elements -->
        <form action="" id="msn_booking_form" method="post">
            <section>
                <h3>Book your table</h3>
                <div class="msn-text-center msn-margin-2 msn-color-red msn-font-size-1">
                    <p>You must fill out all of fields to reserve your table</p>
                </div>

                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-account"></i>
                        <input type="text" name="reservation_name" id="reservation_name" class="form-control"
                               placeholder="Reservation Name" required>
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-account-add"></i>
                        <input type="number" name="guest_count" id="guest_count" class="form-control"
                               placeholder="Guest count" min="1" max="40" step="1" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-email"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
                               required>
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-phone"></i>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                               placeholder="Your phone number" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-calendar"></i>
                        <input type="text" name="date" id="date" class="form-control datepicker" placeholder="Reservation Date"
                               required>
                    </div>
                    <div class="form-holder">
                        <i class="zmdi zmdi-timer"></i>
                        <input type="text" name="time" id="time" class="form-control timepicker" placeholder="Reservation Time"
                               required>
                    </div>
                </div>
                <div class="form-row msn-submit-row">
                    <div class="form-holder">
                        <input type="submit" name="first_submit" id="first_submit" class="form-control msn-submit-button msn-color-white msn-bg-red"
                               value="Reserve a table">
                    </div>
                </div>


            </section>
            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
        </form>
    </div>
</div>
<div id="msn_pre_code"></div>