@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-orange-600 to-orange-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h1>
            <p class="text-lg text-orange-100">Kunjungi kami atau hubungi untuk pemesanan</p>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-900 mb-1">Alamat</h3>
                                <p class="text-gray-600">Jl. Lintas Timur, Pidoli Dolok,<br>Kec. Panyabungan, Kabupaten Mandailing Natal,<br>Sumatera Utara 22977</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-900 mb-1">Telepon</h3>
                                <p class="text-gray-600">0821-6266-0660</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-900 mb-1">Jam Operasional</h3>
                                <p class="text-gray-600">Setiap Hari</p>
                                <p class="text-gray-600">08:00 - 21:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-orange-100 p-3 rounded-full mr-4">
                                <i class="fab fa-whatsapp text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-900 mb-1">WhatsApp</h3>
                                <p class="text-gray-600 mb-2">Pesan makanan atau reservasi meja</p>
                                <a href="https://wa.me/6282162660660?text=Halo, saya ingin memesan makanan dari Pondok Paranginan 2" 
                                   target="_blank" 
                                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold transition-colors inline-flex items-center">
                                    <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-8">
                        <h3 class="font-semibold text-lg text-gray-900 mb-4">Ikuti Kami</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-facebook text-xl"></i>
                            </a>
                            <a href="#" class="bg-pink-600 hover:bg-pink-700 text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="bg-green-600 hover:bg-green-700 text-white p-3 rounded-full transition-colors">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Lokasi Kami</h2>
                    <div class="bg-gray-200 h-96 rounded-lg overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps?q=RHXC%2BQ8G%2C%20Jl.%20Lintas%20Timur%2C%20Pidoli%20Dolok%2C%20Kec.%20Panyabungan%2C%20Kabupaten%20Mandailing%20Natal%2C%20Sumatera%20Utara%2022977&output=embed"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">*Peta menunjukkan lokasi perkiraan. Silakan hubungi kami untuk petunjuk arah yang lebih detail.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Pertanyaan Umum</h2>
                <p class="text-lg text-gray-600">Beberapa pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-900 mb-3">Apakah tersedia delivery?</h3>
                    <p class="text-gray-600">Ya, kami menyediakan layanan delivery untuk area tertentu. Silakan hubungi kami untuk informasi lebih lanjut.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-900 mb-3">Apakah bisa reservasi meja?</h3>
                    <p class="text-gray-600">Tentu! Anda bisa reservasi meja melalui WhatsApp atau telepon kami minimal 1 jam sebelum kedatangan.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-900 mb-3">Apakah ada menu vegetarian?</h3>
                    <p class="text-gray-600">Ya, kami menyediakan beberapa menu vegetarian. Silakan tanyakan kepada pelayan untuk rekomendasi menu.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-semibold text-lg text-gray-900 mb-3">Apakah ada parkir?</h3>
                    <p class="text-gray-600">Ya, kami menyediakan area parkir yang luas dan aman untuk kendaraan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 bg-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Siap Mengunjungi Kami?</h2>
            <p class="text-lg mb-6 text-orange-100">Pesan sekarang atau kunjungi kami untuk pengalaman makan yang tak terlupakan</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('menu') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </a>
                <a href="{{ route('menu') }}" class="bg-white text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-utensils mr-2"></i>Lihat Menu
                </a>
            </div>
        </div>
    </section>

@endsection 