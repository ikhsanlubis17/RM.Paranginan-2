@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-2xl font-bold mb-6 text-orange-700 flex items-center"><i class="fa-solid fa-heart mr-2"></i>Favorit Saya</h1>
    @if($favorites->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($favorites as $menu)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow relative">
            @if($menu->image)
                <div class="h-48 bg-gray-200 overflow-hidden">
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
                </div>
            @else
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fa-regular fa-image text-4xl text-gray-400"></i>
                </div>
            @endif
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="font-semibold text-lg text-gray-900">{{ $menu->name }}</h3>
                    <button type="button" class="favorite-btn" data-menu-id="{{ $menu->id }}" aria-label="Hapus dari Favorit" style="background: none; border: none; outline: none; cursor: pointer;">
                        <i class="fa-solid fa-heart text-2xl text-red-500"></i>
                    </button>
                </div>
                @if($menu->description)
                    <p class="text-gray-600 text-sm mb-3">{{ $menu->description }}</p>
                @endif
                <p class="text-orange-600 font-bold text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                <div class="flex justify-between items-center mt-4">
                    <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-3 py-1 rounded text-sm transition-colors flex items-center">
                            <i class="fas fa-cart-plus mr-1"></i>Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fa-solid fa-heart text-5xl text-gray-300 mb-4"></i>
        <h2 class="text-xl font-semibold mb-2">Belum ada menu favorit</h2>
        <p class="text-gray-600 mb-4">Yuk, tambahkan menu favoritmu dari halaman menu!</p>
        <a href="{{ route('menu') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-semibold inline-flex items-center">
            <i class="fa-solid fa-list mr-2"></i>Lihat Menu
        </a>
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const btn = e.currentTarget;
            var menuId = btn.getAttribute('data-menu-id');
            fetch("{{ route('favorite.toggle') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ menu_id: menuId })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success && !data.favorited) {
                    // Remove card from grid
                    btn.closest('.bg-white').remove();
                }
            });
        });
    });
});
</script>
@endpush 