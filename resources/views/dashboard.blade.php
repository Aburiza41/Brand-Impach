<x-app-layout>
    <x-slot name="header">
        <div class="sm:px-4 lg:px-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <!-- Head -->
    <x-slot name="head">
        
    </x-slot>

    <!-- Foot -->
    <x-slot name="foot">
        

        {{-- Chart.js --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        {{-- Use Chart.js --}}
        <script>
            // BarChartData
            const barData = @json($BarChartData);

            // LineChartData
            const lineData = @json($LineChartData);
            
            // PieChartData
            const pieData = @json($PieChartData);

            // Chart
            const ctx = document.getElementById('myChartBar').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: barData.labels,
                    datasets: barData.datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart Line
            const ctxline = document.getElementById('myChartLine').getContext('2d');
            const myChartLine = new Chart(ctxline, {
                type: 'line',
                data: {
                    labels: lineData.labels,
                    datasets: lineData.datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart Pie
            const ctxpie = document.getElementById('myChartPie').getContext('2d');
            const myChartPie = new Chart(ctxpie, {
                type: 'pie',
                data: {
                    labels: pieData.labels,
                    datasets: pieData.datasets
                }
            });
        </script>
    </x-slot>
    
    <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <div class="w-full py-6 mx-auto sm:px-6 lg:px-8 shadow-sm">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 font-semibold text-xl text-gray-900 border-b-2">
                    {{ __("Tabel Data") }}
                </div>
                {{-- Table --}}
                <div class="p-6 sm:content">
                    <div class="relative overflow-x-auto">
                        <table class="table table-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            <thead class="table-header-group text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="table-row ">
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Whatapps
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Kota
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Prov
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Sumber
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Nama Iklan
                                    </th>
                                    <th scope="col" class="px-6 py-3 table-cell">
                                        Jam
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-row-group">
                                @foreach ($data as $index => $item)
                                    <tr class="table-row bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white table-cell">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->whatapps }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->kota }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->prov }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->sumber }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->nama_iklan }}
                                        </td>
                                        <td class="px-6 py-4 table-cell">
                                            {{ $item->created_at->format('H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination --}}
                <div class="p-6">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5 ">
                <div class="p-6 font-semibold text-xl text-gray-900 ">
                    {{ __("Chart Sumber") }}
                </div>
            </div>

            {{-- Flex 3 Col --}}
            <div class="grid lg:grid-cols-3 gap-4">
                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b-2">
                        <div class="text-gray-900">
                            <h2 class="text-xl font-semibold">Bar Chart</h2>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <canvas id="myChartBar" width="auto" height="auto"></canvas>
                    </div>
                </div>

                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b-2">
                        <div class="text-gray-900">
                            <h2 class="text-xl font-semibold">Line Chart</h2>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <canvas id="myChartLine" width="auto" height="auto"></canvas>
                    </div>
                </div>

                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b-2">
                        <div class="text-gray-900">
                            <h2 class="text-xl font-semibold">Pie Chart</h2>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        <canvas id="myChartPie" width="auto" height="auto"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
