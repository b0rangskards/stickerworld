$(document).ready(function ()
{

    /* Project Name */
    $('#project-name-field').editable({
        emptytext: 'Click to Enter Project Name',
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        }
    });

    /* Location */
    $('#project-location-field').editable({
        emptytext: 'Click to Enter Project Location',
        rows: 4,
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        }
    });

    /* Current Date */
    $('#project-current-date-field').editable({
        emptytext: 'Click to Select Date',
        placement: 'left',
        format: 'yyyy-mm-dd',
        viewformat: 'dd MM yyyy',
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        },
        datepicker: {
            startDate: 'now',
            weekStart: 1
        }
    });

    /* Deadline */
    $('#project-deadline-field').editable({
        emptytext: 'Click to Select Date',
        placement: 'left',
        format: 'yyyy-mm-dd',
        viewformat: 'dd MM yyyy',
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        },
        datepicker: {
            startDate: 'now',
            weekStart: 1
        }
    });

    /* Lead Time */
    $('#project-lead-time-field').editable({
        emptytext: 'Click to Enter Lead Time',
        placement: 'left',
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        }
    });

    $('#project-client-field').editable({
        emptytext: 'Click to Select Client',
        url: '/project/new/validate',
        error: function (response) {
            $(this).parent().find('.editable-container .editable-error-block').text(response.responseJSON.value[0]);
        },
        select2: {
            placeholder: 'Select Client',
            allowClear: true,
            width: '200px',
            id: function(client) {
                return client.id;
            },
            ajax: {
                url: '/client/fetchdata',
                cache: true,
                dataType: 'json',
                delay: 250,
                data: function(term, page){
                    return { query: term };
                },
                results: function(data, page) {
                    return { results: data };
                }
            },
            formatResult: function (client) {
                return ucwords(client.name);
            },
            formatSelection: function (client) {
                return ucwords(client.name);
            }
        }
    }).on('save', function(e, params) {
        var pk = params.submitValue;
        $(this).data('pk', pk);
    });

    $('#project-sales-rep-field').editable({
        emptytext: 'Click to Select Sales Rep',
        select2: {
            placeholder: 'Select Sales Rep',
            allowClear: true,
            width: '200px',
            id: function (employee) {
                return employee.id;
            },
            ajax: {
                url: '/employee/fetchdata',
                cache: 'true',
                dataType: 'json',
                delay: 250,
                data: function (term, page) {
                    return {query: term, designation: 'accountant'};
                },
                results: function (data, page) {
                    return {results: data};
                }
            },
            formatResult: function (employee) {
                return ucwords(employee.fullname);
            },
            formatSelection: function (employee) {
                return ucwords(employee.fullname);
            }
        }
    }).on('save', function (e, params) {
        var pk = params.submitValue;
        $(this).data('pk', pk);
    });

    $('#project-estimator-field').editable({
        emptytext: 'Click to Select Estimator',
        select2: {
            placeholder: 'Select Estimator',
            allowClear: true,
            width: '200px',
            id: function (employee) {
                return employee.id;
            },
            ajax: {
                url: '/employee/fetchdata',
                cache: 'true',
                dataType: 'json',
                delay: 250,
                data: function (term, page) {
                    return {query: term, designation: 'estimator'};
                },
                results: function (data, page) {
                    return {results: data};
                }
            },
            formatResult: function (employee) {
                return ucwords(employee.fullname);
            },
            formatSelection: function (employee) {
                return ucwords(employee.fullname);
            }
        }
    }).on('save', function (e, params) {
        var pk = params.submitValue;
        $(this).data('pk', pk);
    });

});

