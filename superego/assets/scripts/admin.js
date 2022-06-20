// -----------------------------------------------------------------------------
// This is the main admin JS file of the Superego theme
// -----------------------------------------------------------------------------

jQuery(document).ready(function ($) {

    // Formidable form click
    $(".frm_form_field input, .frm_form_field textarea").focus(function () {
        $(this).parent().addClass('focus');
    });

    // Formidable form click outside input
    $(".frm_form_field input, .frm_form_field textarea").blur(function () {
        if ($(this).val()) { } else {
            $(this).parent().removeClass('focus');
        }
    });

});

// Add link target blank in editor
// jQuery(document).ajaxComplete(function ($) {

//     jQuery('.edit-post-visual-editor a').each(function () {
//         // Add target _blank
//         jQuery(this).attr('target', '_blank');

//         // Ask before opening link
//         jQuery(this).off().on('click', function (event) {
//             if (confirm('Vil du åbne dette link i en ny fane?')) {
//                 return true;
//             } else {
//                 return false;
//             }
//         });
//     });

// });