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


        /* Stickerworld Javascripts */

        /* Methods */

        function showSuccessDialog(title, message) {
            swal({
                title: title,
                text: message,
                type: "success",
                timer: 1000
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

        function displayError(fieldName, jsonObj) {
            var current = $('input[name=' + fieldName + '],  a[data-name=' + fieldName + ']');

            var currentFormGroup = current.closest('div.form-group');
            var currentHelpBlock = current.closest('p.help-block');
            var errorMessage = '';

            if (!$.isEmptyObject(jsonObj)) {
                currentFormGroup.addClass('has-error');

                $.each(jsonObj, function (key, value) {
                    errorMessage += value + '<br/>';
                });

                current.parent().find('p.help-block').html(errorMessage).fadeIn(300);
            } else {
                if (currentFormGroup.hasClass('has-error')) {
                    currentFormGroup.removeClass('has-error');
                    current.parent().find('p.help-block').html('').fadeOut(300);
                }
            }
        }

        /* End of Methods */

        /* Jquery */

        /* Resend User Activation Email */
        $('form[data-remote-resendmail]').on('submit', function(e) {
            var form = $(this),
                method = form.find('input[name="_method"]').val() || 'POST',
                url = form.prop('action'),
                submitBtn = form.find('button[type="submit"]'),
                loader = form.parent('td').find('div.loader'),
                loaderLabel = form.parent().find('.loader-label');

            loader.show();
            submitBtn.addClass('btn-disable');
            submitBtn.find('i.fa').removeClass('fa-paper-plane-o').addClass('fa-spinner fa-spin');

            $.ajax({
                method: method,
                url: url,
                data: form.serialize()
            })
                .done(function(){

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
            var method = form.find('input[name="_method"]').val() || 'POST';
            var url = form.prop('action');

            $.ajax({
                method: method,
                url: url,
                data: form.serialize(),
                success: function () {

                    swal({
                        title: "Deactivated!",
                        text: "Account successfully deactivated.",
                        type: "success",
                        timer: 1000
                    });

                    location.reload();
                }
            });
        });

        /* Reactivate User */
        $('form[data-remote-reactivate]').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var method = form.find('input[name="_method"]').val() || 'POST';
            var url = form.prop('action');
            var parentTd = $(this).closest('td');

            $.ajax({
                method: method,
                url: url,
                data: form.serialize(),
                success: function () {

                    swal({
                        title: "Re-activated!",
                        text: "Account successfully re-activated.",
                        type: "success",
                        timer: 1000
                    });

                    location.reload();
                    //var message = form.data('remote-success-message');
                    //
                    //message && alert(message);
                }
            });
        });



        $('input[data-confirm], button[data-confirm]').on('click', function(e) {
            e.preventDefault();

           var input = $(this);
           var form = input.closest('form');
           var prompt = input.data('confirm');
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
                if(isConfirm) {
                    form.submit();
                }
            });
        });

        /* X-Editable */

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type: "PUT"};

        $('#username').editable({
            success: function (response, newValue) {
                clearGroup($(this).closest('div.form-group'));

                showSuccessDialog('Username Changed!', 'Username Successfully Changed!')

                $('ul.top-menu > li > a > span.username').html(newValue);
            },
            error: function(response, newValue) {
                displayError('username', response.responseJSON.username);
            }
        });

        $('#email').editable({
            success: function (response, newValue) {
                showSuccessDialog('Email Changed!', 'Email Successfully Changed!')
                clearGroup($(this).closest('div.form-group'));
            },
            error: function (response, newValue) {
                displayError('email', response.responseJSON.email);
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
            var method = form.find('input[name="_method"]').val() || 'POST';
            var url = form.prop('action');

            $.ajax({
                method: method,
                url: url,
                data: form.serialize(),
                success: function (response) {
                    clearForm(form);

                    showSuccessDialog('Password Changed!', 'Password Successfully Changed!')

                    form.trigger('reset');
                    $('#change-password').slideUp('slow');
                },
                error: function(response) {
                    var errors = JSON.parse(response.responseText);

                    displayError('current_password', errors.current_password);
                    displayError('new_password', errors.new_password);

                }
            });
        });

        /* End of Jquery */

    });
})(jQuery);