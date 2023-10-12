<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-xl">
    <h1 class="text-2xl font-semibold mb-4">Logistic Equation Calculator</h1>
    <form class="space-y-4">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Initial Population
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" wire:model="initialPopulation" placeholder="Initial Population">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Growth Rate
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" wire:model="growthRate" placeholder="Growth Rate">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Carrying Capacity
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" wire:model="carryingCapacity" placeholder="Carrying Capacity">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    iterations

                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    type="number" wire:model="iterations" placeholder="iterations">
            </div>
        </div>
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            wire:click="calculate" type="button">
            Calculate
        </button>
    </form>

    <!-- Results Section -->
    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Results:</h2>
        <div class="bg-gray-100 p-4 rounded-lg">
            <div class="flex justify-between mb-2">
                <span class="font-medium text-gray-700">Calculated Population:</span>
                <span class="text-gray-700">{{ end($answer) }}</span>
            </div>
            <!-- Add more calculated results here -->

        </div>
    </div>

    <div class="mt-8">
        <canvas id="logisticGraph" width="400" height="200"></canvas>
    </div>

    <!-- Add a place to display the graph and/or results here -->
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let ctx = document.getElementById('logisticGraph').getContext('2d');
        let logisticGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Population',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },


        });

        Livewire.on('updateLogisticGraph', (newData) => {
            logisticGraph.data.labels = newData.labels;
            logisticGraph.data.datasets[0].data = newData.data;
            logisticGraph.update();

        });
    });
</script>
