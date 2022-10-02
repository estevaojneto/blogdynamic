const $ = window.jQuery || [];

// Workaround due to a:click not being captured (???)
$(document).ready(function() {
    const linkClick = function () {
        $('a[data-post-link]').on('click', function (e) {
        e.preventDefault();
        const slug = $(this).data('post-link');
        $.ajax({
            url: window.rest_url+'blogdynamic/v1/post?slug='+slug,
            cache: false,
            method: 'GET',
            success: function(response) {
                $('div[data-function="contents"]').html(response);
                linkClick();
            }
        });
        });
    }
    linkClick();
});