(function ($) {
    'use strict';

    $(document).ready(function () {
        /*==Left Navigation Accordion ==*/
        if ($.fn.dcAccordion) {
            $('#nav-accordion').dcAccordion({
                eventType: 'click',
                autoClose: true,
                saveState: true,
                disableLink: true,
                speed: 'slow',
                showCount: false,
                autoExpand: true,
                classExpand: 'dcjq-current-parent'
            });
        }
        /*==Slim Scroll ==*/
        if ($.fn.slimScroll) {
            $('.event-list').slimscroll({
                height: '305px',
                wheelStep: 20
            });
            $('.conversation-list').slimscroll({
                height: '360px',
                wheelStep: 35
            });
            $('.to-do-list').slimscroll({
                height: '300px',
                wheelStep: 35
            });
        }
        /*==Nice Scroll ==*/
        if ($.fn.niceScroll) {


            $(".leftside-navigation").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });

            $(".leftside-navigation").getNiceScroll().resize();
            if ($('#sidebar').hasClass('hide-left-bar')) {
                $(".leftside-navigation").getNiceScroll().hide();
            }
            $(".leftside-navigation").getNiceScroll().show();

            $(".right-stat-bar").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });
        }

        /*==Collapsible==*/
        $('.widget-head').click(function (e) {
            var widgetElem = $(this).children('.widget-collapse').children('i');

            $(this)
                .next('.widget-container')
                .slideToggle('slow');
            if ($(widgetElem).hasClass('ico-minus')) {
                $(widgetElem).removeClass('ico-minus');
                $(widgetElem).addClass('ico-plus');
            } else {
                $(widgetElem).removeClass('ico-plus');
                $(widgetElem).addClass('ico-minus');
            }
            e.preventDefault();
        });


        /*==Sidebar Toggle==*/

        $(".leftside-navigation .sub-menu > a").click(function () {
            var o = ($(this).offset());
            var diff = 80 - o.top;
            if (diff > 0)
                $(".leftside-navigation").scrollTo("-=" + Math.abs(diff), 500);
            else
                $(".leftside-navigation").scrollTo("+=" + Math.abs(diff), 500);
        });


        $('.sidebar-toggle-box .fa-bars').click(function (e) {

            $(".leftside-navigation").niceScroll({
                cursorcolor: "#1FB5AD",
                cursorborder: "0px solid #fff",
                cursorborderradius: "0px",
                cursorwidth: "3px"
            });

            $('#sidebar').toggleClass('hide-left-bar');
            if ($('#sidebar').hasClass('hide-left-bar')) {
                $(".leftside-navigation").getNiceScroll().hide();
            }
            $(".leftside-navigation").getNiceScroll().show();
            $('#main-content').toggleClass('merge-left');
            e.stopPropagation();
            if ($('#container').hasClass('open-right-panel')) {
                $('#container').removeClass('open-right-panel')
            }
            if ($('.right-sidebar').hasClass('open-right-bar')) {
                $('.right-sidebar').removeClass('open-right-bar')
            }

            if ($('.header').hasClass('merge-header')) {
                $('.header').removeClass('merge-header')
            }


        });
        $('.toggle-right-box .fa-bars').click(function (e) {
            $('#container').toggleClass('open-right-panel');
            $('.right-sidebar').toggleClass('open-right-bar');
            $('.header').toggleClass('merge-header');

            e.stopPropagation();
        });

        $('.header,#main-content,#sidebar').click(function () {
            if ($('#container').hasClass('open-right-panel')) {
                $('#container').removeClass('open-right-panel')
            }
            if ($('.right-sidebar').hasClass('open-right-bar')) {
                $('.right-sidebar').removeClass('open-right-bar')
            }

            if ($('.header').hasClass('merge-header')) {
                $('.header').removeClass('merge-header')
            }
        });

        $('.panel .tools .fa').click(function () {
            var el = $(this).parents(".panel").children(".panel-body");
            if ($(this).hasClass("fa-chevron-down")) {
                $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
                el.slideUp(200);
            } else {
                $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
                el.slideDown(200); }
        });

        $('.panel .tools .fa-times').click(function () {
            $(this).parents(".panel").parent().remove();
        });

        // tool tips

        $('.tooltips').tooltip();

        // popovers

        $('.popovers').popover();


        $('.dynamic-table').dataTable({
            "aaSorting": [[4, "desc"]]
        });


        $('#flash-overlay-modal').modal();

        // initialize icheck in access control
        $('.flat-green input').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        $('.flat-grey input').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
        /* Stickerworld Javascripts */

        /* Methods */

        function processAjaxRequest(method, url, data) {
            return $.ajax({
                method: method,
                url: url,
                data: data
            });
        }

        function processFormAjaxRequest(form)
        {
            var method = form.find('input[name="_method"]').val() || 'POST';
            var url = form.prop('action');

            return processAjaxRequest(method, url, form.serialize());
        }

        function showSuccessDialog(title, message) {
            swal({
                title: title,
                text: message,
                type: "success",
                timer: 1500
            });
        }

        function showErrorDialog(title, message) {
            swal({
                title: title,
                text: message,
                type: "error"
            });
        }

        function clearForm(form) {
            form.find('div.form-group').removeClass('has-error');
            form.find('p.help-block').html('');
        }

        function clearGroup(divGroup) {
            divGroup.removeClass('has-error');
            divGroup.find('p.help-block').html('');
        }

        function resetForm(form) {
            clearForm(form);

            form[0].reset();
        }

        function displayError(fieldName, jsonObj) {
            var current = $('input[name=' + fieldName + '],  a[data-name=' + fieldName + '], select[name=' + fieldName + '], textarea[name=' + fieldName + ']');

            var currentFormGroup = current.closest('div.form-group');
            var currentHelpBlock = current.closest('p.help-block');
            var errorMessage = '';

            if (!$.isEmptyObject(jsonObj)) {
                currentFormGroup.addClass('has-error');

                $.each(jsonObj, function (key, value) {
                    errorMessage += value + '<br/>';
                });
                errorMessage = jsonObj[0];

                current.parent().find('p.help-block').html(errorMessage).fadeIn(300);
            }
        }

        function displayErrorForXEdit(fieldName, jsonObj) {
            var current = $('a[data-name=' + fieldName + ']');

            var currentFormGroup = current.closest('div.form-group');
            var currentHelpBlock = current.closest('p.help-block');
            var errorMessage = '';

            if (!$.isEmptyObject(jsonObj)) {
                currentFormGroup.addClass('has-error');

                errorMessage = jsonObj[0];

                current.parent().find('p.help-block').html(errorMessage).fadeIn(300);
            }
        }

        function displayErrors(form, responseJSON) {
            clearForm(form);

            $.each(responseJSON, function (key, value) {
                displayError(key, value);
            });
        }

        function updateMapCenter(map, newLatLng) {
            $(map).gmap3({
                map: {
                    options: {
                        center: [newLatLng.lat, newLatLng.lng]
                    }
                }
            });
        }

        function stringifyErrors(jsonErrors) {
            var errors = '';

            $.each(jsonErrors, function (key, value) {
                errors += value + '\n';
            });

            return errors;
        }

        function loadUpdateDataFromModal(url, form, modal) {
            var deferred = processAjaxRequest('GET', url, []);

            deferred
                .done(function (data, textStatus, jqXHR) {
                    var responseData = data.obj;

                    $.each(responseData, function (key, value) {
                        form.find('input[name=' + key + ']').val(value);
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    showErrorDialog('Error Encountered', 'Cannot display specified record.');
                    modal.modal('hide');
                });
        }


        function showErrorOnXEditPopup(xeditElement, errors)
        {
            xeditElement.parent().find('div.help-block').html(stringifyErrors(errors));
        }

        function processAjaxRequestWithFile(method, url, formData) {
            return $.ajax({
                method: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                cache: false
            });
        }

        function processFormAjaxRequestWithFile(form) {
            var method = form.find('input[name="_method"]').val() || 'POST';
            var url = form.prop('action');
            var formData = new FormData($(form)[0]);

            return processAjaxRequestWithFile(method, url, formData);
        }

        /* End of Methods */

        /* Jquery */

        /* Jquery Common Methods */

        $('div.modal-form form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);

            var deferred = processFormAjaxRequest(form);

            var modal = $(this).parents('div.modal');

            deferred
                .done(function (data, textStatus, jqXHR) {
                    showSuccessDialog(data.title, data.message);

                    modal.modal('hide');

                    resetForm(form);

                    setTimeout(function(){

                        window.location = window.location.href;

                    },1500);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = jqXHR.responseJSON;

                    displayErrors(form, errors);
                });
        });

        $('form[data-form-files-remote]').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var deffered = processFormAjaxRequestWithFile(form);
            var inputs = form.find('input[type="submit"]');

            inputs.prop('disabled', true);

            deffered
                .done(function (data) {
                    showSuccessDialog('Success', data.message);

                    resetForm(form);

                    setTimeout(function () {
                        if(data.redirecTo != undefined)
                        {
                            window.location = data.redirecTo;
                        }else {
                            location.reload();
                        }
                    }, 1000);
                })
                .fail(function (jqXHR) {
                    if (jqXHR.responseJSON.error == null) {
                        displayErrors(form, jqXHR.responseJSON);
                    } else {
                        showErrorDialog('Problem Occured', jqXHR.responseJSON.error);
                    }
                })
                .always(function () {
                    inputs.prop('disabled', false);
                });
        });

        $('input[data-confirm], button[data-confirm]').on('click', function (e) {
            e.preventDefault();

            var input = $(this);
            var form = input.closest('form');
            var prompt = input.data('confirm') || 'Are you sure?';
            var promptYes = input.data('confirm-yes') || 'Yes, pls!';

            swal({
                title: 'Are you sure?',
                text: prompt,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: promptYes,
                cancelButtonText: 'No, cancel pls!',
                closeOnConfirm: false
            }, function (isConfirm) {
                if (isConfirm) {
                    form.submit();
                }
            });
        });



        $('form[data-remote-delete-record]').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);

            var deferred = processFormAjaxRequest(form);

            deferred
                .done(function (data, textStatus, jqXHR) {
                    showSuccessDialog(data.title, data.message);
                    location.reload();
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = jqXHR.responseJSON.error;

                    console.log(jqXHR);

                    showErrorDialog('Error encountered', stringifyErrors(errors));
                });
        });

        $('.modalSubmitBtnForm').on('click', function () {
            $(this).parent().parent().find('form').trigger('submit');
        });

        /* Jquery Common Methods End */

        /* Resend User Activation Email */
        $('form[data-remote-resendmail]').on('submit', function(e) {
            var form = $(this),
                submitBtn = form.find('button[type="submit"]'),
                loader = form.parent('td').find('div.loader'),
                loaderLabel = form.parent().find('.loader-label');

            loader.show();
            submitBtn.addClass('btn-disable');
            submitBtn.find('i.fa').removeClass('fa-paper-plane-o').addClass('fa-spinner fa-spin');

            var deffered = processFormAjaxRequest(form);

            deffered
                .done(function () {
                    loaderLabel.css('color', 'limegreen').html('Email sent!').fadeIn(300);
                    setTimeout(function () {
                        loaderLabel.fadeOut(300);
                    }, 2500);

                })
                .fail(function() {
                    loaderLabel.css('color', 'red').html('Failed').fadeIn(300);
                    setTimeout(function () {
                        loaderLabel.fadeOut(300);
                    }, 2500);

                })
                .always(function(){
                    submitBtn.find('i.fa').removeClass('fa-spinner fa-spin').addClass('fa-paper-plane-o');

                    loader.hide();
                    submitBtn.removeClass('btn-disable');
                });

            e.preventDefault();
        });


        /* Deactivate User */
        $('form[data-remote-deactivate]').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var deffered = processFormAjaxRequest(form);

            deffered
                .done(function () {

                    swal({
                        title: "Deactivated!",
                        text: "Account successfully deactivated.",
                        type: "success",
                        timer: 1000
                    });

                    location.reload();
                });
        });

        /* Reactivate User */
        $('form[data-remote-reactivate]').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var parentTd = $(this).closest('td');
            var deffered = processFormAjaxRequest(form);

            deffered
                .done(function () {
                    swal({
                        title: "Re-activated!",
                        text: "Account successfully re-activated.",
                        type: "success",
                        timer: 1000
                    });

                    location.reload();
                });
        });

        /* X-Editable */

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: "PUT"};

        $('#username').editable({
            success: function (response, newValue) {
                clearGroup($(this).closest('div.form-group'));

                showSuccessDialog('Success!', 'Username Successfully Changed!')

                $('ul.top-menu > li > a > span.username').html(newValue);
            },
            error: function(response, newValue) {
                displayError('username', response.responseJSON.username);
            }
        });

        $('#email').editable({
            success: function (response, newValue) {
                showSuccessDialog('Success!', 'Email Successfully Changed!')
                clearGroup($(this).closest('div.form-group'));
            },
            error: function (response, newValue) {
                displayError('email', response.responseJSON.email);
            }
        });

        $('.role').editable({
            'mode': 'popup',
            success: function (response, newValue) {
                showSuccessDialog('Success!', 'Role Name Successfully Changed!')
                //clearGroup($(this).closest('div.form-group'));
            },
            error: function (response, newValue) {
                var errors = response.responseJSON.name;

                showErrorOnXEditPopup($(this), errors);
            }
        });

        $('.permission-group-xedit').editable({
            'mode': 'popup',
            success: function (response, newValue) {
                showSuccessDialog('Success!', 'Group Name Successfully Changed!')
            },
            error: function (response, newValue) {
                var errors = response.responseJSON.name;

                showErrorOnXEditPopup($(this), errors);
            }
        });

        /* X-Editable */
        /* User Profile Change Password SlideDown toggle */

        $('#change-password-toggle').on('click', function(e){
            e.preventDefault();

            var changePasswordDiv = $('#change-password');

            if(changePasswordDiv.is(':visible')){
                changePasswordDiv.slideUp('slow');
            }else{
                changePasswordDiv.slideDown('slow');
            }
        });

        $('div#basic-details-div').mouseup(function(e){
            var containerDiv = $('#change-password');

            if(!containerDiv.is(e.target)
            && containerDiv.has(e.target).length === 0)
            {
                $('#change-password').slideUp('slow');
            }
        });

        $('#change-password-cancel-btn').on('click', function(e){
            e.preventDefault();

            $('#change-password').slideUp('slow');
        });

        /* User Profile Change Password SlideDown toggle */

        $('form#change-password-form').on('submit', function(e){
            e.preventDefault();

            var form = $(this);

            var deffered = processFormAjaxRequest(form);

            deffered
                .done( function () {
                    clearForm(form);

                    showSuccessDialog('Success', 'Password Successfully Changed!')

                    form.trigger('reset');
                    $('#change-password').slideUp('slow');
                })
                .fail(  function (jqXHR, textStatus, errorThrown) {
                    var errors = jqXHR.responseJSON;

                    displayErrors(form, errors);
                });
        });

        var image = new google.maps.MarkerImage(
            'http://plebeosaur.us/etc/map/bluedot_retina.png',
            null, // size
            null, // origin
            new google.maps.Point(8, 8), // anchor (move to center of marker)
            new google.maps.Size(17, 17) // scaled size (required for Retina display icon)
        );

        $('#newBranchModal').on('shown.bs.modal', function() {

            $('#new-branch-map').gmap3(
                {
                    trigger: 'resize',
                    map: {
                        options: {
                            center: [GMAP.coords.lat, GMAP.coords.lng],
                            zoom: GMAP.zoom,
                            streetViewControl: false
                        }
                    },
                    marker: {
                        latLng: [GMAP.coords.lat, GMAP.coords.lng],
                        options: {
                            draggable: true,
                            flat: true,
                            icon: image,
                            optimized: false,
                            visible: true,
                            title: 'I am here'
                        },
                        events: {
                            dragend: function (marker, event, context) {
                                var newLatLng = {
                                  lat: marker.position.A,
                                  lng: marker.position.F
                                };

                                updateMapCenter(this, newLatLng);

                                $('#new-branch-lat-hidden').val(newLatLng.lat);
                                $('#new-branch-lng-hidden').val(newLatLng.lng);
                            }
                        }
                    }
                });

        });

        $('#newBranchModal').on('show.bs.modal', function () {
            $('#new-branch-map').gmap3();
        });

        $('#newBranchModal').on('hide.bs.modal', function(){
           $('#new-branch-map').gmap3('destroy');
       });

        $('.branches-panel-map-grid').each( function(index, element){
            var obj = $(element);
            var lat = obj.data('lat'),
                lng = obj.data('lng');

            $(element).gmap3(
                {
                    map: {
                        options: {
                            center: [lat, lng],
                            zoom: GMAP.minZoom,
                            disableDefaultUI: true
                        }
                    },
                    marker: {
                        latLng: [lat, lng],
                        options: {
                            flat: true,
                            icon: image,
                            optimized: false,
                            visible: true,
                            title: 'I am here'
                        }
                    }
                });
        });

        $('#updateBranchModal').on('hidden.bs.modal', function () {

            var form = $('#update-branch-form');

            resetForm(form);

            $('#update-branch-map').gmap3('destroy');
        });

        $('#updateBranchModal').on('show.bs.modal', function(e){
           var triggerBtn = e.relatedTarget;
           var id = $(triggerBtn).data('id');
           var method = 'GET',
               url = '/branch/fetchdata/' + id,
               form = $('#update-branch-form');

            $('#update-branch-map').gmap3();

            loadUpdateDataFromModal(url, form, $(this));
        });

        $('#updateBranchModal').on('shown.bs.modal', function (e) {
            var form = $('#update-branch-form');
            var lat = form.find('input[name=lat]').val(),
                lng = form.find('input[name=lng]').val();

            $('#update-branch-map').gmap3({
                trigger: 'resize',
                map: {
                    options: {
                        center: [lat, lng],
                        zoom: GMAP.minZoom,
                        streetViewControl: false
                    }
                },
                marker: {
                    latLng: [lat, lng],
                    options: {
                        draggable: true,
                        flat: true,
                        icon: image,
                        optimized: false,
                        visible: true,
                        title: 'I am here'
                    },
                    events: {
                        dragend: function (marker, event, context) {
                            var newLatLng = {
                                lat: marker.position.A,
                                lng: marker.position.F
                            };

                            updateMapCenter(this, newLatLng);

                            $('#update-branch-lat-hidden').val(newLatLng.lat);
                            $('#update-branch-lng-hidden').val(newLatLng.lng);
                        }
                    }
                }
            });
        });

        $('#updateDepartmentModal').on('show.bs.modal', function (e) {
            var triggerBtn = e.relatedTarget;
            var id = $(triggerBtn).data('id');
            var method = 'GET',
                url = '/department/fetchdata/' + id,
                form = $('#update-department-form');

            loadUpdateDataFromModal(url, form, $(this));
        });

        $('button#toggle-new-group-btn').on('click', function(e) {
            e.preventDefault();

            $(this).parents('div.modal').modal('toggle');

            $('div#newPermissionGroupModal').modal('toggle');
        });


        // Checkbox in permission
        $('.icheck-permission input').on('ifChecked', function(e){
            e.preventDefault();
            var icheck = $(this);
            var roleId = icheck.data('role-id'),
                permissionId = icheck.data('permission-id'),
                url = icheck.data('grant-url'),
                method = 'POST';
            var loader = icheck.parents('td').find('span.loader');

            loader.show();

            var deferred = processAjaxRequest(method, url, {
                    'role_id'       : roleId,
                    'permission_id' : permissionId
                });

            icheck.prop('disabled', true);

            deferred
                .done(function (data, textStatus, jqXHR) {
                    console.log(data);

                    icheck.data('id', data.permissionRoleId);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errorMessage = stringifyErrors(jqXHR.responseJSON.error);

                    icheck.iCheck('uncheck');

                    showErrorDialog('Error Encountered', errorMessage);
                })
                .always(function () {
                    icheck.prop('disabled', false);

                    loader.hide();
                });
        })
        .on('ifUnchecked', function(e){
                var icheckDelete = $(this);
                var id = icheckDelete.data('id'),
                    url = icheckDelete.data('revoke-url'),
                    method = 'DELETE';
                var loader = icheckDelete.parents('td').find('span.loader');

                var deferred = processAjaxRequest(method, url, {
                    'id': id
                });

                icheckDelete.prop('disabled', true);

                loader.show();

                deferred
                    .done(function (data, textStatus, jqXHR) {
                        icheckDelete.data('id', '');

                        console.log('success' + data);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        var errorMessage = stringifyErrors(jqXHR.responseJSON.error);

                        icheckDelete.iCheck('check');

                        showErrorDialog('Error Encountered', errorMessage);
                    })
                    .always(function(){
                        loader.hide();

                        icheckDelete.prop('disabled', false);
                    });
        });


        // Checkbox in permission group
        $('.icheck-permission-group input').on('ifChecked', function (e) {
            e.preventDefault();

            var icheck = $(this);
            var roleId = icheck.data('role-id'),
                permissionGroupId = icheck.data('permission-group-id'),
                loader = icheck.parents('td').find('span.loader');

            loader.show();
            icheck.prop('disabled', true);

            var ichecks = $(".icheck-permission input[data-permission-group-id='" + permissionGroupId + "']");


            $.each(ichecks, function(key, element){

                $(element).filter("[data-role-id='" + roleId + "']").iCheck('check');

            });

            setTimeout(function(){
                    loader.hide();
                    icheck.prop('disabled', false);
                }
                ,1000);
        })
            .on('ifUnchecked', function (e) {
                e.preventDefault();

                var icheck = $(this);
                var roleId = icheck.data('role-id'),
                    permissionGroupId = icheck.data('permission-group-id'),
                    loader = icheck.parents('td').find('span.loader');

                loader.show();
                icheck.prop('disabled', true);

                var ichecks = $(".icheck-permission input[data-permission-group-id='" + permissionGroupId + "']");

                $.each(ichecks, function (key, element) {

                    $(element).filter("[data-role-id='" + roleId + "']").iCheck('uncheck');

                });

                setTimeout(function () {
                        loader.hide();
                        icheck.prop('disabled', false);
                    }, 1000);
            });



        $('#updatePermissionModal').on('show.bs.modal', function (e) {
            var triggerBtn = e.relatedTarget;
            var id = $(triggerBtn).data('id');
            var method = 'GET',
                url = 'access_control/permission/fetchdata/' + id,
                form = $('#update-permission-form');
            var modal = $(this);

            var deferred = processAjaxRequest(method, url, []);

            deferred
                .done(function (data, textStatus, jqXHR) {
                    var responseData = data.obj;
                    var select = null;
                    var options = null;

                    $.each(responseData, function (key, value) {
                        if(key === 'description')
                        {
                            form.find('textarea[name=' + key + ']').val(value);
                        } else if(key === 'name' || key === 'id') {
                            form.find('input[name=' + key + ']').val(value);
                        } else {
                            select = form.find('select[name=' + key + ']');
                            options = select.find('option');
                            $.map(options, function(option){
                               if(option.value == value)
                               {
                                   option.setAttribute('selected', true);
                               }
                            });
                        }
                    });
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    showErrorDialog('Error Encountered', 'Cannot display specified record.');
                    modal.modal('hide');
                });
        });


        $('input#register-user-radio-role[type=radio]').change(function(){
           var selectedRoleId = this.value;

            if(selectedRoleId == 1 || selectedRoleId == 2) {
                $('div#register-user-select-employee').hide();
                return;
            }

            $('div#register-user-select-employee').show();
        });

        /* Hire Employee Form */
        $('#hire-emp-create-user-toggle input').on('ifChecked', function (e) {
            $('div#hire-emp-users-info').slideDown(300);
        }).on('ifUnchecked', function (e) {
            $('div#hire-emp-users-info').slideUp(300);
        });


        $('#updateItemModal').on('show.bs.modal', function (e) {
            var triggerBtn = e.relatedTarget;
            var id = $(triggerBtn).closest('tr').data('item-id');

            var method = 'GET',
                url = '/supplier/item/fetchdata/' + id,
                form = $(this).parent().find('form');

            $.get(url, function(response){
                var responseData = response.obj;

               form.find('input[name=id]').val(responseData.id);
               form.find('input[name=name]').val(responseData.name);
               form.find('select[name=type]').val(responseData.type);
               form.find('select[name=unit_of_measure]').val(responseData.unit_of_measure);
               form.find('input[name=unit_price]').val(responseData.unit_price);
               form.find('textarea[name=details]').val(responseData.details);
               form.find('textarea[name=remarks]').val(responseData.remarks);

                if(responseData.image != ''){
                    form.find('div.fileinput-new>img').attr('src', '/images/items/'+responseData.image);
                }
            });
        }).on('hidden.bs.modal', function(e){
            var form = $(this).parent().find('form');
            resetForm(form);
            form.find('div.fileinput-new>img').attr('src', '/images/no_images.png');
        });

        $('#viewItemModal').on('show.bs.modal', function (e) {
           var modal = $(this);
           var itemId = $(e.relatedTarget).closest('tr').data('item-id');

           $.get('/supplier/item/fetchdata/'+itemId, function(response){
               var data = response.obj;

               modal.find('.modal-title').text(data.name.toUpperCase());

               $('.item-name').text(data.name);
               $('.item-type').text(data.type);
               $('.item-unit_of_measure').text(data.unit_of_measure);
               $('.item-unit_price').text(data.unit_price);
               $('.item-remarks').text(data.remarks);
               $('.item-details').text(data.details);

               $('img.item-image').attr('src',
                   data.image == undefined
                   ? '/images/no_img.png'
                   : '/images/items/'+data.image);

           });
        });

        $('#search-project-item').select2({
            placeholder: 'Search Item',
            allowClear: true,
            width: '250px',
            ajax:{
                url: '/item/search',
                cache: true,
                dataType: 'json',
                delay: 50,
                data: function (term, page) {
                    return { query: term, is_sm: 0};
                },
                results: function (data, page) {
                    return { results: data };
                }
            },
            formatResult: formatItem,
            formatSelection: function (item) {
                return ucwords(item.name);
            }
        }).on('change', function(e) {
            var item = e.added;

            var image = item.image != null
                ? '/images/items/' + item.image
                : '/images/no_img.png';

            $('.item-img').attr('src', image);

            $('input[name=item_id]').val(item.id);
            $('.item-name-label').text(ucwords(item.name));
            $('.remarks-label').text(ucwords(item.remarks));
            $('.unit-price-label').text(item.unit_price);
            $('.unit-label').text(item.unit_of_measure);

            $('.total-amount-label').text('0.00');
            $('.item-project-qty').val(0);
        });

        $('#search-project-standard-item').select2({
            placeholder: 'Search Item',
            allowClear: true,
            width: '250px',
            ajax: {
                url: '/item/search',
                cache: true,
                dataType: 'json',
                delay: 50,
                data: function (term, page) {
                    return {query: term, is_sm: 1};
                },
                results: function (data, page) {
                    return {results: data};
                }
            },
            formatResult: formatItem,
            formatSelection: function (item) {
                return ucwords(item.name);
            }
        }).on('change', function (e) {
            var item = e.added;

            if (item.image != null) {
                $('.item-img').attr('src', '/images/items/' + item.image);
            }

            $('input[name=item_id]').val(item.id);
            $('.item-name-label').text(ucwords(item.name));
            $('.remarks-label').text(ucwords(item.remarks));
            $('.unit-price-label').text(item.unit_price);
            $('.unit-label').text(item.unit_of_measure);

            $('.total-amount-label').text('0.00');
            $('.item-project-qty').val(0);
        });

        function formatItem(item) {
            var $item = $(
                '<div class="project-item-result">'+
                '<div><span class="item-name">' + ucwords(item.name) +'</span></div>' +
                '<p class="supplier"> Supplier: '+ucwords(item.supplier.name)+'</p>' +
                '<p class="price">P '+item.unit_price+' / '+item.unit_of_measure+'</p>' +
                '</div>'
            );
            return $item;
        };

        $('.item-project-qty').on('keyup change', function(){
            var unitPrice = $('.unit-price-label').text(),
                qty = $(this).val();

            var totalAmount = (parseFloat(unitPrice) * parseFloat(qty)).toFixed(2);

            $('.total-amount-label').text(totalAmount);
        });

        $('#addMaterialModal').on('hidden.bs.modal', function(){
            $('.item-img').attr('src', '/images/no_img.png');

            $('input[name=item_id]').val('');
            $('.item-name-label').text('');
            $('.remarks-label').text('');
            $('.unit-price-label').text('0.00');
            $('.unit-label').text('PCS');

            $('.total-amount-label').text('0.00');
            $('.item-project-qty').val(0);
        });

        $('.add-item-to-project-btn').on('click', function() {
            var itemId = $('input[name=item_id]').val();
            var itemQty = $(this).parent().find('.item-project-qty').val();

            var deffered = processAjaxRequest('PUT', '/project/new/add-material', {
                'item_id': itemId,
                'qty': itemQty
            });

            deffered
                .done(function(response){
                    window.location.reload();
                    renderCostEstimates();
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = stringifyErrors(jqXHR.responseJSON);
                    console.log(jqXHR.responseJSON);

                    showErrorDialog('Validation Error', errors);
                });
        });

        $('.material-qty-input').on('change', function() {
           var currentQty = $(this).val(),
               itemID = $(this).data('id'),
               thisElement = $(this);

            thisElement.prop('disabled', true);

            var deffered = updateCartQuantity(itemID, currentQty, this);

            renderCostEstimates();

            deffered
                .always(function(){
                    thisElement.prop('disabled', false);
                });
        });

        function updateCartQuantity(itemID, qty, element)
        {
            var deffered = processAjaxRequest('PUT', '/project/new/update-quantity', {
                'item_id': itemID,
                'qty': qty
            });

            deffered
                .done(function (response) {
                    $(element).parentsUntil('tbody').find('.line-total-label').text(response.line_total);
                    updateTotalCost(response);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = stringifyErrors(jqXHR.responseJSON);

                    showErrorDialog('Validation Error', errors);
                });
            return deffered;
        }

        function updateCartUtilityQuantity(itemID, noOfEmp, noOfDays, element)
        {
            var deffered = processAjaxRequest('PUT', '/project/new/update-utility-quantity', {
                'id': itemID,
                'noOfEmp': noOfEmp,
                'noOfDays': noOfDays
            });

            deffered
                .done(function (response) {

                    $(element).parentsUntil('tbody').find('.line-total-label').text(response.line_total);
                    updateTotalCost(response);

                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = stringifyErrors(jqXHR.responseJSON);

                    showErrorDialog('Validation Error', errors);
                });

            return deffered;
        }

        function updateTotalCost(response){
            $('#sub-total-amount').text(response.sub_total);
            $('#contingencies-amount').text(response.contingencies);
            $('#total-cost-amount').text(response.total_cost);
            $('#standard-cost-amount').text(response.standard_cost);
        }

        $('.no-of-emp-qty').on('change', function(){
            var itemID = $(this).data('id'),
                noOfEmp = $(this).val(),
                noOfDays = $(this).parentsUntil('tbody').find('.no-of-days-qty').val(),
                thisElement = $(this);

            thisElement.prop('disabled', true);

            var qty = parseFloat(noOfEmp) * parseFloat(noOfDays);

            var deffered = updateCartUtilityQuantity(itemID, noOfEmp, noOfDays, this);

            deffered
                .always(function () {
                    thisElement.prop('disabled', false);
                });

            renderCostEstimates();
        });

        $('.no-of-days-qty').on('change', function () {
            var itemID = $(this).data('id'),
                noOfDays = $(this).val(),
                noOfEmp = $(this).parentsUntil('tbody').find('.no-of-emp-qty').val(),
                thisElement = $(this);

            thisElement.prop('disabled', true);

            var qty = parseFloat(noOfEmp) * parseFloat(noOfDays);

            var deffered = updateCartUtilityQuantity(itemID, noOfEmp, noOfDays, this);

            deffered
                .always(function () {
                    thisElement.prop('disabled', false);
                });

            renderCostEstimates();
        });

        $('.logistics-qty-input').on('change', function () {
            var itemID = $(this).data('id'),
                noOfDeliveries = $(this).val(),
                thisElement = $(this);

            var deffered = processAjaxRequest('PUT', '/project/new/update-logistics-quantity', {
                'id': itemID,
                'qty': noOfDeliveries
            });

            deffered
                .done(function (response) {

                    $(thisElement).parentsUntil('tbody').find('.line-total-label').text(response.line_total);
                    updateTotalCost(response);

                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    var errors = stringifyErrors(jqXHR.responseJSON);

                    showErrorDialog('Validation Error', errors);
                });

            renderCostEstimates();
        });

        function renderCostEstimates() {
            var cotainerElement = $('#cost-generated-container'),
                loader = $('#bottom-loader');

            if(!cotainerElement.hasClass('hidden')){
                cotainerElement.addClass('hidden');
            }

            loader.removeClass('hidden');
            $('#cost-generated-section').html('');

            var deffered = $.get('/project/new/generate-cost-estimation-section');

            deffered.done(function (response)
            {
                loader.addClass('hidden');

                cotainerElement.fadeIn(500).removeClass('hidden');

                $('#cost-generated-section').html(response.view);
            });
        }

        $('#generate-cost-estimates-btn').on('click', function(){
            renderCostEstimates();
        });

        $('#submit-estimate-btn').on('click', function () {
            var clientId = $('#project-client-field').data('pk'),
                projectName = $('#project-name-field').text(),
                location = $('#project-location-field').text(),
                salesRepId = $('#project-sales-rep-field').data('pk'),
                estimatorId = $('#project-estimator-field').data('pk'),
                currentDate = $('#project-current-date-field').text(),
                deadline = $('#project-deadline-field').text(),
                leadTime = $('#project-lead-time-field').text();

            var costMultiplier = $('#cost-generated-section input[name=cost_multiplier]:checked').val();

            if(costMultiplier == undefined){
                showErrorDialog('Select Project Cost', 'You need to select one of the total cost option.');
                return false;
            }

            var currentDate = $('#project-current-date-field').text();

            var deffered = $.post('/project/new', {
                'costMultiplier': costMultiplier,
                'currentDate': currentDate
            });

            var parent = $(this).parentsUntil('div.invoice-to');

            parent.find('div.form-group').removeClass('has-error');
            parent.find('p.help-block').text('');

            deffered
                .done(function(response){
                    showSuccessDialog(response.title, response.message);

                    setTimeout(function () {
                        window.location = response.redirectTo;
                    }, 1500);
                })
                .fail(function(response){
                    var errors = response.responseJSON;

                    if(errors.error != undefined) showErrorDialog('Error Occured', errors.error);

                    $.each(errors, function (key, value) {
                        displayErrorForXEdit(key, value);
                    });
                });

        });

    });   /* End of Jquery */
})(jQuery);