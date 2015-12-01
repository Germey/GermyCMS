/*
 author:CQC create:2015/10/20
 */
/* admin.article.create */

$(function() {
    $('.slide-up-down').on('click', function() {
        $($(this).attr('href')).slideToggle();
        var text = $(this).find(':first-child').html();
        $(this).find(':first-child').html($(this).find(':last-child').html());
        $(this).find(':last-child').html(text);
    });
});




