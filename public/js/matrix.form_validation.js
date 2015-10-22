jQuery.extend(jQuery.validator.messages, {
    required: "请填写这个字段",
    remote: "请修正该字段",
    email: "请输入正确格式的电子邮件",
    url: "请输入合法的网址",
    date: "请输入合法的日期",
    dateISO: "请输入合法的日期 (ISO).",
    number: "请输入合法的数字",
    digits: "只能输入整数",
    creditcard: "请输入合法的信用卡号",
    equalTo: "请再次输入相同的值",
    accept: "请输入拥有合法后缀名的字符串",
    maxlength: jQuery.format("请输入一个长度最多是 {0} 的字符串"),
    minlength: jQuery.format("请输入一个长度最少是 {0} 的字符串"),
    rangelength: jQuery.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),
    range: jQuery.format("请输入一个介于 {0} 和 {1} 之间的值"),
    max: jQuery.format("请输入一个最大为 {0} 的值"),
    min: jQuery.format("请输入一个最小为 {0} 的值")
});

$(document).ready(function() {
    // Form Validation

    tag_rules = {
        rules: {
            name: {
                required: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    }

    article_rules = {
        rules: {
            title: {
                required: true
            },
            subtitle: {
                required: true
            },
            summary: {
                required: true
            },
            content: {
                required: true
            },
            weight: {
                required: true,
                digits: true
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    }

    $("#create_tag").validate(tag_rules);
    $("#edit_tag").validate(tag_rules);


    $("#create_article").validate(article_rules);
    $("#edit_article").validate(article_rules);

});