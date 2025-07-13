<x-auth-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-2">Verifikasi Email</h2>
        <p class="text-gray-300">Langkah terakhir untuk menyelesaikan pendaftaran</p>
    </div>

    <div class="mb-6 p-4 bg-orange-500/20 border border-orange-500/30 rounded-lg text-orange-300 text-center">
        {{ __('Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan mengklik link yang baru saja kami kirim. Jika Anda tidak menerima email, kami akan dengan senang hati mengirimkan yang lain.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-lg text-green-300 text-center">
            {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
        </div>
    @endif

    <div class="flex items-center justify-between mt-6">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800">
                {{ __('Kirim Ulang Email Verifikasi') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-red-400 hover:text-red-300 transition-colors underline">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-auth-layout>
