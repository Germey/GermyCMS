/**
 * Created by CQC on 2015/12/5.
 */

$(function() {
    // slide-up-down btn clicked toggle
    $('.slide-up-down').on('click', function() {
        $($(this).attr('href')).slideToggle();
        var text = $(this).find(':first-child').html();
        $(this).find(':first-child').html($(this).find(':last-child').html());
        $(this).find(':last-child').html(text);
    });
    // group radio
    $('.btn-group .value').radio();
    // wysihtml5
    $('.textarea_editor').wysihtml5();
    //date picker
    $('.datepicker').datepicker();
});