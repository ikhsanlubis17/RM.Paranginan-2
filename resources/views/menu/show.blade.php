@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="h-64 bg-gray-200 flex items-center justify-center">
            @if($menu->image)
                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
            @else
                <i class="fas fa-utensils text-5xl text-orange-300"></i>
            @endif
        </div>
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $menu->name }}</h1>
            @if($menu->description)
                <p class="text-gray-700 mb-4">{{ $menu->description }}</p>
            @endif
            <div class="flex items-center justify-between mb-4">
                <span class="text-orange-600 font-bold text-2xl">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                @if($menu->category)
                    <span class="inline-block bg-teal-100 text-teal-800 text-xs px-3 py-1 rounded-full">{{ $menu->category->name }}</span>
                @endif
            </div>
            <a href="{{ route('menu') }}" class="inline-block bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300">Kembali ke Menu</a>
        </div>
    </div>
</div>
@endsection 