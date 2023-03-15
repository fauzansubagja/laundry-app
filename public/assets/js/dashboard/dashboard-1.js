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
        var revenueMap = function () {
            var options = {
                series: [
                    {
                        name: "Net Profit",
                        data: [20, 40, 20, 30, 50, 40, 60],
                        //radius: 12,
                    },
                ],
                chart: {
                    type: "line",
                    height: 368,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        endingShape: "rounded",
                    },
                },
                colors: ["#886CC0"],
                dataLabels: {
                    enabled: false,
                },
                markers: {
                    shape: "circle",
                },

                legend: {
                    show: false,
                },
                stroke: {
                    show: true,
                    width: 10,
                    curve: "smooth",
                    colors: ["var(--primary)"],
                },

                grid: {
                    borderColor: "#eee",
                    show: true,
                    xaxis: {
                        lines: {
                            show: true,
                        },
                    },
                    yaxis: {
                        lines: {
                            show: false,
                        },
                    },
                },
                xaxis: {
                    categories: ["S", "M", "T", "W", "T", "F", "S"],
                    labels: {
                        style: {
                            colors: "#7E7F80",
                            fontSize: "13px",
                            fontFamily: "Poppins",
                            fontWeight: 100,
                            cssClass: "apexcharts-xaxis-label",
                        },
                    },
                    crosshairs: {
                        show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        offsetX: -15,
                        style: {
                            colors: "#7E7F80",
                            fontSize: "14px",
                            fontFamily: "Poppins",
                            fontWeight: 100,
                        },
                        formatter: function (y) {
                            return y.toFixed(0) + "k";
                        },
                    },
                },
                fill: {
                    opacity: 1,
                    colors: "#FAC7B6",
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " hundred";
                        },
                    },
                },
            };

            var chartBar1 = new ApexCharts(
                document.querySelector("#revenueMap"),
                options
            );
            chartBar1.render();
        };
        var emailchart = function () {
            var options = {
                series: [27, 11],
                chart: {
                    type: "donut",
                    height: 300,
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 0,
                },
                colors: ["#26E023", "var(--primary)"],
                legend: {
                    position: "bottom",
                    show: false,
                },
                responsive: [
                    {
                        breakpoint: 1800,
                        options: {
                            chart: {
                                height: 200,
                            },
                        },
                    },
                    {
                        breakpoint: 1800,
                        options: {
                            chart: {
                                height: 200,
                            },
                        },
                    },
                ],
            };

            var chart = new ApexCharts(
                document.querySelector("#emailchart"),
                options
            );
            chart.render();
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
