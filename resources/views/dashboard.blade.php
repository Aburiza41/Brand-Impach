<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Head -->
    <x-slot name="head">
        {{-- Flowbite --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    </x-slot>

    <!-- Foot -->
    <x-slot name="foot">
        {{-- Flowbite --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

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
            const ctx = document.getElementById('myChart').getContext('2d');
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b-2">
                    {{ __("Tabel Data") }}
                </div>
                {{-- Table --}}
                <div class="p-6">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Whatapps
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kota
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Prov
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Sumber
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Iklan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jam
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->whatapps }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->kota }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->prov }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->sumber }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->nama_iklan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->created_at->format('H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5 ">
                <div class="p-6 text-gray-900 ">
                    {{ __("Chart") }}
                </div>
            </div>

            {{-- Flex 3 Col --}}
            <div class="grid grid-cols-3 gap-4">

                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <canvas id="myChart" width="auto" height="auto"></canvas>
                    </div>
                </div>

                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <canvas id="myChartLine" width="auto" height="auto"></canvas>
                    </div>
                </div>

                {{-- Card 1 --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <canvas id="myChartPie" width="auto" height="auto"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
