<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Riwayat Penjualan</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Sukses!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Produk</th>
                        <th class="px-6 py-3 text-left">Jumlah</th>
                        <th class="px-6 py-3 text-left">Total Harga</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($sales as $i => $sale)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $i + 1 }}</td>
                            <td class="px-6 py-4">{{ $sale->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">{{ $sale->product->nama }}</td>
                            <td class="px-6 py-4">{{ $sale->jumlah }}</td>
                            <td class="px-6 py-4 text-blue-600 font-semibold">
                                Rp {{ number_format($sale->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('sales.destroy', $sale) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                                Belum ada riwayat penjualan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus data ini?',
                text: 'Data tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    e.target.submit();
                }
            });
            return false;
        }
    </script>
    @endpush
</x-app-layout>
