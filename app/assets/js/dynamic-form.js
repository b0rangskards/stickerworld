$(function(){

    $('form.form-supplier').on('click', '.btn-add-contact', function(e){
        e.preventDefault();

        var parent = $('div.supplier-form-contacts-group'),
            currentEntry = $(this).parents('.contact-group:first'),
            newEntry = $(currentEntry).clone().addClass('col-md-offset-3').appendTo(parent);

        newEntry.find('div.contact-no-container').removeClass('col-md-4').addClass('col-md-5');
        newEntry.find('div.contact-type-container').removeClass('col-md-2').addClass('col-md-3');

        newEntry.find('input').val('');

        parent.find('.contact-group:not(:last) .btn-add-contact')
            .removeClass('btn-add-contact').addClass('btn-remove-contact')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<i class="fa fa-minus"></i>');

    }).on('click', '.btn-remove-contact', function(e){
        e.preventDefault();

        $(this).parents('.contact-group:first').remove();

        return false;
    });

});