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
    var options = {
            chart: {
                height: 350,
                type: 'line',
                shadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 1
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#77B6EA', '#545454'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth'
            },
            series: [{
                    name: "Weakness",
                    data: [
<?php foreach ((array) $data as $item) { ?>
                        {{ $item}}
<?php }
?>
                    ]
                },
                {
                    name: "Speciality",
                    data: [
<?php foreach ((array) $data2 as $item) { ?>
                        {{ $item}}
<?php }
?>
                    ]
                }
            ],
            title: {
                text: 'Order of Speciality and Weakness',
                align: 'left'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 10
            },
            xaxis: {
                categories: [
                <?php foreach ((array) $category2 as $item) {
    ?>
                "{{$item}}",
<?php }
?>
                ],
                title: {
                    text: 'Category of Speciality'
                }
            },
            yaxis: {
                title: {
                    text: 'Order'
                },
                min: 0,
                max: 10
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();
</script>
@stop