
<?php
$mysqli = new mysqli("localhost", "root", null, "chart_data");
$result = $mysqli->query('SELECT data FROM chart');
$data = $result->fetch_all();
$result_new = $mysqli->query('SELECT data_new FROM chart_data');
$data_new = $result_new->fetch_all();

//echo '<pre>';
//print_r($data[1]);exit;
foreach ($data_new as $item)
    foreach ($item as $key) {
        echo $key . ',';
    };
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CandleStick Chart</title>


    <link href="samples/assets/styles.css" rel="stylesheet" />

    <style>
        #chart {
            max-width: 1100px;
            margin: 35px auto;
        }
    </style>
</head>

<body>
    <div id="chart">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <script src="samples/assets/ohlc.js"></script>
    <script>
        var barColor = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8'];
        var options = {
            chart: {
                height: 500,
                type: 'bar',
            },
            colors: barColor,
            plotOptions: {
                bar: {
                    columnWidth: '25%',
                    distributed: true,
                    dataLabels: {
                        enable: true,
                        position: 'top', // top, center, bottom
                    }
                }
            },
            dataLabels: {
                enabled: true,
                position: 'top', // top, center, bottom

                formatter: function (val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            series: [{
                    name: 'Inflation',
                    data: [
<?php
foreach ($data_new as $item)
    foreach ($item as $key) {
        echo $key . ',';
    };
?>
                    ]
                }],

            xaxis: {
//                labels: {
//                    rotate: -45
//                },
                categories: [
<?php
foreach ($data as $item)
    foreach ($item as $key) {
        echo $key . ',';
    };
?>
                ],

                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    fill: {
                        type: 'gradient',
                        gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                        }
                    }
                },
                tooltip: {
                    enabled: true,
                    offsetY: -35,
                }
            },
            fill: {
                gradient: {
                    shade: 'light',
                    type: "horizontal",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [50, 0, 100, 100]
                },
            },
            yaxis: {
                axisBorder: {
                    show: true,
                },
                axisTicks: {
                    show: true,
                },
                labels: {
                    show: true,
                    formatter: function (val) {
                        return val + "%";
                    }
                }
            },
            title: {
                text: 'Monthly Inflation in Argentina, 2002',
                floating: true,
                offsetY: 480,
                align: 'center',
                style: {
                    color: '#444'
                }
            },
            grid: {
                row: {
                    colors: ['#fff', '#f2f2f2']
                }
            },
        }
        var chart = new ApexCharts(
                document.querySelector("#chart"),
                options
                );
        chart.render();
    </script>
</body>
</html>



