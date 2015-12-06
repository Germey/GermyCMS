/**
 * Created by CQC on 2015/12/4.
 */



function add_message(name, start, end, location) {
    var inner = $('#edu-messages-inner');
    var img = '/img/demo/av2.jpg';
    inner.append('<p class="item">'
        + '<span class="msg-block"><img src="' + img + '"/><strong>' + name + '</strong>'
        + '<span class="country">' + location + '</span><span class="pull-right"><i class="icon-remove"></i>'
        + '</span><span class="msg">' + start
        + ' - ' + end + '</span></span>'
        + '<input type="hidden" name="education[name][]" value="' + name + '">'
        + '<input type="hidden" name="education[start][]" value="' + start + '">'
        + '<input type="hidden" name="education[end][]" value="' + end + '">'
        + '<input type="hidden" name="education[loc][]" value="' + location + '">'
        + '</p>');
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

    $('#edu-messages-inner .item i.icon-remove').on('click', function() {
       $(this).parents('.item').remove();
    });
    // upload-info-image
    $('#upload-info-img').on('click', function() {

        $.ajaxFileUpload({
                url: '/ajaxUploadInfoImg', //用于文件上传的服务器端请求地址
                data: {
                    '_token': $('input[name="_token"]').val()
                },
                secureuri: false,
                fileElementId: 'info-img',
                dataType: 'json',
                success: function(data) {
                    status = data.status;
                    switch (status) {
                        case '404':
                            alert('没有图片可以上传');
                            break;
                        case '403':
                            alert('格式不允许');
                            break;
                        case '500':
                            alert('文件错误，无法上传');
                            break;
                        case '200':
                            $('#now-img').attr('src', data.path);
                            $('#now-img-src').val(data.path);
                            break;
                    }
                },
                error: function(data, status, e) {
                    alert(e);
                }
            }
        );
        return false;
    });
});