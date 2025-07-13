@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-orange-600 to-orange-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Galeri Foto</h1>
            <p class="text-lg text-orange-100">Lihat suasana dan hidangan lezat di Pondok Paranginan 2</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galleries as $gallery)
                        <a href="{{ route('gallery.show', $gallery->id) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow focus:outline-none focus:ring-2 focus:ring-orange-500">
                            @if($gallery->image)
                                <div class="h-64 bg-gray-200 overflow-hidden">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" 
                                         alt="{{ $gallery->title ?? 'Galeri Foto' }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-64 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-gray-400"></i>
                                </div>
                            @endif
                            
                            @if($gallery->title)
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-gray-900">{{ $gallery->title }}</h3>
                                    @if($gallery->description)
                                        <p class="text-gray-600 mt-2">{{ $gallery->description }}</p>
                                    @endif
                                </div>
                            @endif
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-images text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Galeri Belum Tersedia</h3>
                    <p class="text-gray-600">Foto-foto akan segera ditambahkan. Silakan cek kembali nanti.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Restaurant Info Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Suasana Pondok Paranginan 2</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Nikmati suasana yang nyaman dan bersih di Pondok Paranginan 2. Kami menyediakan tempat makan yang ideal untuk keluarga, teman, atau acara khusus Anda.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-gray-700">Suasana yang nyaman dan bersih</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-gray-700">Kapasitas untuk kelompok besar</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-gray-700">Parkir yang luas dan aman</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span class="text-gray-700">Pelayanan yang ramah dan cepat</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-200 h-96 rounded-lg flex items-center justify-center">
                    <i class="fas fa-store text-6xl text-gray-400"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 bg-orange-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold mb-4">Ingin Mengunjungi Kami?</h2>
            <p class="text-lg mb-6 text-orange-100">Reservasi meja atau pesan makanan untuk dibawa pulang</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('menu') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </a>
                <a href="{{ route('contact') }}" class="bg-white text-orange-600 hover:bg-orange-50 px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
                    <i class="fas fa-map-marker-alt mr-2"></i>Lihat Lokasi
                </a>
            </div>
        </div>
    </section>

@endsection 