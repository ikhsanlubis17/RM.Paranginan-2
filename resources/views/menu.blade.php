@extends('layouts.app')

@section('content')
    <!-- Hero Section with Parallax Effect -->
    <section class="relative h-64 flex items-center justify-center overflow-hidden bg-gradient-to-r from-orange-600 to-orange-800 text-white">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 transform transition duration-700 hover:scale-105 inline-block">
                Menu Kami
            </h1>
            <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                Nikmati berbagai hidangan tradisional Indonesia yang lezat
            </p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-8 bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Bar with Animation -->
            <div class="mb-8" data-aos="fade-up">
                <div class="relative max-w-md mx-auto">
                    <input type="text" 
                           id="search-input"
                           placeholder="Cari menu..." 
                           class="w-full pl-12 pr-5 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 hover:shadow-md">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400 text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Category Tabs with Smooth Scrolling -->
            <div class="mb-6 overflow-x-auto pb-2" data-aos="fade-up" data-aos-delay="100">
                <div class="flex flex-nowrap md:flex-wrap justify-start md:justify-center gap-3 px-1">
                    <button type="button" 
                            class="category-tab active whitespace-nowrap px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-orange-600 text-white hover:bg-orange-700 shadow-md hover:shadow-lg"
                            data-category="">
                        Semua Menu
                    </button>
                    @foreach(\App\Models\Category::orderBy('name')->get() as $category)
                        <button type="button" 
                                class="category-tab whitespace-nowrap px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 bg-gray-100 text-gray-700 hover:bg-gray-200 hover:shadow-md"
                                data-category="{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section with Grid Layout -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Shimmer Loader -->
            <div id="shimmer-loader" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @for($i = 0; $i < 8; $i++)
                <div class="animate-pulse bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="h-56 bg-gray-200"></div>
                    <div class="p-5">
                        <div class="h-5 bg-gray-200 rounded w-3/4 mb-2"></div>
                        <div class="h-4 bg-gray-100 rounded w-1/2 mb-4"></div>
                        <div class="flex justify-between items-center">
                            <div class="h-5 bg-orange-100 rounded w-1/4"></div>
                            <div class="h-8 bg-orange-200 rounded w-16"></div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div id="menu-container" style="display:none;">
                @if($menus->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($menus as $index => $menu)
                            <div class="menu-item bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-500 hover:-translate-y-1 relative opacity-0 scale-95"
                                 data-category="{{ $menu->category_id }}" 
                                 data-name="{{ strtolower($menu->name) }}"
                                 data-description="{{ strtolower($menu->description ?? '') }}"
                                 data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
                                <!-- Favorite Button -->
                                @auth
                                    @php
                                        $isFavorited = Auth::user()->favoriteMenus->contains($menu->id);
                                    @endphp
                                    <button type="button" class="favorite-btn absolute top-3 right-3 z-10 bg-white bg-opacity-80 rounded-full p-2 shadow-md hover:bg-opacity-100 transition-all duration-300 hover:scale-110" 
                                            data-menu-id="{{ $menu->id }}" 
                                            aria-label="Favoritkan">
                                        @if($isFavorited)
                                            <i class="fa-solid fa-heart text-red-500 text-xl"></i>
                                        @else
                                            <i class="fa-regular fa-heart text-gray-500 text-xl hover:text-red-500"></i>
                                        @endif
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="absolute top-3 right-3 z-10 bg-white bg-opacity-80 rounded-full p-2 shadow-md hover:bg-opacity-100 transition-all duration-300 hover:scale-110" 
                                       aria-label="Favoritkan">
                                        <i class="fa-regular fa-heart text-gray-500 text-xl hover:text-red-500"></i>
                                    </a>
                                @endauth
                                
                                <!-- Category Badge -->
                                @if($menu->category)
                                    <div class="absolute top-3 left-3 z-10">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800 shadow-md">
                                            {{ $menu->category->name }}
                                        </span>
                                    </div>
                                @endif
                                
                                <!-- Menu Image -->
                                @if($menu->image)
                                    <div class="h-56 bg-gray-200 overflow-hidden">
                                        <img src="{{ asset('storage/' . $menu->image) }}" 
                                             alt="{{ $menu->name }}" 
                                             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                    </div>
                                @else
                                    <div class="h-56 bg-gradient-to-br from-orange-50 to-orange-100 flex items-center justify-center">
                                        <i class="fas fa-utensils text-4xl text-orange-300"></i>
                                    </div>
                                @endif
                                
                                <!-- Menu Details -->
                                <div class="p-5">
                                    <h3 class="font-semibold text-lg text-gray-900 mb-2">{{ $menu->name }}</h3>
                                    @if($menu->description)
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $menu->description }}</p>
                                    @endif
                                    <div class="flex justify-between items-center">
                                        <p class="text-orange-600 font-bold text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                                        @auth
                                        <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-all duration-300 hover:shadow-md flex items-center ripple">
                                                <i class="fas fa-cart-plus mr-2"></i>Tambah
                                            </button>
                                        </form>
                                        @else
                                        <a href="{{ route('login') }}" 
                                           class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded-lg text-sm transition-all duration-300 hover:shadow-md flex items-center ripple">
                                            <i class="fas fa-cart-plus mr-2"></i>Tambah
                                        </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16" data-aos="fade-up">
                        <div class="inline-block bg-orange-100 p-6 rounded-full mb-6">
                            <i class="fas fa-utensils text-5xl text-orange-500"></i>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-3">Menu Belum Tersedia</h3>
                        <p class="text-gray-600 max-w-md mx-auto">Kami sedang menyiapkan menu terbaik untuk Anda. Silakan cek kembali nanti.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section with Gradient Background -->
    <section class="py-16 bg-gradient-to-r from-orange-600 to-orange-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold mb-4">Suka dengan menu kami?</h2>
            <p class="text-xl mb-8 text-orange-100 max-w-2xl mx-auto">Pesan sekarang dan nikmati hidangan lezat di rumah Anda</p>
            <a href="https://wa.me/6282162660660?text=Halo, saya ingin memesan makanan di Pondok Paranginan 2" 
               target="_blank" 
               class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-full font-semibold transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <i class="fab fa-whatsapp text-xl mr-3"></i>Pesan via WhatsApp
            </a>
        </div>
    </section>
@endsection 

@push('styles')
    <style>
        /* Shimmer Loader */
        .animate-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
        /* Custom scrollbar for category tabs */
        .overflow-x-auto::-webkit-scrollbar {
            height: 6px;
        }
        .overflow-x-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }
        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
        
        /* Ripple effect for buttons */
        .ripple {
            position: relative;
            overflow: hidden;
        }
        .ripple:after {
            content: '';
            display: block;
            position: absolute;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            left: 50%;
            top: 50%;
            pointer-events: none;
            background: rgba(255,255,255,0.4);
            transform: translate(-50%, -50%) scale(0);
            animation: ripple-effect 0.6s linear;
        }
        @keyframes ripple-effect {
            to {
                transform: translate(-50%, -50%) scale(2.5);
                opacity: 0;
            }
        }
        /* Smooth transitions */
        .menu-item {
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        
        /* Hover effects */
        .category-tab:hover {
            transform: translateY(-2px) scale(1.05);
        }
    </style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS animations
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 600,
            easing: 'ease-out-quad',
            once: true
        });
    }

    // Favorite functionality
    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const menuId = this.getAttribute('data-menu-id');
            const icon = this.querySelector('i');
            
            // Optimistic UI update
            const isFavorited = icon.classList.contains('fa-solid');
            if (isFavorited) {
                icon.classList.replace('fa-solid', 'fa-regular');
                icon.classList.replace('text-red-500', 'text-gray-500');
            } else {
                icon.classList.replace('fa-regular', 'fa-solid');
                icon.classList.replace('text-gray-500', 'text-red-500');
            }
            
            // Add animation class
            this.classList.add('animate-ping');
            setTimeout(() => {
                this.classList.remove('animate-ping');
            }, 300);
            
            // API call
            fetch("{{ route('favorite.toggle') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ menu_id: menuId })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (!data.success) {
                    // Revert UI if API call failed
                    if (isFavorited) {
                        icon.classList.replace('fa-regular', 'fa-solid');
                        icon.classList.replace('text-gray-500', 'text-red-500');
                    } else {
                        icon.classList.replace('fa-solid', 'fa-regular');
                        icon.classList.replace('text-red-500', 'text-gray-500');
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Revert UI on error
                if (isFavorited) {
                    icon.classList.replace('fa-regular', 'fa-solid');
                    icon.classList.replace('text-gray-500', 'text-red-500');
                } else {
                    icon.classList.replace('fa-solid', 'fa-regular');
                    icon.classList.replace('text-red-500', 'text-gray-500');
                }
            });
        });
    });

    // Search and filter functionality
    const searchInput = document.getElementById('search-input');
    const categoryTabs = document.querySelectorAll('.category-tab');
    const menuItems = document.querySelectorAll('.menu-item');
    let currentCategory = '';
    let currentSearch = '';

    function filterMenus() {
        let hasVisibleItems = false;
        
        menuItems.forEach(item => {
            const categoryId = item.getAttribute('data-category');
            const name = item.getAttribute('data-name');
            const description = item.getAttribute('data-description');
            
            const categoryMatch = currentCategory === '' || categoryId === currentCategory;
            const searchMatch = currentSearch === '' || 
                               name.includes(currentSearch.toLowerCase()) || 
                               description.includes(currentSearch.toLowerCase());
            
            if (categoryMatch && searchMatch) {
                item.style.display = 'block';
                hasVisibleItems = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Show empty state if no items match
        const emptyState = document.getElementById('empty-state');
        if (emptyState) {
            emptyState.style.display = hasVisibleItems ? 'none' : 'block';
        }
    }

    // Search functionality with debounce
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            currentSearch = this.value.trim();
            filterMenus();
        }, 300);
    });

    // Category filter functionality
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            categoryTabs.forEach(t => {
                t.classList.remove('bg-orange-600', 'text-white', 'hover:bg-orange-700', 'shadow-md');
                t.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            });
            
            // Add active class to clicked tab
            this.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
            this.classList.add('bg-orange-600', 'text-white', 'hover:bg-orange-700', 'shadow-md');
            
            currentCategory = this.getAttribute('data-category');
            filterMenus();
            
            // Scroll to menu section
            document.getElementById('menu-container').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Shimmer loader logic
    setTimeout(function() {
        document.getElementById('shimmer-loader').style.display = 'none';
        document.getElementById('menu-container').style.display = 'block';
        // Animate menu items in
        document.querySelectorAll('.menu-item').forEach((el, i) => {
            setTimeout(() => {
                el.classList.remove('opacity-0', 'scale-95');
                el.classList.add('opacity-100', 'scale-100');
            }, 100 + i * 80);
        });
    }, 1200); // 1.2s shimmer

    // Ripple effect for buttons
    document.querySelectorAll('button, a').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            if (!btn.classList.contains('ripple')) return;
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            btn.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });
});
</script>
@endpush