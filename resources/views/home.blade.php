@extends('layouts.app')

@section('content')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-scale-in {
        animation: scaleIn 0.8s ease-out forwards;
    }

    .animate-delay-200 {
        animation-delay: 0.2s;
    }

    .animate-delay-400 {
        animation-delay: 0.4s;
    }

    .animate-delay-600 {
        animation-delay: 0.6s;
    }

    .animate-delay-800 {
        animation-delay: 0.8s;
    }

    .glass-effect {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .btn-modern {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .parallax-bg {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .gradient-text {
        background: linear-gradient(135deg, #ea580c, #f97316);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-fade {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s ease-out;
    }

    .section-fade.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .floating-card {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .menu-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid #e2e8f0;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .menu-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        border-color: #f97316;
    }

    .icon-bounce {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }

    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-pattern {
        background-image: radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                         radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    }
</style>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800 text-white overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 hero-pattern opacity-30"></div>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black opacity-40"></div>
    
    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in-up opacity-0">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-shadow">
                Selamat Datang di<br>
                <span class="gradient-text bg-gradient-to-r from-orange-300 to-yellow-300 bg-clip-text text-transparent">
                    Pondok Paranginan 2
                </span>
            </h1>
        </div>
        
        <div class="animate-fade-in-up opacity-0 animate-delay-200">
            <p class="text-xl md:text-2xl mb-8 text-orange-100 max-w-3xl mx-auto leading-relaxed">
                Nikmati hidangan tradisional Indonesia dengan cita rasa autentik yang menggugah selera
            </p>
        </div>
        
        <div class="animate-fade-in-up opacity-0 animate-delay-400">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('menu') }}" class="btn-modern bg-white text-orange-600 hover:bg-orange-50 px-8 py-4 rounded-xl font-semibold transition-all duration-300 inline-flex items-center justify-center shadow-lg">
                    <i class="fas fa-utensils mr-2"></i>Lihat Menu
                </a>
                <a href="{{ route('menu') }}" class="btn-modern glass-effect text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 inline-flex items-center justify-center border border-white/20">
                    <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
                </a>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white section-fade">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Mengapa Memilih <span class="gradient-text">Kami?</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Kami berkomitmen memberikan pengalaman kuliner terbaik dengan standar kualitas tinggi
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center floating-card">
                <div class="bg-gradient-to-br from-orange-100 to-orange-200 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-utensils text-3xl text-orange-600 icon-bounce"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Cita Rasa Autentik</h3>
                <p class="text-gray-600 leading-relaxed">
                    Hidangan tradisional Indonesia dengan resep turun-temurun yang terjaga keasliannya dan cita rasa yang tak terlupakan.
                </p>
            </div>
            
            <div class="text-center floating-card animate-delay-200">
                <div class="bg-gradient-to-br from-green-100 to-green-200 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-leaf text-3xl text-green-600 icon-bounce"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Bahan Berkualitas</h3>
                <p class="text-gray-600 leading-relaxed">
                    Menggunakan bahan-bahan segar dan berkualitas tinggi yang dipilih secara khusus untuk setiap hidangan.
                </p>
            </div>
            
            <div class="text-center floating-card animate-delay-400">
                <div class="bg-gradient-to-br from-blue-100 to-blue-200 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-home text-3xl text-blue-600 icon-bounce"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Suasana Nyaman</h3>
                <p class="text-gray-600 leading-relaxed">
                    Tempat makan yang nyaman, bersih, dan hangat untuk menikmati hidangan bersama keluarga tercinta.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Menu Preview Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100 section-fade">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Menu <span class="gradient-text">Favorit</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Hidangan-hidangan terpopuler yang paling disukai oleh pelanggan kami
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($favoriteMenus as $menu)
                <div class="menu-card rounded-2xl shadow-lg overflow-hidden card-hover">
                    <div class="h-56 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center overflow-hidden relative">
                        @if($menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                        @else
                            <div class="text-center">
                                <i class="fas fa-image text-5xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500 text-sm">No Image</p>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2">
                            <i class="fas fa-heart text-red-500"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-gray-900 mb-3">{{ $menu->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $menu->description }}</p>
                        <div class="flex justify-between items-center">
                            <p class="text-orange-600 font-bold text-lg">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </p>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-heart text-red-500 mr-1"></i>
                                <span>{{ $menu->favorited_by_count ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12">
                    <i class="fas fa-utensils text-6xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada menu favorit tersedia</p>
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('menu') }}" class="btn-modern bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg">
                <i class="fas fa-arrow-right mr-2"></i>
                Lihat Semua Menu
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-600 via-orange-700 to-orange-800 text-white relative overflow-hidden section-fade">
    <!-- Background Pattern -->
    <div class="absolute inset-0 hero-pattern opacity-20"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-shadow">
                Siap Untuk <span class="text-orange-300">Memesan?</span>
            </h2>
            <p class="text-xl md:text-2xl mb-10 text-orange-100 max-w-3xl mx-auto leading-relaxed">
                Hubungi kami sekarang untuk pemesanan atau reservasi meja. Tim kami siap melayani Anda!
            </p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('menu') }}" class="btn-modern bg-white text-orange-600 hover:bg-orange-50 px-10 py-4 rounded-xl font-semibold transition-all duration-300 inline-flex items-center justify-center shadow-lg">
                <i class="fas fa-shopping-cart mr-2"></i>
                Pesan Sekarang
            </a>
            <a href="{{ route('contact') }}" class="btn-modern glass-effect text-white px-10 py-4 rounded-xl font-semibold transition-all duration-300 inline-flex items-center justify-center border border-white/20">
                <i class="fas fa-map-marker-alt mr-2"></i>
                Lihat Lokasi
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer untuk animasi scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observe semua elemen dengan class section-fade
    document.querySelectorAll('.section-fade').forEach(el => {
        observer.observe(el);
    });
    
    // Smooth scrolling untuk semua link anchor
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Parallax effect untuk hero section
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.parallax-bg');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
});
</script>

@endsection