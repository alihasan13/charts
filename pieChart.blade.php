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
//foreach ((array)$data as $item) {
//    echo $item ;
//};exit;
//            foreach ($category as $item) {
//                
//                echo $item;
//            };exit;
//            
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
<script src="public/chart/samples/assets/ohlc.js"></script>
<script>
    var options = {
    chart: {
    width: 380,
            type: 'pie',
            events: {
    mouseMove: function(event, chartContext, config) {
      // The last parameter config contains additional information like `seriesIndex` and `dataPointIndex` for cartesian charts.
    <?php foreach ((array) $category as $item) { ?>

               alert("{{$item}}",) ;
<?php }
?>
    }
  }
    },
            colors: ['#93C3EE', '#E5C6A0', '#669DB5', '#94A74A'],
            series: [

<?php foreach ((array) $data as $item) { ?>

                {{$item}}
<?php }
?>

            ],
            labels: [
<?php foreach ((array) $category as $item) { ?>

                "{{$item}}",
<?php }
?>
            ],
            fill: {
            type: 'image',
                    opacity: 0.85,
                    image: {
                    src: ['public/chart/samples/assets/images/stripes.jpg', 'public/chart/samples/assets/images/moneylover.png', 'public/chart/samples/assets/images/downbeat.png', 'public/chart/samples/assets/images/2979121308_59539a3898_z.jpg'],
                            width: 25,
                            imagedHeight: 25
                    }
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
            text: 'Weakness Chart',
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
@stop