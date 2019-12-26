@extends('layouts.default.master')
@section('data_count')
<div class="col-md-12">
    @include('layouts.flash')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bookmark-o"></i>@lang('label.LINE_CHART')
            </div>
        </div>
        <div id="chart">
            <?php
//foreach ($data2 as $item) {
//    echo $item ;
//};exit;
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
    //var barColor = [ '#26a69a', '#008FFB'];
    var options = {
    chart: {
    background: ' #e6e6e6',
            height: 550,
            type: 'line',
            events: {
            legendClick: function(chartContext, seriesIndex, config) {
            alert("Single chart selected...")
            }
            },
    },
            //colors: barColor,
            plotOptions: {
            bar: {
            columnWidth: '25%',
                    distributed: true,
            }
            },
            dataLabels: {
            enabled: true,
                    position: 'bottom', // top, center, bottom
                    offsetY: - 25,
                    style: {
                    fontSize: '15px',
                            //  colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0']
                    },
                    dropShadow: {
                    enabled: true,
                            left: 5,
                            top: 5,
                            opacity: 0.5
                    }
            },
            series: [{
            name: 'Weakness',
                    type: 'column',
                    data: [

<?php foreach ((array) $data as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            }, {
            name: 'Sepciality',
                    type: 'line',
                    data: [
<?php foreach ((array) $data2 as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            }],
            markers: {
            size: 5,
                    style: 'full',
            },
            stroke: {
            width: [0, 5]
            },
            title: {
            text: 'Specility vs Weakness'
            },
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: [
<?php foreach ((array) $category as $item) {
    ?>
                "{{$item}}",
<?php }
?>
            ],
            xaxis: {
            title: {
            text: ' Ctegory of Weakness'
            },
                    min: 0,
                    max: 10,
            },
            yaxis: [{
            title: {
            text: 'Speciality',
            },
            }, {
            opposite: true,
                    title: {
                    text: 'Weakness'
                    },
                    min: 0,
                    max: 10,
            }]

    }

    var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
            );
    chart.render();
</script>
@stop