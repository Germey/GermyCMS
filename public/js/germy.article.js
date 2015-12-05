/**
 * Created by CQC on 2015/11/30.
 */


$(function() {
    $('#tag-list').select2({
        placeholder: "选择一个标签",
        ajax: {
            url: "/ajaxGetTags",
            dataType: 'json',
            processResults: function(data, page) {
                return data;
            }
        }
    });
    $('#new-tags').select2({
        tags: true,
    });
    $('#add-tags').on('click', function() {
        $.ajax({
            type: 'POST',
            url: '/ajaxAddTags',
            data: {
                '_token': $('input[name="_token"]').val(),
                'new_tags': $('#new-tags').val()
            },
            success: function(data) {
                $('<span>' + data + '</span>').appendTo($('#new-tags').parent());
            }
        });
    });
});



