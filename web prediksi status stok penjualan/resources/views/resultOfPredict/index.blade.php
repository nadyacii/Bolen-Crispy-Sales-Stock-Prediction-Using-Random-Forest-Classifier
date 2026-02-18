<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">📊 Klasifikasi Produk</h2>
    </x-slot>

    <div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- FORM INPUT --}}
        <div class="mb-8 bg-gray-50 p-6 rounded-xl shadow-md border border-gray-200">
            <h4 class="text-2xl font-bold text-gray-700 mb-5 flex items-center"><span class="mr-2">📝</span>Tambah Data
            </h4>

            <form id="predictForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Tanggal --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">📅 Tanggal (yyyy-mm-dd)</label>
                    <input type="date" name="tanggal" required
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Hari --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">📆 Hari</label>
                    <select name="hari" required id="hari"
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jumat</option>
                        <option value="6">Sabtu</option>
                        <option value="7">Minggu</option>
                    </select>
                </div>

                {{-- Nama Produk --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">📦 Nama Produk</label>
                    <select name="nama_produk" id="nama_produk" required
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">Bolen Banana</option>
                        <option value="1">Bolen Cokju (Mini)</option>
                        <option value="2">Bolen Coklat</option>
                        <option value="3">Bolen Coklat Keju</option>
                        <option value="4">Bolen Keju Mini</option>
                        <option value="5">Bolen Pisang Coklat</option>
                        <option value="6">Bolen Proltape</option>
                    </select>
                </div>

                {{-- Harga Satuan --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">💰 Harga Satuan</label>
                    <input type="number" name="harga_satuan" id="harga_satuan" readonly required
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm bg-gray-100">
                </div>

                {{-- Stok Produk --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">📦 Stok Produk</label>
                    <input type="number" name="stok_produk" required
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Jumlah Terjual --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-600">📈 Jumlah Terjual</label>
                    <input type="number" name="jumlah_terjual" required
                        class="mt-2 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="md:col-span-2 mt-4">
                    <button type="submit"
                        class="w-full py-3 text-lg font-bold bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-lg shadow hover:from-blue-600 hover:to-blue-800">
                        🚀 Simpan & Prediksi
                    </button>
                </div>
            </form>
        </div>

        {{-- TABEL --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden p-5">
            <h4 class="text-2xl font-extrabold text-gray-800">📃 Riwayat Hasil Klasifikasi Stok</h4>
            <table id="salesTable" class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-200 text-sm uppercase text-gray-700">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Stok Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Harga</th>
                        <th>Status Stok</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const dayMap = {
                    0: 7,
                    1: 1,
                    2: 2,
                    3: 3,
                    4: 4,
                    5: 5,
                    6: 6
                };

                const productMap = {
                    1: 0, // Senin -> Bolen Banana
                    2: 6, // Selasa -> Bolen Proltape
                    3: 3, // Rabu -> Bolen Coklat Keju
                    4: 1, // Kamis -> Bolen Cokju (Mini)
                    5: 4, // Jumat -> Bolen Keju Mini
                    6: 5, // Sabtu -> Bolen Pisang Coklat
                    7: 2 // Minggu -> Bolen Coklat
                };

                const hargaProduk = {
                    0: 23000,
                    1: 12000,
                    2: 23000,
                    3: 12000,
                    4: 12000,
                    5: 23000,
                    6: 23000
                };

                $('input[name="tanggal"]').on('change', function() {
                    const selectedDate = new Date($(this).val());
                    const dayOfWeek = selectedDate.getDay(); // 0-6
                    const hariValue = dayMap[dayOfWeek];

                    // Set Hari
                    let hari = $('#hari').val(hariValue);

                    // Set Nama Produk by Hari
                    const produkValue = productMap[hariValue];
                    $('#nama_produk').val(produkValue);

                    // Set Harga by Produk
                    $('#harga_satuan').val(hargaProduk[produkValue]);
                });

                $('#nama_produk').on('change', function() {
                    let produkId = $(this).val();
                    $('#harga_satuan').val(hargaProduk[produkId]);
                }).trigger('change');


                // Init DataTable
                const table = $('#salesTable').DataTable({
                    ajax: {
                        url: '{{ route('resultOfClassification.getAllData') }}',
                        type: 'GET',
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Memuat Data...',
                                text: 'Mohon tunggu...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(data) {
                            Swal.close();
                            table.clear().rows.add(data.data).draw();
                        },
                        error: function(xhr) {
                            Swal.close();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Memuat Data',
                                text: xhr.responseJSON ? xhr.responseJSON.message :
                                    'Terjadi kesalahan.'
                            });
                        }
                    },
                    columns: [{
                            data: 'no'
                        },
                        {
                            data: 'tanggal'
                        },
                        {
                            data: 'hari'
                        },
                        {
                            data: 'nama_produk'
                        },
                        {
                            data: 'harga_satuan'
                        },
                        {
                            data: 'stok_produk'
                        },
                        {
                            data: 'jumlah_terjual'
                        },
                        {
                            data: 'total_harga'
                        },
                        {
                            data: 'status_stock'
                        }
                    ],
                    language: {
                        search: "Cari:",
                        lengthMenu: "",
                        info: "Menampilkan _START_ sampai _END_ dari total _TOTAL_ entri",
                        infoEmpty: "Menampilkan 0 sampai 0 dari total 0 entri",
                        infoFiltered: "(difilter dari total _MAX_ entri)",
                        loadingRecords: "Memuat data...",
                        zeroRecords: "Tidak ada data yang cocok ditemukan",
                        emptyTable: "Tidak ada data di tabel ini",
                        paginate: {
                            first: "Pertama",
                            last: "Terakhir",
                            next: "Selanjutnya",
                            previous: "Sebelumnya"
                        }
                    }
                });

                // FORM SUBMIT
                $('#predictForm').submit(function(e) {
                    e.preventDefault();

                    const userDate = new Date($('input[name="tanggal"]').val());
                    const startDate = new Date('2021-01-08');
                    const diffTime = userDate - startDate;
                    const daysSinceStart = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    const payload = {
                        tanggal: daysSinceStart,
                        hari: parseInt($('select[name="hari"]').val()),
                        nama_produk: parseInt($('#nama_produk').val()),
                        harga_satuan: parseInt($('#harga_satuan').val()),
                        stok_produk: parseInt($('input[name="stok_produk"]').val()),
                        jumlah_terjual: parseInt($('input[name="jumlah_terjual"]').val())
                    };

                    $.ajax({
                        url: '{{ route('resultOfClassification.store') }}',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(payload),
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Memproses Prediksi...',
                                text: 'Mohon tunggu...',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                        },
                        success: function(response) {
                            Swal.close();
                            Swal.fire({
                                title: '<span style="font-size:1.5rem;font-weight:bold;color:#2563eb;">Hasil Prediksi</span>',
                                html: `
                                    <div style="padding:10px 0; text-align:center;">
                                        <div style="font-size:2.5rem; margin-bottom:10px;">
                                            <img src="${
                                                response.data.prediction === 'normal'
                                                    ? 'https://i.pinimg.com/originals/6e/4d/e4/6e4de4dec52570ccd6e6f2a13df27634.gif' // green check
                                                    : response.data.prediction === 'understock'
                                                        ? 'https://i.pinimg.com/originals/7c/b4/e2/7cb4e293e473406fbdcc00c89e747029.gif' // yellow warning
                                                        : 'https://i.pinimg.com/originals/f9/7c/09/f97c09ab346f1f7d8dc740ca3007cf1b.gif' // red cross
                                            }" alt="Status" style="width:50%;display:inline-block;vertical-align:middle;">
                                        </div>
                                        <div style="font-size:1.2rem;margin-bottom:8px;">
                                            <span style="font-weight:600;color:#374151;">Status Prediksi Stok:</span>
                                            <span style="font-weight:bold;color:#10b981;">${response.data.prediction}</span>
                                        </div>
                                        <div style="height:16px;"></div>
                                       <div style="display:inline-block;text-align:left;margin:12px auto;">
                                            <table style="background:rgba(255,255,255,0.5);border-radius:8px;padding:8px 160px;">
                                                <tr>
                                                    <td style="color:#6b7280;">Akurasi:</td>
                                                    <td style="padding-left: 12px;"><b style="color:#2563eb;">${response.data.accuracy}%</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#6b7280;">Presisi:</td>
                                                    <td style="padding-left: 12px;"><b style="color:#2563eb;">${response.data.precision}%</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#6b7280;">Recall:</td>
                                                    <td style="padding-left: 12px;"><b style="color:#2563eb;">${response.data.recall}%</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:#6b7280;">F1 Score:</td>
                                                    <td style="padding-left: 12px;"><b style="color:#2563eb;">${response.data.F1_score}%</b></td>
                                                </tr>
                                            </table>
                                    </div>
                                        <div style="margin-top:12px;font-style:italic;color:#64748b;">
                                            ${response.message}
                                        </div>
                                    </div>
                                `,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    table.ajax.reload();
                                    $('#predictForm')[0].reset();
                                    $('#nama_produk').trigger(
                                        'change'); // Biar harga auto set lagi
                                }
                            });
                        },
                        error: function(xhr) {
                            Swal.close();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Mengirim Data',
                                text: xhr.responseJSON ? xhr.responseJSON.message :
                                    'Terjadi kesalahan.'
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
