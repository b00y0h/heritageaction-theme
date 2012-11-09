/*global Video */

/* Params:  Video.takeover_url, Video.takeover_title, Video.takeover_description
 */
(function ($) {

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1, c.length);
            }
            if (c.indexOf(nameEQ) === 0) {
                return c.substring(nameEQ.length, c.length);
            }
        }
        return null;
    }

    function setCookie(name, value, days) {
        var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

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