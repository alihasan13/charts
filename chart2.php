
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
            max-width: 1000px;
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
      annotations: {
        points: [{
          x: 'Bananas',
          seriesIndex: 0,
          label: {
            borderColor: '#775DD0',
            offsetY: 0,
            style: {
              color: '#fff',
              background: '#775DD0',
            },
            text: 'Bananas are good',
          }
        }]
      },
      chart: {
        height: 350,
        type: 'bar',
      },
      plotOptions: {
        bar: {
          columnWidth: '30%',
          endingShape: 'rounded'	
        }
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2
      },
      series: [{
        name: 'Servings',
        data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
      }],
      grid: {
        row: {
          colors: ['#fff', '#f2f2f2']
        }
      },
      xaxis: {
        labels: {
          rotate: -45
        },
        categories: ['Apples', 'Oranges', 'Strawberries', 'Pineapples', 'Mangoes', 'Bananas',
          'Blackberries', 'Pears', 'Watermelons', 'Cherries', 'Pomegranates', 'Tangerines', 'Papayas'
        ],
      },
      yaxis: {
        title: {
          text: 'Servings',
        },

      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "horizontal",
          shadeIntensity: 0.25,
          gradientToColors: undefined,
          inverseColors: true,
          opacityFrom: 0.85,
          opacityTo: 0.85,
          stops: [50, 0, 100]
        },
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



