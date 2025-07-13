<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Terima kasih telah bergabung dengan Pondok Paranginan 2.</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('menu') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <i class="fas fa-utensils text-2xl text-orange-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Lihat Menu</p>
                                <p class="text-sm text-gray-600">Jelajahi menu kami</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('gallery') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-images text-2xl text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Galeri Foto</p>
                                <p class="text-sm text-gray-600">Lihat suasana kami</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('contact') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Lokasi</p>
                                <p class="text-sm text-gray-600">Temukan kami</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="https://wa.me/6285248507938?text=Halo, saya ingin memesan makanan dari Pondok Paranginan 2" 
                   target="_blank" 
                   class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fab fa-whatsapp text-2xl text-green-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Pesan</p>
                                <p class="text-sm text-gray-600">Via WhatsApp</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Restaurant Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-info-circle mr-2 text-orange-600"></i>
                        Informasi Pondok Paranginan 2
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Jam Operasional</h4>
                            <p class="text-gray-600">Senin - Minggu: 08:00 - 22:00 WIB</p>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Layanan</h4>
                            <p class="text-gray-600">Dine-in, Take away, Delivery</p>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Alamat</h4>
                            <p class="text-gray-600">Jl. Paranginan No. 2, Kecamatan Paranginan</p>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-900 mb-2">Kontak</h4>
                            <p class="text-gray-600">+62 812-3456-7890</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 