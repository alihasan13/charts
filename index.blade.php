@extends('layouts.default.master')
@section('data_count')
<div class="col-md-12">
    @include('layouts.flash')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bookmark-o"></i>@lang('label.DESIGNATION_VS_ORDER_CHART')
            </div>
        </div>
        <div id="chart">
            <?php
//foreach ($data as $item) {
//    echo $item . ',';
////};
//            foreach ($category as $key=>$item) {
//                
//                echo $key;
//            };
//            
            ?>
        </div>
    </div>
</div>

<script src="public/chart/samples/assets/custom.js"></script>
<script src="public/chart/samples/assets/ohlc.js"></script>
<script>
    var barColor = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8'];
    var options = {
    chart: {
    height: 500,
            type: 'bar',
                  events: {
    click: function(event, chartContext, config) {
      // The last parameter config contains additional information like `seriesIndex` and `dataPointIndex` for cartesian charts
    console.log(chartContext);   
<?php

foreach ($category as $key => $item) {
    ?>
                 alert(      "{{$item}} " + ": " + "{{$key}}" );return;
<?php }
?>
                    
           
    }
  },
//      events: {
//    mouseMove: function(event, chartContext, config) {
//      // The last parameter config contains additional information like `seriesIndex` and `dataPointIndex` for cartesian charts.
//    alert('hi')
//    }
//  }
  
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
                    offsetY: - 20,
                    style: {
                    fontSize: '12px',
                            colors: ["#304758"]
                    }
            },
            series: [{
            name:    '',
                    data: [
<?php foreach ($data as $item) { ?>

                        "{{ $item}}",
<?php }
?>
                    ],
            }],
            tooltip: {
            enabled: true,
                    y: {
                    formatter: function(val) {
                    return "" +
<?php
foreach ($category as $key => $item) {
    ?>
                        "{{$item}} " + ": " + "{{$key}}" + "<br>" +
<?php }
?>
                    " "
                    },
                    },
                    x: {
                    formatter: function(val) {
                    return "Designation with Order"
                    },
                    }
            },
            xaxis: {
            labels: {
            rotate: - 45
            },
                    categories: [
<?php foreach ($category as $item) {
    ?>
                        "{{$item}}",
<?php }
?>
                    ],
                    axisBorder: {
                    show: true
                    },
                    axisTicks: {
                    show: true
                    },
//                    crosshairs: {
//                    fill: {
//                    type: 'gradient',
//                            gradient: {
//                            colorFrom: '#D8E3F0',
//                                    colorTo: '#BED1E6',
//                                    stops: [0, 100],
//                                    opacityFrom: 0.4,
//                                    opacityTo: 0.5,
//                            }
//                    }
//                    }
            },
//            fill: {
//            gradient: {
//            shade: 'light',
//                    type: "horizontal",
//                    shadeIntensity: 0.25,
//                    gradientToColors: undefined,
//                    inverseColors: true,
//                    opacityFrom: 1,
//                    opacityTo: 1,
//                    stops: [50, 0, 100, 100]
//            },
//            },
            yaxis: {
            axisBorder: {
            show: true,
            },
                    axisTicks: {
                    show: true,
                    },
                    title: {
                    text: 'Designation Order'
                    },
                    labels: {
                    show: true,
//                    formatter: function (val) {
//                        return val + "%";
//                    }
                    }
            },
            title: {
            text: 'Designation Name',
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
@stop