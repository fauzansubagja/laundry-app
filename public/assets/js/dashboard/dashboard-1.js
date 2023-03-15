(function ($) {
    /* "use strict" */

    var dlabChartlist = (function () {
        var screenWidth = $(window).width();
        let draw = Chart.controllers.line.__super__.draw; //draw shadow
        var donutChart1 = function () {
            $("span.donut1").peity("donut", {
                width: "70",
                height: "70",
            });
        };

        /* Function ============ */
        return {
            init: function () {},

            load: function () {
                revenueMap();
                emailchart();
            },

            resize: function () {},
        };
    })();

    jQuery(window).on("load", function () {
        setTimeout(function () {
            dlabChartlist.load();
        }, 1000);
    });
})(jQuery);
