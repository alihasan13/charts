
<?php
$mysqli = new mysqli("localhost", "root", null, "chart_data");
$result_pie = $mysqli->query('SELECT pie_data FROM pie_chart');
$data_pie = $result_pie->fetch_all();


//echo '<pre>';
//print_r($data);exit;
foreach ($data_pie as $item)
     foreach($item as $key){
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
            height:800;
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
      var options = {
            chart: {
                width: 380,
                type: 'pie',
            },
            colors: ['#93C3EE', '#E5C6A0', '#669DB5', '#94A74A'],
            series: [<?php
foreach ($data_pie as $item)
     foreach($item as $key){
        echo $key . ',';
    
    };
?>],
            fill: {
                type: 'image',
                opacity: 0.85,
                image: {
                     src: ['samples/assets/images/stripes.jpg', 'samples/assets/images/1101098.png', 'samples/assets/images/4679113782_ca13e2e6c0_z.jpg', 'samples/assets/images/2979121308_59539a3898_z.jpg'],
                    width: 25,
                    imagedHeight: 25
                },
            },
            stroke: {
                width: 4
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
                 title: {
                text: 'Monthly Inflation in Argentina, 2002',
                floating: true,
                offsetY: 300,
                align: 'center',
                style: {
                    color: '#444'
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



