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

    // upload-info-image
    $('#upload-info-img').on('click', function() {

        $.ajaxFileUpload({
                url: '/ajaxUploadInfoImg', //用于文件上传的服务器端请求地址
                data: {
                    '_token': $('input[name="_token"]').val()
                },
                secureuri: false,
                fileElementId: 'info-img',
                dataType: 'content',
                success: function(data, status)
                {
                    if (data == 0) {
                        alert('没有图片可以上传');
                    } else if (data == 1) {
                        alert('格式不允许');
                    } else if (data == 2) {
                        alert('上传出错');
                    } else if (data == 3) {
                        alert('保存至服务器出错');
                    } else {
                        $('#now-img').attr('src', data);
                    }
                },
                error: function(data, status, e)
                {
                    alert(e);
                }
            }
        );
        return false;
    });
});