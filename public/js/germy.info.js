/**
 * Created by CQC on 2015/12/4.
 */



function add_message(name, start, end, location) {
    var inner = $('#edu-messages-inner');
    var img = '/img/demo/av2.jpg';
    inner.append('<p class="item">'
        + '<span class="msg-block"><img src="' + img + '"/><strong>' + name + '</strong>'
        + '<span class="country">' + location + '</span>' + '<span class="msg">' + start
        + ' - ' + end + '</span></span></p>');
    $('.edu-content .input-box input').val('');
    $('.edu-messages').animate({scrollTop: inner.height()}, 1000);
}


$(function() {
    $('.main ul.nav-tabs li').on('click', function() {
        $('#info-tab').val($(this).index());
    });
    // active modify tab
    $('.main ul.nav-tabs li').removeClass('active').eq($('#info-tab').val()).addClass('active');
    $('.main .tab-pane').removeClass('active').eq($('#info-tab').val()).addClass('active');

    // edu-info
    $('#add-edu-item').on('click', function() {
        add_message($('#edu-name').val(), $('#edu-start').val(), $('#edu-end').val(), $('#edu-loc').val());
    });

});