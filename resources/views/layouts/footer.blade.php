<footer class="bg-gray-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-orange-500/10 to-transparent"></div>
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-orange-500/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-orange-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Restaurant Info -->
            <div class="col-span-1 md:col-span-2 space-y-6">
                <div class="group">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="relative">
                            <i class="fas fa-utensils text-2xl text-orange-500 transform group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute -inset-2 bg-orange-500/20 rounded-full blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">
                            Pondok Paranginan 2
                        </span>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed animate-fade-in">
                        Menyajikan hidangan tradisional Indonesia dengan cita rasa autentik dan suasana yang nyaman untuk keluarga Anda.
                    </p>
                </div>

                <!-- Social Media -->
                <div class="flex space-x-4">
                    <a href="#" class="group relative">
                        <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700 group-hover:border-orange-500 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-orange-500/25">
                            <i class="fab fa-facebook text-lg text-gray-400 group-hover:text-orange-500 transition-colors duration-300"></i>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-sm"></div>
                    </a>
                    <a href="#" class="group relative">
                        <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700 group-hover:border-orange-500 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-orange-500/25">
                            <i class="fab fa-instagram text-lg text-gray-400 group-hover:text-orange-500 transition-colors duration-300"></i>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-sm"></div>
                    </a>
                    <a href="#" class="group relative">
                        <div class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center border border-gray-700 group-hover:border-orange-500 transition-all duration-300 group-hover:shadow-lg group-hover:shadow-orange-500/25">
                            <i class="fab fa-whatsapp text-lg text-gray-400 group-hover:text-orange-500 transition-colors duration-300"></i>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-sm"></div>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold mb-4 relative">
                    <span class="relative z-10">Menu Cepat</span>
                    <div class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-orange-500 to-orange-600"></div>
                </h3>
                <ul class="space-y-3">
                    <li class="group">
                        <a href="{{ route('home') }}" class="flex items-center text-gray-300 hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2">
                            <i class="fas fa-chevron-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="group">
                        <a href="{{ route('menu') }}" class="flex items-center text-gray-300 hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2">
                            <i class="fas fa-chevron-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            <span>Menu</span>
                        </a>
                    </li>
                    <li class="group">
                        <a href="{{ route('gallery') }}" class="flex items-center text-gray-300 hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2">
                            <i class="fas fa-chevron-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            <span>Galeri</span>
                        </a>
                    </li>
                    <li class="group">
                        <a href="{{ route('contact') }}" class="flex items-center text-gray-300 hover:text-orange-500 transition-all duration-300 group-hover:translate-x-2">
                            <i class="fas fa-chevron-right text-xs mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold mb-4 relative">
                    <span class="relative z-10">Kontak</span>
                    <div class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-orange-500 to-orange-600"></div>
                </h3>
                <div class="space-y-4 text-gray-300">
                    <div class="flex items-start group hover:text-orange-500 transition-colors duration-300">
                        <div class="flex-shrink-0 w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/10 transition-colors duration-300">
                            <i class="fas fa-map-marker-alt text-orange-500 group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <span class="text-sm leading-relaxed">Jl. Lintas Timur, Pidoli Dolok, Kec. Panyabungan, Kabupaten Mandailing Natal, Sumatera Utara 22977</span>
                    </div>
                    <div class="flex items-center group hover:text-orange-500 transition-colors duration-300">
                        <div class="flex-shrink-0 w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/10 transition-colors duration-300">
                            <i class="fas fa-phone text-orange-500 group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <span>0821-6266-0660</span>
                    </div>
                    <div class="flex items-center group hover:text-orange-500 transition-colors duration-300">
                        <div class="flex-shrink-0 w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-500/10 transition-colors duration-300">
                            <i class="fas fa-clock text-orange-500 group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <span>08:00 - 21:00 (Setiap Hari)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="border-t border-gray-800/50 mt-12 pt-8 text-center relative">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-orange-500/5 to-transparent h-px top-0"></div>
            <p class="text-gray-400 hover:text-gray-300 transition-colors duration-300">
                &copy; {{ date('Y') }} Rumah Makan Pondok Paranginan 2. All rights reserved.
            </p>
        </div>
    </div>
</footer>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

/* Smooth scroll behavior */
html {
    scroll-behavior: smooth;
}

/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #1f2937;
}

::-webkit-scrollbar-thumb {
    background: #374151;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #f97316;
}
</style>