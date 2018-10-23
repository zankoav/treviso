$(function () {
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

// hide #back-top first
$("#back-top").hide();

// fade in #back-top

$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
    } else {
        $('#back-top').fadeOut();
    }
});

// scroll body to 0px on click
$('#back-top a').on("click", function () {
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});

(function () {

    var $loading = $('.loading');

    $('.top-menu__languages-item').on('click', function (event) {
        event.preventDefault();
        if ($(this).hasClass('top-menu__languages-item_active'))
            return;

        $('.top-menu__languages-item').removeClass('top-menu__languages-item_active');
        $(this).addClass('top-menu__languages-item_active');

        setCookie("lang", $(this).html());
        $loading.addClass('loading_active');

        setTimeout(function () {
            location.reload(true);
        }, 100);
    });

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }

})();

