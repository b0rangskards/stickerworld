$(function () {
    $('.dpBdate').datepicker({
        format: 'yyyy-mm-dd',
        startDate: "1-1-1960",
        endDate: 'now',
        clearBtn: true,
        autoclose: true
    });

    $('.hiredDate').datepicker({
        format: 'yyyy-mm-dd',
        endDate: 'now',
        todayBtn: 'linked',
        clearBtn: true,
        autoclose: true,
        todayHighlight: true
    });
});

