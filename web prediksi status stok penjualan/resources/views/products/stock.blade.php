<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Stok Produk</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10 px-6">
        <div class="bg-white shadow-xl border border-gray-100 rounded-xl p-10 space-y-6">
            <form action="{{ route('products.update-stock', $product) }}" method="POST" class="space-y-6">
                @csrf

                <p class="text-gray-500 text-sm mb-4">
                    Masukkan jumlah stok tambahan untuk produk <strong>{{ $product->nama }}</strong>.
                </p>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        📦 Tambah Jumlah Stok
                    </label>
                    <input type="number" name="stok" min="1" required placeholder="Contoh: 5"
                        class="w-full bg-gray-50 px-4 py-2.5 border border-gray-300 rounded-lg
                        placeholder-gray-500 text-[15px] focus:outline-none focus:ring-2
                        focus:ring-blue-500 focus:border-blue-500 transition shadow-sm focus:shadow-md">
                </div>

                <div class="pt-6 flex justify-end space-x-4">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center gap-2 bg-sky-200 hover:bg-sky-300 text-sky-800 font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
                        ❌ Batal
                    </a>

                    <button type="submit"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold px-6 py-2.5 rounded-lg shadow-sm transition">
                        ➕ Tambah Stok
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
