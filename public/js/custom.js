$(document).ready(function() {
    var $repliesWindow = $('div.reply-window');
    var $commentsWindow = $('div.comment-window');


    hideCommentWindow();
    hideReplyWindow();

    $(document).on('click', 'i.comment-icon', function() {
        hideReplyWindow();
        hideCommentWindow();
        $(this).parents('div.ink').find('div.comment-window').attr('style', 'display:flex');
    });

    $(document).on('click', 'i.reply-icon', function() {

        hideCommentWindow();
        hideReplyWindow();
        $(this).parents('div.ink').find('div.reply-window').attr('style', 'display:flex');


    });

    function hideReplyWindow() {
        $repliesWindow.attr('style', 'display:none');
    }

    function hideCommentWindow() {
        $commentsWindow.attr('style', 'display:none');
    }


});