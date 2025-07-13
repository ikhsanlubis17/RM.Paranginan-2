@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('gallery') }}" class="inline-block mb-4 text-orange-600 hover:text-orange-800 font-semibold">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Galeri
                    </a>
                    @if($gallery->image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Galeri Foto' }}" class="w-full max-h-[500px] object-contain rounded-lg shadow">
                        </div>
                    @endif
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $gallery->title ?? 'Tanpa Judul' }}</h1>
                    @if($gallery->description)
                        <p class="text-gray-700 text-lg leading-relaxed">{{ $gallery->description }}</p>
                    @else
                        <p class="text-gray-400 italic">Tidak ada deskripsi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection 