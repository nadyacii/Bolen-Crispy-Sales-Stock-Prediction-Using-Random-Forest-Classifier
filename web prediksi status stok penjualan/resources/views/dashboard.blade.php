<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard Penjualan</h2>
    </x-slot>

    <div class="py-10 px-6 max-w-6xl mx-auto space-y-8">
        <!-- Ringkasan Angka -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow-md rounded-xl p-6 text-center border-b-4 border-yellow-400">
                <p class="text-sm text-gray-500">Jumlah Produk</p>
                <h3 class="text-2xl font-bold text-gray-700">{{ $totalProduk }}</h3>
            </div>
            <div class="bg-white shadow-md rounded-xl p-6 text-center border-b-4 border-blue-400">
                <p class="text-sm text-gray-500">Total Penjualan</p>
                <h3 class="text-2xl font-bold text-gray-700">Rp {{ number_format($totalPenjualan) }}</h3>
            </div>
        </div>

        <!-- Grafik Penjualan -->
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Grafik Penjualan (7 Hari Terakhir)</h3>
            <canvas id="salesChart" height="120"></canvas>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Total Penjualan',
                        data: @json($data),
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
