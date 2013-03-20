/*global Video */

/* Params:  Video.takeover_url, Video.takeover_title, Video.takeover_description
 */
(function ($) {
    $(document).ready(function () {
        if (Video.enable_video && getCookie('seen_takeover') !== Video.takeover_url) {
						oB.settings.autoplay = false;
            $(document).orangeBox('createCustom', {								
                href: decodeURIComponent((Video.takeover_url + '').replace(/\+/g, '%20')),
                title: decodeURIComponent((Video.takeover_title + '').replace(/\+/g, '%20')),
                caption: decodeURIComponent((Video.takeover_description + '').replace(/\+/g, '%20'))
            });
            setCookie('seen_takeover', Video.takeover_url, '1776');
						oB.settings.autoplay = true;
        }
    });
})(jQuery);