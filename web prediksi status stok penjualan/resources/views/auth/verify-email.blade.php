<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-white">
        <div class="max-w-md w-full px-6 py-12">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <div class="flex justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi Email</h2>
                <p class="text-gray-600">Silakan verifikasi alamat email Anda</p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-100">
                <div class="mb-4 text-sm text-gray-600">
                    Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik tautan yang kami kirimkan. Jika Anda tidak menerima email, kami akan dengan senang hati mengirimkan yang lain.
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                    </div>
                @endif

                <div class="mt-6 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-gray-600 hover:text-gray-500">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
