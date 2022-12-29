const $ = window.jQuery || [];

const loadPage = (slug) =>
{
    $.ajax({
        url: window.rest_url+'blogdynamic/v1/post?slug='+slug,
        cache: false,
        method: 'GET',
        success: function(response) {
            $('div[data-function="contents"]').html(response.contents);
            linkClickEventHandler();
        }
    });
}

const linkClickEventHandler = () =>
{
    $('a[data-post-link]').one('click', function (e) {
    e.preventDefault();
    const slug = $(this).data('post-link');
    loadPage(slug);
    });
}

const currUrl = new URL(window.location);

$(document).ready(function() {
    if(currUrl.pathname.length > 1) {
        loadPage(currUrl.pathname);
    }    
    linkClickEventHandler();
});
