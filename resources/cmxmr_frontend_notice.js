(function ($) {
    if(!Cookies.get('hideBottomBar')) {
        $("#cm_announcement_popup").slideDown(1000);
    }
    $("a#closeit").click(function() {
        Cookies.set('hideBottomBar', 'true', { expires: 365 });
        $("#cm_announcement_popup").slideUp(1000);
        return false;
    });
}(jQuery));