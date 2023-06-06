api['createPrivacy'] = ajax_path + '/admin/privacy';
api['updatePrivacy'] = ajax_path + '/admin/privacy/:id';
api['getSubPrivacy'] = ajax_path + '/admin/privacy/:id/sub-privacy';

var add_privacy_btn = $('#add_privacy_button');
var update_privacy_btn = $('#update_privacy_button');

// Apply sumoSelect on parent privacy 
$(document).ready(function () {
    $('.sumoSelect_search').SumoSelect({ triggerChangeCombined: true, search: true, selectAll: false, placeholder: 'Nothing selected' });
});

var sumo_selected_values = [];
var sumo_selected_values_difference = null;
$('body').on('change', '.sumoSelect_search', function () {
    var selectValues = $(this).val();
    jQuery.grep(selectValues, function (el) {
        if (jQuery.inArray(el, sumo_selected_values) == -1) {
            sumo_selected_values_difference = el;
        }
    });
});


// Adding privacies code start 
$('body').on('submit', '#add_privacy_form', function (e) {
    e.preventDefault();
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }
    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('_method', 'POST');

    // from each Privacy dropdown, add its level and selected id to selectedPrivacy array
    // only if the level is defined and id is greater than 0 because 0 is for placeholder text
    var selectedPrivacy = [];
    $('.parent_privacy').each(function (index) {
        if ($(this).data('level') != null && $(this).val() > 0)
            selectedPrivacy.push({
                'level': $(this).data('level'),
                'id': $(this).val()
            });
    });
    // parent_id 0 means that it has no parent.
    var parent_id = 0;
    if (selectedPrivacy.length) {
        // get object which has highest level,
        // Privacy with this id will be the direct parent of the new Privacy
        var maxObj = selectedPrivacy.reduce((max, obj) => (max.level > obj.level) ? max : obj);
        parent_id = maxObj.id;
    }
    data.append('parent_id', parent_id);
    button_status(add_privacy_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["createPrivacy"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,
        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_privacy_btn, false);
                    window.location.reload();
                }, 1500);
            }
            else {
                button_status(add_privacy_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {
                $.each(errors.responseJSON.errors, function (input_name, error) {
                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message"><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(add_privacy_btn, false);
            }, 1000);
        }
    });
});

// UPDATE Privacy code start
$('body').on('submit', '#privacy_update_form', function (e) {
    e.preventDefault();
    var _this = $(this);
    button_status(update_privacy_btn, true, 'Updating');

    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }
    data.append('is_active', isActive);

    // from each category dropdown, add its level and selected id to selectedPrivacy array
    // only if the level is defined and id is greater than 0 because 0 is for placeholder text
    var selectedPrivacy = [];
    $('.parent_privacy').each(function (index) {
        if ($(this).data('level') != null && $(this).val() > 0)
            selectedPrivacy.push({
                'level': $(this).data('level'),
                'id': $(this).val()
            });
    });
    // parent_id 0 means that it has no parent.
    var parent_id = 0;
    if (selectedPrivacy.length) {
        // get object which has highest level,
        // privacy with this id will be the direct parent of the new privacy
        var maxObj = selectedPrivacy.reduce((max, obj) => (max.level > obj.level) ? max : obj);
        parent_id = maxObj.id;
    }
    data.append('parent_id', parent_id);

    data.append('name', $('#name').val());
    data.append('_method', 'PUT');

    let remove_id = _this.data('id');
    let url = api["updatePrivacy"];
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
                    button_status(update_privacy_btn, false);
                    window.location.reload();
                }, 1500);
            }
            else {
                button_status(update_privacy_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {

                $.each(errors.responseJSON.errors, function (input_name, error) {
                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_privacy_btn, false);
            }, 1000);
        }
    });
});


// // GET subPrivacy
$('body').on('change', '.parent_privacy', function (e) {
    var _this = $(this);

    /* get Privacy */
    var selected_privacies = [];

    $.each($('#privacy-add-div').find('.selected_privacy_tag'), function (i, tag) {
        selected_privacies[i] = $(tag).data('id');
    });

    if (_this.val() > 0) {
        var url = api['getSubPrivacy'].replace(':id', _this.val());
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url,
            type: "GET",
            success: function (response) {
                if (response.responseCode == 200) {
                    let subPrivacy = response.payload.data.subPrivacy;
                    _this.closest('.privacy-div').nextAll().remove();
                    if (subPrivacy.length > 0) {
                        let html = `<div class="col col-6 privacy-div">
                        <div class="form-group">
                            <label for="parent_privacy">${_this.children("option:selected").text()}'s sub-privacy</label>
                            <select class="select form-control input-field sumoSelect_search parent_privacy" data-level="${_this.data('level') + 1}"  name="parent_privacy">
                                <option value="0">Select a privacy if it's child</option>`;
                        subPrivacy.forEach(element => {
                            let is_disabled = false;
                            let $index = selected_privacies.indexOf(element['id'])
                            if ($index >= 0) {
                                is_disabled = true;
                            }
                            html += `<option value="${element['id']}" ${is_disabled ? 'disabled' : ''}>${element['name']}</option>`;
                        });
                        html += `</select>
                            </div>
                        </div>`;
                        $('#privacy-parent-div').append(html);

                        $('.sumoSelect_search').SumoSelect({ triggerChangeCombined: true, search: true, selectAll: false, placeholder: 'Nothing selected' });
                    }
                    else {
                        if (!$('#parent_privacy').hasClass('ingoreMultipleSelections')) {
                            createSelectedPrivacyTag(_this.val(), _this.find("option:selected").text(), _this.prop('selectedIndex'));

                            let parent_privacy_first = $('.privacy-div:first');
                            parent_privacy_first.nextAll().remove();
                            // if (_this.data('level') == 0) {
                            _this[0].sumo.disableItem(_this.prop('selectedIndex'));
                            // }

                            $('#parent_privacy')[0].sumo.selectItem(0);
                            $('#parent_privacy')[0].sumo.reload();

                            $('#privacy-parent-div').hide();
                            $('#selected-categories-text-div').hide();
                            $('#add_another_category_btn').show();
                        }
                    }
                    // setTimeout(function () {
                    //     button_status(submit_btn, "reset");
                    //     window.location.reload();
                    // }, 1500);
                }
                else {
                    // button_status(submit_btn, "reset");
                    toastr.error('There are something went wrong');
                }
            }
        });
    }
    else if (_this.val() == 0) {
        _this.closest('.privacy-div').nextAll().remove();
        return;
    }

});

var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};


function createSelectedCategoryTag(value, text, index) {
    let div = '<div class="mx-1 selected_privacy_tag d-flex justify-content-between" data-id="' + value + '"  data-index="' + index + '" data-text="' + text + '"  style="max-width: 150px; height: 33px; background-color: #4B49AC; border-radius: 10px; color: white; padding: 5px 5px 5px 5px; "><p class="text-center text-truncate" style="max-width: 120px;" data-toggle="tooltip" title="' + text + '">' + text + '</p><i class="ml-1 ti-close remove_selected_category" style="color: white; cursor: pointer; font-size: 10px; "></i></div>';
    $('#privacy-add-div').append(div);
}