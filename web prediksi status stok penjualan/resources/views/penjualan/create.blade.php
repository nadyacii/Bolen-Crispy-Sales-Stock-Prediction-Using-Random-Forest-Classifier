<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Transaksi Penjualan</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 px-6">
        <div class="bg-white shadow-lg rounded-xl p-10">
            <p class="text-gray-600 mb-6">Silakan isi data penjualan dengan lengkap dan benar.</p>

            <form action="{{ route('penjualan.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Pilih Produk -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">🛒 Pilih Produk</label>
                    <select name="product_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option disabled selected>Pilih produk...</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">
                                {{ $product->nama }} (Stok: {{ $product->stok }}) - Rp {{ number_format($product->harga) }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">🔢 Jumlah</label>
                    <input type="number" name="jumlah" min="1" placeholder="Masukkan jumlah pembelian"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('jumlah')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Aksi -->
                <div class="pt-6 flex justify-end gap-4">
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-2 bg-sky-200 text-sky-800 rounded-lg font-medium hover:bg-sky-300 transition">
                        ❌ Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition font-semibold">
                        💾 Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
