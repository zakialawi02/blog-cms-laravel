!(function (e) {
    "use strict";
    function t(t) {
        1 == e("#light-mode-switch").prop("checked") &&
        "light-mode-switch" === t
            ? (e("#dark-mode-switch").prop("checked", !1),
              e("#rtl-mode-switch").prop("checked", !1),
              e("#bootstrap-style").attr(
                  "href",
                  "assets/css/bootstrap.min.css"
              ),
              e("#app-style").attr("href", "assets/css/app.min.css"),
              sessionStorage.setItem("is_visited", "light-mode-switch"))
            : 1 == e("#dark-mode-switch").prop("checked") &&
              "dark-mode-switch" === t
            ? (e("#light-mode-switch").prop("checked", !1),
              e("#rtl-mode-switch").prop("checked", !1),
              e("#bootstrap-style").attr(
                  "href",
                  "assets/css/bootstrap-dark.min.css"
              ),
              e("#app-style").attr("href", "assets/css/app-dark.min.css"),
              sessionStorage.setItem("is_visited", "dark-mode-switch"))
            : 1 == e("#rtl-mode-switch").prop("checked") &&
              "rtl-mode-switch" === t &&
              (e("#light-mode-switch").prop("checked", !1),
              e("#dark-mode-switch").prop("checked", !1),
              e("#bootstrap-style").attr(
                  "href",
                  "assets/css/bootstrap.min.css"
              ),
              e("#app-style").attr("href", "assets/css/app-rtl.min.css"),
              sessionStorage.setItem("is_visited", "rtl-mode-switch"));
    }
    function s() {
        document.webkitIsFullScreen ||
            document.mozFullScreen ||
            document.msFullscreenElement ||
            e("body").removeClass("fullscreen-enable");
    }
    var n;
    let sb;
    e("#side-menu").metisMenu(),
        e("#vertical-menu-btn").on("click", function (t) {
            t.preventDefault(),
                e("body").toggleClass("sidebar-enable"),
                (sb = !e("body").hasClass("sidebar-enable")),
                localStorage.setItem("isSidebarOpen", sb),
                992 <= e(window).width()
                    ? e("body").toggleClass("vertical-collpsed")
                    : e("body").removeClass("vertical-collpsed");
        }),
        e("body,html").click(function (t) {
            var s = e("#vertical-menu-btn");
            s.is(t.target) ||
                0 !== s.has(t.target).length ||
                t.target.closest("div.vertical-menu") ||
                e("body").removeClass("sidebar-enable");
        }),
        e("#sidebar-menu a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t &&
                (e(this).addClass("active"),
                e(this).parent().addClass("mm-active"),
                e(this).parent().parent().addClass("mm-show"),
                e(this).parent().parent().prev().addClass("mm-active"),
                e(this).parent().parent().parent().addClass("mm-active"),
                e(this).parent().parent().parent().parent().addClass("mm-show"),
                e(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("mm-active"));
        }),
        e(".navbar-nav a").each(function () {
            var t = window.location.href.split(/[?#]/)[0];
            this.href == t &&
                (e(this).addClass("active"),
                e(this).parent().addClass("active"),
                e(this).parent().parent().addClass("active"),
                e(this).parent().parent().parent().addClass("active"),
                e(this).parent().parent().parent().parent().addClass("active"),
                e(this)
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .parent()
                    .addClass("active"));
        }),
        e('[data-toggle="fullscreen"]').on("click", function (t) {
            t.preventDefault(),
                e("body").toggleClass("fullscreen-enable"),
                document.fullscreenElement ||
                document.mozFullScreenElement ||
                document.webkitFullscreenElement
                    ? document.cancelFullScreen
                        ? document.cancelFullScreen()
                        : document.mozCancelFullScreen
                        ? document.mozCancelFullScreen()
                        : document.webkitCancelFullScreen &&
                          document.webkitCancelFullScreen()
                    : document.documentElement.requestFullscreen
                    ? document.documentElement.requestFullscreen()
                    : document.documentElement.mozRequestFullScreen
                    ? document.documentElement.mozRequestFullScreen()
                    : document.documentElement.webkitRequestFullscreen &&
                      document.documentElement.webkitRequestFullscreen(
                          Element.ALLOW_KEYBOARD_INPUT
                      );
        }),
        document.addEventListener("fullscreenchange", s),
        document.addEventListener("webkitfullscreenchange", s),
        document.addEventListener("mozfullscreenchange", s),
        e(".right-bar-toggle").on("click", function (t) {
            e("body").toggleClass("right-bar-enabled");
        }),
        e(document).on("click", "body", function (t) {
            0 < e(t.target).closest(".right-bar-toggle, .right-bar").length ||
                e("body").removeClass("right-bar-enabled");
        }),
        e(".dropdown-menu a.dropdown-toggle").on("click", function (t) {
            return (
                e(this).next().hasClass("show") ||
                    e(this)
                        .parents(".dropdown-menu")
                        .first()
                        .find(".show")
                        .removeClass("show"),
                e(this).next(".dropdown-menu").toggleClass("show"),
                !1
            );
        }),
        e(function () {
            e('[data-toggle="tooltip"]').tooltip();
        }),
        e(function () {
            e('[data-toggle="popover"]').popover();
        }),
        window.sessionStorage &&
            ((n = sessionStorage.getItem("is_visited"))
                ? (e(".right-bar input:checkbox").prop("checked", !1),
                  e("#" + n).prop("checked", !0),
                  t(n))
                : sessionStorage.setItem("is_visited", "light-mode-switch")),
        //     window.localStorage &&
        //         ((sb = localStorage.getItem("isSidebarOpen")),
        //         sb == "true"
        //             ? e("body").addClass("sidebar-enable vertical-collpsed")
        //             : e("body").removeClass("sidebar-enable vertical-collpsed"));
        // 992 <= e(window).width()
        //     ? e("body").toggleClass("vertical-collpsed")
        //     : e("body").removeClass("vertical-collpsed");
        e("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on(
            "change",
            function (e) {
                t(e.target.id);
            }
        ),
        e(window).on("load", function () {
            e("#status").fadeOut(), e("#preloader").delay(350).fadeOut("slow");
        }),
        Waves.init();
})(jQuery);
