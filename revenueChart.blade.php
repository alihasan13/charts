@extends('layouts.default.master')
@section('data_count')
<div class="col-md-12">
    @include('layouts.flash')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bookmark-o"></i>@lang('label.REVENUE_CHART')
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('label.REVENUE_CHART')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="public/chart/samples/assets/custom.js"></script>
<script src="public/chart/samples/assets/ohlc.js"></script>
<script>
    var barColor = [ '#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0'];
    var options = {
    chart: {
//    background: ' #e6e6e6',
    height: 550,
            events: {
            dataPointSelection: function(event, chartContext, config) {
            console.log(config);
            var index = config.dataPointIndex;
            var chartId = config.w.config.id[index];
            $.ajax({
            url: "{{ URL::to('/revenueChart/showRevenue')}}",
                    type: "POST",
                    dataType: "json",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                    chart_id: chartId,
                    },
                    beforeSend: function () {
//                        App.blockUI({
//                            boxed: true
//                        });
                    },
                    success: function (res) {
                    $('#modalContent').html(res.info);
                    $("#exampleModal").modal('show');
                    // App.unblockUI();
                    },
                    error: function (jqXhr, ajaxOptions, thrownError) {
                    // App.unblockUI();
                    }
            }); //ajax

            }
            }
    },
            colors: barColor,
            plotOptions: {
            bar: {
            columnWidth: '50%',
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
//                    dropShadow: {
//                    enabled: true,
//                            left: 1,
//                            top: 2,
//                            opacity: 0.5
//                    }
            },
            series: [{
            name: 'Revenue',
                    type: 'bar',
                    data: [

<?php foreach ((array) $data as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            }, {
            name: 'Spendings',
                    type: 'bar',
                    data: [
<?php foreach ((array) $data2 as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            },
            {
            name: 'Revenue(line chart)',
                    type: 'line',
                    data: [
<?php foreach ((array) $data as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            },
            {
            name: 'Spendings(line chart)',
                    type: 'line',
                    data: [
<?php foreach ((array) $data2 as $item) { ?>

                        {{ $item}}
<?php }
?>
                    ],
            },
            ],
            markers: {
            size: 5,
                    style: 'full',
            },
            stroke: {
             curve: 'smooth',
            width: [0, 0, 5, 5]
            },
            title: {
            text: 'Spendings and Revenue over the month.'
            },
            // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: [
<?php foreach ((array) $category as $item) {
    ?>
                "{{$item}}",
<?php }
?>
            ],
            id: [
<?php foreach ((array) $category as $key => $item) {
    ?>
                "{{$key}}",
<?php }
?>
            ],
            xaxis: {
            title: {
            text: ' Months(2019)'
            },
            },
            yaxis: [{
            title: {
            text: 'Revenue(Million)',
            },
                    forceNiceScale:false,
                    min: 0,
                    max: 100,
                    tickAmount: 5,
                    axisBorder: {
                    show: true,
                            color: '#78909C',
                            offsetX: 0,
                            offsetY: 0
                    },
                    axisTicks: {
                    show: true,
                            borderType: 'solid',
                            color: '#78909C',
                            width: 6,
                            offsetX: 0,
                            offsetY: 0
                    },
            }, {
            opposite: true,
                    forceNiceScale:false,
                    min: 0,
                    max: 100,
                    tickAmount: 10,
                    axisBorder: {
                    show: true,
                            color: '#78909C',
                            offsetX: 0,
                            offsetY: 0
                    },
                    axisTicks: {
                    show: true,
                            borderType: 'solid',
                            color: '#78909C',
                            width: 6,
                            offsetX: 0,
                            offsetY: 0
                    },
                    title: {
                    text: 'Spendings(Million)'
                    }
            }]

    }
    var chart = new ApexCharts(
            document.querySelector("#chart"),
            options
            );
    chart.render();
</script>
@stop