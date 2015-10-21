/*
	author:CQC create:2015/10/20
 */
/* admin.article.create */


jQuery.fn.radio = function () {
	var ele = $(this);
	ele.siblings('button').each(function() {
		if ($(this).attr('value') == ele.attr('value')) {
			$(this).addClass('active');
		}
	});
    $(this).siblings('button').on('click', function() {
		ele.attr('value', $(this).attr('value'));
	});
}



$('.textarea_editor').wysihtml5();

$('input[name="allow_comment"]').radio();


