
<table class="table table-bordered table-hover">
    <thead>
        <tr>

            <th class="vcenter text-center">@lang('label.MONTH')</th>
            <th class="vcenter text-center">@lang('label.REVENUE')@lang('label.MILLION')</th>
            <th class="vcenter text-center">@lang('label.EXPENDITURE')@lang('label.MILLION')</th>
            <th class="vcenter text-center">@lang('label.EVALUATION')</th>

        </tr>
    </thead>
    <tbody>
        <tr>

            <td class="vcenter text-center">{!! $revenueChartInfo['month'] !!}</td>
            <td class="vcenter text-center">{!! $revenueChartInfo['revenue'] !!}</td>
            <td class="vcenter text-center">{!! $revenueChartInfo['spending'] !!}</td>
            <td class="vcenter text-center">

                @if(($revenueChartInfo['revenue']- $revenueChartInfo['spending'])>0)
                <span class="label label-sm label-success">@lang('label.WE_ARE_IN_PROFIT')</span>
                @elseif(($revenueChartInfo['revenue']- $revenueChartInfo['spending'])== 0)
                <span class="label label-sm label-warning">@lang('label.WE_ARE_IN_LEVEL')</span>
                @else
                <span class="label label-sm label-danger">@lang('label.WE_ARE_IN_LOSS')</span>
                @endif
            </td>


        </tr>
    </tbody>
</table>
