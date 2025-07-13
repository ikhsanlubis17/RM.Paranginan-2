@extends('layouts.app')

@section('content')
<!-- Header dengan background oranye -->
<section class="relative h-56 flex items-center justify-center overflow-hidden bg-gradient-to-r from-orange-600 to-orange-800 text-white mb-8">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-3 transform transition duration-700 hover:scale-105 inline-block">
            <i class="fas fa-heart mr-3"></i>Menu Favorit Anda
        </h1>
        <p class="text-xl text-orange-100 max-w-2xl mx-auto">
            Koleksi menu pilihan yang telah Anda simpan
        </p>
    </div>
</section>

<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <!-- Page Header with Animation -->
    <!-- (header lama dihapus, sudah diganti header baru di atas) -->

    @if($menus->count() > 0)
    <!-- Menu Grid with Staggered Animation -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($menus as $index => $menu)
        <div class="menu-card bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 relative"
             data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 100 }}">
            <!-- Favorite Button with Animation -->
            <button class="favorite-btn absolute top-4 right-4 z-10 bg-white bg-opacity-90 rounded-full p-2 shadow-md hover:bg-opacity-100 transition-all duration-300 hover:scale-110 group"
                    data-menu-id="{{ $menu->id }}" 
                    aria-label="Hapus dari Favorit">
                <i class="fas fa-heart text-red-500 text-xl group-hover:text-red-600"></i>
            </button>

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
                <div class="flex justify-between items-start mb-3">
                    <h3 class="font-semibold text-lg text-gray-900">{{ $menu->name }}</h3>
                </div>
                
                @if($menu->description)
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $menu->description }}</p>
                @endif
                
                <div class="flex justify-between items-center">
                    <p class="text-orange-600 font-bold text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    <a href="{{ route('menu.show', $menu->id) }}" 
                       class="text-orange-600 hover:text-orange-800 text-sm font-medium transition-colors flex items-center">
                        Detail <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Empty State with Animation -->
    <div class="bg-white rounded-2xl shadow-md p-10 text-center max-w-2xl mx-auto" data-aos="fade-up">
        <div class="inline-block bg-gradient-to-br from-orange-100 to-red-100 p-6 rounded-full mb-6">
            <i class="fas fa-heart text-5xl text-gradient bg-gradient-to-r from-orange-500 to-red-500 bg-clip-text text-transparent"></i>
        </div>
        <h2 class="text-2xl font-semibold text-gray-900 mb-3">Belum Ada Menu Favorit</h2>
        <p class="text-gray-600 mb-6 max-w-md mx-auto">
            Anda belum menambahkan menu favorit. Temukan menu favorit Anda dari koleksi hidangan lezat kami.
        </p>
        <a href="{{ route('menu') }}" 
           class="inline-flex items-center bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-700 hover:to-orange-600 text-white px-8 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            <i class="fas fa-utensils mr-3"></i>Jelajahi Menu
        </a>
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    /* Custom animation for favorite button */
    .favorite-btn:hover i {
        animation: pulse 0.5s ease-in-out;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
    
    /* Smooth transitions */
    .menu-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    /* Gradient text */
    .text-gradient {
        background-clip: text;
        -webkit-background-clip: text;
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

    // Favorite button functionality with animation
    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const menuId = this.getAttribute('data-menu-id');
            const card = this.closest('.menu-card');
            
            // Add removal animation
            card.classList.add('opacity-0', 'scale-95', 'transition-all', 'duration-300');
            
            // Wait for animation to complete before removing
            setTimeout(() => {
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
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.success && !data.favorited) {
                        card.remove();
                        
                        // Check if no more cards left
                        if (document.querySelectorAll('.menu-card').length === 0) {
                            window.location.reload();
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert animation if error occurs
                    card.classList.remove('opacity-0', 'scale-95');
                });
            }, 300);
        });
    });
});
</script>
@endpush