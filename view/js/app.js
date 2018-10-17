$(document).ready(function() {

    $('#button-contact-add').click(function(e) {
        e.preventDefault();
        if ($('#add-contact').hasClass('hidden')) {
            $('#contact').val('0');
            $('#contact').addClass('hidden');
            $('#add-contact').removeClass('hidden');
        } else {
            $('#contact').removeClass('hidden');
            $('#add-contact').addClass('hidden');
        }
    });
});