jQuery(document).ready(function ($) {
    // Formidable form click
    $(".frm_form_field input, .frm_form_field textarea").focus(function () {
        $(this).parent().addClass('focus');
    });

    $(".frm_form_field input, .frm_form_field textarea").blur(function () {
        if ($(this).val()) { } else {
            $(this).parent().removeClass('focus');
        }
    });
});