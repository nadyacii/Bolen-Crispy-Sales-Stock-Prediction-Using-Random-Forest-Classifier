<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stok Bolen - Prediksi Penjualan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Animasi Gradient Hero */
        .hero-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            background-size: 200% 200%;
            animation: gradient 10s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Efek Kartu Fitur */
        .feature-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
    <!-- Navbar Modern -->
    <!-- Modern Blue Navbar for Roti Bolen -->
    <header class="bg-white/90 backdrop-blur-sm shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
            <!-- Logo Group -->
            <div class="flex items-center space-x-3">
                <!-- Bread/Pastry Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                        clip-rule="evenodd" />
                </svg>

                <!-- Brand Name -->
                <div>
                    <h3 class="text-xl font-bold">Bolen<span class="text-blue-400">Crispy</span></h3>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#beranda"
                    class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 relative group">
                    Beranda
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#tentang"
                    class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 relative group">
                    Tentang
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#fitur"
                    class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200 relative group">
                    Fitur
                    <span
                        class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </nav>

            <!-- Auth Buttons -->
            <div class="flex items-center space-x-4">
                <a href="/login"
                    class="text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors hidden md:block">
                    Masuk
                </a>
                <a href="/register"
                    class="text-sm font-medium bg-gradient-to-r from-blue-600 to-blue-500 text-white px-4 py-2 rounded-full shadow-sm hover:shadow-md transition-all duration-200 hover:from-blue-700 hover:to-blue-600">
                    Daftar
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section Modern -->
    <section id="beranda"
        class="bg-gradient-to-br from-blue-700 to-blue-500 text-white min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h1 class="text-3xl md:text-4xl font-bold leading-tight">Prediksi Status Stok Bolen Crispy</h1>
                <p class="text-lg text-justify opacity-90">Dengan bantuan algoritma <strong>Random Forest
                        Classifier</strong>, sistem
                    ini dapat membantu memprediksi status stok (Normal, Overstock, Understock) dan mendukung pengambilan
                    keputusan produksi lebih cerdas.</p>
                <div class="flex space-x-4">
                    <a href="/register"
                        class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-xl hover:bg-blue-100 transition">Mulai
                        Sekarang</a>
                    <a href="#fitur"
                        class="border border-white px-6 py-3 rounded-xl hover:bg-white hover:text-blue-700 transition">Lihat
                        Fitur</a>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="text-center py-10">
                    <img src="{{ asset('images/gambar 1.webp') }}" alt="Bolen Crispy"
                        class="w-full max-w-xl mx-auto rounded-xl shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Sistem -->
    <section id="tentang" class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block text-blue-600 text-xl font-bold mb-3">Tentang Model RFC</span>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Sistem Klasifikasi Produk Menggunakan Model Random
                    Forest Classifier</h2>
                <p class="text-gray-600 max-w-4xl mx-auto">
                    Solusi berbasis machine learning untuk membantu UMKM Bolen Crispy dalam memprediksi status stok dan
                    mengambil keputusan produksi yang lebih tepat dan efisien.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Teknologi Random Forest Classifier</h3>
                            <p class="text-gray-600 text-justify">Algoritma machine learning yang akurat untuk
                                klasifikasi produk
                                penjualan harian berdasarkan data historis.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Prediksi Status Stok</h3>
                            <p class="text-gray-600 text-justify">Model machine learning Random Forest Classifier
                                memproses data
                                penjualan terkini untuk memprediksi apakah stok produk berada dalam kondisi normal,
                                overstock, atau understock.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-100 p-3 rounded-full"> <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 17h3V7H3v10zm6 0h3V4H9v13zm6 0h3V10h-3v7zm6 0h3V13h-3v4z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Monitoring Riwayat Prediksi</h3>
                            <p class="text-gray-600 text-justify">Melacak dan menampilkan seluruh riwayat prediksi
                                status stok yang
                                telah dilakukan sebelumnya. Data ini membantu dalam analisis performa penjualan dan
                                pengambilan keputusan restock secara lebih akurat.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-8 rounded-xl border border-gray-200 shadow-sm">
                    <img src="https://net-informations.com/ds/mla/img/random_forest.png" alt="rfc"
                        class="w-full h-auto rounded-lg shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section id="fitur" class="py-10 bg-blue-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block text-blue-600 text-xl font-bold mb-3">Fitur Website</span>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Fitur-Fitur Cerdas untuk Prediksi Stok Akurat</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Semua yang Anda butuhkan untuk memprediksi status stok dan membantu pengambilan keputusan produksi
                    Bolen Crispy secara lebih cerdas dan efisien.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Fitur 1 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor"
                                fill="none" />
                            <circle cx="12" cy="12" r="6" stroke-width="2" stroke="currentColor"
                                fill="none" />
                            <circle cx="12" cy="12" r="2" stroke-width="2" stroke="currentColor"
                                fill="none" />
                            <line x1="12" y1="2" x2="12" y2="6" stroke-width="2"
                                stroke="currentColor" />
                            <line x1="12" y1="18" x2="12" y2="22" stroke-width="2"
                                stroke="currentColor" />
                            <line x1="2" y1="12" x2="6" y2="12" stroke-width="2"
                                stroke="currentColor" />
                            <line x1="18" y1="12" x2="22" y2="12" stroke-width="2"
                                stroke="currentColor" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Akurasi Model Tinggi</h3>
                    <p class="text-gray-600">Menghasilkan prediksi status stok dengan tingkat akurasi di atas 85%
                        berdasarkan data historis penjualan Bolen Crispy.</p>
                </div>
                <!-- Fitur 2 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 17h3V7H3v10zm6 0h3V4H9v13zm6 0h3V10h-3v7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Prediksi Status Stok</h3>
                    <p class="text-gray-600">Prediksi apakah stok berada dalam kondisi normal, overstock, atau
                        understock menggunakan model machine learning Random Forest Classifier.</p>
                </div>
                <!-- Fitur 3 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Riwayat Prediksi</h3>
                    <p class="text-gray-600">Semua hasil prediksi sebelumnya tersimpan dalam database dan bisa diakses
                        kapan saja untuk analisis performa stok.</p>
                </div>
                <!-- Fitur 4 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="4" y="7" width="16" height="13" rx="2" stroke-width="2"
                                stroke="currentColor" fill="none" />
                            <path stroke="currentColor" stroke-width="2" d="M9 7V5a3 3 0 0 1 6 0v2" />
                            <circle cx="9" cy="14" r="1.5" fill="currentColor" />
                            <circle cx="15" cy="14" r="1.5" fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Manajemen Data Produk</h3>
                    <p class="text-gray-600">Kelola daftar produk Bolen Crispy mulai dari nama, harga satuan, dan stok.
                        Memudahkan proses update atau penambahan varian baru.</p>
                </div>
                <!-- Fitur 5 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <rect x="3" y="5" width="18" height="16" rx="2" stroke-width="2"
                                stroke="currentColor" fill="none" />
                            <path stroke="currentColor" stroke-width="2" d="M16 3v4M8 3v4M3 9h18" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Riwayat Penjualan Harian</h3>
                    <p class="text-gray-600">Melihat dan memonitor seluruh data penjualan harian yang telah tercatat.
                        Mempermudah dalam analisis tren penjualan dan stok.</p>
                </div>
                <!-- Fitur 6 -->
                <div class="feature-card bg-white p-6 rounded-xl border border-gray-200">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" d="M11 3.055A9 9 0 1021 12h-9V3.055z" />
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" d="M20.488 9H13V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Monitoring Performa Model</h3>
                    <p class="text-gray-600">Pantau performa model machine learning secara berkala dengan metrik
                        seperti akurasi, precision, recall, dan F1 Score untuk memastikan kualitas prediksi tetap
                        optimal.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white py-4">
        <div class="max-w-7xl mx-auto px-6 flex flex-row justify-between gap-8">
            <!-- Kolom 1 -->
            <div class="max-w-md items-center gap-2 mb-4">
                <div class="flex items-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="text-xl font-bold">Bolen<span class="text-blue-400">Crispy</span></h3>
                </div>
                <p class="text-gray-400 text-justify text-sm">
                    Dengan bantuan algoritma <strong>Random Forest Classifier</strong>, sistem
                    ini dapat membantu memprediksi status stok (Normal, Overstock, Understock) dan mendukung pengambilan
                    keputusan produksi lebih cerdas.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z">
                            </path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Kontak Kami</h4>
                <address class="text-gray-400 not-italic">
                    <p class="mb-2">Jl. Serang Banten No. 123</p>
                    <p class="mb-2">Email: info@bolenai.com</p>
                    <p class="mb-2">Telp: +62 838 1264 9574</p>
                    <p>Jam Operasional: 08.00 - 17.00 WIB</p>
                </address>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-12 pt-2 text-center text-gray-500 text-sm">
            <p>&copy; 2025 Bolen. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
