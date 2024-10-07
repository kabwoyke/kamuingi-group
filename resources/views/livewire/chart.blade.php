
<div class="grid chart-grid">
    <div class="chart-container">
        <canvas id="myChart">

        </canvas>
    </div>

    <div class="chart-container bar-chart">
        <canvas id="chart2">

        </canvas>
    </div>


@push('scripts')
@vite(['resources/js/chart.js'])
@endpush


<style>
    .chart-grid{
        grid-template-columns: repeat(2,1fr);
        align-items: center
    }

    .chart-container{
        width: 65%
    }

    .bar-chart{
        width:80%;
    }
</style>


</div>


