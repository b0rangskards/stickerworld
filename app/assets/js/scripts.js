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

    });   /* End of Jquery */
})(jQuery);