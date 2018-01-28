function setLanguageCookie(cookieValue) {
    var today = new Date();
    var expire = new Date();
    var cookieName = 'lang';
    //var cookieValue = "bn";
    var nDays = 5;
    expire.setTime(today.getTime() + 3600000 * 24 * nDays);
    document.cookie = cookieName + "=" + escape(cookieValue)
        + ";expires=" + expire.toGMTString();
}

function setLanguage() {
    $("#lang_form").submit();
    return false;
}

$(function () {
    $("#front-image-slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 2000,
        maxwidth: 960,
        namespace: "callbacks"
    });
    $("#right-content a").click(function () {
        var url = $(this).attr('href');
        if (isExternal(url) && url != 'javascript:;') {
            openInNewTab(url);
            return false;
        }
    });
});
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
}
function isExternal(url) {
    var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
    if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol)
        return true;
    if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + {
                "http:": 80,
                "https:": 443
            }[location.protocol] + ")?$"), "") !== location.host)
        return true;
    return false;
}

$(document).ready(function ($) {
    $("#dawgdrops").accessibleMegaMenu({
        /* prefix for generated unique id attributes, which are required
         to indicate aria-owns, aria-controls and aria-labelledby */
        uuidPrefix: "accessible-megamenu",

        /* css class used to define the megamenu styling */
        menuClass: "meganizr",

        /* css class for a top-level navigation item in the megamenu */
        topNavItemClass: "mzr-drop",

        /* css class for a megamenu panel */
        panelClass: "mzr-content",

        /* css class for a group of items within a megamenu panel */
        panelGroupClass: "mzr-links",

        /* css class for the hover state */
        hoverClass: "hover",

        /* css class for the focus state */
        focusClass: "focus-content",

        /* css class for the open state */
        openClass: "open hover-content"
    });

});

// Responsive Design
$(document).ready(function () {
    var wi = $(window).width();
    if (wi < 980) {
        $('.show-menu').click(function () {
            //$('.mzr-responsive').show();
            $(".mzr-responsive").slideToggle(700, "linear", function () {
            });
        });

        $(".mzr-drop> a").click(function () {

            $(this).parent().siblings('li').find('div.mzr-content').removeClass('sibling-toggle slide-visible').addClass('sibling-toggle');
            $(this).siblings('div').removeClass('sibling-toggle').slideToggle(700, "linear");


            return false;
        });
    }

});