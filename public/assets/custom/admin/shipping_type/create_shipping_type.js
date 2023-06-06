api['shippingType'] = ajax_path + '/admin/shippingtype';
api['updateShippingType'] = ajax_path + '/admin/shippingtype/:id';

var add_shipping_submit = $('#add-shipping_type');
var update_shippingType = $('#update_shippingType');

// ADD Shipping Type
$('body').on('submit', '#add_shipping_type', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }

    // Shipping min/max days limitations
    var min_shipping_days = parseInt($('#min_shipping_days').val());
    var max_shipping_days = parseInt($('#max_shipping_days').val());
    $('.limitation_validate_message').remove();
    if (min_shipping_days > max_shipping_days) {
        $('.error_message').remove();
        $('#min_shipping_days').after("<span class='limitation_validate_message' style='color:red'>Min shipping days should be less than max shipping days</span>");
        button_status(add_shipping_submit, false);
        return false;
    }
    else {
        button_status(add_shipping_submit, true);
    }

    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('shipping_cost', $('#shipping_cost').val());
    data.append('min_shipping_days', $('#min_shipping_days').val());
    data.append('max_shipping_days', $('#max_shipping_days').val());

    button_status(add_shipping_submit, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["shippingType"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_shipping_submit, false);
                    window.location.reload();
                }, 1500);
            }
            else {
                button_status(add_shipping_submit, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                // you can loop through the errors object and show it to the user
                // display errors on each form field
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message"><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(add_shipping_submit, false);
            }, 1000);
        }
    });
});

// UPDATE SHIPPING TYPES
$('body').on('submit', '#shipping_types', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }
    // Shipping min/max days limitations
    var min_shipping_days = parseInt($('#min_shipping_days').val());
    var max_shipping_days = parseInt($('#max_shipping_days').val());
    $('.limitation_validate_message').remove();
    if (min_shipping_days > max_shipping_days) {
        $('.error_message').remove();
        $('#min_shipping_days').after("<span class='limitation_validate_message' style='color:red'>Min shipping days should be less than max shipping days</span>");
        update_shippingType.addAttr('disabled');
    }
    else {
        update_shippingType.removeAttr('disabled');
    }
    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('shipping_cost', $('#shipping_cost').val());
    data.append('min_shipping_days', $('#min_shipping_days').val());
    data.append('max_shipping_days', $('#max_shipping_days').val());
    data.append('_method', 'PUT');
    button_status(update_shippingType, true, 'Updating');
    let remove_id = _this.data('id');
    let url = api["updateShippingType"];
    url = url.replace(":id", remove_id);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(update_shippingType, false);
                    window.location.reload();
                }, 1500);
            }
            else {
                button_status(update_shippingType, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                // you can loop through the errors object and show it to the user
                // display errors on each form field
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_shippingType, false);
            }, 1000);
        }
    });
});

// INTEGER INPUT FIELDS ACCEPT JUST POSITIVE VALUE
$('body').on('keydown change', '#shipping_cost', function (e) {
    if (e.which === 13 || e.which === 189 || e.which === 69) {
        e.preventDefault();
        return false;
    }
})
$('body').on('keydown change', '#min_shipping_days', function (e) {
    if (e.which === 13 || e.which === 189 || e.which === 69) {
        e.preventDefault();
        return false;
    }
})
$('body').on('keydown change', '#max_shipping_days', function (e) {
    if (e.which === 13 || e.which === 189 || e.which === 69) {
        e.preventDefault();
        return false;
    }
})
