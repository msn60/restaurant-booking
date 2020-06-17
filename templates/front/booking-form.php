<div class="msn-flex-container">
    <div class="wrapper">
        <div id="msn_error_message" class="msn-display-none"></div>
        <div id="msn_reservation_detail" class="msn-display-none"></div>
        <div id="msn_conditional_reservation" class="msn-display-none">
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_persian_food" id="msn_persian_food"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Persian Foods" data-foodCategoryLocalId="37" data-foodCategoryOnlineId="29">
                </div>
            </div>
            <div id="msn_persian_food_list_section" class="msn-display-none">
                <!--<section>
                    <table cellspacing="0"
                           class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table"
                           id="shop_table">
                        <tbody>
                        <tr>
                            <td class="product-thumb">
                                <img src="https://nayeb.local/wp-content/uploads/2020/04/ROYAL-PLATTERS-large-150x150.jpg" class="item-thumb">
                            </td>
                            <td class="product-detail">
                                <div data-productId="">
                                    <span class="msn-product-name">name</span>
                                </div>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <input type="number" id="" class="input-text qty text " min="0" value="0"
                                           title="Qty" size="4" pattern="[0-9]*" inputmode="numeric"/>

                                </div>
                            </td>
                            <td class="product-price">
                                <span class="woocommerce-Price-currencySymbol">&#8382;</span>
                                <span class="woocommerce-Price-amount amount">70</span>
                                <span class="woocommerce-Price-currencySymbol"></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </section>-->
            </div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_indian_food" id="msn_indian_food"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Indian Foods" data-foodCategoryLocalId="36" data-foodCategoryOnlineId="31">
                </div>
            </div>
            <div id="msn_indian_food_list_section" class="msn-display-none"></div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_georgian_food" id="msn_georgian_food"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Georgian Foods" data-foodCategoryLocalId="35" data-foodCategoryOnlineId="32">
                </div>
            </div>
            <div id="msn_georgian_food_list_section" class="msn-display-none"></div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_arabian_food" id="msn_arabian_food"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Arabian Foods" data-foodCategoryLocalId="32" data-foodCategoryOnlineId="30">
                </div>
            </div>
            <div id="msn_arabian_food_list_section" class="msn-display-none"></div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_dessert" id="msn_dessert"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Dessert" data-foodCategoryLocalId="33" data-foodCategoryOnlineId="26">
                </div>
            </div>
            <div id="msn_dessert_list_section" class="msn-display-none"></div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="button" name="msn_salad" id="msn_salad"
                           class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button"
                           value="Select Salad" data-foodCategoryLocalId="38" data-foodCategoryOnlineId="28">
                </div>
            </div>
            <div id="msn_salad_list_section" class="msn-display-none"></div>
            <div class="form-row msn-submit-row">
                <div class="form-holder">
                    <input type="submit" name="add_to_cart_more_10" id="add_to_cart_more_10" class="form-control msn-submit-button msn-color-white msn-bg-green"
                           value="Complete your table reservation">
                </div>
            </div>

        </div>
        <div id="msn_normal_reservation" class="msn-display-none">
            <div class="form-row msn-submit-row">
                <a href="#" id="msn_normal_add_to_cart"
                   class="form-control msn-submit-button msn-color-white msn-bg-red msn-food-button msn-add-to-cart">
                    Complete your reservation now
                </a>
            </div>
        </div>
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
                               placeholder="Guest count" min="1" max="40" step="1" pattern="[0-9]*" inputmode="numeric" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-holder">
                        <i class="zmdi zmdi-email"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address"
                               required>
                    </div>
                    <!--<div class="form-holder">
                        <i class="zmdi zmdi-phone"></i>
                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                               placeholder="Your phone number" required>
                    </div>-->
                    <div class="form-holder">
                        <i class="zmdi zmdi-phone"></i>
                        <input type="tel" name="phone_number" id="phone_number" class="msn-intel-phone"
                               placeholder="Your phone number" pattern="[0-9]{5,20}" inputmode="numeric" required>
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
            <input type="hidden" name="local_environment" id="local_environment">
        </form>
    </div>
</div>
<div id="msn_pre_code"></div>