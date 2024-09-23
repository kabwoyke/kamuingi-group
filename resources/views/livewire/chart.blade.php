
<div wire:ignore>
    <canvas id="myChart"></canvas>
<h2>gello</h2>
@push('scripts')
@vite(['resources/js/chart.js'])
@endpush
<script>
    // window.Livewire.hook('component.initialized', (component) => {
    //     // Runs when the component is initialized
    //     console.log(component)
    // });

   
    // console.log(window);
</script>

</div>


