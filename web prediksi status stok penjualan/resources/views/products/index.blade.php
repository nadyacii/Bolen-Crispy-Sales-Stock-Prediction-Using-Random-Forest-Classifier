<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Produk</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        {{-- Tabel Produk --}}
        <div class="bg-white shadow-xl rounded-xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-800">
                <thead class="bg-gray-50">
                    {{-- Header Judul dan Tombol --}}
                    <tr>
                        <th colspan="5" class="px-6 py-5">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-semibold text-gray-700">📦 Daftar Produk</h3>
                                <a href="{{ route('products.create') }}"
                                   class="bg-blue-600 hover:bg-blue-500 text-white text-sm font-medium px-5 py-2 rounded-lg transition-all shadow">
                                    + Tambah Produk
                                </a>
                            </div>
                        </th>
                    </tr>
                    {{-- Header Kolom --}}
                    <tr class="text-xs text-left text-gray-600 uppercase tracking-wide">
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse ($products as $i => $product)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="px-6 py-4">{{ $i + 1 }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $product->nama }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-block text-xs font-medium rounded-full 
                                    {{ $product->stok <= 5 ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $product->stok }}
                                </span>
                            </td>
                            <td class="px-6 py-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('products.edit', $product) }}"
                                   class="text-yellow-500 hover:text-yellow-700 text-sm font-medium">✏️ Edit</a>
                                <a href="{{ route('products.add-stock', $product) }}"
                                   class="text-blue-500 hover:text-blue-700 text-sm font-medium">➕ Stok</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                      class="inline" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-500 hover:text-red-700 text-sm font-medium"
                                            title="Hapus">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-500 italic">
                                Tidak ada produk ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- SweetAlert2 --}}
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin menghapus produk ini?',
                    text: 'Tindakan ini tidak bisa dibatalkan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e3342f',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Hapus',
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
