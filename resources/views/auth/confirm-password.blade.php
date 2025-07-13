<x-auth-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-2">Konfirmasi Password</h2>
        <p class="text-gray-300">Area aman aplikasi</p>
    </div>

    <div class="mb-6 p-4 bg-orange-500/20 border border-orange-500/30 rounded-lg text-orange-300 text-center">
        {{ __('Ini adalah area aman dari aplikasi. Mohon konfirmasi password Anda sebelum melanjutkan.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password -->
        <div class="group">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300 group-focus-within:text-orange-400 transition-colors" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-orange-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <x-text-input id="password" 
                             class="block mt-1 w-full pl-10 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 hover:bg-white/20"
                             type="password"
                             name="password"
                             required 
                             autocomplete="current-password"
                             placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button class="bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800">
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
