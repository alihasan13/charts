
<?php
$mysqli = new mysqli("localhost", "root", null, "chart_data");
$result = $mysqli->query('SELECT data FROM chart');
$data = $result->fetch_all();
$result_new = $mysqli->query('SELECT data_new FROM chart_data');
$data_new = $result_new->fetch_all();

//echo '<pre>';
//print_r($data[1]);exit;
//foreach ($data_new as $item)
//    foreach ($item as $key) {
//        echo $key . ',';
//    };
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
         var options = {
      chart: {
        height: 350,
        type: 'line',
      },
      series: [{
        name: 'Website Blog',
        type: 'column',
        data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
      }, {
        name: 'Social Media',
        type: 'line',
        data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
      }],
      stroke: {
        width: [0, 4]
      },
      title: {
        text: 'Traffic Sources'
      },
      // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
      xaxis: {
        type: 'datetime'
      },
      yaxis: [{
        title: {
          text: 'Website Blog',
        },

      }, {
        opposite: true,
        title: {
          text: 'Social Media'
        }
      }]

    }

    var chart = new ApexCharts(
      document.querySelector("#chart"),
      options
    );

    chart.render();
    </script>
</body>
</html>



