
<div class="grid chart-grid">
    <div>
        <canvas id="myChart" width="200" height="200">

        </canvas>
    </div>

    <div>
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
</style>


</div>


